<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventsFaq extends Model
{
    use HasFactory;

    protected $table = 'events_faqs';

    public $timestamps = true;

    protected $fillable = [
        'event_id',
        'event_faq',
        'event_tnc',
        'event_rules'
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
