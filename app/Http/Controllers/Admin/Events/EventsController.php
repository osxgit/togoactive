<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events\Events;
use App\Models\Events\Reward;
use App\Models\Events\EventsMeta;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\FilesUploadsLogs;
use DataTables;
use Carbon\Carbon;
use App\Helpers\ImageHelper;

class EventsController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index(Request $request){
        $rootAssetPath = env('CDN_ROOT_PATH');
        if ($request->ajax()) {
            $data = $this->eventRepository->getEventList();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if(!is_null($row->images) && !is_null($row->images->profile_icon)){
                        $image = $row->images->profile_icon;
                        return '<img src="'.env('CDN_ROOT_PATH').'/'.$image.'" style="width:200px;">';
                    } else{
                        $image = '';
                        return '';
                    }
                })
                ->addColumn('name', function($row){
                    $name = $row->hashtag.'<br>'.$row->name.'<br>'.$row->email;
                    return $name;
                })
                ->addColumn('dates', function($row){
                    if(!is_null($row->dates)){
                        $dates =    '<div class="flex flex-col">
                            <span>Reg Start: '.  Carbon::parse($row->dates->registration_start_date)->timezone($row->timezone)->format('D M d, Y H:i:s ').'</span>
                            <span>Reg End: '. Carbon::parse($row->dates->registration_end_date)->timezone($row->timezone)->format('D M d, Y H:i:s ').'</span>
                            <span>Event Start: '. Carbon::parse($row->dates->leaderboard_start_date)->timezone($row->timezone)->format('D M d, Y H:i:s ').'</span>
                            <span>Event End: '. Carbon::parse($row->dates->leaderboard_end_date)->timezone($row->timezone)->format('D M d, Y H:i:s ').'</span>
                            <span>Timezone '.$row->timezone.'</span>

                        </div>';
                    } else{
                        $dates =    '<div class="flex flex-col">
                                                   <span>Reg Start: </span>
                                                   <span>Reg End: </span>
                                                   <span>Event Start: </span>
                                                   <span>Event End: </span>
                                                   <span>Timezone '.$row->timezone.'</span>

                                               </div>';
                    }

                    return $dates;
                })
                ->addColumn('status', function($row){

                        if($row->event_status == 0){
                            if(!is_null($row->dates) && !is_null($row->images)){
                                if(!is_null($row->images->cover) && !is_null($row->images->icon) && !is_null($row->images->notification) && !is_null($row->images->rewards) && !is_null($row->images->event_name	) && !is_null($row->images->profile_icon) && !is_null($row->images->slider_background)    && !is_null($row->images->slider_foreground) && !is_null($row->images->ebib) && !is_null($row->images->certificate) ){
                                    $completed= '<span  class="text-poppins text-xs" style="color:#06C281"> Complete</span>';
                                } else{
                                    $completed= '<span  class="text-poppins text-xs" style="color:#F24E1E"> Incomplete</span>';
                                }

                            } else{
                                $completed= 'Incomplete';
                            }
                            $status= '<div class="flex flex-col">
                                            <div class="flex flex-row">
                                                <span style="color:#F24E1E"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i></span><span> Draft</span>
                                            </div>
                                            <div class="flex flex-row">
                                                <span></span>'.$completed.'
                                           </div>
                                      </div>';
                        } else{
                            if($row->is_hidden == 1){
                                $status='<div class="flex flex-col">
                                    <div class="flex flex-row">
                                        <span style="color:#F53F14"><i class="fa fa-eye-slash" aria-hidden="true"></i></span><span> Hidden </span>
                                    </div>
                                    <div class="flex flex-row">
                                        <span></span><span  class="text-poppins text-xs" style="color:#F53F14"> complete</span>
                                   </div>
                                </div>';
                            } else{
                                                    $status= '<span class="font-poppins" style="color:#06C281"><i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>Published</span>';

                            }
                        }

                        return $status;
                })
                ->addColumn('action', function($row){
                 if($row->event_status == 0){
                    $publishStyle = '';
                    if(!is_null($row->dates) && !is_null($row->images)){
                        if(!is_null($row->images->cover) && !is_null($row->images->icon) && !is_null($row->images->notification) && !is_null($row->images->rewards) && !is_null($row->images->event_name	) && !is_null($row->images->profile_icon) && !is_null($row->images->slider_background)    && !is_null($row->images->slider_foreground) && !is_null($row->images->ebib) && !is_null($row->images->certificate) ){
                           $publishStyle = '';
                        } else{
                         $publishStyle = 'display:none';
                        }
                    }else{
                    $publishStyle = 'display:none';
                    }
                 $hidestyle='display:none';



                 } else{
                 $publishStyle = 'display:none';
                  $hidestyle='';
                 }
                 $hidestyle='';
                  $publishStyle = '';
                        $btn = '<div class="dropdown text-center">
                                       <a class="dropdown-button" id="dropdown-menu-'.$row->id.'" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                           <i class="fa fa-ellipsis-v"></i>
                                       </a>
                                       <div class="dropdown-menu" aria-labelledby="dropdown-menu-'.$row->id.'">

                                               <a class="dropdown-item" href="'.route('admin.events.info.essentials' , $row->id).'">

                                                   Edit Event
                                               </a>
                                               <a class="dropdown-item" onclick="publishEvent('. $row->id.',\'' .$row->name .'\')" href="#" style="'.$publishStyle .'">

                                                   Publish event
                                               </a>
                                                <a class="dropdown-item"  href="'.route('admin.events.participantsManager' , $row->id).'">

                                                  View participants manager
                                              </a>
                                              <a class="dropdown-item"  href="#">

                                                  View Activities manager
                                              </a>
                                    <a class="dropdown-item"  href="#" onclick="hideEvent('. $row->id.',\'' .$row->name .'\')" style="'.$hidestyle.'">

                                                  Hide Event
                                              </a>
                                       </div>
                                   </div>';

                        return $btn;
                })
                ->rawColumns(['action','image','name','dates','status'])
                ->make(true);
        }
        return view('templates.admin.events.list',['route_name' => request()->route()->getName(), 'active_page' => 'Manage Events', 'id'=>'-']);

    }

    public function participants_manager(Request $request, $eventId){

        //$data = $this->eventRepository->getEventUsersList($eventId);
        //dd($data);

        if ($request->ajax()) {

            //DB::enableQueryLog(); // Enable query log
            $data = $this->eventRepository->getEventUsersList($eventId);
            //dd(DB::getQueryLog()); // Show results of log

            $dataTable = Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('total_paid', function($row){
                    //getting payment information
                    $payment = $row->payment->where('user_id',$row->user_id)->where('event_id',$row->event_id)->where("status","successful")->last();
                    $currency = $payment->currency ?? '';
                    $status = $payment->status ?? '';

                    if(isset($payment->total_paid)){
                        $amount = number_format($payment->total_paid,2);
                    } else{
                        $amount = 0;
                    }

                    if($amount==0){
                        $currency = '';
                        $amount = 0;
                    }

                    if($status == 'successful' || $status == 'processing'){

                        return $currency." ".$amount."<p><span  class='text-xs cursor-pointer' style='color: #06C281;' onclick='openPurchaseHistory($row->event_id,$row->user_id); return true;'>PaymentHistory</span>";

                    }else if($status!=''){
                        return $currency." ".$amount."<p><span  class='text-xs cursor-pointer' style='color: red;'> $payment->status</span>";
                    }
                    else{
                         return $currency." ".$amount."<p><span  class='text-xs cursor-pointer' style='color: #06C281;' onclick='openPurchaseHistory($row->event_id,$row->user_id); return true;'>PaymentHistory</span>";

                    }
                })
                ->addColumn('created_at', function($row){
                    $created_at_date = Carbon::parse($row->created_at)->format('D M d, Y H:i:s ');
                    $created_at_wt_date = Carbon::parse($row->created_at)->format('YmdHis');
                    //return $created_at;

                    return "<span data-search='".$created_at_date."' data-order=".$created_at_wt_date.">    ".$created_at_date."</span>";
                })
                ->addColumn('total_sku', function($row){
                    // getting rewards detail
                    $total_sku = $row->rewards->where('user_id',$row->user_id)->where('event_id',$row->event_id)->sum('quantity');

                    return $total_sku;
                })
                ->addColumn('user_id', function($row){
                    $tgp_userid = $row->user->tgp_userid;
                    return $tgp_userid;
                })
                ->addColumn('username', function($row){
                        $username = $row->user->username;
                        return $username;
                    })
                    ->addColumn('fullname', function($row){
                        $fullname = $row->user->fullname;
                        return $fullname;
                    })
                    ->addColumn('email', function($row){
                        $email = $row->user->email;
                        return $email;
                    })
                    ->addColumn('address', function($row){
                        $address = $row->country;
                        return $address;
                    })
                    ->addColumn('team_name', function($row){

                        //dd($row);
                        if($row->team_user){
                            $team_name = $row->team_user->team->team_name ;
                            $team_name .= $row->team_user->is_owner ==0 ?' - Team Member':' - Team Leader';
                        } else{
                            $team_name='';
                        }

                        return $team_name;
                    })
                    ->addColumn('strava', function($row){
                        $strava = $row->user->strava_id;
                        return $strava;
                    })
                    ->addColumn('referral_code', function($row){
                        $referral_code = $row->referral_code;
                        return $referral_code;
                    })
                    ->addColumn('coupon_code', function($row){
                        //getting payment information
                        $payment_coupon = $row->payment->where('user_id',$row->user_id)->where('event_id',$row->event_id)->where("status","successful")->last();
                        $coupon_code = '';
                        if(isset($payment_coupon)){
                            $coupon_code = $payment_coupon->coupon_code;
                        }
                        return $coupon_code;
                    })
                    ->addColumn('remarks', function($row){
                        $remarks = $row->remarks;
                        return $remarks;
                    })
                    ->addColumn('action', function($row){
                        $action = ' <i class="fa fa-trash fa-lg text-danger" aria-hidden="true" onclick="removeUser('. $row->user_id.',\'' .$row->event_id .'\'); return true;" title="Remove User"></i>';
                        return $action;
                    })
                    ->addColumn('id', function($row){
                        return $row->id;
                    })
                ->rawColumns(['action','total_paid','created_at'])
                ->make(true);
            //dd( $dataTable);

            return  $dataTable;
        }
        $eventData = Events::findOrFail($eventId);

        return view('templates.admin.events.participants',['route_name' => request()->route()->getName(), 'active_page' => 'Participants Manager', 'id'=>$eventId,'eventData'=>$eventData]);

    }

    public function PurchaseHistory($eventId, $userId){

        $purchaseHistoryData=  $this->eventRepository->getPurchaseHistory($eventId, $userId);
        $eventData = Events::findOrFail($eventId);
        $returnHTML = view('templates.admin.events.purchaseHistory',['purchaseHistoryData'=>$purchaseHistoryData,'eventData'=>$eventData])->render();// or method that you prefere to return data + RENDER is the key here
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function publishEvent(Request $request){
            $event = $this->eventRepository->publishEvent($request->eventId);
              return response()->json(['err'=>0]);

    }

    public function hideEvent(Request $request){
            $event = $this->eventRepository->hideEvent($request->eventId);
                       return response()->json(['err'=>0]);
        }
    public function renderEssentialsSection($eventId){


        if($eventId == '-'){
        $isadd=true;
        }else{
            $isadd=false;
            $event = Events::findOrFail($eventId);

            if($event->accessibility == 'private' ){
                $accepted_domains = $this->eventRepository->getEventMeta($eventId,'accepted_domains');
                $accepted_emails = $this->eventRepository->getEventMeta($eventId,'accepted_emails');

            }

        }

        return view('templates.admin.events.info.essentials',['id' => $eventId,'isadd'=>$isadd ,'route_name' => request()->route()->getName(), 'active_page' => 'Essentials', 'event' => $event ?? null,'accepted_emails'=> $accepted_emails ?? null, 'accepted_domains'=> $accepted_domains ?? null]);
    }

    public function submitEssentialsDetails(Request $request,$eventId){

        try{

        Validator::make($request->all(), [
            'event_name' => 'required|string|max:255',
            'event_hashtag' => 'required|string|max:255|alpha_num:ascii',
            'description' => 'required|string|max:200',
            'email' => 'required|email',
            'event_type' => 'required|string',
            'timezone' => 'required',
            'visibility' => 'required',
            'domain' => 'required',
            'slug' => 'required|string|max:255|unique:events,slug,'. $eventId .'|alpha_dash:ascii',
        ])->validate();


            DB::beginTransaction();
                $accepetedEmail=isset($request->accepted_emails)?json_encode(array_filter(explode(',',$request->accepted_emails))):'';
                $acceptedDomains= isset($request->accepted_domains)?json_encode(array_filter(explode(',',$request->accepted_domains))):'';

            if($eventId == '-'){
                $event = $this->eventRepository->createEventEssential($request);

                if($request->event_type == 'private' &&  $accepetedEmail !=''){
                    $event_email = $this->eventRepository->addEventMeta($event->id,'accepted_emails', $accepetedEmail);
                }
                if($request->event_type == 'private' &&  $acceptedDomains !=''){
                    $event_email = $this->eventRepository->addEventMeta($event->id,'accepted_domains', $acceptedDomains);
                }
                DB::commit();
                return redirect()->route('admin.events.info.essentials',$event->id)->with('message','Changes saved successfully!');;
            } else {

                $event = Events::findOrFail($eventId);

                if($event){
                    $eventDomain = $this->eventRepository->getEventMeta($eventId,'accepted_domains');
                    $eventEmails = $this->eventRepository->getEventMeta($eventId,'accepted_emails');
                    $event = $this->eventRepository->updateEventEssential($request,$eventId);
                     if(( !is_null($eventDomain) && $request->event_type == 'public') ||  ($request->event_type == 'private' && $acceptedDomains ==''  && !is_null($eventDomain))){
                          $this->eventRepository->deleteEventMeta($eventDomain->id);
                     } else if($request->event_type == 'private' && !is_null($eventDomain)   &&  $acceptedDomains !=''){
                          $this->eventRepository->updateEventMeta($eventId, 'accepted_domains', $acceptedDomains);
                     } else if($request->event_type == 'private' && is_null($eventDomain) &&  $acceptedDomains !=''){
                           $event_domain = $this->eventRepository->addEventMeta($eventId,'accepted_domains', $acceptedDomains);
                     }
                     if(( !is_null($eventEmails)  && $request->event_type == 'public' )||  ($request->event_type == 'private' && $accepetedEmail =='' && !is_null($eventEmails) )){
                          $this->eventRepository->deleteEventMeta($eventEmails->id);
                     }  else if($request->event_type == 'private' &&  !is_null($eventEmails)  &&  $accepetedEmail !=''){
                          $this->eventRepository->updateEventMeta($eventId, 'accepted_emails', $accepetedEmail);

                     } else if($request->event_type == 'private' && is_null($eventEmails) &&  $accepetedEmail !=''){
                           $event_email = $this->eventRepository->addEventMeta($eventId,'accepted_emails', $accepetedEmail);
                     }
                    DB::commit();
                    return redirect()->route('admin.events.info.essentials',$event->id)->with('message','Changes saved successfully!');;
                }
            }
        }catch(Exception|Error $exception) {

             DB::rollBack();
              return back()->withInput();
        }
    }

    public function renderDatesSection($eventId){
        $eventDates = $this->eventRepository->getEventDates($eventId);
        if($eventDates){
            $isadd=false;
        } else{
            $isadd=true;
        }
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

        }else {
            $event = Events::findOrFail($eventId);
        }



        return view('templates.admin.events.info.dates',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Dates', 'eventDates' => $eventDates ?? null,'event'=> $event ?? null]);
    }

    public function submitDatesDetails(Request $request,$eventId){
    if($request->upgrade_start_date == null and $request->upgrade_end_date == null){
    $request->request->remove('upgrade_start_date');
    $request->request->remove('upgrade_end_date');
//         $request=$request->except(['upgrade_start_date','upgrade_end_date']);
    }
// dd($request->all());
        Validator::make($request->all(), [
            'reg_start_date' => 'required|date',
            'reg_end_date' => 'required|date|after:reg_start_date',
            'free_reg_end_date' => 'date|after:reg_start_date',
            'upd_info_end_date' => 'required|date|after:reg_start_date',
            'leaderboard_start_date' => 'required|date|after:reg_start_date',
            'results_date' => 'required|date|after:reg_end_date',
            'upgrade_start_date' => 'sometimes|required_with:upgrade|date|after:reg_start_date',
            'upgrade_end_date' => 'sometimes|required_with:upgrade|date|after:upgrade_start_date',
        ])->validate();

        if($eventId == '-'){
                 return  back()->with('error','Please add an event!');
        }

        $eventDates = $this->eventRepository->getEventDates($eventId);
        if($eventDates){
            $event = $this->eventRepository->updateEventDate($request,$eventDates->id);
             return redirect()->route('admin.events.info.dates',$event->id)->with('message','Changes saved successfully!');;
        } else {
            $event = $this->eventRepository->createEventDate($request,$eventId);
            return redirect()->route('admin.events.info.dates',$event->id)->with('message','Changes saved successfully!');;
        }
    }

    public function renderImagesSection($eventId){
        $assetsPath = env('CDN_ASSETS_PATH');
        $rootAssetPath = env('CDN_ROOT_PATH');
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

        }else{
            $event = Events::findOrFail($eventId);
            $eventImages = $this->eventRepository->getEventImages($eventId);
            $eventslidersubtitle = $this->eventRepository->getEventMeta($eventId,'slider_sub_title');
            if($eventImages){
                $isadd=false;
            } else{
                $isadd=true;
            }
        // dd($eventImages);
        }

        return view('templates.admin.events.info.images',['images' => $eventImages ?? null, 'isadd' => $isadd,'slider_sub_title' => $eventslidersubtitle ?? null, 'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Images', 'event' => $event ?? null]);


    }



    public function submitImagesDetails(Request $request,$eventId){
        // dd($request->all());
        $data=[];
        if(isset($request->profile_icon)){
            $profileicon= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','profile_icon')->where('active',0)->first();
        //    dd($profileicon);
            $data['profile_icon']=$profileicon->path;
            if($profileicon){
                $profileicon->active = 1;
                $profileicon->save();
            }
        }

        if(isset($request->icon)){
            $icon= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','icon')->where('active',0)->first();
            $data['icon']=$icon->path;
            if($icon){
                $icon->active = 1;
                $icon->save();
            }
        }

        if(isset($request->notification)){
            $notification= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','notification')->where('active',0)->first();
            $data['notification']=$notification->path;
            if($notification){
                $notification->active = 1;
                $notification->save();
            }
        }

        if(isset($request->rewards)){
            $rewards= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','rewards')->where('active',0)->first();
            $data['rewards']=$rewards->path;
            if($rewards){
                $rewards->active = 1;
                $rewards->save();
            }
        }

        if(isset($request->cover)){
            $cover= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','cover')->where('active',0)->first();
            $data['cover']=$cover->path;
            if($cover){
                $cover->active = 1;
                $cover->save();
            }
        }

        if(isset($request->event_name)){
            $event_name= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','event_name')->where('active',0)->first();
            $data['event_name']=$event_name->path;
            if($event_name){
                $event_name->active = 1;
                $event_name->save();
            }
        }

        if(isset($request->slider_background)){
            $slider_background= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','slider_background')->where('active',0)->first();
            $data['slider_background']=$slider_background->path;
            if($slider_background){
                $slider_background->active = 1;
                $slider_background->save();
            }
        }

        if(isset($request->slider_foreground)){
            $slider_foreground= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','slider_foreground')->where('active',0)->first();
            $data['slider_foreground']=$slider_foreground->path;
            if($slider_foreground){
                $slider_foreground->active = 1;
                $slider_foreground->save();
            }
        }
        $eventImages = $this->eventRepository->getEventImages($eventId);
        if(  $eventImages){
            $eventImages = $this->eventRepository->updateEventImages($data,$eventId);
        } else{
            $eventImages = $this->eventRepository->createEventImages($data,$eventId);
        }
        $eventslidersubtitle = $this->eventRepository->getEventMeta($eventId,'slider_sub_title');

        if($eventslidersubtitle && isset($request->sub_title) && $request->sub_title !=''){
            $this->eventRepository->updateEventMeta($eventId, 'slider_sub_title', $request->sub_title);

        }else if($eventslidersubtitle && (!isset($request->sub_title) || $request->sub_title =='')){

            $this->eventRepository->deleteEventMeta($eventslidersubtitle->id);
        }else if(!$eventslidersubtitle && isset($request->sub_title)){
            $event_email = $this->eventRepository->addEventMeta($eventId,'slider_sub_title', $request->sub_title);

        }
        return redirect()->route('admin.events.info.images',$eventId )->with('message','Changes saved successfully!');
    }

    public function renderTemplateSection($eventId){
        $assetsPath = env('CDN_ASSETS_PATH');
        $rootAssetPath = env('CDN_ROOT_PATH');
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

        }else{
            $event = Events::findOrFail($eventId);
            $eventImages = $this->eventRepository->getEventImages($eventId);
            if($eventImages && ($eventImages->ebib != null || $eventImages->certificate != null)){
                $isadd=false;
            } else{
                $isadd=true;
            }
        // dd($eventImages);
        }

        return view('templates.admin.events.info.templates',['images' => $eventImages ?? null, 'isadd' => $isadd, 'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Images', 'event' => $event ?? null]);

    }

    public function submitTemplateDetails(Request $request,$eventId){
        $data=[];

        if(isset($request->ebib)){
            $ebib= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','ebib')->where('active',0)->first();
        //    dd($profileicon);
            $data['ebib']=$ebib->path;
            if($ebib){
                $ebib->active = 1;
                $ebib->save();
            }
        }

        if(isset($request->certificate)){
            $certificate= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','certificate')->where('active',0)->first();
            $data['certificate']=$certificate->path;
            if($certificate){
                $certificate->active = 1;
                $certificate->save();
            }
        }

        $eventImages = $this->eventRepository->getEventImages($eventId);
        if(  $eventImages){
            $eventImages = $this->eventRepository->updateEventImages($data,$eventId);
        } else{
            $eventImages = $this->eventRepository->createEventImages($data,$eventId);
        }

        return redirect()->route('admin.events.info.templates',$eventId )->with('message','Changes saved successfully!');

    }

    public function downloadImage($imagetype)
    {
        // $imagePath = Storage::url($image->image);
        return response()->download(public_path('/images/'.$imagetype.".png"));
    }

    public function renderRegistrationSetupSection($eventId)
    {
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

        }
        $event = Events::findOrFail($eventId);
        $registrationSetup = $this->eventRepository->getRegistrationSetup($eventId);
        if($registrationSetup){
            $isadd=false;
        } else{
            $isadd=true;
        }
        return view('templates.admin.events.info.registration',['registrationSetup' => $registrationSetup,'id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Registration Page Setup', 'event'=> $event ?? null]);

    }

    public function submitRegistrationSetupDetails(Request $request,$eventId)
    {

        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

        }

         Validator::make($request->all(), [
                  'min_members' =>  'sometimes|required_with:enable_teams',
                    'max_members' =>  'sometimes|required_with:enable_teams|gte:min_members',
                    'reason_for_collecting_address' =>  'sometimes|required_with:enable_delivery_address',
                    'grouping_header' => 'sometimes|required_with:enable_grouping',
                    'field_value' => 'sometimes|required_with:enable_grouping',

                ])->validate();

        $data=$request->all();

        if($data['reason_for_collecting_address'] == 'Custom reason'){
            if(trim($data['custom_reason']) ==''){
                return back()->withInput()->with('error','Please add the reason for collecting the address!');
            }
            $data['reason']=$data['custom_reason'];
        } else{
            $data['reason']=$data['reason_for_collecting_address'];
        }
        if(isset($request->geo_json)){
            $imageHelper = new ImageHelper();
            $module = "Events";
            $path   = $imageHelper->uploadFile($request->geo_json,'uploads/events/json/','json',$module,$eventId ?? 0);
            $data['geo_json']=$path;
        } else{
            $data['geo_json']='';
        }
        if(isset($request->field_value)){
            $fieldValue=[];

                                    foreach(json_decode($request->field_value) as $field_value){

                                        array_push($fieldValue,$field_value->value);
                                    }
                                $data['field_value']=json_encode($fieldValue);
            } else{
             $data['field_value']='';
            }
        $registrationSetup = $this->eventRepository->getRegistrationSetup($eventId);
        if(  $registrationSetup){
            if($data['geo_json'] != ''){
                $imageHelper = new ImageHelper();
                $imageHelper->deleteImage($registrationSetup->geo_json);
            }
            $registrationSetup = $this->eventRepository->updateRegistrationSetup($data,$eventId);
        } else{
            $registrationSetup = $this->eventRepository->createRegistrationSetup($data,$eventId);
        }
        return redirect()->route('admin.events.registration.manage',$eventId )->with('message','Changes saved successfully!');
    }

    public function renderCouponsSection($eventId){
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }
        $event = Events::findOrFail($eventId);
        $coupons = $this->eventRepository->getAllCoupons($eventId);

        $rewards = $this->eventRepository->getRewards($eventId);

        return view('templates.admin.events.coupons.manage',['rewards'=>$rewards ,'coupons' => $coupons,'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Coupon Manager', 'event'=> $event ?? null]);

    }

    public function renderCouponAdd($eventId, $couponId =0){

        if( $couponId > 0){
        $coupon = $this->eventRepository->getCoupon($couponId);
        }
        $eventRewards = $this->eventRepository->getRewards($eventId);

         $returnHTML = view('templates.admin.events.coupons.add',['couponId'=>$couponId,'coupon'=> $coupon ?? null, 'eventId'=>$eventId,'rewards'=>$eventRewards])->render();// or method that you prefere to return data + RENDER is the key here
//          dd($returnHTML);
         return response()->json( array('success' => true, 'html'=>$returnHTML) );

    }

    public function submitCouponDetails(Request $request,$eventId){
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }

        Validator::make($request->all(), [
                  'challengeId' =>  'required|numeric',
                    'name' =>  'required',
                    'discount' =>  'required|numeric|min:1',
                    'rewarddata' => 'required',
                    'expiry_date' =>'required'
                ])->validate();

        $data=$request->all();

        $data['rewards']=json_encode(array_keys($data['rewarddata']));
        $coupons = $this->eventRepository->storeCoupon($data,$eventId );

        return redirect()->route('admin.events.coupons',$eventId )->with('message','Changes saved successfully!');

    }

    public function deleteCoupon(Request $request,$eventId, $couponId){

        $coupons = $this->eventRepository->deleteCoupon($eventId,$couponId );
        return redirect()->route('admin.events.coupons',$eventId )->with('message','Changes saved successfully!');
    }

    public function deleteRewardImage($eventId,$rewardId, $imageIndex){
        $rewards= Reward::Where('id',$rewardId)->first();
        $rewardImages = $rewards->rewards_images;

        $rewardImages=json_decode($rewardImages);
        $imgLarge=$rewardImages->large[$imageIndex];
        $imgMedium= $rewardImages->medium[$imageIndex];

        $imageHelper = new ImageHelper();
        $imageHelper->deleteImage($imgLarge);
        $imageHelper->deleteImage($imgMedium);
        unset($rewardImages->large[$imageIndex]);
        unset($rewardImages->medium[$imageIndex]);

        $rewards->rewards_images= json_encode($rewardImages);
        $rewards->save();
        return redirect()->route('admin.events.rewards.edit',[$eventId ,$rewardId])->with('message','Changes saved successfully!');


    }

    public function renderLandingPageSection($eventId){
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }
        $event = Events::findOrFail($eventId);
        $landingPage = $this->eventRepository->getLandingPage($eventId);
        if($landingPage){
            $isadd=false;
        } else{
            $isadd=true;
        }
        return view('templates.admin.events.info.landingPage',['isadd' =>$isadd,'landingPage' => $landingPage,'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Landing Page', 'event'=> $event ?? null]);
    }
    public function renderLandingPageMobileSection($eventId){
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }
        $event = Events::findOrFail($eventId);
        $landingPage = $this->eventRepository->getLandingPage($eventId);

        return view('templates.admin.events.info.landingPageMobile',['landingPage' => $landingPage,'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Landing Page', 'event'=> $event ?? null]);
    }

    public function submitLandingPageDetails(Request $request,$eventId){

//         Validator::make($request->all(), [
//                   'event_detail' =>  'required',
//                     'Short_faq' =>  'required',
//                     'sponsor_detail' =>  'sometimes|required_with:show_sponsor',
//                 ])->validate();
        $data=$request->all();
        if(!is_null($data['sponsor_detail'])){
            // $data['sponsor_detail']= json_encode($data['sponsor_detail']);
            $data['sponsor_detail']= $data['sponsor_detail'];
            $data['sponsor_detail_unlayer']= $data['sponsor_detail_unlayer'];
        }

        if(!is_null($data['event_detail'])){
            // $data['event_detail']= json_encode($data['event_detail']);
            $data['event_detail']= $data['event_detail'];
            $data['event_detail_unlayer']= $data['event_detail_unlayer'];
        }
        if(!is_null($data['Short_faq'])){
            $data['Short_faq']= json_encode($data['Short_faq']);
        }

        $landingPage = $this->eventRepository->storeLandingPage($eventId, $data);

        return redirect()->route('admin.events.landingPage.setup',$eventId )->with('message','Changes saved successfully!');

    }

    public function submitLandingPageMobileDetails(Request $request,$eventId){
        Validator::make($request->all(), [
                  'event_detail' =>  'required',
                    'sponsor_detail' =>  'sometimes|required',
                ])->validate();
        $data=$request->all();

        if(isset($data['sponsor_detail_mob']) && !is_null($data['sponsor_detail_mob'])){
            $data['sponsor_detail_mob']= json_encode($data['sponsor_detail_mob']);
        }

        $data['event_detail_mob']= json_encode($data['event_detail_mob']);

        $landingPage = $this->eventRepository->storeLandingPage($eventId, $data);

        return redirect()->route('admin.events.landingPage.mobileSetup',$eventId )->with('message','Changes saved successfully!');

    }

    public function renderLandingPage($eventId){
        $rootAssetPath = env('CDN_ROOT_PATH');
        if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
            }else {
                $event = Events::findOrFail($eventId);
                $eventRewards = $this->eventRepository->getRewards($eventId);
                 $landingPage = $this->eventRepository->getLandingPage($eventId);
                 $eventImages = $this->eventRepository->getEventImages($eventId);
                 $eventDates = $this->eventRepository->getEventDates($eventId);
                 $eventslidersubtitle = $this->eventRepository->getEventMeta($eventId,'slider_sub_title');
            }
            $now = Carbon::now()->timezone($event->timezone);
            $nowtimestamp = Carbon::Parse( $now)->timestamp;

            if($now < $eventDates->registration_start_date){
                $timerHeading = "COMING SOON";
                $countDownDate = $eventDates->registration_start_date;
                $countDownDate=Carbon::Parse( $countDownDate)->timestamp;
                }else if($now >=$eventDates->registration_start_date && $now < $eventDates->registration_end_date){
                $timerHeading ="CHALLENGE IS LIVE";
                $countDownDate =$eventDates->leaderboard_end_date;

                $countDownDate=Carbon::Parse( $countDownDate)->timestamp;
            }else{
                $timerHeading = "";

                $countDownDate = '__';
                }
                $challengeEnded = true;
                if($now < $eventDates->leaderboard_end_date){
                    $challengeEnded = false;
                }


                $order   = array("\r\n\r\n", "\n", "\r","<p>","</p>");
                $replace = ' ';
                $newstr = str_replace($order, $replace,json_decode($landingPage->Short_faq));
                $shortFaq=explode('Q:',$newstr);

                $FaqData=[];

                foreach($shortFaq as $faq){
                    if(trim($faq) !=""){
                        array_push($FaqData,explode('A:',$faq));
                    }
                }
                // dd($FaqData);
        return view('templates.admin.events.info.landingPageView',['FaqData'=>$FaqData,'nowtimestamp'=>$nowtimestamp,'challengeEnded'=>$challengeEnded,'timerHeading'=>$timerHeading,'countDownDate'=>$countDownDate,'eventslidersubtitle'=> $eventslidersubtitle,'rootAssetPath'=>$rootAssetPath ,'eventDates'=> $eventDates,'eventImages'=> $eventImages,'eventRewards'=> $eventRewards,'landingPage' => $landingPage,'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Landing Page', 'event'=> $event ?? null]);
    }

    public function renderLandingPageApi($eventId){
        $rootAssetPath = env('CDN_ROOT_PATH');
        if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
            }else {
                $event = Events::findOrFail($eventId);
                $eventRewards = $this->eventRepository->getRewards($eventId);
                 $landingPage = $this->eventRepository->getLandingPage($eventId);
                 $eventImages = $this->eventRepository->getEventImages($eventId);
                 $eventDates = $this->eventRepository->getEventDates($eventId);
                 $eventslidersubtitle = $this->eventRepository->getEventMeta($eventId,'slider_sub_title');
            }
            $now = Carbon::now()->timezone($event->timezone);
            $nowtimestamp = Carbon::Parse( $now)->timestamp;

            if($now < $eventDates->registration_start_date){
                $timerHeading = "COMING SOON";
                $countDownDate = $eventDates->registration_start_date;
                $countDownDate=Carbon::Parse( $countDownDate)->timestamp;
                }else if($now >=$eventDates->registration_start_date && $now < $eventDates->registration_end_date){
                $timerHeading ="CHALLENGE IS LIVE";
                $countDownDate =$eventDates->leaderboard_end_date;

                $countDownDate=Carbon::Parse( $countDownDate)->timestamp;
            }else{
                $timerHeading = "";

                $countDownDate = '__';
                }
                $challengeEnded = true;
                if($now < $eventDates->leaderboard_end_date){
                    $challengeEnded = false;
                }

                $order   = array("\r\n\r\n", "\n", "\r");
                $replace = ' ';
                $newstr = str_replace($order, $replace,json_decode($landingPage->Short_faq));
                $shortFaq=explode('Q:',$newstr);

                $FaqData=[];

                foreach($shortFaq as $faq){
                    if($faq !=""){
                        array_push($FaqData,explode('A:',$faq));
                    }
                }

                $returnHTML = view('templates.admin.events.info.landingPageView',['FaqData'=>$FaqData,'nowtimestamp'=>$nowtimestamp,'challengeEnded'=>$challengeEnded,'timerHeading'=>$timerHeading,'countDownDate'=>$countDownDate,'eventslidersubtitle'=> $eventslidersubtitle,'rootAssetPath'=>$rootAssetPath ,'eventDates'=> $eventDates,'eventImages'=> $eventImages,'eventRewards'=> $eventRewards,'landingPage' => $landingPage,'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Landing Page', 'event'=> $event ?? null])->render();
         return response()->json( array('success' => true, 'html'=>$returnHTML) );

    }

    public function unlayer($eventId){

            return view('templates.admin.events.info.unlayer',['id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Landing Page']);

    }

    public function renderActivitiesSection(){

    }

    public function removeEventUser(Request $request){
        $event = $this->eventRepository->removeEventUser($request->eventId,$request->userId);
        return response()->json(['err'=>0]);
    }

    public function publishEventManually(Request $request){

        if($request->event_id){
            $event_id = $request->event_id;
            $event = $this->eventRepository->publishEventManually($request,$event_id);
            return response()->json( array('success' => true, 'html'=>$event) );
        }else{

            return response()->json( array('success' => false, 'error'=>"Please enter event_id as param ") );
        }


    }
}
