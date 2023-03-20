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
}
