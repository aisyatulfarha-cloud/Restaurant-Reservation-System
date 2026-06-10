<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'booking_id',
        'reservation_date',
        'reservation_time',
        'guest_count',
        'full_name',
        'phone_number',
        'email',
        'special_request',
        'status',
    ];
}