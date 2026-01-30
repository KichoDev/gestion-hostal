<!-- Cliente -->
<div class="mb-4">
    <x-input-label value="Cliente" />
    <select name="client_id" class="w-full border rounded">
        @foreach ($clients as $client)
            <option value="{{ $client->id }}"
                @selected(old('client_id', $reservation->client_id ?? $clientId ?? '') == $client->id)>
                {{ $client->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Habitación -->
<div class="mb-4">
    <x-input-label value="Habitación" />
    <select name="room_id" class="w-full border rounded">
        @foreach ($rooms as $room)
            <option value="{{ $room->id }}"
                @selected(old('room_id', $reservation->room_id ?? $roomId ?? '') == $room->id)>
                Habitación {{ $room->number }}
            </option>
        @endforeach
    </select>
</div>

<!-- Check-in -->
<div class="mb-4">
    <x-input-label value="Check-in" />
    <x-text-input type="date" name="check_in"
        value="{{ old('check_in', $reservation->check_in ?? '') }}" />
</div>

<!-- Check-out -->
<div class="mb-4">
    <x-input-label value="Check-out" />
    <x-text-input type="date" name="check_out"
        value="{{ old('check_out', $reservation->check_out ?? '') }}" />
</div>

@if(isset($reservation))
<!-- Estado -->
<div class="mb-4">
    <x-input-label value="Estado" />
    <select name="status" class="w-full border rounded">
        @foreach (['active','finished','cancelled'] as $status)
            <option value="{{ $status }}"
                @selected($reservation->status === $status)>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>
@endif
