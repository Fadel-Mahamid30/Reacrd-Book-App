<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shift::create([
            "shift" => "Shift 1",
            "jam_masuk" => "08:00",
            "jam_keluar" => "17:00"
        ]);

        Shift::create([
            "shift" => "Shift 2",
            "jam_masuk" => "12:00",
            "jam_keluar" => "20:00"
        ]);

        Shift::create([
            "shift" => "Shift 3",
            "jam_masuk" => "15:00",
            "jam_keluar" => "24:00"
        ]);
    }
}
