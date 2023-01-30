<?php

namespace App\Repositories\Interfaces;

use App\Models\Events\EventsMeta;

interface EventMetaRepositoryInterface
{

    public function getEventMeta($eventId, $metaKey);

    public function addEventMeta($eventId,$metaKey, $metaValue);

    public function deleteEventMeta($eventMetaId);

    public function updateEventMeta($eventId, $metaKey, $metaValue);

}