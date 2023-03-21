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

            $paymentId  = (int) $event_data['paymentId'];
            $userId     = (int) $event_data['userId'];
            $eventId    = (int) $event_data['eventId'];
            $request    = $event->request;

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

            $registrationData   = $this->eventRepository->getEventUserData(array('eventUser' => $userId,'payment'=>$paymentId ));
            $successPage        = $this->eventRepository->getEventSuccessPage(array('eventId' => $eventId ));

            $reg                = $this->eventRepository->getRegistrationSetup(array('eventId' => $eventId ));
            $groupingHeader     = ($reg->count() > 0) ? $reg->grouping_header : [];

            $coreReward_data    = $this->eventRepository->getActiveCoreRewards(array('eventId' => $eventId ));
            $coreRewards        = ($coreReward_data->count() > 0) ? $coreReward_data->coreRewards: [];

            $addonRewards_data  = $this->eventRepository->getActiveAddonRewards(array('eventId' => $eventId ));
            $addonRewards       = ($addonRewards_data->count() > 0) ? $addonRewards_data->addonRewards : [];

            $eventImages        = $this->eventRepository->getEventImages($eventId);


            if($registrationData['event_user']['is_paid_user'] == 1){
                if($registrationData['payment']['user_reward']){
                    if(count($registrationData['payment']['user_reward']) == count($coreRewards)+ count($addonRewards)){
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

            $log_array = array(
                'message' => "Started cron",
                'date' => Carbon::now()->toDateTimeString(),
                'data' => $data,
            );
            Log::channel('single')->info($log_array);


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
