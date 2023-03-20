<?php
namespace App\Repositories;

use App\Models\Events\Achievements;
use App\Repositories\Interfaces\CrudRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AchievementsRepository implements CrudRepositoryInterface
{
    protected array $data;

    public function create(array $data): Model
    {
        $this->setData($data, true);

        $max = Achievements::where('event_id', $data['event_id'])->max('list_order');

        $this->data['list_order'] = $max === null ? 1000 : (int) $max + 1000;

        $achievementId = DB::table('achievements')->insertGetId($this->data);

        return Achievements::find($achievementId);
    }

    public function list(int $eventId): Collection
    {
        return Achievements::where('event_id', $eventId)->get();
    }

    public function get(int $id): Model
    {
        return Achievements::findOrFail($id);
    }

    public function update(int $id, array $data): bool
    {
        $this->setData($data);

        return Achievements::find($id)->update($this->data);
    }

    public function delete(int $id): bool
    {
        return Achievements::find($id)->delete();
    }

    private function setData(array $data, bool $isCreate = false): void
    {
        $this->data = [
            'event_id' => $data['event_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'icon' => $data['icon'],
            'type' => implode(',', $data['type']),
            'level' => $data['level'],
            'is_more_info_enabled' => isset($data['is_more_info_enabled']) ? $data['is_more_info_enabled'] : 0,
            'more_info_image' => $data['more_info_image'] ?? null,
            'more_info_description' => $data['more_info_description'] ?? null,
            'email_subject' => $data['email_subject'],
            'email_text' => $data['email_text'],
            'notification_title' => $data['notification_title'],
            'notification_description' => $data['notification_description'],
            'notification_type' => $data['notification_type'],
            'notification_destination_url' => $data['notification_destination_url'] ?? null,
            'notification_hero_image' => $data['notification_hero_image'] ?? null,
            'is_primary_cta_enabled' => isset($data['is_primary_cta_enabled']) ? $data['is_primary_cta_enabled'] : 0,
            'primary_cta_button_text' => $data['primary_cta_button_text'] ?? null,
            'primary_cta_link' => $data['primary_cta_link'] ?? null,
            'is_secondary_cta_enabled' => isset($data['is_secondary_cta_enabled']) ? $data['is_secondary_cta_enabled'] : 0,
            'secondary_cta_button_text' => $data['secondary_cta_button_text'] ?? null,
            'secondary_cta_link' => $data['secondary_cta_link'] ?? null,
            'is_share_option_enabled' => isset($data['is_share_option_enabled']) ? $data['is_share_option_enabled'] : 0,
            'enable_share_option_link' => $data['enable_share_option_link'] ?? null,
            'is_sponsor_content_enabled' => isset($data['is_sponsor_content_enabled']) ? $data['is_sponsor_content_enabled'] : 0,
            'sponsor_content_image' => $data['sponsor_content_image'] ?? null,
            'sponsor_content_text' => $data['sponsor_content_text'] ?? null
        ];
    }

    public function reorder()
    {
        // TODO implement efficient algorithm to reorder records
    }
}
