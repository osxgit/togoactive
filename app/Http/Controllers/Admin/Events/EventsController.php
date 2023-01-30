<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index(){

    }
    public function renderEssentialsSection($eventId){


        if($eventId == '-'){

        }else{
            $event = Events::findOrFail($eventId);
            if($event->accessibility == 'private' ){
                $accepted_domains = $this->eventRepository->getEventMeta($eventId,'accepted_domains');
                $accepted_emails = $this->eventRepository->getEventMeta($eventId,'accepted_emails');

            }

        }

        return view('templates.admin.events.info.essentials',['id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Essentials', 'event' => $event ?? null,'accepted_emails'=> $accepted_emails ?? null, 'accepted_domains'=> $accepted_domains ?? null]);
    }

    public function submitEssentialsDetails(Request $request,$eventId){

        try{
        Validator::make($request->all(), [
            'event_name' => 'required|string|max:2',
        ])->validate();

//             $validateArr = array(
//                 'event_name' => ['required', 'string', 'max:2'],
//                 'event_hashtag' => ['required', 'string', 'max:255'],
//                 'description' => ['required', 'string'],
//                 'email' => ['required', 'string'],
//                 'event_type' => ['required', 'string'],
//                 'timezone'=>['required'],
//                 'visibility'=>['required'],
//             );
//
//             if($eventId == '-'){
//                 $validateArr['domain'] = ['required'];
// //                 $validateArr['slug']   = ['required', 'string','max:255','unique:events','alpha_dash'];
//             }
//               print_r($validateArr);
//             dd($request->validate($validateArr));
            DB::beginTransaction();
                $accepetedEmail=isset($request->accepted_emails)?json_encode(array_filter(explode(' ',str_replace([',',', '],[' ',' '],$request->accepted_emails)))):'';
                $acceptedDomains= isset($request->accepted_domains)?json_encode(array_filter(explode(' ',str_replace([',',', '],[' ',' '],$request->accepted_domains)))):'';

            if($eventId == '-'){
                $event = $this->eventRepository->createEventEssential($request);
                DB::commit();
                return redirect()->route('admin.events.info.essentials',$event->id)->with('message','Changes saved successfully!');;
            } else {
                $event = Events::findOrFail($eventId);
                if($event){
                    $eventDomain = $this->eventRepository->getEventMeta($eventId,'accepted_domains');
                    $eventEmails = $this->eventRepository->getEventMeta($eventId,'accepted_emails');
                     if(( !is_null($eventDomain) && $request->event_type == 'public') ||  ($request->event_type == 'private' && $acceptedDomains ==''  && !is_null($eventDomain))){
                          $this->eventRepository->deleteEventMeta($eventDomain->id);
                     } else if($request->event_type == 'private' && $eventDomain  &&  $acceptedDomains !=''){
                          $this->eventRepository->updateEventMeta($eventId, 'accepted_domains', $acceptedDomains);
                     } else if($request->event_type == 'private' && !$eventDomain &&  $acceptedDomains !=''){
                           $event_domain = $this->eventRepository->addEventMeta($eventId,'accepted_domains', $acceptedDomains);
                     }
                     if(( !is_null($eventEmails)  && $request->event_type == 'public' )||  ($request->event_type == 'private' && $accepetedEmail =='' && !is_null($eventEmails) )){
                          $this->eventRepository->deleteEventMeta($eventEmails->id);
                     }  else if($request->event_type == 'private' && $eventEmails  &&  $accepetedEmail !=''){
                          $this->eventRepository->updateEventMeta($eventId, 'accepted_emails', $accepetedEmail);

                     } else if($request->event_type == 'private' && !$eventEmails  &&  $accepetedEmail !=''){
                           $event_email = $this->eventRepository->addEventMeta($eventId,'accepted_emails', $accepetedEmail);
                     }
                    DB::commit();
                    return redirect()->route('admin.events.info.essentials',$event->id)->with('message','Changes saved successfully!');;
                }
            }
        }catch(Exception|Error $exception) {
        dd('sff');
             DB::rollBack();
              return back()->withInput();
        }
    }

    public function renderDatesSection($eventId){
        $eventDates = $this->eventRepository->getEventDates($eventId);
        return view('templates.admin.events.info.dates',['id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Dates', 'eventDates' => $eventDates ?? null]);
    }

    public function submitDatesDetails(Request $request,$eventId){
        if($eventId == '-'){
                 return  back()->with('message','Please add an event!');
        }
        $validateArr = array(
                'reg_start_date' => ['required',],
                'reg_end_date' => ['required'],
                'free_reg_end_date' => [],
                'upd_info_end_date' => ['required'],
                'leaderboard_start_date' => ['required'],
                'leaderboard_end_date'=>['required'],
                'results_date'=>['required'],
            );
            if(isset($request->upgrade) && $request->upgrade == 1 ){
                $validateArr['upgrade_start_date'] = ['required'];
                $validateArr['upgrade_end_date']   = ['required',];
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

    public function renderImagesSection(){

    }

    public function renderActivitiesSection(){

    }
}
