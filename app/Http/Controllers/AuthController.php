<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('dashboard')->withSuccess('User logged in');
        }
        return view('auth.signin');
    }


    public function createSignin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Logged-in');
        }
        return redirect("login")->withSuccess('Credentials are wrong.');
    }


    public function signup()
    {
        if(Auth::check()){
            return redirect('dashboard')->withSuccess('User logged in');
        }
        return view('auth.signup');
    }


    public function SignupUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        return redirect("dashboard")->withSuccess('Successfully logged-in!');
    }


    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboardView()
    {
        if(Auth::check()){
            $user = Auth::user();
            $username = $user->name;
            $posts = $user->posts;
            return view('auth.dashboard',
                compact('username', 'user', 'posts'));
        }
        return redirect("login")->withSuccess('Access is not permitted');
    }


    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
