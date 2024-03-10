<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_tamu = DB::table('tamu')->get();
        // Arahkan ke data Pegawai
        return view('tamu.index', compact('ar_tamu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input
        return view('tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses input data pada form buku
        DB::table('tamu')->insert(
        [
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
        ]
    );
    return redirect('/tamu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan Detail Tamu
        $ar_tamu = DB::table('tamu')
         ->where('tamu.id', '=', $id)->get();
        return view('tamu.show',compact('ar_tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke form edit buku
        $data = DB::table('tamu')->where('id','=',$id)
        ->get();
        return view('tamu.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, dari form edit tamu
        DB::table('tamu')->where('id','=',$id)->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
        ]
    );
    return redirect('/tamu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('tamu')->where('id',$id)->delete();
        return redirect('/tamu');
    }
}
