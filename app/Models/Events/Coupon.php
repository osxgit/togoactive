<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        'event_id',
        'name',
        'discount',
        'rewards',
        'max_use',
        'expiry_date',
    ];

}
