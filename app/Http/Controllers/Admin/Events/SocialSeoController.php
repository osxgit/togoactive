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

class SocialSeoController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function renderSocialSeoSection($eventId){
        $eventSeo = $this->eventRepository->getEventSocialSeo($eventId);
        if($eventSeo){
                    $isadd=false;
                } else{
                    $isadd=true;
                }
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

        }else{
            $event = Events::findOrFail($eventId);
        }

        return view('templates.admin.events.info.social',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Social & SEO', 'eventsocials' => $eventSeo ?? null,'event'=> $event ?? null]);
    }

    public function submitSocialSeoDetails(Request $request,$eventId){
    
        $eventSeo = $this->eventRepository->getEventSocialSeo($eventId);
        if( $eventSeo){
            Validator::make($request->all(), [
                'page_title' => 'required|max:60',
                'share_image' => 'image',
                'share_title' => 'required',
                'share_description' => 'required|min:120|max:158',
                'fb_pixel_id' => 'sometimes|nullable|digits_between:15,15|numeric',
            ])->validate();
        }else{
            Validator::make($request->all(), [
                'page_title' => 'required|max:60',
                'share_image' => 'required|image',
                'share_title' => 'required',
                'share_description' => 'required|min:120|max:158',
                'fb_pixel_id' => 'sometimes|nullable|digits_between:15,15|numeric',
            ])->validate();
        }

 

        if($eventId == '-'){
              return  back()->with('message','Please add an event!');
        }


        $data=[];
        $data=$request->all();


        $data['page_title']=$request->page_title;
        $data['share_title']=$request->share_title;
        $data['share_description']=$request->share_description;
        $data['fb_pixel_id']=$request->fb_pixel_id;

        if(isset($request->share_image)){
            $share_image= FilesUploadsLogs::where('eventid',$eventId)->where('module','Events')->where('image_type','share_image')->where('active',0)->first();

            $data['share_image']=$share_image->path;
            if($share_image){
                $share_image->active = 1;
                $share_image->save();
            }
        }

        if( $eventSeo){
            $eventSeo = $this->eventRepository->updateEventSeo($data,$eventId);
        } else{
            $eventSeo = $this->eventRepository->createEventSeo($data,$eventId);
        }

        return redirect()->route('admin.events.info.socialSeo',$eventId )->with('message','Changes saved successfully!');

    }


}