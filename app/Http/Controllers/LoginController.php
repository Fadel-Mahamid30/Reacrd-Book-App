<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // view login
    public function index(){
        return view("auth.login", [
            "title" => "Login"
        ]);
    }

    // proses login
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', "min:6"],
        ]);

        $username = $request->email;
        $password = $request->password;
 
        if (Auth::attempt(['email' => $username, 'password' => $password, 'status' => 1])) {
            $request->session()->regenerate();
 
            return redirect()->intended("/proses");
        }
 
        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah. Mohon coba lagi.',
        ])->onlyInput('email');

    }

    // cek role user
    public function check_user_role()
    {
        $user = auth()->user();
        $role_user = $user->roles->first()->name;

        if ($role_user == "pimpinan") {
            return redirect()->route("dashboard-pimpinan");
        }elseif($role_user == "admin"){
            return redirect()->route("dashboard-admin");
        }elseif($role_user == "user"){
            return redirect()->route("dashboard-user");
        }else{
            abort(404);
        }
    }
}
