<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'event_id',
        'team_name',
    ];

    public function teamUsers()
    {
        return $this->hasMany(TeamUser::class,'team_id');
    }

}