<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Criteria;
use App\Models\Rating;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App\models\User;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\University;

class HomeController extends Controller
{
    public  function index()
    {
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                $universities = University::all();
                //return view('user.dashboard', ['universities' => $universities]);
                return view('pages.index', ['universities' => $universities]);
            }

            elseif ($usertype == 'admin'){
                $userCount = User::where('usertype', 'user')->count();
                $universityCount = University::all()->count();
                $criteriaCount = Criteria::all()->count();
                $ratingCount = Rating::all()->count();
                $commentCount = Comment::all()->count();
                return view('admin.adminhome', ['userCount' => $userCount, 'universityCount' => $universityCount, 'criteriaCount' => $criteriaCount, 'ratingCount' =>  $ratingCount, 'commentCount' =>  $commentCount]);
            }

            else{
                return redirect()->back();
            }
        }
    }
}
