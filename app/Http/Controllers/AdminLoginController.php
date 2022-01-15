<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller{

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $remember_me = $request->has('remember') ? true : false;
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$remember_me)){
           return redirect(route('admin.admin-panel'));
        }
        return redirect()->back()->with('error', 'Не правильно введений логін або пароль!');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('main'));
    }

}
