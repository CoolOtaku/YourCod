<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function edit(Request $request){
        $user = User::find($request->id);
        $request->validate([
            'name'=>'required'
        ]);
        $user->name = $request->name;
        if($user->email!=$request->email){
            $request->validate([
                'email'=>'required|email|unique:users'
            ]);
            $user->email = $request->email;
        }

        if($user->avatar!=null&&$request->hasFile('avatar')){
            Storage::delete($user->avatar);
        }
        if($request->hasFile('avatar')) {
            $request->validate([
                "avatar"=>"nullable|image"
            ]);
            $avatar = $request->file('avatar')->store("avatars");
            $user->avatar = $avatar;
        }

        if($request->password){
            $request->validate([
                'password'=>'required|confirmed'
            ]);
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->save();

        session()->flash('success',"Успішно оновлено дані адміністратора: \"$request->name\"!");
        return redirect(route("admin.admins"));
    }

    public function delete(Request $request){
        $user = DB::table('users')->where('id', $request->id)->first();
        if($user->avatar){
            Storage::delete($user->avatar);
        }
        DB::table('users')->where('id', $request->id)->delete();

        session()->flash('success',"Успішно видалено адміністратора під id: \"$request->id\" !");
        return redirect(route('admin.admins'));
    }
}
