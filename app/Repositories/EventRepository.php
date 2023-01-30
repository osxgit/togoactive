<?php

namespace App\Repositories;

use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
use App\Models\Events\EventsDate;
use App\Repositories\Interfaces\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    public function createEventEssential($request)
    {
        $event =  Events::create([
              'name' => $request->event_name,
              'hashtag' => $request->event_hashtag,
              'domain' => $request->domain,
              'slug' => $request->slug,
              'description' => $request->description,
              'timezone' => $request->timezone,
              'email' => $request->email,
              'email_active' => $request->email_active ?? 0,
              'accessibility' => $request->event_type,
              'visibility' => $request->event_type == 'public' ? $request->visibility : 0,
              'upgrade_enabled' => 0,
              'created_at' => date('Y-m-d H:i:s')
        ]);
        return $event;
    }

    public function  updateEventEssential($request, $eventId){
        $event = Events::find($eventId);
        if ($event) {
             $event->name = $request->event_name;
             $event->hashtag = $request->event_hashtag;
             $event->domain = $request->domain;
             $event->slug = $request->slug;
             $event->description = $request->description;
             $event->timezone = $request->timezone;
             $event->email = $request->email;
             $event->email_active = $request->email_active ?? 0;
             $event->accessibility = $request->event_type;
             $event->visibility = $request->event_type == 'public' ? $request->visibility : 0;
             $event->upgrade_enabled = 0;
             $event->save();
            return $event;
        }
    }

    public function getEventMeta($eventId, $metaKey)
    {
        $eventMeta = EventsMeta::Where('event_id',$eventId)->Where('meta_key',$metaKey)->first();
        if($eventMeta && ($metaKey == 'accepted_domains' || $metaKey == 'accepted_emails')){
             $eventMeta=implode(', ' , (array)json_decode($eventMeta->meta_value));
        } else{
             $eventMeta= NULL;
        }
        return $eventMeta;

    }

    public function addEventMeta($eventId, $metaKey, $metaValue)
    {
         $event_meta = EventsMeta::create([
                 'event_id' => $eventId,
                 'meta_key' => 'accepted_emails',
                 'meta_value' => $metaValue
         ]);
         return $event_meta;

    }

    public function deleteEventMeta($eventMetaId)
    {
       EventsMeta::Where('id',$eventMetaId)->delete();
    }

    public function updateEventMeta($eventId, $metaKey, $metaValue)
    {
        $eventMeta= EventsMeta::Where('event_id',$eventId)->Where('meta_key',$metaKey)->first();

        if ($eventMeta) {
            $eventMeta->meta_value=$metaValue;
               $eventMeta->save();
            }
    }

    public function getEventDates($eventId){
        $eventDate= EventsDate::Where('event_id',$eventId)->first();
        return $eventDate;
    }

    public function createEventDate($request,$eventId){
        $eventDate =  EventsDate::create([
            'event_id' =>$eventId,
            'registration_start_date' => $request->reg_start_date,
            'registration_end_date' => $request->reg_end_date,
            'free_registration_end_date' => $request->free_reg_end_date,
            'update_info_end_date' => $request->upd_info_end_date,
            'leaderboard_start_date' => $request->leaderboard_start_date,
            'leaderboard_end_date' => $request->leaderboard_end_date,
            'results_date' => $request->results_date,
            'upgrade_start_date' => $request->upgrade_start_date,
            'upgrade_end_date' => $request->upgrade_end_date,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return $eventDate;
    }

    public function updateEventDate($request,$eventDateId){
        $eventDate = EventsDate::find($eventDateId);
        if ($eventDate) {
            $eventDate->registration_start_date = $request->reg_start_date;
            $eventDate->registration_end_date = $request->reg_end_date;
            $eventDate->free_registration_end_date = $request->free_reg_end_date;
            $eventDate->update_info_end_date = $request->upd_info_end_date;
            $eventDate->leaderboard_start_date = $request->leaderboard_start_date;
            $eventDate->leaderboard_end_date = $request->leaderboard_end_date;
            $eventDate->results_date = $request->results_date;
            $eventDate->upgrade_start_date = $request->upgrade_start_date;
            $eventDate->upgrade_end_date = $request->upgrade_end_date;
            $eventDate->save();
            return $eventDate;
        }
    }

}