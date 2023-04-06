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
use App\Events\EventRegistration;
use Log;

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

                $rootAssetPath = env('CDN_ROOT_PATH');

                if($eventId == '-'){
                  $this->setResponseData(array( 'data' => array('success' => false) ));
                        return $this->sendAPIResponse();
                    }else {
                        $event = Events::findOrFail($eventId);
                        // $eventRewards = $this->eventRepository->getRewards($eventId);
                        $eventRewards = $this->eventRepository->getActiveRewards($eventId);
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


                        $returnHTML = view('templates.admin.events.info.landingPageView',['FaqData'=>$FaqData,'nowtimestamp'=>$nowtimestamp,'challengeEnded'=>$challengeEnded,'timerHeading'=>$timerHeading,'countDownDate'=>$countDownDate,'eventslidersubtitle'=> $eventslidersubtitle,'rootAssetPath'=>$rootAssetPath ,'eventDates'=> $eventDates,'eventImages'=> $eventImages,'eventRewards'=> $eventRewards,'landingPage' => $landingPage,'id' => $eventId, 'route_name' => request()->route()->getName(), 'active_page' => 'Landing Page', 'event'=> $event ?? null])->render();

                        $this->setResponseData(array( 'data' => array('success' => true, 'html'=>$returnHTML) ));
                        return $this->sendAPIResponse();
//                              return response()->json( array('success' => true, 'html'=>$returnHTML) );

            }

            public function getEventLandingPageDetail(Request $request){
                $rootAssetPath = env('CDN_ROOT_PATH');
                $eventData = $this->eventRepository->getEventDataThroughSlug($request->slug);
                $this->setResponseData(array( 'data' => array('success' => true, 'event'=>$eventData, 'rootAssetPath'=>$rootAssetPath) ));
                return $this->sendAPIResponse();
            }

            public function getRegistrationPageDetail(Request $request){
                $eventId= $request->eventId;
                $registrationData = $this->eventRepository->getRegistrationSetup($eventId);
                // $rewards= $this->eventRepository->getRewards($eventId);
                // $coreRewards = $this->eventRepository->getCoreRewards($eventId);
                // $addonRewards = $this->eventRepository->getAddonRewards($eventId);
                $coreRewards = $this->eventRepository->getActiveCoreRewards($eventId);
                $addonRewards = $this->eventRepository->getActiveAddonRewards($eventId);
                $multiQtyDisc= $this->eventRepository->getMultiQuantityDiscount($eventId);
                if($coreRewards){
                    $rewardInstruction = $this->eventRepository->getEventMeta($eventId, 'reward_instructions');
                }
                if($addonRewards){
                    $addonInstruction = $this->eventRepository->getEventMeta($eventId, 'addon_instructions');
                }

                $this->setResponseData(array( 'data' => array('success' => true, 'registrationData'=>$registrationData,'coreRewards'=>$coreRewards,'addonRewards'=>$addonRewards,'multiQtyDisc'=>$multiQtyDisc,'rewardInstruction'=>$rewardInstruction??null,'addonInstruction'=>$addonInstruction ?? null) ));
                return $this->sendAPIResponse();
            }

            public function getEventIdFromSlug(Request $request){

                $eventId = $this->eventRepository->getEventIdThroughSlug($request->slug);
                $this->setResponseData(array( 'data' => array('success' => true, 'event'=>$eventId) ));
                return $this->sendAPIResponse();
            }

            public function validateCouponCode(Request $request){
                $couponResponse = $this->eventRepository->validateCouponCode($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$couponResponse) ));
                return $this->sendAPIResponse();


            }

            public function getAllTeams(Request $request){
                $teams = $this->eventRepository->getAllTeams($request->eventId);
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$teams) ));
                return $this->sendAPIResponse();

            }

            public function validateTeam(Request $request){
                $team = $this->eventRepository->validateTeam($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$team) ));
                return $this->sendAPIResponse();
            }

            public function createNewTeam(Request $request){
                $team = $this->eventRepository->createNewTeam($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$team) ));
                return $this->sendAPIResponse();
            }

            public function validateReferralCode(Request $request){
                $referralCode = $this->eventRepository->validateReferralCode($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$referralCode) ));
                return $this->sendAPIResponse();
            }

            public function calculatePrice(Request $request){
                $totalPrice = $this->eventRepository->calculatePrice($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$totalPrice) ));
                return $this->sendAPIResponse();
            }

            public function getCheckoutRewards(Request $request){
                $rewards = $this->eventRepository->getCheckoutRewards($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$rewards) ));
                return $this->sendAPIResponse();

            }

            public function processFreeRegistration(Request $request){
                $response = $this->eventRepository->processFreeRegistration($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));

                // this is called when event free registration
                $eventId = $request['eventId'];
                $eventUser = $response['payment']['user_id'];
                $eventPayment = $response['payment']['id'];
                $eventUserId = $response['event_user']['id'];

                $eventData = ['paymentId'=>$eventPayment, 'userId'=>$eventUser, 'eventId'=>$eventId, 'eventUserId'=>$eventUserId];

                $log_array = array(
                    'message' => "event controller processFreeRegistration",
                    'date' => Carbon::now()->toDateTimeString(),
                    'response' => $response,
                    'request' => $request,
                    'eventData' => $eventData
                );
                Log::channel('single')->info($log_array);

                event(new EventRegistration($eventData,$request));

                return $this->sendAPIResponse();
            }

            public function processPaidRegistration(Request $request){
                $response = $this->eventRepository->processPaidRegistration($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));
                return $this->sendAPIResponse();
            }

            public function updatePayment(Request $request){
                $response = $this->eventRepository->updatePayment($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));

                // this is called when event payment registration
                /* $eventUser = $response['user_id'];
                $eventId = $request['eventId'];
                $eventPayment = $request['paymentId'];
                $eventUserId = $request['eventUserId'];

                // if($request->status=='successful'){
                $eventData = ['paymentId'=>$eventPayment,'userId'=>$eventUser,'eventId'=>$eventId,'eventUserId'=>$eventUserId];
                event(new EventRegistration($eventData,$request)); */
                // }

                return $this->sendAPIResponse();
            }

            public function getEventUserData(Request $request){
                $eventUser = $this->eventRepository->getEventUserData($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$eventUser) ));
                return $this->sendAPIResponse();
            }

            public function getEventSuccessPage(Request $request){
                $eventSuccess = $this->eventRepository->getEventSuccessPage($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$eventSuccess) ));
                return $this->sendAPIResponse();
            }

            public function getEventData(Request $request){
                $eventData = $this->eventRepository->getEventData($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$eventData) ));
                return $this->sendAPIResponse();
            }

            public function checkEventUser(Request $request){
                $eventUser = $this->eventRepository->checkEventUser($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$eventUser) ));
                return $this->sendAPIResponse();
            }

            public function getTermConditions(Request $request){
                $termConditions = $this->eventRepository->getTermConditions($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$termConditions) ));
                return $this->sendAPIResponse();
            }

            public function getEventSocial(Request $request) {
                $termConditions = $this->eventRepository->getSocialData($request->all());
                $this->setResponseData(array('data' => array('success' => true, 'data' => $termConditions)));
                return $this->sendAPIResponse();
            }

            public function updateUserTeam(Request $request){
                $updateUserTeam = $this->eventRepository->updateUserTeam($request->all());
                $this->setResponseData(array('data' => array('success' => true, 'data' => $updateUserTeam)));
                return $this->sendAPIResponse();
            }

            public function eventUsersCount(Request $request){
                $eventUsersCount = $this->eventRepository->eventUsersCount($request->eventId);
                $this->setResponseData(array('data' => array('success' => true, 'data' => $eventUsersCount)));
                return $this->sendAPIResponse();

            }

            public function getUserRegistrationPayment(Request $request){
                $eventUsersRegistrationPaymentId = $this->eventRepository->eventRegistrationPaymentId($request->eventId,$request->userId);
                $this->setResponseData(array('data' => array('success' => true, 'data' => $eventUsersRegistrationPaymentId)));
                return $this->sendAPIResponse();
            }

            public function getUserUpgradePayment(Request $request){
                $eventUsersRegistrationPaymentId = $this->eventRepository->eventUpgradePaymentId($request->eventId,$request->userId);
                $this->setResponseData(array('data' => array('success' => true, 'data' => $eventUsersRegistrationPaymentId)));
                return $this->sendAPIResponse();
            }

            public function processUpgradeEventPayment(Request $request){
                $response = $this->eventRepository->processUpgradeEvent($request->all());

                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));
                return $this->sendAPIResponse();
            }

            public function updateUpgradeEventPayment(Request $request){
                $response = $this->eventRepository->updateUpgradeEventPayment($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));

                // this is called when event payment registration
                /* $eventUser = $response['user_id'];
                $eventId = $request['eventId'];
                $eventPayment = $request['paymentId'];
                $eventUserId = $request['eventUserId'];
                $request['upgrade'] = true;
                if($request->status=='successful'){
                    $eventData = ['paymentId'=>$eventPayment,'userId'=>$eventUser,'eventId'=>$eventId,'eventUserId'=>$eventUserId, 'upgrade'=>$request['upgrade']];
                    event(new EventRegistration($eventData,$request));
                } */
                return $this->sendAPIResponse();
            }

            /*this function will return reward id as key and total quantity as value
            *  [
                    34 => "3"
                    36 => "1"
                    43 => "2"
                ]
            */
            public  function getEventRewardQuantity(Request $request){
                $response = $this->eventRepository->getEventRewardQuantity($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));
                return $this->sendAPIResponse();
            }

            public function getReferralData(Request $request){
                $response = $this->eventRepository->getEventReferralData($request->eventId);
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));
                return $this->sendAPIResponse();
            }

            public function getEventDataForTGP(Request $request){
                $response = $this->eventRepository->getEventDataForTGP($request->all());
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$response) ));
                return $this->sendAPIResponse();
            }

            public function updatePyamentResponse(Request $request){
                $payment = $this->eventRepository->updatePyamentResponse($request);
                $this->setResponseData(array( 'data' => array('success' => true, 'data'=>$payment) ));
                return $this->sendAPIResponse();

            }
    }
