<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            Listado de Habitaciones
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4 mt-4 py-4 px-4 bg-white shadow rounded">
                @foreach ($rooms as $room)
                    <div class="mt-4 py-4 px-4 bg-white shadow rounded border border-black">    
                        <tr>
                            <td><strong>Habitación:</strong> {{ $room->number }}</td></br>
                            <td><strong>Capacidad:</strong> {{ $room->capacity }}</td></br>
                            <td><strong>Precio:</strong> {{ $room->price_per_night }}</td></br>
                            <td><strong>Estado:</strong> 
                            @if ($room->status === 'available')
                                Disponible
                            @elseif ($room->status === 'occupied')
                                Ocupada
                            @endif
                            </td></br>
                            <td>
                                <button class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                                    <a href="{{ route('rooms.show', $room) }}">Ver</a>
                                </button>
                                <button class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                                    <a href="{{ route('rooms.edit', $room) }}">Editar</a>
                                </button>
                            </td></br></br>
                        </tr>
                    </div>    
                @endforeach
            </div>
            <div class="my-4">
                    <a href="{{ route('rooms.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                        Nueva Habitación +
                    </a>
                    <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                        Volver
                    </a>
                </div>
        </div>
    </div>
</x-app-layout>
