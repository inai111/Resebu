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
            'email'=> 'admin@gm.co',
            'alamat' => Str::random(15),
            'nomer' => 8080,
            'password' => Hash::make('password'),
            'level' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori'=>'Makanan Sehat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori'=>'Makanan Ringan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori'=>'Makanan Berat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        
        User::factory(5)->create();
        Resep::factory(100)->create();

    }
}
