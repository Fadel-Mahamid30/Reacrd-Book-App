<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{

    private $message_create = [
        "divisi.required" => "Kolom divisi harus diisi.",
        "divisi.max" => "Karakter yang di inputkan terlalu banyak.",
    ];

    private $message_update = [
        "divisi_update.required" => "Kolom divisi harus diisi.",
        "divisi_update.max" => "Karakter yang di inputkan terlalu banyak.",
    ];

    // view
    public function index(Request $request)
    {
        $user = auth()->user();
        $divisi = Divisi::paginate(10);
        return view("dashboard.admin.divisi", [
            "title" => "Divisi",
            "sidebar" => "other",
            "user" => $user,
            "divisi" => $divisi
        ]);
    }

    // store
    public function store(Request $request)
    {
        $validate = $request->validate([
            "divisi" => "required|max:255"
        ], $this->message_create);

        $divisi = $request->divisi;

        try {
            Divisi::create([
                "divisi" => $divisi
            ]);

            return redirect()->route("dashboard-divisi")->with("success", "Data berhasil ditambahkan.");
        } catch (\Throwable $th) {
            return redirect()->route("dashboard-divisi")->with("failed", "Data gagal ditambahkan.");
        }
    }

    // update
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "divisi_update" => "required|max:255"
        ], $this->message_update);

        $divisi = $request->divisi_update;

        try {
            Divisi::where("id", $id)->update([
                "divisi" => $divisi
            ]);

            return redirect()->route("dashboard-divisi")->with("success", "Data berhasil diubah.");
        } catch (\Throwable $th) {
            return redirect()->route("dashboard-divisi")->with("failed", "Data gagal diubah.");
        }
    }

    // delete
    public function delete($id)
    {
        $divisi = Divisi::find($id);
        try {
            $divisi->delete();
            return response()->json([
                'success' => true,
                'type' => 'success',
                'icon' => 'success',
                'title' => "Berhasil",
                'message' => 'Data Berhasil Dihapus!.',
            ]); 
        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'type' => 'warning',
                'icon' => 'warning',
                'title' => "Gagal",
                'message' => 'Data Gagal Dihapus!.',
            ]); 
        }
    }
    
}

