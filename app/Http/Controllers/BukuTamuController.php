<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Buku_tamu;
use App\Models\Tamu;
use App\Models\Jabatan;
use PDF;
use App\Exports\BukuTamuExport;
use Maatwebsite\Excel\Facades\Excel;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Tampilkan seluruh data  mahasnatri
        $ar_buku_tamu = DB::table('buku_tamu') 
        ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
        ->select('buku_tamu.*','tamu.name AS tam','jabatan.nama AS jab')->get();
    return view('buku_tamu.index',compact('ar_buku_tamu'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input buku tamu
        return view('buku_tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // proses input data pada form buku
         DB::table('buku_tamu')->insert([
            'tgl_bertemu' => $request->tgl_bertemu,
            'tamu_id' => $request->tamu_id,
            'jabatan_id' => $request->jabatan_id,
            'keperluan' => $request->keperluan
        ]);
        return redirect('/buku_tamu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku_tamu
        $ar_buku_tamu = DB::table('buku_tamu')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->select('buku_tamu.*', 'jabatan.nama AS jab', 'tamu.name AS tam')
            ->where('buku_tamu.id', '=', $id)->get();
        return view('buku_tamu.show',compact('ar_buku_tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku_tamu
        $data = DB::table('buku_tamu')
            ->where('id','=',$id)->get();
        return view('buku_tamu.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //proses edit data lama, dari form edit buku
        DB::table('buku_tamu')->where('id','=',$id)->update([
            'tgl_bertemu' => $request->tgl_bertemu,
            'tamu_id' => $request->tamu_id,
            'jabatan_id' => $request->jabatan_id,
            'keperluan' => $request->keperluan
        ]);
    return redirect('/buku_tamu');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('buku_tamu')->where('id',$id)->delete();
        return redirect('/buku_tamu');
    }

    public function buku_tamuPDF()
    {
        // tampilkan seluruh data Buku
        $ar_buku_tamu = DB::table('buku_tamu') 
        ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
        ->select('buku_tamu.*','tamu.name AS tam','jabatan.nama AS jab')->get();
        $pdf = PDF::loadView('buku_tamu/buku_tamuPDF',['ar_buku_tamu'=>$ar_buku_tamu]); 
    return $pdf->download('dataBuku.pdf');

    }

    public function buku_tamucsv()
    {
    return Excel::download(new BukuTamuExport, 'buku_tamu.csv');
    }
}