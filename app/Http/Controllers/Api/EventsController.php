<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Redis;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Traits\Api\SendResponse;
use App\Models\Events\Events;
use Carbon\Carbon;
class EventsController extends Controller
{
    use SendResponse;
      private $eventRepository;

        public function __construct(EventRepositoryInterface $eventRepository)
        {
            $this->eventRepository = $eventRepository;
        }

        public function renderLandingPageApi(Request $request){
        $eventId= $request->eventId;
//         return response()->json( array('success' => true, ));
//           $this->setResponseData(array( 'data' => array('success' => true) ));
//  return $this->sendAPIResponse();
//          try {
//                     throw new \Exception('Testing my application!!');
//                 }
//                 catch(\Throwable $e){
//                     echo $e->getMessage();
//                 }
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
//                   $this->setResponseData(array( 'data' => array('success' => true, 'html'=>$returnHTML) ));
//  return $this->sendAPIResponse();
                             return response()->json( array('success' => true, 'html'=>$returnHTML) );

            }
    }