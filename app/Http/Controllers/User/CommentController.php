<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\University;


class CommentController extends Controller
{
    /*public function updateComment(Request $request, $universityId, $userId)
    {
        $comment = Comment::where('user_id', $userId)
            ->where('university_id', $universityId)
            ->first();

        if ($comment) {
            $comment->comment = $request->comment;
            $comment->save();
        } else {
            Comment::create([
                'user_id' => $userId,
                'university_id' => $universityId,
                'comment' => $request->comment
            ]);
        }
        return redirect()->route('dashboard')->with('success', 'Commentaire mis à jour avec succès');
    }*/

}
