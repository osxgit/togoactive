<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeUsersMeta extends Model
{
    use HasFactory;

    protected $table = 'challenge_users_metas';
    
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'event_id',
        'event_user_id',
        'challenge_value',
        'challenge_key'
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
}
