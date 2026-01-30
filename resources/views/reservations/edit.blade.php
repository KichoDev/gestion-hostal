<form method="POST" action="{{ route('reservations.update', $reservation) }}">
    @csrf
    @method('PUT')
    @include('reservations.form', ['reservation' => $reservation])
    <x-primary-button>Actualizar Reserva</x-primary-button>
</form>
