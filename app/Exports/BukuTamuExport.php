<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Buku_tamu;
use Illuminate\Support\Facades\DB;

class BukuTamuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_buku_tamu = DB::table('buku_tamu') 
        ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
        ->select('buku_tamu.*','tamu.name AS tam','jabatan.nama AS jab')->get();
    return $ar_buku_tamu;
    }

    public function headings(): array
    {
        return [
            'Nama', 'Jabatan', 'Tanggal dan Waktu', 'Keperluan'
        ];
    }
}
