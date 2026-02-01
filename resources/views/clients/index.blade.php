<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            Listado de clientes
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Teléfono</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Dirección</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-white uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="bg-gray divide-y divide-gray-200">
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-white">
                                        {{ $client->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-white">
                                        {{ $client->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-white">
                                        {{ $client->phone }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-white">
                                        {{ $client->address }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('clients.show', $client) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Ver</a>

                                        <a href="{{ route('clients.edit', $client) }}"
                                        class="text-yellow-600 hover:text-yellow-900">Editar</a>

                                        <form action="{{ route('clients.destroy', $client) }}"
                                            method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('¿Eliminar cliente?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Barra inferior -->
                <div class="bg-gray-50 px-6 py-3 flex items-center justify-between">
                    <p class="text-sm text-gray-600">
                        Mostrando {{ $clients->count() }} clientes
                    </p>
                </div>
                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
                <div class="my-4">
                    <a href="{{ route('clients.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
                        Nuevo Cliente +
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
