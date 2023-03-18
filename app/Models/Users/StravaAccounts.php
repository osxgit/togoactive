<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StravaAccounts extends Model
{
    use HasFactory;

    protected $table = 'strava_accounts';

    protected $fillable = [
        'strava_access_token',
        'strava_refresh_token',
        'strava_token_expiry',
        'strava_error',
        'strava_id',
        'userid',
    ];

}
