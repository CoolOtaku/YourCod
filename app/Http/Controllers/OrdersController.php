<?php

namespace App\Http\Controllers;

use App\Mail\CancelOrderMail;
use App\Mail\OrderMarkExe;
use App\Mail\OrdersMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function delete(Request $request){
        $order = DB::table('orders')->select('email')->where('id', $request->id)->first();
        $prod = DB::table('products')->select('name')->where('id', $order->prod_id)->first();
        if($order->email){
            Mail::to($order->email)->send(new CancelOrderMail($prod->name));
        }
        DB::table('orders')->where('id', $request->id)->delete();

        session()->flash('success',"Успішно видалено замовлення під id: \"$request->id\" !");
        return redirect(route('admin.admin-panel'));
    }

    public function mark_done (Request $request){

    }

    public function mark_execution (Request $request){
        $data = array('mark'=>'1');
        DB::table('orders')->where('id', $request->id)->update($data);

        $order = DB::table('orders')->select('email','prod_id')->where('id', $request->id)->first();
        $prod = DB::table('products')->select('name')->where('id', $order->prod_id)->first();
        Mail::to($order->email)->send(new OrderMarkExe($prod->name));

        session()->flash('success',"Позначено замовлення по id: \"$request->id\", як в процесі виконання. Постарайтесь виконати його!");
        return redirect(route('admin.admin-panel'));
    }
}
