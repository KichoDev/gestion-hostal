<!-- Número -->
<div class="mb-4">
    <x-input-label value="Número" />
    <x-text-input
        name="number"
        value="{{ old('number', $room->number ?? '') }}"
        class="w-full"
        required
    />
</div>

<!-- Capacidad -->
<div class="mb-4">
    <x-input-label value="Capacidad" />
    <x-text-input
        type="number"
        name="capacity"
        value="{{ old('capacity', $room->capacity ?? '') }}"
        class="w-full"
        required
    />
</div>

<!-- Precio -->
<div class="mb-4">
    <x-input-label value="Precio por noche" />
    <x-text-input
        type="number"
        step="0.01"
        name="price_per_night"
        value="{{ old('price_per_night', $room->price_per_night ?? '') }}"
        class="w-full"
        required
    />
</div>

<!-- Estado -->
<div class="mb-4">
    <x-input-label value="Estado" />
    <select name="status" class="w-full border rounded">
        <option value="available" @selected(old('status', $room->status ?? '') == 'available')>
            Disponible
        </option>
        <option value="occupied" @selected(old('status', $room->status ?? '') == 'occupied')>
            Ocupada
        </option>
    </select>
</div>
