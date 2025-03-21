<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['passenger_id', 'flight_id', 'status', 'paiment_detail'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assure-toi que la colonne est bien user_id
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'id_passenger');
    }
    
}
