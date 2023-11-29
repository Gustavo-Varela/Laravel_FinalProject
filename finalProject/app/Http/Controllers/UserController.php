<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login() {
        return view('general.login');
    }

    public function addUser() {
        return view('auth.register');
    }

    public function storeUser(Request $request){

            $request->validate([
                'email' => 'required|unique:users|email',
                'name' => 'string|max:50',
                'password' => 'min:6'
            ]);

            User::insert([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);

        return redirect()->route('viewBands');
    }
}
