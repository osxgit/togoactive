<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMedia extends Model
{
    use HasFactory;

    protected $table = 'user_media';

    protected $fillable = [
        'user_id',
        'module',
        'image_type',
        'dimensions',
        'path',
        'removed',
    ];

}
