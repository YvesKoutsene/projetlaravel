<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Universities') }}
            </h2>

            <div class="relative ml-4">
                <form action="{{ route('universities.search') }}" method="GET" class="relative ml-4">
                    <div class="flex items-center">
                        <!-- Utiliser un bouton pour rendre l'icône de recherche cliquable -->
                        <button type="submit" class="flex items-center">
                            <svg class="w-5 h-5 text-gray-600 dark:text-white mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 3a6 6 0 1 1 0 12 6 6 0 0 1 0-12zm7.293 13.293a1 1 0 0 1-1.414 1.414l-3.5-3.5a7 7 0 1 1 1.414-1.414l3.5 3.5zM15 9a6 6 0 1 0-2.83 4.148l-1.004 1.458A7.966 7.966 0 0 1 15 9z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Submit Search</span>
                        </button>
                        <input type="search" name="search" id="search-dropdown" class="block py-2.5 pl-10 pr-4 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-blue-500" placeholder="Search university" required />
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    <style>
        .couleur {
            color: blue;
        }

        .success-message {
            background-color: green;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
            animation: fadeOut 10s forwards;
            text-align: center;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

    </style>

    <div class="py-12">
        @if(session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($universities->isEmpty())
                <p class="text-center text-gray-600 dark:text-gray-300">No university found.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                    @foreach ($universities as $university)
                        <div class="group relative bg-white overflow-hidden shadow-md rounded-lg">
                            <div class="aspect-h-1 aspect-w-1 overflow-hidden bg-gray-200">
                                <img src="{{ asset($university->photo) }}" alt="No Picture" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $university->name }}</h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    <a href="{{ $university->website }}" target="_blank" class="text-blue-500 hover:underline">Visit the University Website</a>
                                </p>
                                <div class="mt-4 flex items-end justify-end">
                                    <a href="{{ route('universities.show', $university) }}" class="couleur">Learn more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
