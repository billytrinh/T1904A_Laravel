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

    public function shopping($id){
        $product = Product::find($id);
        $product->update([
            "quantity" => $product->quantity-1
        ]);
        return redirect()->to("san-pham/{$product->id}");
    }

    public function filter($c_id,$b_id){
        $products = Product::where('category_id',$c_id)->where('brand_id',$b_id)->get();
    }
}
