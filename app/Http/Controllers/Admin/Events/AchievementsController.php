<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
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
            'is_more_info_enabled' => 'required',
            'more_info_image' => 'required_if:is_more_info_enabled,1',
            'more_info_description' => 'required_if:is_more_info_enabled,1',
            'email_subject' => 'required|email',
            'email_text' => 'required',
            'notification_title' => 'required',
            'notification_description' => 'required',
            'notification_type' => 'required',
            'notification_destination_url' => 'required_if:notification_type,Typa A',
            'notification_hero_image' => 'required_if:notification_type,Type B',
            'is_primary_cta_enabled' => 'required',
            'primary_cta_button_text' => 'required_if:is_primary_cta_enabled,1',
            'primary_cta_link' => 'required_if:is_primary_cta_enabled,1',
            'is_secondary_cta_enabled' => 'required',
            'secondary_cta_button_text' => 'required_if:is_secondary_cta_enabled,1',
            'secondary_cta_link' => 'required_if:is_secondary_cta_enabled,1',
            'is_share_option_enabled' => 'required',
            'enable_share_option_link' => 'required_if:is_share_option_enabled,1',
            'is_sponsor_content_enabled' => 'required',
            'sponsor_content_image' => 'required_if:is_sponsor_content_enabled,1',
            'sponsor_content_text' => 'required_if:is_sponsor_content_enabled,1'
        ];
    }

    public function index(Request $request, $eventId)
    {
        $achievements = $this->repository->list($eventId);

        return view('templates.admin.events.achievements.list', ['achievements' => $achievements]);
    }

    public function get(Request $request, $eventId, $achievementId)
    {
        $achievement = $this->repository->get($achievementId);

        return view('templates.admin.events.achievements.create', ['achievement' => $achievement]);
    }

    public function store(Request $request, $eventId)
    {
        Validator::make($request->all(), $this->rules)->validate();

        $achievement = $this->repository->create($request->all());

        return redirect(
            route(
                'admin.events.achievements.create',
                ['id' => $eventId, 'achievementId' => $achievement->id]
            )
        )->with('message', 'Changes are saved successfully.');
    }

    public function update(Request $request, $eventId, $achievementId)
    {
        Validator::make($request->all(), $this->rules)->validate();

        $this->repository->update($achievementId, $request->all());

        return redirect(
            route(
                'admin.events.achievements.create',
                ['id' => $eventId, 'achievementId' => $achievementId]
            )
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
