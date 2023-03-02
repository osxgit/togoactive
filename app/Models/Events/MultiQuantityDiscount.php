<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiQuantityDiscount extends Model
{
    use HasFactory;

    protected $table = 'multi_quantity_discount';

    protected $fillable = [
    'event_id',
        'condition',
        'quantity',
        'discount',
    ];
}
