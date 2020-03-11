<?php
Route::get('category',"AdminController@category");
Route::get('category/create',"AdminController@categoryCreate");
Route::post('category/store',"AdminController@categoryStore");
