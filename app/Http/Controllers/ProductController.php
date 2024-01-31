<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\satuan;
use App\Models\RiwayatHarga;
use Illuminate\Http\Request;
use App\Events\HargaProdukUpdated;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->query('search'); // Ambil nilai pencarian dari query string

        // Lakukan proses pencarian sesuai kebutuhan
        $products = DB::table('product')
        ->leftJoin('satuan', 'product.satuanid', '=', 'satuan.id')
        ->select('product.*', 'satuan.nama as nama_satuan')
        ->when($search, function ($query, $search) {
            return $query->where('nama_barang', 'like', '%' . $search . '%')
                        ->orwhere('supplier', 'like', '%' . $search . '%')
                        ->orwhere('merk', 'like', '%' . $search . '%');
        })->get();
        
        return response()->json([
            'data' => $products,
            'message' => 'Data produk berhasil diambil',
        ]);
    }


    public function viewindex(Request $request)
    {
            $search = $request->query('search'); // Ambil nilai pencarian dari query string

            // Lakukan proses pencarian sesuai kebutuhan

            $products = DB::table('product')
                ->leftJoin('satuan', 'product.satuanid', '=', 'satuan.id')
                ->select('product.*', 'satuan.nama as nama_satuan')
                ->when($search, function ($query, $search) {
                    // Jika ada pencarian, tambahkan kondisi pencarian ke query
                    return $query->where('product.nama_barang', 'LIKE', '%' . $search . '%');
                })
                ->get();

            return view('pages.product', [
                "products" => $products
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.createproduct',[
            'product' => Product::all(),
            'satuan' => satuan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'satuanid' => 'required',
            'supplier' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);

        // Membuat data produk baru
        $product = Product::create($validatedData);

        event(new HargaProdukUpdated($product));

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Data berhasil dibuat!',
                'data' => $product,
            ]);
        }
        return redirect('/product')->with('success', 'Data berhasil dibuat!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return abort(404);
        }

        $riwayatHarga = $product->riwayatHarga()
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($riwayat) {
                $riwayat->formatted_created_at = \Carbon\Carbon::parse($riwayat->created_at)->format('j F y');
                return $riwayat;
            });

        return response()->json([
            'data' => [
                'product' => $product,
                'riwayatHarga' => $riwayatHarga,
            ],
            'message' => 'Data riwayat harga berhasil diambil',
        ]);
    }


    public function viewshow($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return abort(404);
        }

        $riwayatHarga = $product->riwayatHarga()
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($riwayat) {
            $riwayat->formatted_created_at = \Carbon\Carbon::parse($riwayat->created_at)->format('j F y'); // Sesuaikan format sesuai keinginan Anda
            return $riwayat;
        });


        $harga_jual = [];
        foreach ($riwayatHarga as $riwayat) {
            $harga_jual[] = $riwayat->harga_jual;
        }

        $harga_beli = [];
        foreach ($riwayatHarga as $riwayat) {
            $harga_beli[] = $riwayat->harga_beli;
        }

        $tanggal = [];
        foreach ($riwayatHarga as $riwayat) {
            $formattedDate = \Carbon\Carbon::parse($riwayat->created_at)->format('j F y'); // Ubah format sesuai keinginan Anda
            $tanggal[] = $formattedDate;
        }

        return view('pages.riwayatharga', compact('product', 'riwayatHarga', 'harga_jual','harga_beli','tanggal'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,$id)
    {
        $product = Product::find($id);
        $satuan = satuan::all();
        return view('pages.editproduct', compact('product','satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'satuanid' => 'required',
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

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Data berhasil diubah!',
                'data' => $product,
            ]);
        }

       return redirect('/product')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);   
        $product->delete();
    
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Data berhasil dihapus!',
            ]);
        }
        return redirect('/product')->with('success','Data Berhasil Dihapus!');
    }

}
