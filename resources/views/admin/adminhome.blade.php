<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .card{
            background-color : white;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-4 flex items-center card">
                        <div class="rounded p-3 bg-red-500">
                            <svg class="h-20 w-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-right md:text-center ml-4">
                            <h5 class="font-bold uppercase text-gray-400">Total User</h5>
                            <h3 class="font-bold text-3xl text-gray-600"> {{ $userCount }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-4 flex items-center card">
                        <div class="rounded p-3 bg-green-600">
                            <svg class="h-20 w-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                <path d="M5 21v-14l8 -4v18"/>
                                <path d="M19 21v-10l-6 -4"/>
                                <line x1="9" y1="9" x2="9" y2="9.01"/>
                                <line x1="9" y1="12" x2="9" y2="12.01"/>
                                <line x1="9" y1="15" x2="9" y2="15.01"/>
                                <line x1="9" y1="18" x2="9" y2="18.01"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-right md:text-center ml-4">
                            <h5 class="font-bold uppercase text-gray-400">Total University</h5>
                            <h3 class="font-bold text-3xl text-gray-600">{{ $universityCount }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-4 flex items-center card">
                        <div class="rounded p-3 bg-blue-500">
                            <svg class="h-20 w-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"/>
                                <line x1="13" y1="8" x2="15" y2="8"/>
                                <line x1="13" y1="12" x2="15" y2="12"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-right md:text-center ml-4">
                            <h5 class="font-bold uppercase text-gray-400">Total Criteria</h5>
                            <h3 class="font-bold text-3xl text-gray-600">{{ $criteriaCount }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-4 flex items-center card">
                        <div class="rounded p-3 bg-orange-500">
                            <svg class="h-20 w-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-right md:text-center ml-4">
                            <h5 class="font-bold uppercase text-gray-400">Total Racking</h5>
                            <h3 class="font-bold text-3xl text-gray-600"> {{$ratingCount }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-4 flex items-center card">
                        <div class="rounded p-3 bg-yellow-500">
                            <svg class="h-20 w-20 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"/>
                                <line x1="8" y1="9" x2="16" y2="9"/>
                                <line x1="8" y1="13" x2="14" y2="13"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-right md:text-center ml-4">
                            <h5 class="font-bold uppercase text-gray-400">Total Comment</h5>
                            <h3 class="font-bold text-3xl text-gray-600"> {{$commentCount }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
