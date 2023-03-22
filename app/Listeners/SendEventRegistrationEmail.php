<?php

namespace App\Listeners;

use App\Events\EventRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Events\Events;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Mail;
use App\Mail\sendEventRegistrationSuccessMail;
use Carbon\Carbon;
use Log;

class SendEventRegistrationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventRegistration  $event
     * @return void
     */
    public function handle(EventRegistration $event)
    {

        if(isset($event->event_data) && !empty($event->event_data)){

            $event_data = $event->event_data;

            $paymentId  = $event_data['paymentId'];
            $userId     = $event_data['userId'];
            $eventUserId = $event_data['eventUserId'];
            $eventId    = $event_data['eventId'];


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

            $email = $registrationData['event_user']['user']['email'];

            $response = Mail::to($email)->send(new sendEventRegistrationSuccessMail($mailData));

        }else{

        }

    }
}
