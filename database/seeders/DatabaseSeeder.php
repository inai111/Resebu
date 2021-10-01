<?php

namespace Database\Seeders;

use App\Models\Resep;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'nama' => 'Admin nur Admin',
            'email'=> Str::random(10).'@gm.co',
            'alamat' => Str::random(15),
            'nomer' => 8080,
            'password' => Hash::make(12341234),
            'level' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori'=>'Artikel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori'=>'Video',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        
        User::factory(5)->create();
        Resep::factory(100)->create();

    }
}
