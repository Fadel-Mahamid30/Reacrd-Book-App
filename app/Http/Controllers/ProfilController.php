<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\User;
use Exception;

class ProfilController extends Controller
{
    private $message = [
        "foto.max" => "Ukuran file terlalu besar. Maksimum ukuran file 2 MB.",
        "foto.file" => "Data yang dimasukkan harus berupa file.",
        "foto.mimes" => "File yang dimasukkan harus memiliki format png,jpeg,jpg.",

        "nama.required" => "Kolom nama harus diisi.",
        "nama.max" => "Karakter yang di inputkan terlalu banyak.",
        "gender.required" => "Kolom gender harus diisi.",

        "tanggal_lahir.date" => "Data harus bertipe tanggal.",

        "kontak.required" => "Kolom nomor telepon tidak boleh kosong.",
        "kontak.digits_between" => "Masukkan nomor min 10 digit max 13 digit.",
        "kontak.numeric" => "Data yang di inpuntkan tidak valid.",
        "kontak.unique" => "Nomor HP sudah terdaftar.",

        "divisi.required" => "Kolom alamat tidak boleh kosong.",
        "alamat.required" => "Kolom alamat tidak boleh kosong."
    ];

    // menampilkan profil
    public function index()
    {
        $user = auth()->user();
        return view("profil.profil", [
            "title" => "Profil",
            "user" => $user
        ]);
    }

    // menampilkan form edit profil
    public function edit_profil()
    {
        $user = auth()->user();
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

        return view("profil.edit_profil", [
            "title" => "Edit Profil",
            "user" => $user,
            "divisi" => $data
        ]);
    }

    // fungsi untuk update profil 
    private function updateProfil($data, $id){
        $result = DB::transaction(function () use ($data, $id) {
            try {
                User::where("id", $id)->update($data);
                DB::commit();
                return true;
            } catch (Exception $e) {
                DB::rollBack();
                return false;
            }
        });

        return $result;
    }

    // proses untuk update profil
    public function update_profil(Request $request)
    {
        $user = auth()->user();
        $validate = $request->validate([
            "nama" => "required|max:255",
            "divisi" => "required",
            "gender" => "required|max:255",
            "tanggal_lahir" => "date",
            "kontak" => "required|digits_between:10,13|numeric|unique:users,kontak," . $user->id,
            "alamat" => "required"
        ], $this->message);

        if ($request->file('foto')) {
            $validate["foto"] = "max:2024|file|mimes:png,jpeg,jpg";
        }

        $nama = $request->nama;
        $jenis_kelamin = $request->gender;
        $tanggal_lahir = $request->tanggal_lahir;
        $kontak = $request->kontak;
        $alamat = $request->alamat;
        $divisi_id = $request->divisi;

        $data_user = [
            "nama" => $nama,
            "jenis_kelamin" => $jenis_kelamin,
            "tanggal_lahir" => $tanggal_lahir,
            "kontak" => $kontak,
            "alamat" => $alamat,
            "divisi_id" => $divisi_id,
        ];

        if ($request->file("foto")) {
            $foto = $request->file("foto")->store("/Foto_Profil");
            $data_user["foto"] = $foto;
        }

        if ($user) {
            $result = $this->updateProfil($data_user, $user->id);
        }else{
            $result = false;
        }

        if ($result) {
            if(isset($data_user["foto"])){
                if($user->foto){
                    Storage::delete($user->foto);
                }
            }
            return redirect()->route("profil")->with("success", "Profil berhasil diperbarui.");
        }else{
            if(isset($data_user["foto"])){
                Storage::delete($data_user["foto"]);
            }
            return redirect()->route("profil")->with("failed", "Profil gagal diperbarui. Mohon coba lagi nanti.");
        }

    }
}
