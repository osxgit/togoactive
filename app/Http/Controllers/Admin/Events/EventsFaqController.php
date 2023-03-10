<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\Events;
use App\Repositories\EventsFaqRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsFaqController extends Controller
{
    protected EventsFaqRepository $repository;

    public function __construct(EventsFaqRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request, $eventId)
    {
        $event = Events::findOrFail($eventId);

        return view(
            'templates.admin.events.faq.create',
            [
                'route_name' => request()->route()->getName(),
                'active_page' => 'FAQ Manager',
                'id' => $eventId,
                'event' => $event ?? null
            ]
        );
    }

    public function createTnc(Request $request, $eventId)
    {
        $event = Events::findOrFail($eventId);

        return view(
            'templates.admin.events.faq.createtnc',
            [
                'route_name' => request()->route()->getName(),
                'active_page' => 'Rules T&C Manager',
                'id' => $eventId,
                'event' => $event ?? null
            ]
        );
    }

    public function store(Request $request, $eventId)
    {
        Validator::make($request->all(), [
            'faq' => 'required'
        ], [
            'faq.required' => 'FAQ is required.'
        ])->validate();

        $data['faq'] = $request->get('faq');
        $data['event_id'] = $eventId;
        $event = Events::findOrFail($eventId);

        $event->faq ? $this->repository->update($event->faq->id, $data) : $this->repository->create($data);

        return redirect(
            route('admin.events.faq.create', ['id' => $eventId]))->with('message', 'Changes are saved successfully.'
        );
    }

    public function storeTnc(Request $request, $eventId)
    {
        Validator::make($request->all(), [
            'tnc' => 'required',
            'rules' => 'required'
        ], [
            'rules.required' => 'Event specific rules are required.',
            'tnc.required' => 'Terms and Conditions are required.'
        ])->validate();

        $data = $request->all();
        $data['event_id'] = $eventId;
        $event = Events::findOrFail($eventId);

        $event->faq ? $this->repository->update($event->faq->id, $data) : $this->repository->create($data);

        return redirect(
            route('admin.events.faq.createtnc', ['id' => $eventId]))->with('message', 'Changes are saved successfully.'
        );
    }
}
