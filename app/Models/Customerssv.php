<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Customerssv extends Authenticatable
{
    use Notifiable;

    protected $table = 'ssv_register';
    // protected $guarded = array();
}