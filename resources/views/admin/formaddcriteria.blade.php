<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criteria\'s Form') }}
        </h2>
    </x-slot>
    <style>
        .couleurb{
            background-color: blue;
        }

        .couleur{
            color: white;
            font: bold;
        }
        .couleurch{
            color: black;
            font: bold;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('criteria.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="criteria_name" class="block text-sm font-medium text-gray-700 mb-2 couleur">Criteria Name</label>
                            <input type="text" name="criteria_name" id="criteria_name" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <div class="mb-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700 mb-2 couleur">Weight</label>
                            <input type="number" name="weight" id="weight" class="mt-1 p-2 border rounded-md w-full couleurch" required>
                        </div>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Boîte de dialogue de succès -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successMessage"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Attendre 5 secondes (5000 millisecondes) puis cacher le message de succès
        setTimeout(function(){
            document.getElementById('successMessage').style.display = 'none';
            successMessage.style.color = 'white';
            successMessage.style.font = 'bold';
        }, 5000);
    </script>

</x-app-layout>
