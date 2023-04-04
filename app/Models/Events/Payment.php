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

    public function user_reward()
    {
        return $this->hasMany(UserReward::class,'payment_id')->whereExists(function ($query) {
            $query->from('payments')
                  ->whereColumn('payments.id', 'user_rewards.payment_id')
                  //->where("status","successful");
                  ->whereRaw('(case when (payment_type = "upgrade" ) THEN status IN("successful") ELSE status IN("processing","successful") END)');
        });
    }

}
