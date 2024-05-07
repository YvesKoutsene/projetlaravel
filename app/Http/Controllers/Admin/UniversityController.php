<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Http\Requests\Auth;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{

    public function getUniversities()
    {
        $universities = University::all();

        return view('admin.manageuniversity', ['universities' => $universities]);
    }

    public function create()
    {
        return view('admin.formadduniversity');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/' . $path;

        University::create($requestData);

        session()->flash('success', 'University added successfully!');

        return redirect()->route('manage.universities');
    }

    public function deleteUniversity($id)
    {
        $university = University::findOrFail($id);

        $imagePath = public_path($university->photo);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $university->delete();

        session()->flash('success', 'University deleted successfully!');

        // Rediriger avec un message de succès
        return redirect()->route('manage.universities');
    }

    public function edit($id)
    {
        $university = University::findOrFail($id);
        return view('admin.updateuniversity', compact('university'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $university = University::findOrFail($id);
        $requestData = $request->all();

        if ($request->hasFile('photo')) {
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $requestData["photo"] = '/storage/' . $path;

            // Supprimer l'ancienne image
            Storage::disk('public')->delete(str_replace('/storage/', '', $university->photo));
        }

        $university->update($requestData);

        session()->flash('success', 'University updated successfully!');

        return redirect()->route('manage.universities');
    }

    public function show(University $university)
    {
        return view('user.universityshow', compact('university'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $universities = University::where('name', 'like', '%'.$searchTerm.'%')
                ->orWhere('description', 'like', '%'.$searchTerm.'%')
                ->orWhere('location', 'like', '%'.$searchTerm.'%')
                ->orWhere('website', 'like', '%'.$searchTerm.'%')
                ->get();
        } else {
            $universities = University::all();
        }

        return view('pages.courses', compact('universities', 'searchTerm'));
    }

}
