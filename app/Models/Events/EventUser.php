<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $table = 'event_users';

    protected $fillable = [
        'event_id',
        'user_id',
        'strava_account_id',
        'gender',
        'dob',
        'referral_code',
        'total_paid',
        'address_id',
        'address',
        'city',
        'state',
        'blk',
        'subdistrict',
        'postal_code',
        'country',
        'bib',
        'token',
        'remarks',
        'is_paid_user',
        'has_upgraded',
        'is_finisher',
        'is_elite_finisher',
        'is_autoPorted', 
    ];

    public function team_user()
    {
        return $this->belongsTo(TeamUser::class);
    }

}