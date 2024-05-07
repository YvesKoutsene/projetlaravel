<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\User;
use App\Models\Criteria;
use App\Models\Rating;
use App\Models\Comment;
use App\Http\Requests\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function createCourse()
    {
        $universities = University::all();
        return view('pages.courses',  ['universities' => $universities]);
    }

    public function createContact()
    {
        return view('pages.contact');
    }

    public function createBlog(Request $request)
    {
        $universityId = $request->query('university_id');

        $university = University::findOrFail($universityId);

        $user = auth()->user();

        $onecmt = $user->comments()
            ->where('university_id', $universityId)
            ->firstOrNew(['user_id' => $user->id]);

        $existingRatings = Rating::where('user_id', $user->id)
            ->where('university_id', $universityId)
            ->get();

        $comments = Comment::where('university_id', $university->id)->with('user')->get();

        return view('pages.blog_details', compact('university', 'existingRatings', 'onecmt', 'comments'));
    }

}
