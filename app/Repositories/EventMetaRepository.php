<?php

namespace App\Repositories;

use App\Models\Events\EventsMeta;
use App\Repositories\Interfaces\EventMetaRepositoryInterface;

class EventMetaRepository implements EventMetaRepositoryInterface
{


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


}