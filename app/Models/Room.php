<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number', 'capacity', 'price_per_night', 'status'];

    // Una habitación puede tener muchas reservas
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
