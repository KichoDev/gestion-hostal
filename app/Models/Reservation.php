<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'client_id',
        'room_id',
        'check_in',
        'check_out',
        'status'
    ];

    // Una reserva pertenece a un solo cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    // Una habitación pertenece a una sola reserva
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
