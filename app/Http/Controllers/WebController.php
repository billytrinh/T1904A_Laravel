<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        //$products = Product::take(10)->orderBy('product_name','asc')->get(); // tra ve 1 collection voi moi phan tu la 1 object Product
        $newests = Product::orderBy('created_at','desc')->take(10)->get();
        $cheaps = Product::orderBy("price",'asc')->take(10)->get();
        $exs = Product::orderBy('price','desc')->take(10)->get();
        return view("home",['newests'=>$newests,'cheaps'=>$cheaps,'exs'=>$exs]);
    }

    public function product($id){
        $product = Product::find($id);// tra ve 1 object Product theo id
   //     $category = Category::find($product->category_id);
        $category_products = Product::where("category_id",$product->category_id)->where('id',"!=",$product->id)->take(10)->get();
        $brand_products = Product::where("brand_id",$product->brand_id)->where('id',"!=",$product->id)->take(10)->get();
        return view('product_view',['product'=>$product,'category_products'=>$category_products,'brand_products'=>$brand_products]);
    }

    public function listing($id){
        $category = Category::find($id);
        $so_luong_sp = $category->Products()->count(); // ra so luong san pham
       // $category->Products ;// Lay tat ca product cua category nay
        // neu muon lay 1 so luong nhat dinh 10 san pham
       // $category->Products()->orderBy('price','desc')->take(10)->get();
        return view("listing",['category'=>$category]);
    }

    public function shopping($id,Request $request){
        $product = Product::find($id);
//        $product->update([
//            "quantity" => $product->quantity-1
//        ]);
       // session(['key'=>'value']);// truyen 1 gia trị cho session theo key
        /*
         * cart => array product ( product -> cart_qty = so luong mua)
         */
        $cart = $request->session()->get("cart");
        if($cart == null){
            $cart = [];
        }
//        $cart_total = $request->session()->get("cart_total");
//        if($cart_total == null) $cart_total =0;
        foreach ($cart as $p){
            if($p->id== $product->id){
                $p->cart_qty = $p->cart_qty+1;
//                $cart_total += $p->price;
                session(["cart"=>$cart]);
                return redirect()->to("cart");
            }
        }
        $product->cart_qty = 1;
        $cart[] = $product;
//        $cart_total += $product->price;
        session(["cart"=>$cart]);
//        session(["cart_total"=>$cart_total]);
        return redirect()->to("cart");
    }

    public function cart(Request $request){
        $cart = $request->session()->get("cart");
        if($cart == null){
            $cart = [];
        }
       // count($cart) -> so luong
        $cart_total = 0 ;
        foreach ($cart as $p){
            $cart_total += ($p->price*$p->cart_qty);
        }
        return view("cart",["cart"=>$cart,'cart_total'=>$cart_total]);
    }

    public function filter($c_id,$b_id){
        $products = Product::where('category_id',$c_id)->where('brand_id',$b_id)->get();
    }

    public function clearCart(Request $request){
        $request->session()->forget("cart");
        // xoa nhieu hon 1
       // $request->session()->forget(['cart','cart_total']);
       // $request->session()->flush(); // xoa tat ca session - ke ca login
        return redirect()->to("/");
    }

    public function removeProduct($id){

    }
}
