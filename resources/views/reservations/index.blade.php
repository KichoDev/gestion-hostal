<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            Listado de Reservas
        </h2>
    </x-slot>
    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Tabla -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Habitación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Fecha Ingreso</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Fecha Salida</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Estado</th>
                            </tr>
                        </thead>

                        <tbody class="bg-gray divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 text-sm text-white">{{ $reservation->client->name }}</td>
                                <td class="px-6 py-4 text-sm text-white">Hab. {{ $reservation->room->number }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $reservation->check_in }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $reservation->check_out }}</td>
                                <td class="px-6 py-4 text-sm text-white">
                                    @if ($reservation->status === 'active')
                                        Activo
                                    @elseif ($reservation->status === 'finished')
                                        Terminado
                                    @elseif ($reservation->status === 'cancelled')
                                        Cancelado
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Barra inferior -->
                <div class="bg-gray-50 px-6 py-3 flex items-center justify-between">
                    <p class="text-sm text-gray-600">
                        Mostrando {{ $reservations->count() }} clientes
                    </p>
                </div>
                <div class="mt-4">
                    {{ $reservations->links() }}
                </div>
                <div class="my-4">
                    <a href="{{ route('reservations.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                        Nueva Reservación +
                    </a>
                    <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

