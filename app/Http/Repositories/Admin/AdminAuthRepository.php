<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminAuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthRepository implements AdminAuthInterface
{
    public function loginPage()
    {
        return view('Admin.auth.login');
    }

    public function login($request)
    {
        $data = $request->only(['email','password']);
        if (Auth::attempt($data)){
            return redirect(route('admin.index'));
        }
        Alert::error('Error','You Are Not Allowed!');
        return redirect()->back();
    }

    public function logout($request)
    {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.loginPage'));
    }

}
