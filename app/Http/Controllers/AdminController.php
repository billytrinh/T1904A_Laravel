<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function category(){
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    public function categoryCreate(){
        return view("admin.category.create");
    }

    public function categoryStore(Request $request){
        $request->validate([ // truyen vao rules de validate
            "category_name"=> "required|string|unique:category"  // validation laravel
        ]);
        try {
            Category::create([
                "category_name"=> $request->get("category_name")
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }
}
