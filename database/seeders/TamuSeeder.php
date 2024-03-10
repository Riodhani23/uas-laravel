<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tamu')->insert([
            'name' => 'Adam',
            'gender' => 'Laki-laki',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya Cimanggis Depok',
        ]);
    }
}
