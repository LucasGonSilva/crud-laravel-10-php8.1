@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Detalhes do Contato</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <ul class="space-y-4">
            <li class="text-gray-700"><strong>Nome:</strong> {{ $contact->name }}</li>
            <li class="text-gray-700"><strong>Contato:</strong> {{ $contact->contact }}</li>
            <li class="text-gray-700"><strong>Email:</strong> {{ $contact->email }}</li>
        </ul>

        <div class="mt-6 flex flex-wrap gap-3">
            @auth
                <a href="{{ route('contacts.edit', $contact->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded">
                    <i data-lucide="pencil" class="w-4 h-4 mr-2"></i> Editar
                </a>

                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded">
                        <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Excluir
                    </button>
                </form>
            @endauth

            <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Voltar
            </a>
        </div>
    </div>
</div>
@endsection
