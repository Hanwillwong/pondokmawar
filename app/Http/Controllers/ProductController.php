<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\RiwayatHarga;
use Illuminate\Http\Request;
use App\Events\HargaProdukUpdated;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // protected $middleware = ['admin', 'owner'];

    public function index()
    {
        // if(!Auth::check()){
        //     return redirect('api/login');
        // }
        // $this->authorize('admin');
        return view('pages.product',[
            "product" => Product::all()

        ]);
        // $product = Http::get('http://localhost:8000/api/product')->json();

        // return view('pages.product', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.createproduct',[
            'product' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'supplier' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);
        product::create($validatedData);
        return redirect('/api/product')->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $riwayatHarga = $product->riwayatHarga; // Ambil data riwayat harga untuk produk ini
    
        return view('pages.riwayatharga', compact('product', 'riwayatHarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'supplier' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric'
        ]);
        
        $product = Product::find($id); // Menemukan produk berdasarkan ID
        
        if ($product->harga_beli != $validatedData['harga_beli'] || $product->harga_jual != $validatedData['harga_jual']) {
        $product->update($validatedData);
        // Memicu event HargaProdukUpdated
        event(new HargaProdukUpdated($product));
        }else{
        $product->update($validatedData);
        }

       return redirect('/api/product')->with('success', 'Data berhasil diperbarui!');

        // Product::where('id', $id)->update($validatedData);
        // event(new \App\Events\HargaProdukUpdated($product));        
        // return redirect('/api/product')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);   
        $product->delete();
    
        return redirect('/api/product')->with('success','Data Berhasil Dihapus!');
    }

}
