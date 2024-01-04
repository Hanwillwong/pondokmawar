<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.register', [
            "tittle" => "Register"
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
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name'=>'required|max:255',
    //         'email'=>'email:dns|unique:users',
    //         'password'=>'required|min:5|max:255'
    //     ]);
    //     $validatedData['password'] = Hash::make($validatedData['password']);
    //     User::create($validatedData);
    //     return redirect('/login')->with('sukses','Registrasi Berhasil, Silahkan Login !');
    // }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        return redirect('/api/login');
        // return response()->json(['token' => $token], 201);
        // return response()->json(['token' => $token, 'redirect' => '/home'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
