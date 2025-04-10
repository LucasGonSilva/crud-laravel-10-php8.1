<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <nav class="bg-white px-4 py-3 shadow flex justify-between items-center">
                <div>
                    @auth
                        <span class="mr-4">Olá, {{ optional(Auth::user())->name }}</span>
                        <a class="text-blue-600 hover:underline mr-4" href="{{ route('contacts.index') }}">Contatos</a>
                    @endauth
                </div>
                <div>
                    @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                    @else
                    <a class="text-blue-600 hover:underline mr-4" href="{{ route('login') }}">Login</a>
                    <a class="text-blue-600 hover:underline" href="{{ route('register') }}">Registrar</a>
                    @endauth
                </div>
            </nav>
            <div class="max-w-4xl mx-auto p-6">
                @if (session('success'))
                    <div class="max-w-7xl mx-auto mt-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
