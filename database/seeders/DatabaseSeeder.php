<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            "name" => "pimpinan",
            "guard_name" => "web"
        ]);

        Role::create([
            "name" => "admin",
            "guard_name" => "web"
        ]);

        Role::create([
            "name" => "user",
            "guard_name" => "web"
        ]);

        Divisi::create([
            "divisi" => "Pimpinan"
        ]);

        Divisi::create([
            "divisi" => "Admin"
        ]);

        Divisi::create([
            "divisi" => "SDM IT"
        ]);

        Divisi::create([
            "divisi" => "Akademik"
        ]);

        Divisi::create([
            "divisi" => "Marketing"
        ]);
    }
}
