<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievements extends Model
{
    use HasFactory;

    protected $table = 'achievements';

    public $timestamps = true;

    protected $fillable = [
        'event_id', 'title', 'description', 'icon', 'type',
        'level', 'is_more_info_enabled', 'more_info_image',
        'more_info_description', 'email_subject', 'email_text',
        'notification_title', 'notification_description',
        'notification_type', 'notification_destination_url',
        'notification_hero_image', 'is_primary_cta_enabled',
        'primary_cta_button_text', 'primary_cta_link',
        'is_secondary_cta_enabled', 'secondary_cta_button_text',
        'secondary_cta_link', 'is_share_option_enabled',
        'enable_share_option_link', 'is_sponsor_content_enabled',
        'sponsor_content_image', 'sponsor_content_text', 'list_order'
    ];

    /**
     * Relationship with event
     *
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }
}
