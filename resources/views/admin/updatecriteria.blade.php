<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criteria\'s Edition') }}
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

                    <form action="{{ route('criteria.update', $criteria->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="criteria_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Criteria Name</label>
                            <input type="text" name="criteria_name" id="criteria_name" value="{{ $criteria->criteria_name }}" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <div class="mb-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Weight</label>
                            <input type="number" name="weight" id="weight" value="{{ $criteria->weight }}" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
