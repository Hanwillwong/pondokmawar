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

    // public function index()
    // {
    //     // return view('pages.product',[
    //     //     "product" => Product::all()

    //     // ]);
    //     $products = Product::all();

    //     return response()->json([
    //         'data' => $products,
    //         'message' => 'Data produk berhasil diambil',
    //     ]);
    // }

    public function index(Request $request)
        {
            $search = $request->query('search'); // Ambil nilai pencarian dari query string

            // Lakukan proses pencarian sesuai kebutuhan
            $products = Product::when($search, function ($query) use ($search) {
                return $query->where('nama_barang', 'like', '%' . $search . '%');
            })->get();

            return response()->json([
                'data' => $products,
                'message' => 'Data produk berhasil diambil',
            ]);
        }


    public function viewindex(Request $request)
    {
        // return view('pages.product', [
        //     // "products" => product::latest()->filter()->paginate(10)
            
        // ]);
            $search = $request->query('search'); // Ambil nilai pencarian dari query string

            // Lakukan proses pencarian sesuai kebutuhan

            return view('pages.product',[
                "product" => product::filter()
            ]);
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
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'supplier' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);
    
        // Membuat data produk baru
        $product = Product::create($validatedData);
    
        // Menyebabkan event HargaProdukUpdated dijalankan dengan data produk yang baru dibuat
        event(new HargaProdukUpdated($product));
    
        // Redirect ke halaman produk dengan pesan sukses
        return redirect('/product')->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $riwayatHarga = $product->riwayatHarga()->orderBy('created_at', 'desc')->get(); // Urutkan berdasarkan created_at secara descending
        
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

       return redirect('/product')->with('success', 'Data berhasil diperbarui!');

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
    
        return redirect('/product')->with('success','Data Berhasil Dihapus!');
    }

}