<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $users ['getAllUsers'] = User::getAllUsers();
        return view('backend.users.users', $users);
    }

    public function addUser()
    {
        return view('backend.users.addUser');
    }

    public function insert_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required',
        ]);
        $user = new User();

        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->status = trim($request->status);

        $user->save();

        return redirect('/dashboard/users')->with('success', 'User Added Successfully');

    }
}
