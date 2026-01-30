<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="py-6 px-2">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class=" p-6 shadow rounded">
<form method="POST" action="{{ route('rooms.update', $room) }}">
    @csrf
    @method('PUT')
    @include('rooms.form', ['room' => $room])
    <div class="flex justify-end gap-3">
                        <a href="{{ route('rooms.index') }}"
                           class="text-white hover:underline">
                            Cancelar
                        </a>

                        <x-primary-button>
                            Actualizar Habitación
                        </x-primary-button>
                    </div>
</form>
</div>
        </div>
    </div>
</x-app-layout>