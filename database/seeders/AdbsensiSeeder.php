<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Absensi;
use Carbon\Carbon;

class AdbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	  $user = [
            "user01@gmail.com",
            "user02@gmail.com",
            "user03@gmail.com",
            "user04@gmail.com",
            "user05@gmail.com",
            "user06@gmail.com",
            "user07@gmail.com",
        ];

        foreach($user as $row){
            $user_absensi = User::where("email", $row)->first();

            $absensi = [
                [
                    "tanggal" => Carbon::parse("01-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ],
                [
                    "tanggal" => Carbon::parse("02-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ],
                [
                    "tanggal" => Carbon::parse("03-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ],
                [
                    "tanggal" => Carbon::parse("04-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ],
                [
                    "tanggal" => Carbon::parse("05-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ],
                [
                    "tanggal" => Carbon::parse("06-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ],
                [
                    "tanggal" => Carbon::parse("07-07-2023"),
                    "status_absensi" => "Hadir",
                    "tempat_kerja" => "Kantor",
                    "shift_id" => "1",
                    "jam_masuk" => "08:00",
                    "jam_keluar" => "17:00",
                    "terlambat" => 0,
                    "latitude" => "-6.3541914",
                    "longitude" => "106.8385086",
                    "user_id" => $user_absensi->id
                ]
            ];

            Absensi::insert($absensi);
        }

        // DB::table("absensis")->update([
        //     "jam_masuk" => "08:00",
        //     "jam_keluar" => "17:00",
        // ]);
    }
}
