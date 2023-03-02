<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSetup extends Model
{
    use HasFactory;

    protected $table = 'registration_setup';

    protected $fillable = [
         'event_id',
        'intro_message',
        'enable_teams',
        'min_members',
        'max_members',
        'enable_referral',
        'enable_coupon',
        'enable_delivery_address',
        'reason_for_collecting_address',
        'enable_grouping',
        'grouping_header',
        'field_value',
        'enable_random_allocation',
        'geo_json',
         'enable_map_view',

    ];


}
