<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = 'category';

     protected $fillable = ['category_name'];

     public function Product(){
         return $this->hasOne("\App\Product");// neu quan he 1 - n thi se lay thang dau tien
     }

     public function Products(){
         return $this->hasMany("\App\Product");// id category_id
     }
}
