<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    use HasFactory;

    protected $table = 'event_images';

    protected $fillable = [
        'event_id',
        'cover',
        'icon',
        'notification',
        'rewards',
        'event_name',
        'slider_background',
        'slider_foreground',
        'profile_icon',
        'ebib',
        'certificate',
    ];

     public function event()
            {
                return $this->belongsTo(Events::class);
            }
}
