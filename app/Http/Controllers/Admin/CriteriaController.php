<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Requests\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Rating;
use App\Models\Comment;

class CriteriaController extends Controller
{

    public function showCriteriaForm()
    {
        $criteria = Criteria::all();
        return view('admin.managecriteria', ['criteria' => $criteria]);
    }

    public function create()
    {
        return view('admin.formaddcriteria');
    }

    public function storeCriteria(Request $request)
    {
        $request->validate([
            'criteria_name' => 'required|string',
            'weight' => 'required|numeric|min:0|max:100',
        ]);

        $criteria = new Criteria;
        $criteria->criteria_name = $request->criteria_name;
        $criteria->weight = $request->weight;
        $criteria->save();

        return redirect()->route('manage.criteria')
            ->with('success', 'Scoring criteria added successfully.');
    }

    public function editCriteria($id)
    {
        $criteria = Criteria::findOrFail($id);
        return view('admin.updatecriteria', compact('criteria'));
    }

    public function updateCriteria(Request $request, $id)
    {
        $criteria = Criteria::findOrFail($id);

        $request->validate([
            'criteria_name' => 'required|string',
            'weight' => 'required|numeric|min:0|max:100',
        ]);

        $criteria->update([
            'criteria_name' => $request->criteria_name,
            'weight' => $request->weight,
        ]);

        return redirect()->route('manage.criteria')
            ->with('success', 'Scoring criteria successfully updated.');
    }


    public function deleteCriteria($id)
    {
        // Trouver l'université
        $criteria = Criteria::findOrFail($id);

        // Supprimer l'entrée de l'université
        $criteria->delete();

        return redirect()->route('manage.criteria')
            ->with('success', 'Scoring criteria successfully removed.');
    }

    public function afficherNotesEtCommentaires()
    {
        // Récupérer tous les utilisateurs
        $users = User::all();

        // Initialiser un tableau pour stocker les notes et les commentaires pour chaque utilisateur
        $notesCommentaires = [];

        // Boucler à travers chaque utilisateur
        foreach ($users as $user) {
            // Récupérer les notes attribuées par l'utilisateur
            $notes = $user->ratings()->with('university', 'criteria')->get();

            // Récupérer les commentaires de l'utilisateur
            $commentaires = $user->comments()->with('university')->get();

            // Vérifier si l'utilisateur a des commentaires
            if ($commentaires->isNotEmpty()) {
                // Ajouter les notes et les commentaires à notre tableau
                $notesCommentaires[] = [
                    'user' => $user,
                    'notes' => $notes,
                    'commentaires' => $commentaires,
                ];
            }
        }

        return view('admin.users_ratings_comments', ['notesCommentaires' => $notesCommentaires]);
    }

}
