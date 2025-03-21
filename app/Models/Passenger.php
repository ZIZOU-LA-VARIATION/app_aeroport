<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
class Passenger extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_passenger');
    }

}
