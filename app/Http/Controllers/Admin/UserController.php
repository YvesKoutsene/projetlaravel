<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth;

class UserController extends Controller
{
    public function getUsers()
    {
            $users = User::where('usertype', 'user')->get();
            return view('admin.manageuser', ['users' => $users]);

    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        session()->flash('success', 'User deleted successfully!');

        // Rediriger vers une page de confirmation ou une autre page
        return redirect()->route('manage.users');
    }

}
