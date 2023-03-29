<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\FilesUploadsLogs;
use App\Helpers\CountryHelper;
use Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Events\EventRegistration;
use Carbon\Carbon;
use Log;
use App\Mail\sendEventRegistrationSuccessMail;

class EventSuccessPageController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function renderSuccessPage($eventId){





        $eventSuccessPage = $this->eventRepository->getEventSuccessSetup($eventId);
        $email = Auth::user()->email;

        if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }else {
                $event = Events::findOrFail($eventId);
        }
        if($eventSuccessPage){
            $isadd=false;
        } else{
            $isadd=true;
        }
        return view('templates.admin.events.info.successPage',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Success Page','event'=> $event ?? null,'eventsuccess' => $eventSuccessPage ?? null, 'user_email'=>$email]);
    }

    public function submitSuccessPageDetails(Request $request,$eventId){


        if($eventId == '-'){
            return  back()->with('error','Please add an event!');
        }
        Validator::make($request->all(), [
                    'no_purchase_made'=>'required',
                    'partial_purchase_made' => 'required',
                    'all_purchase_made' => 'required',
                    'invite_friend' => 'required',
                    'email_subject' => 'required',
                    'email_body' => 'required',
                    'custom_message' => 'required_if:active_custom_message,=,1',
                   ])->validate();

        $eventSuccessPage = $this->eventRepository->getEventSuccessSetup($eventId);

        $data = $request->all();

        if( $eventSuccessPage){
            $eventSuccessPage = $this->eventRepository->updateEventSuccessSetup($data,$eventId);
        } else{
            $eventSuccessPage = $this->eventRepository->createEventSuccessPage($data,$eventId);
        }

        // added this code for generate emails via event

        //$eventData = ['paymentId'=>1,'userId'=>1,'eventId'=>$eventId];
        //$login_log_data = event(new EventRegistration($eventData,$request));

        $log_array = array(
            'message' => "this is for test log from event successpage update ",
            'date' => Carbon::now()->toDateTimeString(),
            'request' => $request,
            'eventSuccessPage' => $eventSuccessPage
        );
        Log::channel('single')->info($log_array);

        return redirect()->route('admin.events.success',$eventId )->with('message','Changes saved successfully!');

    }

    /*
    * This function will call when user click on send test email from event success page
    */
    public function sendSuccessEmail(Request $request){
        if ($request->ajax()) {

            $user =  Auth::user();
            $user_id = $user->id;
            $user_name = $user->username;
            $fullname = $user->fullname;
            $email = $user->email;

            $subject = '';
            $email_body = '';
            $replace_body = '';

            if(!empty($request->subject)){
                $subject = $request->subject;
            }

            if(!empty($request->email_body)){
                $email_body = $request->email_body;
                $replace_body = str_replace(['{user_name}','{full_name}'],[$user_name,$fullname],$email_body);
            }

            $mailData = [
                'title' => $subject,
                'subject' => $subject,
                'body' => $replace_body
            ];

            $response = Mail::to($email)->send(new SendEmail($mailData));

            if($response){

                $message = "Test email has been successfully sent to ".$email;
                return response()->json(['status' => true, 'message'=> $message]);
            }else{
                $message = "Failed to send test email";
                return response()->json(['status' => false, 'message'=> $message]);
            }
            die();

        }
    }

    /*
    * This function is created to just preview of event regitstration email template
    */
    public function previewEmailTemplate(){


        $event_data = ['paymentId'=>167 ,'userId'=>12 ,'eventId'=>2, 'eventUserId'=>171];

        $paymentId  = $event_data['paymentId'];
        $userId     = $event_data['userId'];
        $eventId    = $event_data['eventId'];
        $eventUserId = $event_data['eventUserId'];

        // get event details
        $event_object = Events::findOrFail($eventId);

        $eventName    = $event_object->slug;
        $event_slug   = $event_object->slug;


        $eventImages = $this->eventRepository->getEventImages($eventId);

        $registrationData   = $this->eventRepository->getEventUserData(array('eventUser' => $eventUserId,'payment'=>$paymentId ));
        $successPage        = $this->eventRepository->getEventSuccessPage(array('eventId' => $eventId ));

        $reg                = $this->eventRepository->getRegistrationSetup(array('eventId' => $eventId ));
        $groupingHeader     = ($reg->count() > 0) ? $reg->grouping_header : [];

        $coreReward_data    = $this->eventRepository->getActiveCoreRewards(array('eventId' => $eventId ));
        $coreRewards        = $coreReward_data->count();

        $addonRewards_data  = $this->eventRepository->getActiveAddonRewards(array('eventId' => $eventId ));
        $addonRewards       = $addonRewards_data->count();


        if(!empty($successPage->email_body)){
            $email_body = $successPage->email_body;
            $user_name = $registrationData['event_user']['user']['user_name'];
            $fullname = $registrationData['event_user']['user']['fullname'];
            $replace_body = str_replace(['{user_name}','{full_name}'],[$user_name,$fullname],$email_body);

            $successPage->email_body = $replace_body;
        }


        if($registrationData['event_user']['is_paid_user'] == 1){
            if($registrationData['payment']['user_reward']){
                if(count($registrationData['payment']['user_reward']) == $coreRewards + $addonRewards){
                    $canUpgrade=0;
                } else{
                    $canUpgrade=1;
                }
            } else{
                $canUpgrade=1;
            }

        } else{
            $canUpgrade=1;
        }

        // here we need to get event data and send mail to login user
        $event_base_url = "https://events.togoparts.com/";
        $data = ['data'=>['canUpgrade'=>$canUpgrade,'groupingHeader'=> $groupingHeader,'registrationData'=> $registrationData,'successPage'=>$successPage,'eventName'=>$eventName,'event_slug'=>$event_slug,'event_base_url' => $event_base_url,'eventImages'=>$eventImages]];

       /*  $data = [
            'canUpgrade'=>$canUpgrade,
            'groupingHeader'=> $groupingHeader,
            'registrationData'=> $registrationData,
            'successPage'=>$successPage,
            'eventName'=>$eventName,
            'event_slug'=>$event_slug,
            'event_base_url' =>$event_base_url,
            'eventImages' => $eventImages
        ];

        $subject = $successPage->email_subject;

        $mailData = [
            'title'   => $subject,
            'subject' => $subject,
            'data'    => $data,
            'body'    =>''
        ];

        $email = $registrationData['event_user']['user']['email']; */

       // $response = Mail::to($email)->send(new sendEventRegistrationSuccessMail($mailData));
        // dd($data);










        return view('templates.emails.eventRegistrationSuccessEmail',['mailData'=>$data]);
    }

    public function testMail() {
        $event_data = ['paymentId'=>226 ,'userId'=>23 ,'eventId'=>2, 'eventUserId'=>213];

        $paymentId  = $event_data['paymentId'];
        $userId     = $event_data['userId'];
        $eventId    = $event_data['eventId'];
        $eventUserId = $event_data['eventUserId'];

            // $paymentId  = $event_data['paymentId'];
            // $userId     = $event_data['userId'];
            // $eventUserId = $event_data['eventUserId'];
            // $eventId    = $event_data['eventId'];


            $log_array = array(
                'message' => "Printing from event listener ",
                'date' => Carbon::now()->toDateTimeString(),
                'data' => $event_data,
            );
            Log::channel('single')->info($log_array);

            // get event details
            $event_object = Events::findOrFail($eventId);
            $eventName = $event_object->name;
            $event_slug = $event_object->slug;

            $registrationData   = $this->eventRepository->getEventUserData(array('eventUser' => $eventUserId,'payment'=>$paymentId ));
            $successPage        = $this->eventRepository->getEventSuccessPage(array('eventId' => $eventId ));

            $reg                = $this->eventRepository->getRegistrationSetup(array('eventId' => $eventId ));
            $groupingHeader     = ($reg->count() > 0) ? $reg->grouping_header : [];

            $coreReward_data    = $this->eventRepository->getActiveCoreRewards(array('eventId' => $eventId ));
            $coreRewards        = $coreReward_data->count();

            $addonRewards_data  = $this->eventRepository->getActiveAddonRewards(array('eventId' => $eventId ));
            $addonRewards       = $addonRewards_data->count();

            $eventImages        = $this->eventRepository->getEventImages($eventId);

            $log_array = array(
                'message' => "SendEventRegistrationEmail get this data ",
                'date' => Carbon::now()->toDateTimeString(),
                'registrationData' => $registrationData,
                'groupingHeader' => $groupingHeader,
                'coreReward_data' => $coreReward_data,
                'addonRewards' => $addonRewards,
                'eventImages' => $eventImages,
            );
            Log::channel('single')->info($log_array);

            if(isset($registrationData['event_user']) && $registrationData['event_user'] != null && $registrationData['event_user']['is_paid_user'] == 1){
                if(isset($registrationData['payment']['user_reward']) && $registrationData['payment']['user_reward']){
                    if(count($registrationData['payment']['user_reward']) == $coreRewards + $addonRewards){
                        $canUpgrade=0;
                    } else{
                        $canUpgrade=1;
                    }
                } else{
                    $canUpgrade=1;
                }

            } else{
                $canUpgrade=1;
            }

            $event_base_url = "https://events.togoparts.com/"; // this url is used for event share on social platform
            // here we need to get event data and send mail to login user


            if(!empty($successPage->email_body)){
                $email_body = $successPage->email_body;
                $user_name = $registrationData['event_user']['user']['user_name'];
                $fullname = $registrationData['event_user']['user']['fullname'];
                $replace_body = str_replace(['{user_name}','{full_name}'],[$user_name,$fullname],$email_body);

                $successPage->email_body = $replace_body;
            }

            $data = [
                        'canUpgrade'=>$canUpgrade,
                        'groupingHeader'=> $groupingHeader,
                        'registrationData'=> $registrationData,
                        'successPage'=>$successPage,
                        'eventName'=>$eventName,
                        'event_slug'=>$event_slug,
                        'event_base_url' =>$event_base_url,
                        'eventImages' => $eventImages
                    ];

            // end email code
            $subject = $successPage->email_subject;
            $mailData = [
                'title'   => $subject,
                'subject' => $subject,
                'data'    => $data,
                'body'    =>''
            ];

            $email = 'akash.singh@togoparts.com';

            $response = Mail::to($email)->send(new sendEventRegistrationSuccessMail($mailData));
            die('test');
    }
}
