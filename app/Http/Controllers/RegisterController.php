<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Divisi;
use App\Models\User;


class RegisterController extends Controller
{
    // merupakan sebuah variable yang menampung pesan yang akan di keluarkan ketika inputan error.
    private $massage_validasi = [
        "nama.required" => "Kolom nama harus diisi.",
        "nama.max" => "Karakter yang di inputkan terlalu banyak.",

        "email.required" => "Kolom email haru diisi.",
        "email.max" => "Karakter yang di inputkan terlalu banyak.",
        "email.unique" => "Email sudah terdaftar.",
        "email.email" => "Email tidak valid.",

        "password.required" => "Kolom password tidak boleh kosong.",
        "password.min" => "Password minimal harus terdiri dari 6 min karakter.",

        "divisi.required" => "Kolom password tidak boleh kosong."
    ];

    public function index(){

        $divisi = Divisi::all();
        $data = [];
        foreach ($divisi as $row) {
            if ($row->id == 1 || $row->id == 2) {
                continue;
            }
            $data[] = [
                "id" => $row->id,
                "divisi" => $row->divisi
            ];
        }

        return view("auth.registrasi", [
            "title" => "Registrasi",
            "divisi" => $data
        ]);
    }

    private function insert_user($data){
        $insert_user = DB::transaction(function () use ($data){
            try {

                $user = User::create($data);
                $user->assignRole("user");
                DB::commit();
                return true;

            } catch (\Throwable $th) {

                DB::rollBack();
                return false;

            }
        });
        return $insert_user;
    }

    public function register(Request $request){
        $validate = $request->validate([
            "nama" => "required|max:255",
            "email" => "required|max:255|email",
            "password" => "required|min:6",
            "divisi" => "required|numeric"
        ], $this->massage_validasi);

        $nama =  ucwords(strtolower($request->nama));
        $email = $request->email;
        $password =  Hash::make($request->password);
        $divisi_id = $request->divisi;

        $data_user = [
            "nama" =>  $nama,
            "email" => $email,
            "password" =>  $password,
            "divisi_id" => $divisi_id
        ];

        $result = $this->insert_user($data_user);

        // return $result;

        if ($result) {
            return redirect()->route('login')->with("success", "Registrasi berhasil, beri kabar admin untuk mengaktifkan akun.");
        }else {
            return redirect()->route("register")->with("failed", "Registrasi gagal, mohon untuk registrasi ulang.");
        }
    }
}
