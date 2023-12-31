<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReward extends Model
{
    use HasFactory;

    protected $table = 'user_rewards';

    protected $fillable = [
        'event_id',
        'user_id',
        'reward_id',
        'size',
        'payment_id',
        'quantity',
        'total_paid',
        'amount',
        'discount',
        'currency',
    ];

    public function rewards()
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }

    public function rewardPayment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
