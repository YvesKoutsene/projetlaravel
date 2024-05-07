<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criteria\'s List') }}
        </h2>
    </x-slot>

    <style>
        .couleurb1 {
            background-color: red;
        }

        .couleurb2 {
            background-color: blue;
        }

        .couleurb3 {
            background-color: darkgrey;
        }

        .couleur {
            color: black;
            font-weight: bold;
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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mx-auto">
                        @if($criteria->isEmpty())
                            <p class="text-center text-gray-600 dark:text-gray-300">No universities found</p>
                        @else
                        <table class="w-full min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-4 text-center text-xs font-medium text-black-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Weight</th>
                                <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($criteria as $criteria)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-300 text-center couleur">{{ $criteria->criteria_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-300 text-center couleur">{{ $criteria->weight }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center space-x-4">
                                            <form id="deleteForm{{ $criteria->id }}" action="{{ route('criteria.destroy', $criteria->id) }}" method="POST" class="p-4">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $criteria->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb1 transition duration-300 ease-in-out" title="Delete University">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 011 1v1a2 2 0 01-2 2H4a2 2 0 01-2-2V5a1 1 0 011-1h3V3zm3 2H7v1h6V5h-1a1 1 0 00-1 1v1H9V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        <path fill-rule="evenodd" d="M8 11a1 1 0 00-1 1v5a2 2 0 002 2h4a2 2 0 002-2v-5a1 1 0 00-1-1H8zm2 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('criteria.edit', ['id' => $criteria->id]) }}" method="GET" class="p-4">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb3 transition duration-300 ease-in-out" title="Edit University">
                                                    <svg class="h-6 w-4 text-gray-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <script>
                                    function confirmDelete(userId) {
                                        if (confirm('Are you sure you want to delete this user?')) {
                                            document.getElementById('deleteForm' + userId).submit();
                                        }
                                    }
                                    // Attendre 5 secondes (5000 millisecondes) puis cacher le message de succès
                                    setTimeout(function() {
                                        document.getElementById('successMessage').style.display = 'none';
                                        successMessage.style.color = 'white';
                                        successMessage.style.fontWeight = 'bold';
                                    }, 5000);
                                </script>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr /><br />
                    <div>
                        <form action="{{ route('criteria.create') }}" method="GET">
                            @csrf
                            @method('GET')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb2">
                                Add Criteria
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                <div>
                    <br />
                    @if(session('success'))
                        <script>
                            // Attendre 5 secondes (5000 millisecondes) puis cacher le message de succès
                            setTimeout(function() {
                                document.getElementById('successMessage').style.display = 'none';
                                successMessage.style.color = 'white';
                                successMessage.style.fontWeight = 'bold';
                            }, 5000);
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
