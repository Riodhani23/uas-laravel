<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_jabatan = DB::table('jabatan')->get();
        return view('jabatan.index', compact('ar_jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input
        return view('jabatan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses input data pada form buku
        DB::table('jabatan')->insert([
            'nama' => $request->nama,
        ]);
        return redirect('/jabatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan Detail Jabatan
        $ar_jabatan = DB::table('jabatan')
         ->where('jabatan.id', '=', $id)->get();
        return view('jabatan.show',compact('ar_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke form edit buku
        $data = DB::table('jabatan')->where('id','=',$id)
        ->get();
        return view('jabatan.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, dari form edit jabatan
        DB::table('jabatan')->where('id','=',$id)->update([
            'nama'=>$request->nama,
        ]
    );
    return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('jabatan')->where('id',$id)->delete();
        return redirect('/jabatan');
    }
}
