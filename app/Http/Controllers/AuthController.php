<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function Register(Request $request)
    // {
    //     $request->validate(rules: [
    //         'name' => 'required|string',
    //         'email' => 'required|email|string',
    //         "password" => 'required|min:8'
    //     ]);
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     return redirect('login')->with('message', "Your form has been submitted");
    // }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('/department')->with('success', 'Logged In Successfully');
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Logged Out Successfully');
    }
}
