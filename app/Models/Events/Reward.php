<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $table = 'rewards';

    protected $fillable = [
        'event_id',
        'name',
        'sku',
        'description',
        'max_quantity',
        'size',
        'sizing_images',
        'rewards_images',
        'restrict_to_country',
        'countries_allowed',
        'price',
        'is_hidden',
        'is_core_item',
        'reward_instruction',
        'addon_instruction'
    ];
}