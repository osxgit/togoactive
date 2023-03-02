<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSeo extends Model
{
    use HasFactory;

    protected $table = 'social_seo';

    protected $fillable = [
        'event_id',
        'page_title',
        'share_image',
        'share_title',
        'share_description',
        'fb_pixel_id',
    ];
}
