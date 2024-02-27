<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            if (!empty(Auth::user()->email_verified_at)) {
                return redirect('/dashboard')->with('success', "Login successfuly");
            } else {

                $user_id = Auth::user()->id;
                Auth::logout();

                $save = User::getSingle($user_id);

                $save->remember_token = Str::random(40);

                $save->save();



                Mail::to($save->email)->send(new RegisterMail($save));

                return redirect()->back()->with('success', "Please, first verify your email ");
            }
        } else {
            return redirect()->back()->with('error', "Email or Password incorrect");
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function createUser(Request $request)
    {
        $save = new User;

        request()->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required'
        ]);

        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);

        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));
        return redirect('login')->with('success', "Register successfuly, verify your mail ");
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();

        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect('login')->with('success', "Successful verification !");
        } else {
            abort(404);
        }
    }

    public function forgotPassword()
    {
        return view('auth.forgotPassword',);
    }

    public function resetPassword(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please, check your email and reset your password");
        } else {
            return redirect()->back()->with('error', "Email incorrect or not found");
        }
    }

    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {

            return view('auth.reset', compact('user'));

        } else {

            abort(404);
        }
    }

    public function post_reset(Request $request, $token){

        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {

            if($request->password == $request->confirm_password){

                $user->password = Hash::make($request->password);
                if(empty($user->email_verified_at)){
                    $user->email_verified_at = date('Y-m-d H:i:s');
                }
                $user->remember_token = Str::random(40);
                $user->save();
                return redirect('login')->with('success', "Password changed successfully");

            }else{
                return redirect()->back()->with('error', "Passwords don't match");
            }

        } else {

            abort(404);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
