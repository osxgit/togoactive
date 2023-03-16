<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSuccessPage extends Model
{
    use HasFactory;

    protected $table = 'event_success_page';

    protected $fillable = [
        'event_id',
        'no_purchase_made',
        'partial_purchase_made',
        'all_purchase_made',
        'active_custom_message',
        'invite_friend'
    ];
}
