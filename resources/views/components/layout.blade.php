<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Cours ESGI' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="bg-white shadow">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800">Cours ESGI - Laravel</h1>
                <ul class="flex space-x-6">
                    <x-nav-link href="/" :active="Route::is('home')">
                        Accueil
                    </x-nav-link>
                    <x-nav-link href="/about" :active="Route::currentRouteName() === 'about'">
                        A propos
                    </x-nav-link>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white mt-auto">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>&copy; {{ date('Y') }} - Cours ESGI Laravel</p>
        </div>
    </footer>
</body>
</html>
