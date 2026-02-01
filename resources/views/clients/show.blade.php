<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Cliente: {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Datos del Cliente -->
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-semibold mb-4">Información del Cliente</h3>
                <p><strong>Nombre:</strong> {{ $client->name }}</p>
                <p><strong>Email:</strong> {{ $client->email }}</p>
                <p><strong>Teléfono:</strong> {{ $client->phone ?? '—' }}</p>
                <p><strong>Dirección:</strong> {{ $client->address ?? '—' }}</p>
                <div class="mt-4">
                    <a href="{{ route('clients.edit', $client) }}"
                       class="text-blue-600 hover:underline">
                        Editar Cliente
                    </a>
                </div>
            </div>

            <!-- Reservas -->
            <div class="bg-white p-6 shadow rounded">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Reservas</h3>

                    <a href="{{ route('reservations.create', ['client_id' => $client->id]) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded">
                        + Nueva Reserva
                    </a>
                </div>

                @if ($client->reservations->count())
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="px-4 py-2 text-left">Habitación</th>
                                <th class="px-4 py-2 text-left">Check-in</th>
                                <th class="px-4 py-2 text-left">Check-out</th>
                                <th class="px-4 py-2 text-left">Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($client->reservations as $reservation)
                                <tr class="border-b">
                                    <td class="px-4 py-2">
                                        Habitación {{ $reservation->room->number }}
                                    </td>
                                    <td class="px-4 py-2">{{ $reservation->check_in }}</td>
                                    <td class="px-4 py-2">{{ $reservation->check_out }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded text-sm
                                            {{ $reservation->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-200' }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">
                        Este cliente no tiene reservas registradas.
                    </p>
                @endif
            </div>

            <!-- Volver -->
            <div>
                <a href="{{ route('clients.index') }}"
                   class="text-white hover:underline">
                    ← Volver al listado
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
