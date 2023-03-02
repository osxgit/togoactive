<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $table = 'landing_page';

    protected $fillable = [
         'event_id',
        'show_countdown',
        'show_sponsor',
        'sponsor_detail',
        'sponsor_detail_mob',
        'event_detail',
         'event_detail_mob',
        'show_rewards',
        'Short_faq',
    ];


}
