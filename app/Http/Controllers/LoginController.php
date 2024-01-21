<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.login', [
            "tittle" => "Login"
       ]);
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba melakukan otentikasi
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, buat personal access token
            $token = $request->user()->createToken('personal-access-token');

            return response()->json([
                'success' => true,
                'token' => $token->plainTextToken,
            ]);
        } else {
            // Jika otentikasi gagal, kirim pesan kesalahan
            return response()->json([
                'success' => false,
                'error' => 'Email atau Password salah',
            ], 401);
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('/login');
    }

    // public function logout(Request $request)
    // {
    //     $request->user()->tokens()->delete();

    //     return response()->json(['message' => 'Logged out successfully']);
    // }
        
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         $token = $user->createToken('your-client-name')->accessToken;

    //         return response()->json(['token' => $token, 'user' => $user]);
    //     } else {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }

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
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login $login)
    {
        //
    }
}
