<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Divisi;
use App\Models\Tanggal_pembuatan_logbook;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // dashboard user
    public function dashboard_user(Request $request)
    {
        $now_month = Carbon::now()->format('m');
        $now_year = Carbon::now()->format('Y');

        $bulan = $request->bulan ?? $now_month;
        $tahun = $request->tahun ?? $now_year;

        $search = $request->search ?? "";

        $user = auth()->user();
        $absensi = Absensi::orderBy("tanggal", "desc")->where("status_absensi", "like", "%" . $search . "%")
                    ->search_absensi([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->paginate(7);

        $logbook = Tanggal_pembuatan_logbook::orderBy("tanggal_dibuat", "desc")
                    ->search_logbook([
                        "bulan" => $bulan,
                        "tahun" => $tahun,
                        "user_id" => $user->id
                    ])->paginate(7);

        return view("dashboard.user.dashboard", [
            "title" => "Dashboard",
            "sidebar" => "dashboard",
            "user" => $user,
            "absensi" => $absensi,
            "logbook" => $logbook,
            "search" => $search
        ]);
    }

    // dashboard admin 
    public function dashboard_admin(Request $request)
    {
        $user = auth()->user();
        $search = $request->search ?? "";

        $user_active = User::where("status", 1)->get();

        $user_non_active = User::where("status", 0)->get();
        $divisi = Divisi::all();

        return view("dashboard.admin.dashboard", [
            "title" => "Dashboard",
            "sidebar" => 'dashboard',
            "user" => $user,
            "divisi" => $divisi,
            "active" => $user_active,
            "non_active" => $user_non_active,
            "search" => $search
        ]);
    }

    // dashboard pimpinan
    public function dashboard_pimpinan()
    {

        $user = auth()->user();
        // $user_ranking = User::WithCount('absensi')->whereHas('absensi', function ($query){
        //     $query->where('terlambat', 0)->where("status_absensi", "Hadir");
        // })->orderBy('absensi_count', 'desc')->paginate(5);

        // $ranking = [];
        // foreach ($user_ranking as $index => $row) {
        //     $ranking[] = [
        //         "nama" => $row->nama,
        //         "ranking" => $index + 1
        //     ]; 
        // }

        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');

        $user_ranking = User::all();
        $ranking = [];
        foreach($user_ranking as $row){
            
            if($row->divisi_id == 1 || $row->divisi_id == 2){
                continue;
            }

            $absensi = Absensi::where("user_id", $row->id)->where("status_absensi", "Hadir")->where("terlambat", 0)
            ->search_absensi([
                "bulan" => $bulan,
                "tahun" => $tahun])->count();

            $ranking[] = [
                "ranking" => $absensi,
                "nama" => $row->nama
            ];
        }

        rsort($ranking);
        
        return view("dashboard.pimpinan.dashboard", [
            "title" => "Dashboard",
            "sidebar" => "dashboard",
            "user" => $user,
            "user_ranking" => array_slice($ranking, 0, 5)
        ]);
    }

    // other 
    public function other()
    {
        $user = auth()->user();
        return view("dashboard.admin.other", [
            "title" => "Other",
            "sidebar" => "other",
            "user" => $user
        ]);
    }

}
