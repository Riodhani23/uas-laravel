<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Buku_tamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_tamu')->insert([
            [
                'tgl_bertemu' => '2022-01-01 00:00:00',
                'tamu_id' => 1,
                'jabatan_id' => 1,
                'keperluan' => 'meminjam buku',
            ],
            [
                'tgl_bertemu' => '2022-01-01 00:00:00',
                'tamu_id' => 2,
                'jabatan_id' => 2,
                'keperluan' => 'membeli buku',
            ]
        ]);
    }
}
