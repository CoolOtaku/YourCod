<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = null;
        if($request->text==null&&$request->category==null){
            return "null";
        }
        if($request->text!=null&&$request->category==null){
            $query = "select * from products where name like '%".$request->text."%' or description like '%"
            .$request->text."%' or category like '%".$request->text."%'";
        }elseif($request->text==null&&$request->category!=null){
            $query = "select * from products where name like '%".$request->category."%' or description like '%"
                .$request->category."%' or category like '%".$request->category."%'";
        }elseif($request->text!=null&&$request->category!=null){
            $query = "select * from products where name like '%".$request->text."%' or description like '%"
                .$request->text."%' or category like '%".$request->text."%' or name like '%".$request->category.
                "%' or description like '%".$request->category."%' or category like '%".$request->category."%'";
        }

        $var = "";
        $products = DB::select($query);
        foreach ($products as $prod) {
            $var.="<figure class=\"effect-oscar  wowload fadeInUp\">";
            if($prod->img){
                $var.="<img src=\"".asset('storage/'.$prod->img)."\" alt=\"img01\"/>";
            }else{
                $var.="<img src=\"".route('main').'/images/none_image.png'."\" alt=\"img01\"/>";
            }
            $var.="<figcaption>";
            $var.="<h5 style=\"font-weight: bold\">".$prod->name."</h5>";
            $var.="<p>Ціна: ".$prod->price." грн.<br>";
            $var.="<a href=\"".asset('storage/'.$prod->img)."\" data-gallery>Глянути картинку</a></p>";
            $var.="<p><a href=\"/prod/".$prod->id."\">Детальніше</a></p>";
            $var.="</figcaption>";
            $var.="</figure>";
        }
        if($var=="") {
            return "null";
        }
        return $var;
    }
}
