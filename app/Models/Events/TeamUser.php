<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    use HasFactory;

    protected $table = 'team_users';

    protected $fillable = [
        'team_id',
        'user_id',
        'is_owner'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}