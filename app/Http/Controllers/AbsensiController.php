<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class AbsensiController extends Controller
{
    private $bulan = [
        ["id"=>"01", "bulan"=>"Januari"],
        ["id"=>"02", "bulan"=>"Febuari"],
        ["id"=>"03", "bulan"=>"Maret"],
        ["id"=>"04", "bulan"=>"April"],
        ["id"=>"05", "bulan"=>"Mei"],
        ["id"=>"06", "bulan"=>"Juni"],
        ["id"=>"07", "bulan"=>"Juli"],
        ["id"=>"08", "bulan"=>"Agustus"],
        ["id"=>"09", "bulan"=>"September"],
        ["id"=>"10", "bulan"=>"Oktober"],
        ["id"=>"11", "bulan"=>"November"],
        ["id"=>"12", "bulan"=>"Desember"]
    ];

    // absesni user
    public function view_absensi_user(Request $request)
    {
        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year;

        $user = auth()->user();
        $terlambat = Absensi::orderBy("tanggal", "desc")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->whereNotIn('terlambat', [0])->count();
        
        $absen_sakit_izin = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "Sakit")->orWhere("status_absensi", "Izin")
                            ->search_absensi([
                                "bulan" => $bulan,
                                "tahun" => $tahun,
                            ])->where("user_id", $user->id)->count();

        $absensi = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "like", "%" . $search . "%")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->paginate(14)->withQueryString(request("bulan"), request("tahun"), request("search"));

        return view("dashboard.user.absensi", [
            "title" => "Absensi",
            "sidebar" => "absensi",
            "user" => $user,
            "absensi" => $absensi,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "bulan" => $this->bulan,
            "search" => $search,
            "status_sk_iz" => $absen_sakit_izin,
            "terlambat" => $terlambat
        ]);
    }

    // absensi admin
    public function view_absensi_admin(Request $request)
    {
        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year; 

        $user_id = $request->user_id ?? "" ;

        $user_name = "";
        if ($user_id) {
            $user_name = User::find($user_id);
        }

        $user = auth()->user();
        $terlambat = Absensi::orderBy("tanggal", "desc")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user_id
                    ])->whereNotIn('terlambat', [0])->count();
        
        $absen_sakit_izin = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "Sakit")->orWhere("status_absensi", "Izin")
                            ->search_absensi([
                                "bulan" => $bulan,
                                "tahun" => $tahun,
                                "user_id" => $user_id
                            ])->count();

        $absensi = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "like", "%" . $search . "%")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user_id
                    ])->paginate(14)->withQueryString(request("bulan"), request("tahun"), request("search"), request("user_id"));

        return view("dashboard.admin.absensi", [
            "title" => "Absensi",
            "sidebar" => "absensi",
            "user" => $user,
            "absensi" => $absensi,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "bulan" => $this->bulan,
            "search" => $search,
            "status_sk_iz" => $absen_sakit_izin,
            "terlambat" => $terlambat,
            "id_identitas" => $user_id,
            "user_name" => $user_name,
            "user_id" => $user_id
        ]);
    }

    // absensi pimpinan
    public function view_absensi_pimpinan(Request $request)
    {
        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year; 

        $user_id = $request->user_id ?? "" ;

        $user_name = "";
        if ($user_id) {
            $user_name = User::find($user_id);
        }

        $user = auth()->user();
        $terlambat = Absensi::orderBy("tanggal", "desc")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user_id
                    ])->whereNotIn('terlambat', [0])->count();
        
        $absen_sakit_izin = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "Sakit")->orWhere("status_absensi", "Izin")
                            ->search_absensi([
                                "bulan" => $bulan,
                                "tahun" => $tahun,
                                "user_id" => $user_id
                            ])->count();

        $absensi = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "like", "%" . $search . "%")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user_id
                    ])->paginate(14)->withQueryString(request("bulan"), request("tahun"), request("search"), request("user_id"));

        return view("dashboard.pimpinan.absensi", [
            "title" => "Absensi",
            "sidebar" => "absensi",
            "user" => $user,
            "absensi" => $absensi,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "bulan" => $this->bulan,
            "search" => $search,
            "status_sk_iz" => $absen_sakit_izin,
            "terlambat" => $terlambat,
            "id_identitas" => $user_id,
            "user_name" => $user_name,
            "user_id" => $user_id
        ]);
    }


    // cek absen 
    public function check_absen()
    {
        $user = auth()->user();
        $absensi = Absensi::where('user_id', $user->id)->whereDate('tanggal', Carbon::now("Asia/Jakarta"))->first();

        if ($absensi) {
            if ($absensi->jam_keluar) {
                return redirect()->route('absensi-user')->with("info", "Hari ini anda sudah menyelesaikan absen.");
            }
            return redirect()->route('absensi-keluar', [$absensi->id]);
        }else{
            return redirect()->route('absensi-masuk');
        }

        return abort(404);
    }

    // form untuk absen masuk
    public function absen_masuk()
    {
        $shift = Shift::all();
        return view("dashboard.user.absensi_masuk", [
            "title" => "Absensi",
            "sidebar" => "absensi",
            "shift" => $shift
        ]);
    }

    // pesan validasi 
    private $message = [
        "status_absen.required" => "Kolom ini tidak boleh kosong.", 
        "shift.required" => "Kolom ini tidak boleh kosong.", 
        "tempat_kerja.required" => "Kolom ini tidak boleh kosong.",

        "tanggal.required" => "Kolom Tanggal tidak boleh kosong.",
        "tanggal.date" => "Hanya mendukung format 'TANGGAL'.",
        "tanggal.unique" => "Data sudah terdaftar",

        "jam_masuk.date_format" => "Kolom Tanggal tidak boleh kosong.",
        "jam_masuk.date_format" => "Hanya mendukung format 'WAKTU'.",

        "jam_keluar.date_format" => "Kolom Tanggal tidak boleh kosong.",
        "jam_keluar.date_format" => "Hanya mendukung format 'WAKTU'.",
    ];

    // fungsi untuk insert ke databse
    private function insertAbsen($data){
        $result = DB::transaction(function () use ($data){
            try {

                Absensi::insert($data);
                DB::commit();
                return true;

            } catch (\Throwable $th) {

                DB::rollBack();
                return false;

            }
        });
        return $result;
    }

    // fungsi untuk memproses insert data absen
    public function store_absen(Request $request)
    {
        $user = auth()->user();
        $data_validate = [
            "tanggal" => ["required", "date", 
                        Rule::unique('Absensis','tanggal')->where(function ($query) use ($user) {
                            return $query->where('user_id', $user->id);
                        })],
            "jam_masuk" => "required",
            "status_absen" => "required|max:255",
            "shift" => "required",
            "tempat_kerja" => "required|max:255"
        ];

        $validate = $request->validate($data_validate, $this->message);

        $shift = Shift::where("id", $request->shift)->first();
        $waktu1 = Carbon::parse($shift->jam_masuk);
        $waktu2 = Carbon::parse($request->jam_masuk);
    
        if ($waktu1->lessThan($waktu2)) {
            $terlambat = $waktu1->diffInMinutes($waktu2);
        } else {
            $terlambat = 0;
        }

        if ($request->status_absen == "Sakit" || $request->status_absen == "Izin"){
            $terlambat = 0;
        }

        $tanggal = $request->tanggal;
        $status_absensi = $request->status_absen;
        $tempat_kerja = $request->tempat_kerja;
        $shift_id = $request->shift;
        $jam_masuk = $request->jam_masuk;
        $terlambat = $terlambat;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $user_id = $user->id;

        $data = [
            "tanggal" => $tanggal,
            "status_absensi" => $status_absensi,
            "tempat_kerja" => $tempat_kerja,
            "shift_id" => $shift_id,
            "jam_masuk" => $jam_masuk,
            "terlambat" => $terlambat,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "user_id" => $user_id
        ];

        $result = $this->insertAbsen($data);

        if ($result) {
            return redirect()->route('absensi-user')->with("success", "Berhasil absen masuk.");
        }else {
            return redirect()->route('absensi-user')->with("failed", "Gagal absen masuk.");
        }

    }

    // form untuk absen keluar
    public function absen_keluar($id)
    {
        $user = auth()->user();
        $absen = Absensi::where("id", $id)->where("user_id", $user->id)->first();

        if (!$absen) {
            abort(404);
        }

        $shift = Shift::all();
        return view("dashboard.user.absensi_keluar", [
            "title" => "Absensi",
            "sidebar" => "absensi",
            "shift" => $shift,
            "absen" => $absen
        ]);
    }

    private function updateAbsen($data, $id){
        $result = DB::transaction(function () use ($data, $id){
            try {

                Absensi::where("id", $id)->update($data);
                DB::commit();
                return true;

            } catch (\Throwable $th) {

                DB::rollBack();
                return false;

            }
        });

        return $result;
    }

    // proses untuk absen keluar 
    public function update_absen_keluar(Request $request, $id)
    {
        $validate = $request->validate([
            "jam_keluar" => "required"
        ]);

        $jam_keluar = $request->jam_keluar;

        $data = [
            "jam_keluar" => $jam_keluar
        ];

        $result = $this->updateAbsen($data, $id);

        if ($result) {
            return redirect()->route('absensi-user')->with("success", "Berhasil absen keluar.");
        }else {
            return redirect()->route('absensi-user')->with("failed", "Gagal absen keluar.");
        }
    }

    // detail absensi
    public function detail_absen(Request $request)
    {
        $absen = Absensi::where("id", $request->data_id)->first();
        if($absen){
            $absen->shift_id = $absen->shift->shift;
            return response()->json([
                'detail_absen' => $absen,
                'status' => true
            ]); 
        } else {
            return response()->json([
                'status' => false,
            ]); 
        }
    }

    // edit absen 
    public function edit_absensi(Request $request, $id)
    {
        $absen = Absensi::where("id", $id)->where("user_id", $request->user)->first();

        if (!$absen) {
            abort(404);
        }

        $shift = Shift::all();
        return view("dashboard.admin.edit_absensi", [
            "title" => "Edit Absensi",
            "sidebar" => "absensi",
            "shift" => $shift,
            "absen" => $absen,
            "user_id" => $request->user
        ]);
    }

    // update absen
    public function update_absensi(Request $request, $id)
    {
        $user = $request->user_id;
        $data_validate = [
            "tanggal" => ["required", "date", 
                        Rule::unique('Absensis','tanggal')->where(function ($query) use ($user, $id) {
                            return $query->where('user_id', $user)->where('id', '<>', $id);
                        })],
            "jam_masuk" => "required",
            "jam_keluar" => "required",
            "status_absen" => "required|max:255",
            "shift" => "required",
            "tempat_kerja" => "required|max:255"
        ];

        $validate = $request->validate($data_validate, $this->message);

        $shift = Shift::where("id", $request->shift)->first();
        $waktu1 = Carbon::parse($shift->jam_masuk);
        $waktu2 = Carbon::parse($request->jam_masuk);

        if ($waktu1->lessThan($waktu2)) {
            $terlambat = $waktu1->diffInMinutes($waktu2);
        } else {
            $terlambat = 0;
        }

        if ($request->status_absen == "Sakit" || $request->status_absen == "Izin"){
            $terlambat = 0;
        }

        $tanggal = $request->tanggal;
        $status_absensi = $request->status_absen;
        $tempat_kerja = $request->tempat_kerja;
        $shift_id = $request->shift;
        $jam_masuk = $request->jam_masuk;
        $jam_keluar = $request->jam_keluar;
        $terlambat = $terlambat;

        $data = [
            "tanggal" => $tanggal,
            "status_absensi" => $status_absensi,
            "tempat_kerja" => $tempat_kerja,
            "shift_id" => $shift_id,
            "jam_masuk" => $jam_masuk,
            "jam_keluar" => $jam_keluar,
            "terlambat" => $terlambat
        ];

        $result = $this->updateAbsen($data, $id);

        if ($result) {
            return redirect()->route("dashboard-admin-absensi")->with("success", "Data berhasil diubah.");
        }else{
            return redirect()->route("dashboard-admin-absensi")->with("failed", "Data gagal diubah.");
        }

    }
    
    // remove absensi
    public function remove_absensi($id)
    {
        $absensi = Absensi::where("id", $id)->first();
        if($absensi){
            $absensi->delete();
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

    
}

