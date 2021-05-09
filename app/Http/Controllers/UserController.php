<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'E-mail é obrigatório.',
            'password.required'=>'Senha é obrigatório.',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $stores = Store::get();
            return view('site.stores_view', compact('stores'));
        }
        else
        {
            return redirect()->back()->with('danger', 'E-mail ou senha invalida.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('auth/login');
    }

    public function profile()
    {
        return view('site.user_profile');
    }
}
