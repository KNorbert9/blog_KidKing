<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $users['getAllUsers'] = User::getAllUsers();
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


    public function edit_user($id)
    {
        $user = User::find($id);

        return view('backend.users.editUser', compact('user'));
    }


    public function update_user(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users,email,' . $id,
        ]);


        $user = User::find($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->status = trim($request->status == '1') ? 1 : 0;
        $user->save();

        return redirect('/dashboard/users')->with('success', 'User Updated Successfully');
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        //$user->delete();
        $user->is_deleted = 1;
        $user->save();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}
