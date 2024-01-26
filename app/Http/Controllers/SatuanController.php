<?php

namespace App\Http\Controllers;

use App\Models\satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search'); // Ambil nilai pencarian dari query string

        // Lakukan proses pencarian sesuai kebutuhan
        $satuan = satuan::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })->get();

        return response()->json([
            'data' => $satuan,
            'message' => 'Data produk berhasil diambil',
        ]);
    }

    public function viewindex(Request $request)
    {
            $search = $request->query('search'); // Ambil nilai pencarian dari query string

            // Lakukan proses pencarian sesuai kebutuhan
            return view('pages.satuan',[
                "satuan" => satuan::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.createsatuan',[
            'satuan' => satuan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:satuan,nama'
        ]);

        // Membuat data produk baru
        $satuan = satuan::create($validatedData);


        // Jika request berasal dari API (dengan header Accept: application/json), kirim respons JSON
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Data berhasil dibuat!',
                'data' => $satuan,
            ]);
        }

        // Jika request berasal dari antarmuka pengguna (UI), redirect ke '/satuan' dengan pesan
        return redirect('/satuan')->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(satuan $satuan, $id)
    {
        $satuan = satuan::find($id);
        return view('pages.editsatuan', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:satuan,nama'
        ]);
        
        $satuan = satuan::find($id); // Menemukan produk berdasarkan ID

        $satuan->update($validatedData);
        
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Data berhasil diubah!',
                'data' => $satuan,
            ]);
        }

       return redirect('/satuan')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $satuan = satuan::find($id);   
        $satuan->delete();
    
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Data berhasil dihapus!',
            ]);
        }
        return redirect('/satuan')->with('success','Data Berhasil Dihapus!');
    }
}
