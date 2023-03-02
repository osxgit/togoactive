<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesUploadsLogs extends Model
{
    use HasFactory;

    protected $table = 'file_upload_logs';

    protected $fillable = [
        'eventid',
        'file_type',
        'module',
        'image_type',
        'path'
    ];
}
