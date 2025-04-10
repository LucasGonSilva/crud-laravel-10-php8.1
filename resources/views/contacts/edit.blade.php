@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
        <i data-lucide="pencil-line" class="w-6 h-6 text-indigo-600"></i> Editar Contato
    </h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        @include('contacts.partials.form')

        <div class="flex justify-between items-center mt-4">
            <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Voltar
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded">
                <i data-lucide="save" class="w-4 h-4 mr-2"></i> Atualizar
            </button>
        </div>
    </form>
</div>
@endsection
