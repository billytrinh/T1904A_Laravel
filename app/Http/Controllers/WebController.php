<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        $products = [
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/1.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/2.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/3.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/4.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/4.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/6.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/7.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/8.jpg',
                'price'=> '$39.90'
            ],
            [
                'name'=> 'LONG RED SHIRT',
                'image'=> 'img/products/9.jpg',
                'price'=> '$39.90'
            ],
        ];
        return view("home",['products'=>$products]);
    }

    public function product(){
        return view('product_view');
    }

    public function listing(){
        return view("listing");
    }
}
