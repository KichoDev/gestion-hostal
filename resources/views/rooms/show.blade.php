<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Habitación {{ $room->number }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Datos de la habitación -->
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-semibold mb-4">Información de la Habitación</h3>

                <p><strong>Número:</strong> {{ $room->number }}</p>
                <p><strong>Capacidad:</strong> {{ $room->capacity }} personas</p>
                <p><strong>Precio por noche:</strong> ${{ $room->price_per_night }}</p>
                <p>
                    <strong>Estado:</strong>
                    <span class="px-2 py-1 rounded text-sm
                        {{ $room->status === 'available'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700' }}">
                            @if ($room->status === 'available')
                                Disponible
                            @elseif ($room->status === 'occupied')
                                Ocupada
                            @endif
                    </span>
                </p>

                <div class="mt-4">
                    <a href="{{ route('rooms.edit', $room) }}"
                       class="text-blue-600 hover:underline">
                        Editar Habitación
                    </a>
                </div>
            </div>

            <!-- Reservas asociadas -->
            <div class="bg-white p-6 shadow rounded">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Reservas</h3>

                    <a href="{{ route('reservations.create', ['room_id' => $room->id]) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded">
                        + Nueva Reserva
                    </a>
                </div>

                @if ($room->reservations->count())
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="px-4 py-2 text-left">Cliente</th>
                                <th class="px-4 py-2 text-left">Check-in</th>
                                <th class="px-4 py-2 text-left">Check-out</th>
                                <th class="px-4 py-2 text-left">Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($room->reservations as $reservation)
                                <tr class="border-b">
                                    <td class="px-4 py-2">
                                        {{ $reservation->client->name }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $reservation->check_in }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $reservation->check_out }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded text-sm
                                            {{ $reservation->status === 'active'
                                                ? 'bg-green-100 text-green-700'
                                                : 'bg-gray-200 text-gray-700' }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">
                        Esta habitación no tiene reservas registradas.
                    </p>
                @endif
            </div>

            <!-- Volver -->
            <div>
                <a href="{{ route('rooms.index') }}"
                   class="text-white hover:underline">
                    ← Volver al listado de habitaciones
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
