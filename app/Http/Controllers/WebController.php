<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\OrderCreated;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function home(){
        // luu vao cache
        //if(!Cache::has("home")){
            $cache = [];
            $cache['newests'] = Product::orderBy('created_at','desc')->take(10)->get();
            $cache['cheaps'] = Product::orderBy("price",'asc')->take(10)->get();
            $cache['exs'] = Product::orderBy('price','desc')->take(10)->get();

            $newests = $cache['newests'];
            $cheaps = $cache['cheaps'];
            $exs = $cache['exs'];
            $view = view("home",['newests'=>$newests,'cheaps'=>$cheaps,'exs'=>$exs])->render();

           // $now = Carbon::now();
           // $expireDate = $now->addHours(2);
           // Cache::put("home",$view,$expireDate);
       // }
      //  return Cache::get("home");
        return $view;
        // neu muon xoa 1 cache cu the
        Cache::forget("home");
        // neu muon xoa tat ca cache
        Cache::flush();
        // neu muon luu vinh vien
        Cache::forever("key","value");

    }

    public function product($id){
//        if(Cache::has("product_".$id)){
//            ///
//        }
//        return Cache::get("product_".$id);
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

    public function checkout(Request $request){
        if(!$request->session()->has("cart")){
            return redirect()->to("/");
        }
        return view("checkout");
    }

    public function placeOrder(Request $request){
        $request->validate([
            'customer_name'=> 'required | string',
            'address' => 'required',
            'payment_method'=> 'required',
            'telephone'=> 'required',
        ]);

        $cart = $request->session()->get('cart');
        $grand_total = 0;
        foreach ($cart as $p){
            $grand_total += ($p->price * $p->cart_qty);
        }
        $order = Order::create([
            'user_id'=> Auth::id(),
            'customer_name'=> $request->get("customer_name"),
            'shipping_address'=> $request->get("address"),
            'telephone'=> $request->get("telephone"),
            'grand_total'=> $grand_total,
            'payment_method'=> $request->get("payment_method"),
            "status"=> Order::STATUS_PENDING
        ]);
        foreach ($cart as $p){
            DB::table("orders_products")->insert([
                'order_id'=> $order->id,
                'product_id'=>$p->id,
                'qty'=>$p->cart_qty,
                'price'=>$p->price
            ]);
        }
        session()->forget('cart');
        Mail::to('quanghoa.trinh@gmail.com')->send(new OrderCreated($order));
//        Mail::to(Auth::user()->email)->send(new OrderCreated());
        return redirect()->to("checkout-success");
    }

    public function checkoutSuccess(){

    }

    public function postLogin(Request $request){
//        $request->validate([
//            "email" => 'required|email',
//            "password"=> "required|min:8"
//        ]);
        $validator = Validator::make($request->all(),[
            "email" => 'required|email',
            "password"=> "required|min:8"
        ]);

        if($validator->fails()){
            return response()->json(["status"=>false,"message"=>$validator->errors()->first()]);
        }
        $email = $request->get("email");
        $pass = $request->get("password");
        if(Auth::attempt(['email'=>$email,'password'=>$pass])){
            return response()->json(['status'=>true,'message'=>"Login successfully!"]);
        }
        return response()->json(['status'=>false,'message'=>"login failure"]);
    }

}
