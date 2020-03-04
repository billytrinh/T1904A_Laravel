<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        $products = Product::take(10)->orderBy('product_name','asc')->get(); // tra ve 1 collection voi moi phan tu la 1 object Product
        return view("home",['products'=>$products]);
    }

    public function product(){
        $product = Product::find(1);// tra ve 1 object Product theo id
        return view('product_view',['product'=>$product]);
    }

    public function listing(){
        $products = Product::where("categry_id",5)->take(10)->orderBy('product_name','asc')->get();// loc theo category
        return view("listing",['products'=>$products]);
    }
}
