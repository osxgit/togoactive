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

    public function images()
    {
        return $this->hasOne(EventImage::class,'event_id');
    }

    public function dates()
    {
        return $this->hasOne(EventsDate::class,'event_id');
    }

    public function landingPage()
    {
        return $this->hasOne(LandingPage::class,'event_id');
    }

    public function rewards()
    {
        return $this->hasMany(Reward::class,'event_id');
    }
    public function eventMeta()
    {
        return $this->hasMany(EventsMeta::class,'event_id');
    }

    public function faq()
    {
        return $this->hasOne(EventsFaq::class, 'event_id');
    }

    public function achievements()
    {
        return $this->hasMany(Achievements::class, 'event_id');
    }
}
