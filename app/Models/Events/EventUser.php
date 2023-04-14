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
    }

    public function rewards(){
        return $this->hasMany(UserReward::class,'event_id','event_id')->whereExists(
            function($query)  {
                $query->from('payments')
                ->whereColumn("id","user_rewards.payment_id")
                //->whereRaw('(case when (payment_type = "upgrade" ) THEN status IN("successful") ELSE status IN("processing","successful") END)');
                ->where('status','successful');

        });
    }

    public function event() {
        return $this->belongsTo(Events::class,'event_id','id')->with('dates');
    }

}
