<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Updates extends Authenticatable
{
    use Notifiable;

    protected $table = 'pwa_updates';
    // protected $guarded = array();
}