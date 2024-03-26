<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'page' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);

        // $validate['password'] = bcrypt($validate['password']);
        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        // $request->session()->flash('success', 'Registrasi Berhasil, Silahkan Login.');
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login.');
    }

}
