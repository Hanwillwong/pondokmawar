<?php

namespace App\Http\Controllers;

use App\Models\riwayatharga;
use Illuminate\Http\Request;

class RiwayathargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(riwayatharga $riwayatharga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(riwayatharga $riwayatharga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, riwayatharga $riwayatharga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $riwayatharga = riwayatharga::find($id);   
        $riwayatharga->delete();
    
        return back()->with('success','Data Berhasil Dihapus!');
    }
}
