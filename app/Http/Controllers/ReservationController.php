<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Client;
use App\Models\Room;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'room'])
            ->latest()
            ->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create(Request $request)
    {
        return view('reservations.create', [
            'clients' => Client::all(),
            'rooms' => Room::where('status', 'available')->get(),
            'clientId' => $request->client_id,
            'roomId' => $request->room_id,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $reservation = Reservation::create([
            ...$validated,
            'status' => 'active',
        ]);

        // marcar habitación como ocupada
        $reservation->room->update(['status' => 'occupied']);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reserva creada correctamente');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('client', 'room');
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', [
            'reservation' => $reservation,
            'clients' => Client::all(),
            'rooms' => Room::all(),
        ]);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'status' => 'required|in:active,finished,cancelled',
        ]);

        // si cambia el estado, liberar habitación
        if ($reservation->status === 'active' && $validated['status'] !== 'active') {
            $reservation->room->update(['status' => 'available']);
        }

        $reservation->update($validated);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reserva actualizada correctamente');
    }

    public function destroy(Reservation $reservation)
    {
        // liberar habitación
        if ($reservation->status === 'active') {
            $reservation->room->update(['status' => 'available']);
        }

        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reserva eliminada');
    }
}
