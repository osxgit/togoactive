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

class EventSuccessPageController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function renderSuccessPage($eventId){

        $eventSuccessPage = $this->eventRepository->getEventSuccessSetup($eventId);

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
        return view('templates.admin.events.info.successPage',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Success Page','event'=> $event ?? null,'eventsuccess' => $eventSuccessPage ?? null]);
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
            // here we need to write logic for send email
        }
    }
}
