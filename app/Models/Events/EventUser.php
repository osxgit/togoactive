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
        'group',
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
        return $this->belongsTo(TeamUser::class,'user_id','user_id');
    }


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class,'event_id','event_id');

        //return $this->hasOne(Payment::class,'user_id','user_id')->latestOfMany();

    }


}
