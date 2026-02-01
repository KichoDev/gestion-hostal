<!-- Nombre -->
<div class="mb-4">
    <x-input-label for="name" value="Nombre" />
    <x-text-input
        id="name"
        name="name"
        type="text"
        class="mt-1 block w-full"
        value="{{ old('name', $client->name ?? '') }}"
        required
    />
    <x-input-error :messages="$errors->get('name')" />
</div>

<!-- Email -->
<div class="mb-4">
    <x-input-label for="email" value="Email" />
    <x-text-input
        id="email"
        name="email"
        type="email"
        class="mt-1 block w-full"
        value="{{ old('email', $client->email ?? '') }}"
        required
    />
    <x-input-error :messages="$errors->get('email')" />
</div>

<!-- Teléfono -->
<div class="mb-4">
    <x-input-label for="phone" value="Teléfono" />
    <x-text-input
        id="phone"
        name="phone"
        type="text"
        class="mt-1 block w-full"
        value="{{ old('phone', $client->phone ?? '') }}"
    />
    <x-input-error :messages="$errors->get('phone')" />
</div>

<!-- Dirección -->
<div class="mb-4">
    <x-input-label for="address" value="Dirección" />
    <x-text-input
        id="address"
        name="address"
        type="text"
        class="mt-1 block w-full"
        value="{{ old('address', $client->address ?? '') }}"
    />
    <x-input-error :messages="$errors->get('address')" />
</div>
