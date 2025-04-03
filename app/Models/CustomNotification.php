<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomNotification extends DatabaseNotification
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'notification_type',
    ];
}