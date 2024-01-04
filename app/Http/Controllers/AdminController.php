<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin',[
            "user" => user::all()
        ]);
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
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('pages.editadmin', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'user_type' => 'required'
        ]);
        
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Update informasi umum
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type'),
        ]);

        // Periksa apakah password diisi sebelum memperbarui
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);
        }

        return redirect('/api/admin')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = user::find($id);   
        $user->delete();
    
        return redirect('/api/admin')->with('success','Data Berhasil Dihapus!');
    }
}
