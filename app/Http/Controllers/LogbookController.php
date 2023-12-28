<?php

namespace App\Http\Controllers;

use App\Models\Logbook_notes;
use App\Models\User;
use App\Models\Tanggal_pembuatan_logbook;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class LogbookController extends Controller
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

    // logbook user
    public function view_logbook_user(Request $request)
    {

        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year; 

        $user = auth()->user();
        $logbook = Tanggal_pembuatan_logbook::orderBy("tanggal_dibuat", "desc")
                    ->search_logbook([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->paginate(14)->withQueryString(request("bulan"), request("tahun"));

        return view("dashboard.user.logbook", [
            "title" => "Logbook",
            "sidebar" => "logbook",
            "user" => $user,
            "logbook" => $logbook,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "bulan" => $this->bulan,
            "search" => $search
        ]);
    }

    // logbook admin
    public function view_logbook_admin(Request $request)
    {

        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year;  

        $user = auth()->user();
        $logbook = Tanggal_pembuatan_logbook::orderBy("tanggal_dibuat", "desc")
                    ->search_logbook([
                        "bulan" => $bulan,
                        "tahun" => $tahun
                    ])->paginate(14)->withQueryString(request("bulan"), request("tahun"));

        return view("dashboard.admin.logbook", [
            "title" => "Logbook",
            "sidebar" => "logbook",
            "user" => $user,
            "logbook" => $logbook,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "bulan" => $this->bulan,
            "search" => $search
        ]);
    }

    // logbook pimpinan
    public function view_logbook_pimpinan(Request $request)
    {

        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year;  

        $user = auth()->user();
        $logbook = Tanggal_pembuatan_logbook::orderBy("tanggal_dibuat", "desc")
                    ->search_logbook([
                        "bulan" => $bulan,
                        "tahun" => $tahun
                    ])->paginate(14)->withQueryString(request("bulan"), request("tahun"));

        return view("dashboard.pimpinan.logbook", [
            "title" => "Logbook",
            "sidebar" => "logbook",
            "user" => $user,
            "logbook" => $logbook,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "bulan" => $this->bulan,
            "search" => $search
        ]);
    }

    // fungsi memasukan data ke databse 
    private function insert_logbook($data_tanggal, $data_logbook){
        $result = DB::transaction(function () use ($data_tanggal, $data_logbook){
            try {

                $id_tanggal = Tanggal_pembuatan_logbook::create($data_tanggal);

                $data = [];
                foreach ($data_logbook as $row) {
                    $data[] = [
                        "item_kerja" => $row["item_kerja"],
                        "deskripsi" => $row["deskripsi"],
                        "logbook_dibuat_id" => $id_tanggal->id
                    ];
                }

                Logbook_notes::insert($data);
                DB::commit();
                return true;

            } catch (\Throwable $th) {

                DB::rollBack();
                return false;

            }
        });
        return $result;
    }
    
    // form tambah logbook 
    public function create_logbook()
    {
        return view("dashboard.user.add_logbook", [
            "title" => "Logbook",
            "sidebar" => "logbook"
        ]);
    }

    // pesan error input tambah logbook 
    private $message_create = [
        // tanggal
        "tanggal.required" => "Kolom Tanggal tidak boleh kosong.",
        "tanggal.date" => "Hanya mendukung format 'TANGGAL'.",
        "tanggal.unique" => "Data sudah terdaftar",

        // item kerja
        "item_kerja.*.required" => "Kolom Item kerja tidak boleh kosong.",
        "item_kerja.*.max" => "Karakter yang anda masukan terlalu banyak.",

        // deskripsi
        "deskripsi.*.required" => "Kolom Deskripsi tidak boleh kosong." 
    ];

    // untuk memasukan data ke database
    public function store_logbook(Request $request)
    {
        $user = auth()->user();
        $validate = $request->validate([
            "tanggal" => [
                "required", "date",
                Rule::unique('Tanggal_pembuatan_logbooks','tanggal_dibuat')->where(function ($query) use ($user) {
                    return $query->where('user_id', $user->id);
                }),
            ],
            "index.*" => "required",
            "item_kerja.*" => "required|max:255",
            "deskripsi.*" => "required"
        ], $this->message_create);

        $tanggal = $request->tanggal;
        $user_id = $user->id;

        $data_tanggal = [
            "tanggal_dibuat" => $request->tanggal,
            "user_id" => $user_id
        ];

        $item_kerja = $request->item_kerja;
        $deskripsi = $request->deskripsi;

        $data_logbook = [];
        for ($i=0; $i < count($request->index) ; $i++) { 
            $data_logbook[] = [
                "item_kerja" => $item_kerja[$i],
                "deskripsi" => $deskripsi[$i]
            ];
        }

        $result = $this->insert_logbook($data_tanggal, $data_logbook);

        if ($result) {
            return redirect()->route("logbook-user")->with("success", "Data berhasil ditambahkan.");
        }else{
            return redirect()->route("logbook-user")->with("failed", "Data gagal ditambahkan.");
        }
    }

    // untuk update 
    private function updateLogbook($data, $id){
        $result = DB::transaction(function () use ($data, $id){
            try {

                // tanggal
                Tanggal_pembuatan_logbook::where("id", $id)->update($data["tanggal"]);
               
                // update
                if ($data["update"]) {
                    if (count($data["update"]) === 0) {
                        throw new Exception("Tidak ada data untuk dimasukkan ke dalam database.");
                    }
                    foreach ($data["update"] as $row) {
                        Logbook_notes::where("logbook_dibuat_id", $id)->where("id", $row["id"])->update([
                            "item_kerja" => $row["item_kerja"],
                            "deskripsi" => $row["deskripsi"]
                        ]);
                    }
                }

                // new
                if ($data["new"]) {
                    if (count($data["new"]) === 0) {
                        throw new Exception("Tidak ada data untuk dimasukkan ke dalam database.");
                    }
                    Logbook_notes::insert($data["new"]);
                }

                // remove
                if ($data["remove"]) {
                    if (count($data["remove"]) === 0) {
                        throw new Exception("Tidak ada data untuk dimasukkan ke dalam database.");
                    }
                    Logbook_notes::where("logbook_dibuat_id", $id)->where("id", $data["remove"])->delete();
                }

                DB::commit();
                return true;

            } catch (\Throwable $th) {

                DB::rollBack();
                return false;

            }
        });
        return $result;
    }

    // form edit (user)
    public function edit_logbook_user(Request $request, $id)
    {
        $user = auth()->user();
        $logbook = Tanggal_pembuatan_logbook::where("id", $id)->where("user_id", $user->id)->first();

        if(!$logbook){
            abort(404);
        }

        return view("dashboard.user.edit_logbook", [
            "title" => "Edit Logbook",
            "logbook" => $logbook
        ]);
    }


    // update proses (user)
    public function update_logbook_user(Request $request, $id)
    {

        $user = auth()->user();
        $logbook = Tanggal_pembuatan_logbook::where("id", $id)->where("user_id", $user->id)->first();

        if(!$logbook){
            abort(404);
        }

        $message_update = $this->message_create;
        $message_update["new_item_kerja.*.required"] = "Kolom Item kerja tidak boleh kosong.";
        $message_update["new_item_kerja.*.max"] = "Karakter yang anda masukan terlalu banyak.";
        $message_update["new_deskripsi.*.required"] = "Kolom Deskripsi tidak boleh kosong.";


        $data_validate = [
            "tanggal" => [
                "required", "date",
                Rule::unique('Tanggal_pembuatan_logbooks','tanggal_dibuat')->where(function ($query) use ($user, $id) {
                    return $query->where('user_id', $user->id)->where('id', '<>', $id);
                }),
            ],
            "item_kerja.*" => "required|max:255",
            "deskripsi.*" => "required",
        ];

        if ($request->new_index) {
            $data_validate["new_index.*"] = "required";
            $data_validate["new_item_kerja.*"] = "required|max:255";
            $data_validate["new_deskripsi.*"] = "required";
        }

        if ($request->remove_logbook_id) {
            $data_validate["remove_logbook_id"] = "required";
        }

        $validate = $request->validate($data_validate, $message_update);

        $tanggal = [
            "tanggal_dibuat" => $request->tanggal
        ];

        $remove_notes = [];
        if ($request->remove_logbook_id) {
            foreach ($request->remove_logbook_id as $row) {
                if (Logbook_notes::where("id", $row)->where("logbook_dibuat_id", $id)->first()) {
                    $remove_notes[] = $row;
                }
            }
        }

        $new_notes = [];
        if ($request->new_index) {
            for ($i=0; $i < count($request->new_index); $i++) { 
                $new_notes[] = [
                    "item_kerja" => $request->new_item_kerja[$i],
                    "deskripsi" => $request->new_deskripsi[$i],
                    "logbook_dibuat_id" => $id
                ];
            }
        }

        $update_notes = [];
        if ($request->update_logbook_id) {
            $id_update = $request->update_logbook_id;
            for ($i=0; $i < count($id_update); $i++) { 
                if (Logbook_notes::where("id", $id_update[$i])->where("logbook_dibuat_id", $id)->first()) {
                    $update_notes[] = [
                        "id" => $id_update[$i],
                        "item_kerja" => $request->item_kerja[$i],
                        "deskripsi" => $request->deskripsi[$i]                    
                    ];
                }
            }
        }

        $all_data = [
            'tanggal' => $tanggal,
            'remove' => $remove_notes,
            'new' => $new_notes,
            'update' => $update_notes
        ];

        $result = $this->updateLogbook($all_data, $id);

        if ($result) {
            return redirect()->route("logbook-user")->with("success", "Data berhasil diubah.");
        }else{
            return redirect()->route("logbook-user")->with("failed", "Data gagal diubah.");
        }

    }

    // form edit (admin)
    public function edit_logbook_admin(Request $request, $id)
    {
        $user = $request->user;
        $logbook = Tanggal_pembuatan_logbook::where("id", $id)->where("user_id", $user)->first();

        if(!$logbook){
            abort(404);
        }

        return view("dashboard.admin.edit_logbook", [
            "title" => "Edit Logbook",
            "logbook" => $logbook,
            "user_id" => $user
        ]);
    }

    // update proses (admin)
    public function update_logbook_admin(Request $request, $id)
    {
        
        $user = $request->user_id;
        $logbook = Tanggal_pembuatan_logbook::where("id", $id)->where("user_id", $user)->first();

        if(!$logbook){
            abort(404);
        }


        $message_update = $this->message_create;
        $message_update["new_item_kerja.*.required"] = "Kolom Item kerja tidak boleh kosong.";
        $message_update["new_item_kerja.*.max"] = "Karakter yang anda masukan terlalu banyak.";
        $message_update["new_deskripsi.*.required"] = "Kolom Deskripsi tidak boleh kosong.";


        $data_validate = [
            "tanggal" => [
                "required", "date",
                Rule::unique('Tanggal_pembuatan_logbooks','tanggal_dibuat')->where(function ($query) use ($user, $id) {
                    return $query->where('user_id', $user)->where('id', '<>', $id);
                }),
            ],
            "item_kerja.*" => "required|max:255",
            "deskripsi.*" => "required",
        ];

        if ($request->new_index) {
            $data_validate["new_index.*"] = "required";
            $data_validate["new_item_kerja.*"] = "required|max:255";
            $data_validate["new_deskripsi.*"] = "required";
        }

        if ($request->remove_logbook_id) {
            $data_validate["remove_logbook_id"] = "required";
        }

        $validate = $request->validate($data_validate, $message_update);

        $tanggal = [
            "tanggal_dibuat" => $request->tanggal
        ];

        $remove_notes = [];
        if ($request->remove_logbook_id) {
            foreach ($request->remove_logbook_id as $row) {
                if (Logbook_notes::where("id", $row)->where("logbook_dibuat_id", $id)->first()) {
                    $remove_notes[] = $row;
                }
            }
        }

        $new_notes = [];
        if ($request->new_index) {
            for ($i=0; $i < count($request->new_index); $i++) { 
                $new_notes[] = [
                    "item_kerja" => $request->new_item_kerja[$i],
                    "deskripsi" => $request->new_deskripsi[$i],
                    "logbook_dibuat_id" => $id
                ];
            }
        }

        $update_notes = [];
        if ($request->update_logbook_id) {
            $id_update = $request->update_logbook_id;
            for ($i=0; $i < count($id_update); $i++) { 
                if (Logbook_notes::where("id", $id_update[$i])->where("logbook_dibuat_id", $id)->first()) {
                    $update_notes[] = [
                        "id" => $id_update[$i],
                        "item_kerja" => $request->item_kerja[$i],
                        "deskripsi" => $request->deskripsi[$i]                    
                    ];
                }
            }
        }

        $all_data = [
            'tanggal' => $tanggal,
            'remove' => $remove_notes,
            'new' => $new_notes,
            'update' => $update_notes
        ];

        $result = $this->updateLogbook($all_data, $id);

        if ($result) {
            return redirect()->route("dashboard-admin-logbook")->with("success", "Data berhasil diubah.");
        }else{
            return redirect()->route("dashboard-admin-logbook")->with("failed", "Data gagal diubah.");
        }

    }
     
    // hapus logbook 
    public function remove_logbook($id)
    {
        $logbook = Tanggal_pembuatan_logbook::where("id", $id)->first();
        if($logbook){
            $logbook->delete();
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

    // menampilkan rangkuman logbook karyawan
    public function worklog(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year;  

        $logbook = Tanggal_pembuatan_logbook::orderBy("tanggal_dibuat", "asc")
                    ->search_logbook([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->get();

        return view("dashboard.admin.worklog", [
            "title" => "Laporan",
            "sidebar" => "laporan",
            "user" => $user,
            "logbook" => $logbook,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "months" => $this->bulan,
            "search" => $search
        ]);

    }

    // download pdf 
    public function download_pdf(Request $request ,$id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        $search = $request->search ?? "";

        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year;  

        $logbook = Tanggal_pembuatan_logbook::orderBy("tanggal_dibuat", "asc")
                    ->search_logbook([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->get();
        
        $data = [
            "title" => "Laporan",
            "sidebar" => "laporan",
            "user" => $user,
            "logbook" => $logbook,
            "inp_bulan" => $bulan,
            "inp_tahun" => $tahun,
            "months" => $this->bulan,
            "search" => $search
        ];

        $pdf = FacadePdf::loadView("dashboard.admin.pdf", $data);
        $pdf->setPaper("A4", "potrait");
        return $pdf->stream("laporan-pekerjaan.pdf");
    }

}
