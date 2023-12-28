<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;


class UserManagementController extends Controller
{

    private $message = [
        "foto.max" => "Ukuran file terlalu besar. Maksimum ukuran file 2 MB.",
        "foto.file" => "Data yang dimasukkan harus berupa file.",
        "foto.mimes" => "File yang dimasukkan harus memiliki format png,jpeg,jpg.",

        "nama.required" => "Kolom nama harus diisi.",
        "nama.max" => "Karakter yang di inputkan terlalu banyak.",
        "gender.required" => "Kolom gender harus diisi.",

        "kontak.required" => "Kolom nomor telepon tidak boleh kosong.",
        "kontak.digits_between" => "Masukkan nomor min 10 digit max 13 digit.",
        "kontak.numeric" => "Data yang di inpuntkan tidak valid.",
        "kontak.unique" => "Nomor HP sudah terdaftar.",
        
        "divisi.required" => "Kolom alamat tidak boleh kosong.",
        "alamat.required" => "Kolom alamat tidak boleh kosong."
    ];

    // menampilkan seluruh data user (admin dan pimpinan tidak termasuk)
    public function users(Request $request)
    {
        $search = $request->search ?? "";
        $select = $request->select ?? "";
        $divisi = Divisi::all();

        $user = auth()->user();
        $users = User::where("status", 1)->search_user(["search" => $search, "select" => $select])
                ->whereHas("roles", function($query){
                    $query->where("name", "user");
                })->paginate(20)->withQueryString(request("select"), request("search"));

        return view("dashboard.admin.users", [
            "title" => "Users",
            "sidebar" => "users",
            "user" => $user,
            "users" => $users,
            "search" => $search,
            "select" => $select,
            "divisi" => $divisi
        ]);
    }

    // menampilkan data user menurut hak akses 
    public function user_access(Request $request)
    {
        $search = $request->search ?? "";
        $select = $request->select ?? "";
        $roles = Role::all();
        
        $user = auth()->user();
        $user_access = User::where("status", 1)->search_user(["search" => $search])
                ->whereHas("roles", function($query) use ( $select){
                    $query->where("name", "like", "%" . $select . "%");
                })->paginate(20)->withQueryString(request("select"), request("search"));

        return view("dashboard.admin.user_access", [
            "title" => "Users Access",
            "sidebar" => "user_access",
            "user" => $user,
            "users" => $user_access,
            "search" => $search,
            "select" => $select,
            "roles" => $roles
        ]);
    }

    // menampilkan data user yang baru daftar
    public function user_registration(Request $request)
    {
        $search = $request->search ?? "";
        $select = $request->select ?? "";
        $divisi = Divisi::all();

        $user = auth()->user();
        $user_registration = User::where("status", 0)->search_user(["search" => $search, "select" => $select])
                ->whereHas("roles", function($query){
                    $query->where("name", "user");
                })->paginate(20)->withQueryString(request("select"), request("search"));

        return view("dashboard.admin.user_registration", [
            "title" => "Users Registration",
            "sidebar" => "user_registration",
            "user" => $user,
            "users" => $user_registration,
            "search" => $search,
            "select" => $select,
            "divisi" => $divisi
        ]);
    }

    // untuk mengambil detail data user
    public function get_data_user($id)
    {
        $user = User::Where("id", $id)->first();
        $roles = Role::all();

        $user_roles = $user->roles->first()->name;
        $role = [];
        foreach ($roles as $row) {
            $role[] = [
                "name" => $row->name
            ];
        }

        if($user){
            return response()->json([
                'status' => true,
                'roles' => $role,
                'user' => $user_roles
            ]); 
        } else {
            return response()->json(['status' => false]); 
        }
    }

    // untuk menghapus data user
    public function remove_user($id)
    {
        $user = User::Where("id", $id)->first();
        if($user){
            $user->delete();
            if($user->foto){
                Storage::delete($user->foto);
            }
            return response()->json([
                'success' => true,
                'type' => 'success',
                'icon' => 'success',
                'title' => "Berhasil",
                'message' => 'Data Berhasil Dihapus!.',
            ]); 
        } else {
            return response()->json([
                'success' => true,
                'type' => 'warning',
                'icon' => 'warning',
                'title' => "Gagal",
                'message' => 'Data Gagal Dihapus!.',
            ]); 
        }
    }

    // untuk mengubah role/hak akses pada user
    public function update_role_user(Request $request, $id)
    {
        $user = User::find($id);
        $role = Role::findByName($request->hak_akses);

        if (!$user || !$role) {
            return response()->json(["status" => false]);
        }

        $divisi = "";
        if ($request->hak_akses == "pimpinan") {
            $divisi = 1; 
        } elseif ($request->hak_akses == "admin") {
            $divisi = 2;
        } else {
            $divisi = 3;
        }

        try {
            $user->syncRoles($role);
            $user->update([
                "divisi_id" => $divisi
            ]);

            DB::commit();
            return response()->json([
                'status' => true,
                'type' => 'success',
                'icon' => 'success',
                'title' => "Berhasil",
                'message' => "Hak akses berhasil diubah.",
            ]); 
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json([
                'status' => true,
                'type' => 'warning',
                'icon' => 'warning',
                'title' => "Gagal",
                'message' => 'Hak akses gagal diubah.',
            ]); 
        }
    }

    // untuk mengaktifkan user 
    public function active_user(Request $request ,$id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(["status" => false]);
        }

        try {
            $user->update(["status" => 1]);
            return response()->json([
                'status' => true,
                'type' => 'success',
                'icon' => 'success',
                'title' => 'Berhasil',
                'message' => 'User berhasil diaktifkan.',
            ]); 
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'type' => 'warning',
                'icon' => 'warning',
                'title' => "Gagal",
                'message' => $th,
            ]); 
        }
    }

    // untuk menampilkan form edit profil melalui admin 
    public function edit_user_profil(Request $request, $id)
    {
        $user = User::where("id", $id)->first();

        if (!$user) {
            abort(404);
        }

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

        return view("dashboard.admin.edit_user_profil", [
            "title" => "Edit Profil User",
            "user" => $user,
            "divisi" => $data
        ]);
    }

    // fungsi update profil
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

    // proses update data user melalui admin
    public function update_user_profil(Request $request)
    {
        
        $user = User::where("id", $request->user_id)->first();

        if (!$user) {
            abort(404);
        }

        $validate = $request->validate([
            "nama" => "required|max:255",
            "divisi" => "required",
            "tanggal_lahir" => "date",
            "gender" => "required|max:255",
            "kontak" => "required|digits_between:10,13|numeric|unique:users,kontak," . $user->id,
            "alamat" => "required",
        ], $this->message);

        if ($request->file('foto')) {
            $validate["foto"] = "max:2024|file|mimes:png,jpeg,jpg";
        }

        $nama = $request->nama;
        $jenis_kelamin = $request->gender;
        $kontak = $request->kontak;
        $tanggal_lahir = $request->tanggal_lahir;
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
            $data_user["foto"] = $request->file("foto")->store("/Foto_Profil");
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
            return redirect()->route("dashboard-users-admin")->with("success", "Profil berhasil diperbarui.");
        }else{
            if(isset($data_user["foto"])){
                Storage::delete($data_user["foto"]);
            }
            return redirect()->route("dashboard-users-admin")->with("failed", "Profil gagal diperbarui. Mohon coba lagi nanti.");
        }

    }

}
