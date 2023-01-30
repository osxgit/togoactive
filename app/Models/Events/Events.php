<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'hashtag',
        'domain',
        'slug',
        'description',
        'timezone',
        'email',
        'email_active',
        'accessibility',
        'visibility',
        'created_at',
    ];
}
