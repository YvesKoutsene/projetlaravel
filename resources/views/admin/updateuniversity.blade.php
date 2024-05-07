<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('University\'s Edition') }}
        </h2>
    </x-slot>

    <style>
        .couleurb {
            background-color: blue;
        }

        .couleur {
            color: white;
            font: bold;
        }

        .couleurch {
            color: black;
            font: bold;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="mb-4 bg-green-500 text-white font-bold py-2 px-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('universities.update', $university->id) }}" method="POST" enctype="multipart/form-data" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">University Name</label>
                            <input type="text" name="name" id="name" value="{{ $university->name }}" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Location</label>
                            <input type="text" name="location" id="location" value="{{ $university->location }}" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <div class="mb-4">
                            <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Website</label>
                            <input type="text" name="website" id="website" value="{{ $university->website }}" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <textarea name="description" id="description" class="mt-1 p-2 border rounded-md w-full couleurch" required>{{ $university->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Current Logo</label>
                            <img src="{{ asset($university->photo) }}" class="w-12 h-12 mt-1" alt="No Logo">
                        </div>
                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-200">New Logo</label>
                            <input type="file" name="photo" id="photo" class="mt-1 border rounded-md w-full" accept="image/*">
                            @error('photo')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb">Update</button>
                    </form>
                        <script>
                            document.getElementById('myForm').addEventListener('submit', function(event) {
                                var photoInput = document.getElementById('photo');
                                if (photoInput.files.length > 0) {
                                    var fileSize = photoInput.files[0].size; // Taille en octets
                                    var maxSize = 5 * 1024 * 1024; // 5 Mo en octets

                                    if (fileSize > maxSize) {
                                        event.preventDefault(); // Empêche l'envoi du formulaire
                                        alert('The size of the image must not exceed 5 MB.');
                                    }
                                }
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
