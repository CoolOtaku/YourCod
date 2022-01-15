<?php

namespace App\Http\Controllers;

use App\Mail\OrdersMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProdController extends Controller
{
    public function save(Request $request){
        $request->validate([
            "img"=>"nullable|image",
            "name" => "required",
            "price" => "required",
            "category" => "required",
            "description" => "nullable"
        ]);

        if($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("prod/{$folder}");
        }

        $data=array("name"=>$request->name,"price"=>$request->price,"category"=>$request->category);
        if($request->img) {
            $data = Arr::prepend($data, $img, 'img');
        }
        if($request->description){
            $data = Arr::prepend($data, $request->description, 'description');
        }
        DB::table('products')->insert($data);

        session()->flash('success',"Успішно додано новий товар: \"$request->name\" !");
        return redirect(route('admin.products'));
    }

    public function update(Request $request){
        $request->validate([
            "img"=>"nullable|image",
            "name" => "required",
            "price" => "required",
            "category" => "required",
            "description" => "nullable"
        ]);

        $item = DB::table('products')->where('id', $request->id)->first();
        if($item->img!=null&&$request->hasFile('img')){
            Storage::delete($item->img);
        }

        if($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("prod/{$folder}");
        }

        $data=array("name"=>$request->name,"price"=>$request->price,"category"=>$request->category);
        if($request->img) {
            $data = Arr::prepend($data, $img, 'img');
        }
        if($request->description){
            $data = Arr::prepend($data, $request->description, 'description');
        }
        DB::table('products')->where('id', $request->id)->update($data);

        session()->flash('success',"Успішно оновлено дані про товар: \"$request->name\" !");
        return redirect(route('admin.products'));
    }

    public function delete(Request $request){
        $element = DB::table('products')->where('id', $request->id)->first();
        if($element->img){
            Storage::delete($element->img);
        }
        DB::table('products')->where('id', $request->id)->delete();

        session()->flash('success',"Успішно видалено товар під id: \"$request->id\" !");
        return redirect(route('admin.products'));
    }

    public function buy(Request $request){
        //dd($request->all());
        $request->validate([
            "pib" => "required",
            "city" => "required",
            "adress" => "required",
            "tel" => "required",
            "zip_code" => "required",
            "email" => "nullable|email"
        ]);
        $emails = array();
        $users = DB::table('users')->select(['email'])->get();
        foreach($users as $user) {
            $emails = Arr::prepend($emails,$user->email);
        }
        $prod = DB::table('products')->where('id', $request->id)->first();

        $data=array("prod_id"=>$request->id,"pib"=>$request->pib,"city"=>$request->city,"adress"=>$request->adress
        ,"tel"=>$request->tel,"zip_code"=>$request->zip_code,"email"=>$request->email);
        $data['created_at'] = Carbon::now();

        DB::table('orders')->insert($data);

        foreach ($emails as $AdminEmail) {
            Mail::to($AdminEmail)->send(new OrdersMail($prod, $request));
        }

        session()->flash('success',"Успішно оформлене нове ваше замовлення, на товар: ".$prod->name.". Очікуйте відповіді від адміністрації.");
        return redirect(route('main'));
    }
}
