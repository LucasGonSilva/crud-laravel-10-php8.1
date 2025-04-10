@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold flex items-center gap-2 text-gray-800">
        <i data-lucide="users" class="w-6 h-6 text-blue-500"></i>
        Contatos na Lixeira
    </h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($contacts->isEmpty())
        <p class="text-center text-gray-600">Nenhum contato na lixeira.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded shadow">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 border-b">Nome</th>
                        <th class="py-2 px-4 border-b">Contato</th>
                        <th class="py-2 px-4 border-b">E-mail</th>
                        <th class="py-2 px-4 border-b text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $contact->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $contact->contact }}</td>
                            <td class="py-2 px-4 border-b">{{ $contact->email }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded">
                                        Restaurar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-6 text-center">
        <a href="{{ route('contacts.index') }}" class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
            Voltar para lista de contatos
        </a>
    </div>
</div>
@endsection
