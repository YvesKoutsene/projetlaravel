<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users\'s List') }}
        </h2>
    </x-slot>
    <style>
        .couleurb{
            background-color: red;
        }

        .couleur{
            color: black;
            font: bold;
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
                        @if($users->isEmpty())
                            <p class="text-center text-gray-600 dark:text-gray-300">No users found</p>
                        @else
                            <table class="w-full min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-center text-xs font-medium text-black-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Creation Date
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-300 text-center couleur">{{ $user->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-300 text-center couleur">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-300 text-center couleur">{{ $user->created_at }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form id="deleteForm{{$user->id}}" action="{{ route('delete.user', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{$user->id}})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded couleurb btn btn-danger btn-sm" title="Delete User">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 011 1v1a2 2 0 01-2 2H4a2 2 0 01-2-2V5a1 1 0 011-1h3V3zm3 2H7v1h6V5h-1a1 1 0 00-1 1v1H9V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        <path fill-rule="evenodd" d="M8 11a1 1 0 00-1 1v5a2 2 0 002 2h4a2 2 0 002-2v-5a1 1 0 00-1-1H8zm2 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        <script>
                                            function confirmDelete(userId) {
                                                if (confirm('Are you sure you want to delete this user?')) {
                                                    document.getElementById('deleteForm' + userId).submit();
                                                }
                                            }
                                        </script>
                                @endforeach
                                </tbody>
                            </table>
                            <hr/> <br/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
