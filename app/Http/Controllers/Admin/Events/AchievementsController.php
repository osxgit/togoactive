<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\Events;
use App\Repositories\AchievementsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AchievementsController extends Controller
{
    protected AchievementsRepository $repository;
    protected $rules;

    public function __construct(AchievementsRepository $repository)
    {
        $this->repository = $repository;

        $this->rules = [
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'type' => 'required',
            'level' => 'required',
            'more_info_image' => 'required_if:is_more_info_enabled,1',
            'more_info_description' => 'required_if:is_more_info_enabled,1',
            'email_subject' => 'required',
            'email_text' => 'required',
            'notification_title' => 'required',
            'notification_description' => 'required',
            'notification_type' => 'required',
            'notification_destination_url' => 'required_if:notification_type,Typa A',
            'notification_hero_image' => 'required_if:notification_type,Type B',
            'is_primary_cta_enabled' => 'required_if:notification_type,Type B',
            'primary_cta_button_text' => 'required_if:is_primary_cta_enabled,1',
            'primary_cta_link' => 'required_if:is_primary_cta_enabled,1',
            'is_secondary_cta_enabled' => 'required_if:notification_type,Type B',
            'secondary_cta_button_text' => 'required_if:is_secondary_cta_enabled,1',
            'secondary_cta_link' => 'required_if:is_secondary_cta_enabled,1',
            'enable_share_option_link' => 'required_if:is_share_option_enabled,1',
            'sponsor_content_image' => 'required_if:is_sponsor_content_enabled,1',
            'sponsor_content_text' => 'required_if:is_sponsor_content_enabled,1'
        ];
    }

    public function index(Request $request, $eventId)
    {
        $event = Events::findOrFail($eventId);
        $achievements = $this->repository->list($eventId);

        return view('templates.admin.events.achievements.list', [
            'route_name' => request()->route()->getName(),
            'active_page' => 'Achievements Manager',
            'id' => $eventId,
            'event' => $event,
            'achievements' => $achievements
        ]);
    }

    public function get(Request $request, $eventId, $achievementId = null)
    {
        $event = Events::findOrFail($eventId);
        $achievement = $achievementId !== null ? $this->repository->get($achievementId) : null;

        return view('templates.admin.events.achievements.create', [
            'route_name' => request()->route()->getName(),
            'active_page' => 'Achievement Manager',
            'id' => $eventId,
            'event' => $event ?? null,
            'achievement' => $achievement
        ]);
    }

    public function store(Request $request, $eventId)
    {
        Validator::make($request->all(), $this->rules)->validate();

        $achievement = $this->repository->create($request->all());

        return redirect(
            route('admin.events.achievements.list', [
                    'route_name' => request()->route()->getName(),
                    'active_page' => 'Achievement Manager',
                    'id' => $eventId,
                    'achievementId' => $achievement->id,
                    'achievement' => $achievement
            ])
        )->with('message', 'Changes are saved successfully.');
    }

    public function update(Request $request, $eventId, $achievementId)
    {
        Validator::make($request->all(), $this->rules)->validate();

        $achievement = $this->repository->update($achievementId, $request->all());

        return redirect(
            route('admin.events.achievements.list',[
                'route_name' => request()->route()->getName(),
                'active_page' => 'Achievement Manager',
                'id' => $eventId,
                'achievementId' => $achievementId,
                'achievement' => $achievement
            ])
        )->with('message', 'Changes are saved successfully.');
    }

    public function delete(Request $request, $eventId, $achievementId)
    {
        Validator::make(['confirmed' => 'required'], $this->rules)->validate();

        $this->repository->delete($achievementId);

        return redirect(
            route(
                'admin.events.achievements.list',
                ['id' => $eventId]
            )
        )->with('message', 'Achievement deleted successfully.');
    }
}
