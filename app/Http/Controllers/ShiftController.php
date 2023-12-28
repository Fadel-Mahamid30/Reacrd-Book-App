<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{

    private $message_create = [
        "shift.required" => "Kolom shift harus diisi.",
        "shift.max" => "Karakter yang di inputkan terlalu banyak.",

        "jam_masuk.required" => "Kolom jam masuk harus diisi.",
        "jam_masuk.date_format" => "Data harus memiliki format waktu.",

        "jam_keluar.required" => "Kolom jam keluar harus diisi.",
        "jam_keluar.date_format" => "Data harus memiliki format waktu.",
    ];

    private $message_update = [
        "shift_update.required" => "Kolom shift harus diisi.",
        "shift_update.max" => "Karakter yang di inputkan terlalu banyak.",

        "jam_masuk_update.required" => "Kolom jam masuk harus diisi.",
        "jam_masuk_update.date_format" => "Data harus memiliki format waktu.",

        "jam_keluar_update.required" => "Kolom jam keluar harus diisi.",
        "jam_keluar_update.date_format" => "Data harus memiliki format waktu.",
    ];

    // view
    public function index(){
        $user = auth()->user();
        $shift = Shift::paginate(10);
        return view("dashboard.admin.shift", [
            "title" => "Shift",
            "sidebar" => "other",
            "user" => $user,
            "shift" => $shift
        ]);
    }

    // store
    public function store(Request $request)
    {
        $validate = $request->validate([
            "shift" => "required|max:255",
            "jam_masuk" => "required|date_format:H:i",
            "jam_keluar" => "required|date_format:H:i"
        ], $this->message_create);
        
        $shift = $request->shift;
        $jam_masuk = $request->jam_masuk;
        $jam_keluar = $request->jam_keluar;

        try {

            Shift::create([
                "shift" => $shift,
                "jam_masuk" => $jam_masuk,
                "jam_keluar" => $jam_keluar
            ]);

            return redirect()->route("dashboard-shift")->with("success", "Data berhasil ditambahkan.");
        } catch (\Throwable $th) {
            return redirect()->route("dashboard-shift")->with("failed", "Data gagal ditambahkan.");
        }
    }

    // update
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "shift_update" => "required|max:255",
            "jam_masuk_update" => "required|date_format:H:i",
            "jam_keluar_update" => "required|date_format:H:i"
        ], $this->message_update);
        
        $shift = $request->shift_update;
        $jam_masuk = $request->jam_masuk_update;
        $jam_keluar = $request->jam_keluar_update;

        try {

            Shift::where("id", $id)->update([
                "shift" => $shift,
                "jam_masuk" => $jam_masuk,
                "jam_keluar" => $jam_keluar
            ]);

            return redirect()->route("dashboard-shift")->with("success", "Data berhasil diubah.");
        } catch (\Throwable $th) {
            return redirect()->route("dashboard-shift")->with("failed", "Data gagal diubah.");
        }
    }

    // delete
    public function delete($id)
    {
        $divisi = Shift::find($id);
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
