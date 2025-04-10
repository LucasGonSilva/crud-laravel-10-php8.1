@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold flex items-center gap-2 text-gray-800">
                <i data-lucide="users" class="w-6 h-6 text-blue-500"></i>
                Lista de Contatos
            </h1>
            @auth
                <a href="{{ route('contacts.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-medium">
                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Adicionar Contato
                </a>
            @endauth
        </div>

        <table class="min-w-full bg-white border border-gray-200 shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 border-b text-left">Nome</th>
                    <th class="py-3 px-4 border-b text-left">Contato</th>
                    <th class="py-3 px-4 border-b text-left">E-mail</th>
                    <th class="py-3 px-4 border-b text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $contact->name }}</td>
                        <td class="py-3 px-4 border-b">{{ $contact->contact }}</td>
                        <td class="py-3 px-4 border-b">{{ $contact->email }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('contacts.show', $contact->id) }}"
                                   class="text-blue-500 hover:text-blue-700" title="Visualizar">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </a>
                                @auth
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                       class="text-yellow-500 hover:text-yellow-600" title="Editar">
                                        <i data-lucide="edit" class="w-5 h-5"></i>
                                    </a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" title="Excluir">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @auth
            <div class="mt-4">
                <a href="{{ route('contacts.trashed') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm text-gray-700 rounded hover:bg-gray-100">
                    <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Ver Lixeira
                </a>
            </div>
        @endauth
    </div>
@endsection
