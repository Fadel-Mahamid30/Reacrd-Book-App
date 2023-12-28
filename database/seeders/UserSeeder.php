<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user = User::create([
            "email" => "pimpinan@gmail.com",
            "password" => Hash::make("pimpinan12345"),
            "nama" => "Pimpinan",
            "jenis_kelamin" => "Pria",
            "tanggal_lahir" => date('Y-m-d', strtotime('-35 years')),
            "kontak" => "081530129180",
            "alamat" => "Jl. Akses UI No. 99, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat",
            "divisi_id" => 1,
            "status" => 1
        ]);

        $user->assignRole("pimpinan");

        $user = User::create([
            "email" => "admin01@gmail.com",
            "password" => Hash::make("admin12345"),
            "nama" => "Siti Nur Khofifah",
            "jenis_kelamin" => "Wanita",
            "tanggal_lahir" => date('Y-m-d', strtotime('-22 years')),
            "kontak" => "082431147080",
            "alamat" => "Jl. Cibinong Indah No. 40, Cibinong, Jawa Barat",
            "divisi_id" => 2,
            "status" => 1
        ]);

        $user->assignRole("admin");

        // user 
        $user = User::create([
            "email" => "user01@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => "Candra Adi Nugroho",
            "jenis_kelamin" => "Pria",
            "tanggal_lahir" => date('Y-m-d', strtotime('-19 years')),
            "kontak" => "085710678971",
            "alamat" => "Jl. Depok Raya No. 12, Depok, Jawa Barat",
            "divisi_id" => 3,
            "status" => 1
        ]);

        $user->assignRole("user");

        $user = User::create([
            "email" => "user02@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => "Dewi Kusuma Wardhani",
            "jenis_kelamin" => "Wanita",
            "tanggal_lahir" => date('Y-m-d', strtotime('-20 years')),
            "kontak" => "085710678962",
            "alamat" => "Jl. Cibinong Indah No. 45, Cibinong, Jawa Barat",
            "divisi_id" => 3,
            "status" => 1
        ]);

        $user->assignRole("user");

        $user = User::create([
            "email" => "user03@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => "Eko Putra Santoso",
            "jenis_kelamin" => "Pria",
            "tanggal_lahir" => date('Y-m-d', strtotime('-20 years')),
            "kontak" => "085710678953",
            "alamat" => "Jl. Bogor Kota No. 78, Bogor Kota, Jawa Barat",
            "divisi_id" => 4,
            "status" => 1
        ]);

        $user->assignRole("user");

        $user = User::create([
            "email" => "user04@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => "Citra Fitriani Wijayanti",
            "jenis_kelamin" => "Wanita",
            "tanggal_lahir" => date('Y-m-d', strtotime('-21 years')),
            "kontak" => "085710678944",
            "alamat" => "Jl. Depok Jaya No. 32, Depok, Jawa Barat",
            "divisi_id" => 4,
            "status" => 1
        ]);

        $user->assignRole("user");

        $user = User::create([
            "email" => "user05@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => " Fajar Ardhana Nugroho",
            "jenis_kelamin" => "Pria",
            "tanggal_lahir" => date('Y-m-d', strtotime('-19 years')),
            "kontak" => "085710678935",
            "alamat" => "Jl. Cibinong Permai No. 65, Cibinong, Jawa Barat",
            "divisi_id" => 4,
            "status" => 1
        ]);

        $user->assignRole("user");

        $user = User::create([
            "email" => "user06@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => "Anindita Dewi Maharani",
            "jenis_kelamin" => "Wanita",
            "tanggal_lahir" => date('Y-m-d', strtotime('-22 years')),
            "kontak" => "085710678926",
            "alamat" => "Jl. Bogor Kota No. 98, Bogor Kota, Jawa Barat",
            "divisi_id" => 5,
            "status" => 1
        ]);

        $user->assignRole("user");

        $user = User::create([
            "email" => "user07@gmail.com",
            "password" => Hash::make("user12345"),
            "nama" => "Gilang Kusumo Putra",
            "jenis_kelamin" => "Pria",
            "tanggal_lahir" => date('Y-m-d', strtotime('-23 years')),
            "kontak" => "085710678917",
            "alamat" => " Jl. Depok No. 13, Depok, Jawa Barat",
            "divisi_id" => 5,
            "status" => 1
        ]);

        $user->assignRole("user");
        
    }

    
}
