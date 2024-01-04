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

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/api/product');
        }
        return back()->with('loginError', 'Login Gagal!');
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string',
        // ]);

        // $credentials = request(['email', 'password']);

        // if (!Auth::attempt($credentials)) {
        //     return response()->json(['message' => 'Invalid credentials'], 401);
        // }

        // $user = $request->user();
        // $token = $user->createToken('Personal Access Token')->accessToken;
        // $request->session()->regenerate();
        // return redirect('api/product');
        // Jika login berhasil, kirimkan token dan redirect ke halaman home
        // if(auth()) {
        //     dd($request);
        //     return response()->json(['token' => $user, 'redirect' => 'api/product'], 200);
        //     return redirect('/api/product');
        // }
        // return Redirect::to('/api/product');
    }
    
    public function logout(Request $request)
    {
        // $request->user()->token()->revoke();
        Auth::logout();

        // return response()->json([
        //     'message' => 'Successfully logged out',
            
        //     // 'redirect' => '/login', 
        //     // Redirect ke halaman login
        // ]);
        return Redirect::to('/api/login');
    }

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
