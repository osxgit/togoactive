<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeLeaderboard extends Model
{
    use HasFactory;

    protected $table = 'challenge_leaderboards';
    
    public $timestamps = false;

    protected $fillable = [
        'user_type',
        'user_id',
        'event_user_id',
        'event_id',
        'strava_id',
        'rank',
        'rank_cycle',
        'rank_run',
        'rank_swim',
        'rank_walk',
        'rank_indoor',
        'rank_outdoor',
        'rank_all',
        'highest_rank',
        'total_distance',
        'manual_total_distance',
        'total_cycling_distance',
        'manual_cycling_distance',
        'total_walking_distance',
        'total_running_distance',
        'total_swimming_distance',
        'total_elevation_gain',
        'last_activity_distance',
        'last_activity_date',
        'last_activity_type',
        'rides',
        'manual_rides',
        'running_activities',
        'cycling_activities',
        'walking_activities',
        'swimming_activities',
        'cycled_today',
        'average_speed',
        'total_calories',
        'total_cycling_calories',
        'total_running_calories',
        'total_walking_calories',
        'total_swimming_calories',
        'max_speed',
        'riding_time',
        'date_finished',
        'elite_date_finished',
        'target_distance',
        'raised_fund',
        'target_fund',
        'donors',
        'finished',
        'qualified'
    ];


    public function event() {
        return $this->belongsTo(Events::class,'event_id','id')->with('dates');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function eventUser() {
        return $this->belongsTo(EventUser::class,'event_user_id','id');
    }

   /*  public function stravaAccount() {
        return $this->belongsTo(\App\Models\Users\StravaAccounts::class, 'user_id','userid');
    } */
}
