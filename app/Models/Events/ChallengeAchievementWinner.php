<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeAchievementWinner extends Model
{
    use HasFactory;

    protected $table = 'challenge_achievement_winners';
    
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'event_id',
        'achievement_id',
        'team',
        'notified'
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
}
