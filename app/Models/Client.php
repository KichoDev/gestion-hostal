<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'phone'];

    // Un cliente puede tener muchas reservas
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
