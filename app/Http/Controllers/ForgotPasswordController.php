<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public $username;
    public $password;
    public $token;

    private $message = [
        "email.required" => "Kolom email haru diisi.",
        "email.max" => "Karakter yang di inputkan terlalu banyak.",
        "email.exists" => "Email tidak terdaftar.",
        "email.email" => "Email tidak valid.",

        'password.required' => 'Kolom password harus diisi.',
        'password.min' => 'Password minimal harus terdiri dari 6 min karakter.',
        'password.confirmed' => 'Password yang dimasukkan tidak sama dengan konfirmasi password.'
    ];

    // menampilkan form untuk mengirimkan pesan melalui email 
    public function index(){
        return view("auth.lupa_password",[
            "title" => "Radian Edu Solution"
        ]);
    }

    // proses mengirimkan pesan berupa token ke email
    public function sendResetLinkEmail(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|exists:users,email',
        ], $this->message);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success', __($status))
                    : back()->with(['failed' => __($status)]);
            
    }

    // menampilkan form untuk memperbarui password
    public function reset_password(Request $request, $token){
        return view("auth.reset_password",[
            "title" => "Radian Edu Solution",
            "email" => $request->email,
            "token" => $token
        ]);
    }

    // proses untuk memperbarui password
    public function update_password(Request $request, $token){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], $this->message);

        $this->username = $request->username;
        $this->password = $request->password;
        $this->token = $request->token;
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->with(['failed' => __($status)]);
    }
}
