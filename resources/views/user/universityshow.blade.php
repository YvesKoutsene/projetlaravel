<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('University Details') }}
        </h2>
    </x-slot>

    <style>
        .couleurb {
            color: blue;
        }

        .couleur {
            color: black;
            font: bold;
        }

        .couleur2 {
            color: white;
            font: bold;
        }
        /* Style des étoiles */
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
        }
        .star-input {
            display: none;
        }
        .star-label {
            color: #ccc;
            cursor: pointer;
            font-size: 24px; /* Taille des étoiles */
        }
        .star-label:hover,
        .star-label:hover ~ .star-label,
        .star-input:checked ~ .star-label {
            color: #ffcc00; /* Couleur des étoiles sélectionnées */
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Affichage des informations de l'université -->
                <div class="column-padding">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ asset($university->photo) }}" alt="No logo" class="object-cover w-full h-full rounded-lg shadow-lg">
                    </div>
                    <h1 class="text-2xl font-semibold mt-6 couleur2">Name: {{ $university->name }}</h1>
                    <p class="text-gray-600 couleur2">Location: {{ $university->location }}</p>
                    <p class="text-blue-500 ">
                        <label>Website: </label>
                        <a href="{{ $university->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $university->website }}</a>
                    </p>
                    <div class="mt-4">
                        <label class="couleur2">Description</label>
                        <p class="couleur2"> {{ $university->description }}</p>
                    </div>
                </div>

                <!-- Affichage des critères et formulaire de notation -->
                <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md ">
                    <h2 class="text-xl font-semibold mt-6 couleur text-center">Rating Criteria</h2>
                    <form id="ratingForm" action="{{ route('ratings.storeAndUpdateComment', $university) }}" method="POST">
                        @csrf
                        @foreach ($criteria as $criterion)
                            <div class="mt-4">
                                <label class="couleur">{{ $criterion->criteria_name }}</label>
                                <div class="rating ">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star-{{ $criterion->id }}-{{ $i }}" name="ratings[{{ $criterion->id }}]" value="{{ $i }}" class="star-input"
                                               @if ($existingRating = $existingRatings->where('criteria_id', $criterion->id)->first())
                                                   @if ($existingRating->rating == $i) checked @endif
                                            @endif required>
                                        <label for="star-{{ $criterion->id }}-{{ $i }}" class="star-label">&#9733;</label>
                                    @endfor
                                </div>
                            </div>
                        @endforeach

                    <div class="mt-6">
                        <label for="comment" class="text-xl font-semibold couleur">Comment</label>
                        <div class="flex">
                                <textarea id="comment" name="comment" rows="4" cols="35" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>{{ $comment ? $comment->comment : '' }}</textarea>
                            <button id="submitForm" type="submit" class=" couleurb">
                                <svg class="h-8 w-8 "  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                    <line x1="10" y1="14" x2="21" y2="3" />
                                    <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>

                @if ($comments->isEmpty())
                    <p>No comment found</p>
                @else
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        @foreach ($comments as $comment)
                            <div class="mb-4">
                                <p class="font-semibold">{{ $comment->user->name }}</p>
                                <p class="text-gray-600">{{ $comment->comment }} </p>
                                <p class="font-semibold">Comment on  {{ $comment->created_at }} </p>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>
