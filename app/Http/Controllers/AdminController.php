<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Pusher\Pusher;
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
            $image = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("image")){
                // neu nhieu file
                $file = $request->file("image");// array neu gui len dang multifile
                $file_name = time()."-".$file->getClientOriginalName(); // lay ten file
                $ext = $file->getClientOriginalExtension(); // lay duoi file
                if(in_array($ext,$ext_allow)){
                    $file->move("upload",$file_name);
                    $image = "upload/".$file_name;
                }
            }
            Category::create([
                "category_name"=> $request->get("category_name"),
                'image'=>$image
            ]);
            notify("t1904a","create_category",["message"=>"tao moi danh muc: ".$request->get("category_name")]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }

    public function categoryEdit($id){
        $category = Category::find($id);
        return view("admin.category.edit",['category'=>$category]);
    }

    public function categoryUpdate($id,Request $request){
        $category = Category::find($id);
        $request->validate([ // truyen vao rules de validate
            "category_name"=> "required|string|unique:category,category_name,".$id
        ]);
        try {
            $category->update([
                "category_name"=> $request->get('category_name')
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }

    public function categoryDestroy($id){
        $category = Category::find($id);
        try {
            $category->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();// cho 1 error vao session, ngoai index se check va in ra
        }
        return redirect()->to("admin/category");
    }
}
