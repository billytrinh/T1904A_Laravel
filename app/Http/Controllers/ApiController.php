<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function productNewest(Request $request){
        $limit = 10;
        $page = $request->has("page")?$request->get("page"):1;
        $offset = $limit * ($page-1);
        $products = Product::orderBy("created_at","desc")->skip($offset)->take($limit)->get();
        return response()->json(['data'=>$products]);
    }
}
