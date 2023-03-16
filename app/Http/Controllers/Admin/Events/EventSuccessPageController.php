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

    public function addSuccessPage($eventId){

        if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }else {
                $event = Events::findOrFail($eventId);
        }
        $isadd = true;
        return view('templates.admin.events.info.eventSuccess',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Basic details','event'=> $event ?? null, 'rewards' =>$rewards ?? null]);
    }

    public function submitSuccessPage(Request $request,$eventId){
        if($eventId == '-'){
            return  back()->with('error','Please add an event!');
        }

        /* Validator::make($request->all(), [
                    'no_purchase_made'=>'required',
                    'partial_purchase_made' => 'required',
                    'all_purchase_made' => 'required',
                    'active_custom_message' => 'required',
                    'invite_friend' => 'required'
                   ])->validate();

        // dd($request->all());
        $data = $request->all();

        $alldata = $request->all();

        $eventRewards = $this->eventRepository->createEventSuccessPage($data,$eventId);

        return redirect()->route('admin.events.success.add',array($eventId, $eventRewards->id))->with('message','Changes saved successfully!'); */

    }
}
