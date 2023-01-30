<?php

namespace App\Repositories\Interfaces;

use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
interface EventRepositoryInterface
{
    public function createEventEssential($request);

    public function  updateEventEssential($request, $eventId);

    public function getEventMeta($eventId, $metaKey);

    public function addEventMeta($eventId,$metaKey, $metaValue);

    public function deleteEventMeta($eventMetaId);

    public function updateEventMeta($eventId, $metaKey, $metaValue);

    public function getEventDates($eventId);

    public function createEventDate($request,$eventId);

    public function updateEventDate($request,$eventDateId);

}