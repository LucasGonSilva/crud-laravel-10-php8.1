@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 mt-10 rounded-lg shadow">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800 flex items-center justify-center gap-2">
        <i data-lucide="user-plus" class="w-4 h-4"></i>
        Adicionar Novo Contato
    </h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
        @csrf
        @method('POST')

        @include('contacts.partials.form')

        <div class="flex justify-end gap-4">
            <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Voltar
            </a>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded">
                <i data-lucide="save" class="w-4 h-4"></i>
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection
