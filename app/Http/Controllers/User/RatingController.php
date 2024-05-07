<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Criteria;
use App\Models\Rating;
use App\Models\University;
use App\Models\Comment;
use App\Http\Requests\Auth;

class RatingController extends Controller
{
    public function showRatingForm(University $university)
    {
        $criteria = Criteria::all();
        $comment = Comment::where('user_id', auth()->id())
            ->where('university_id', $university->id)
            ->first();

        $existingRatings = Rating::where('user_id', auth()->id())
            ->where('university_id', $university->id)
            ->get();

        $comments = Comment::where('university_id', $university->id)->with('user')->get();

       return view('user.universityshow', compact('university', 'criteria', 'existingRatings', 'comment','comments'));
    }

    public function storeRatingAndUpdateComment(Request $request, University $university)
    {
        $request->validate([
            'ratings.*' => 'required|numeric|min:0|max:10',
            'comment' => 'nullable|string|max:255',
        ]);

        foreach ($request->input('ratings') as $criteriaId => $rating) {
            // Recherchez une note existante pour le critère, l'utilisateur et l'université
            $existingRating = Rating::where('user_id', auth()->id())
                ->where('university_id', $university->id)
                ->where('criteria_id', $criteriaId)
                ->first();

            // Si une note existe, mettez à jour la note existante
            if ($existingRating) {
                $existingRating->rating = $rating;
                $existingRating->save();
            } else {
                // Sinon, créez une nouvelle note
                Rating::create([
                    'user_id' => auth()->id(),
                    'university_id' => $university->id,
                    'criteria_id' => $criteriaId,
                    'rating' => $rating,
                ]);
            }
        }

        // Met à jour le commentaire
        $comment = Comment::where('user_id', auth()->id())
            ->where('university_id', $university->id)
            ->first();

        if ($comment) {
            $comment->comment = $request->comment;
            $comment->save();
        } else {
            Comment::create([
                'user_id' => auth()->id(),
                'university_id' => $university->id,
                'comment' => $request->comment
            ]);
        }

        return redirect()->route('createCourse')
            ->with('success', 'Your notes and comments have been successfully saved.');
    }

    public function classementUniversitesParCritere(Request $request)
    {
        $critere_id = $request->query('critere_id');
        // Récupérer le nom du critère
        $critere = Criteria::findOrFail($critere_id)->criteria_name;

        $universites = University::all();

        $classement = [];

        foreach ($universites as $universite) {
            $ratings = Rating::where('university_id', $universite->id)
                ->where('criteria_id', $critere_id)
                ->get();

            $total_score = 0;
            $total_weight = 0;

            foreach ($ratings as $rating) {
                $criteria_weight = $rating->criteria->weight;
                $total_weight += $criteria_weight;
                $total_score += $rating->rating;
            }

            $average_score = $ratings->count() > 0 ? $total_score / $ratings->count() : 0;

            $classement[] = [
                'universite' => $universite,
                'nombre_notes' => $ratings->count(),
                'note_totale' => $total_score,
                'moyenne' => $average_score
            ];
        }

        usort($classement, function ($a, $b) {
            return $b['note_totale'] - $a['note_totale'];
        });

        return view('pages.classement', ['classement' => $classement, 'critere' => $critere]);
    }

}
