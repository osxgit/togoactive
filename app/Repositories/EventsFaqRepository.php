<?php
namespace App\Repositories;

use App\Models\Events\EventsFaq;
use App\Models\Events\Events;
use App\Repositories\Interfaces\CrudRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EventsFaqRepository implements CrudRepositoryInterface
{

    public function create(array $data): Model
    {
        isset($data['faq']) ?
            $faqGroup = new EventsFaq([
                'event_id' => $data['event_id'],
                'event_faq' => $data['faq']
            ]) :
            $faqGroup = new EventsFaq([
                'event_id' => $data['event_id'],
                'event_tnc' => $data['tnc'],
                'event_rules' => $data['rules']
            ]);

        $faqGroup->save();

        return $faqGroup;
    }

    public function list(int $eventId): Collection
    {
        return EventsFaq::where('event_id', $eventId)->get();
    }

    public function get(int $id): Model
    {
        $event = Events::findOrFail($id);
        return $event->faq ? $event->faq : null;
    }

    public function update(int $id, array $data): bool
    {
        return isset($data['faq']) ?
            EventsFaq::find($id)->update(['event_faq' => $data['faq']]) :
            EventsFaq::find($id)->update(['event_tnc' => $data['tnc'], 'event_rules' => $data['rules']]);
    }

    public function delete(int $id): bool
    {
        return EventsFaq::find($id)->delete();
    }
}
