<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'event_id',
        'user_id',
        'payment_type',
        'payment_method',
        'payment_intent',
        'total_amount',
        'discount',
        'total_paid',
        'currency',
        'coupon_code',
        'status',
        'full_response',
    ];
}