<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeTeamLeaderboard extends Model
{
    use HasFactory;

    protected $table = 'challenge_team_leaderboards';
    
    public $timestamps = false;

    protected $fillable = [
        'event_id',
    ];

    public function event() {
        return $this->belongsTo(Events::class,'event_id','id')->with('dates');
    }
}
