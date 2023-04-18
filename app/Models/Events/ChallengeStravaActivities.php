<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeStravaActivities extends Model
{
    use HasFactory;

    protected $table = 'challenge_strava_activities';
    
    public $timestamps = false;

    protected $fillable = [
        'achievement_id',
        'event_id',
        'activity_id',
        'user_id',
        'strava_id',
        'name',
        'distance',
        'moving_time',
        'elapsed_time',
        'total_elevation_gain',
        'type',
        'actual_type',
        'external_id',
        'start_date',
        'start_date_local',
        'end_date_local',
        'start_latitude',
        'start_longitude',
        'end_latitude',
        'end_longitude',
        'location_city',
        'location_state',
        'location_country',
        'achievement_count',
        'map_id',
        'average_speed',
        'max_speed',
        'elev_high',
        'elev_low',
        'flagged',
        'exclude',
        'suspicious',
        'sus_params',
        'sus_params_count',
        'duplicate',
        'page_found',
        'page_found_date',
        'start_country',
        'photos_count',
        'photoUpdated',
        'photos',
        'user_photos',
        'dof',
        'sync_timestamp',
        'tagged',
        'tagged_ride',
        'manual_ride',
        'manual_upload',
        'calories',
        'calories_synced',
        'remarks',
        'photoUploaded'
    ];

    public function event() {
        return $this->belongsTo(Events::class,'event_id','id')->with('dates');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function achievement() {
        return $this->belongsTo(Achievements::class,'achievement_id','id');
    }
   
   /*  public function stravaAccount() {
        return $this->belongsTo(\App\Models\Users\StravaAccounts::class, 'user_id','userid');
    } */
}
