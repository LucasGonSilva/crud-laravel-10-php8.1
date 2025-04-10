<div>
    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
    <input type="text" name="name" id="name" value="{{ old('name', $contact->name ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
    @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label for="contact" class="block text-sm font-medium text-gray-700">Contato</label>
    <input type="text" name="contact" id="contact" value="{{ old('contact', $contact->contact ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
    @error('contact') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
    <input type="email" name="email" id="email" value="{{ old('email', $contact->email ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
    @error('email') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
</div>
