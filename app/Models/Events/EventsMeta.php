<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsMeta extends Model
{
    use HasFactory;

    protected $table = 'events_meta';
    
    public $timestamps = false;


    protected $fillable = [
        'event_id',
        'meta_key',
        'meta_value',
    ];
}
