<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsDate extends Model
{
    use HasFactory;

    protected $table = 'events_dates';



    protected $fillable = [
        'event_id',
        'registration_start_date',
        'registration_end_date',
        'free_registration_end_date',
        'update_info_end_date',
        'upgrade_start_date',
        'upgrade_end_date',
        'leaderboard_start_date',
        'leaderboard_end_date',
        'results_date'

    ];
}
