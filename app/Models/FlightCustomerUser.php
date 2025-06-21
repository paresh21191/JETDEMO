<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightCustomerUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['date_of_birth'];
}