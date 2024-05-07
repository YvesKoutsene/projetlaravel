<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Bienvenue sur Projet Laravel</h1>
        <p class="text-gray-600 mb-8 text-center">Veuillez vous connecter ou vous inscrire pour continuer.</p>
        <div class="flex justify-center">
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-4">Connexion</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Inscription</a>
                @endif
            @endif
        </div>
    </div>
</div>
</body>
</html>
