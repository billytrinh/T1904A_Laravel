<?php
Route::get('category',"AdminController@category");

Route::get('category/create',"AdminController@categoryCreate");
Route::post('category/store',"AdminController@categoryStore");

Route::get("category/edit/{id}","AdminController@categoryEdit");
Route::post("category/update/{id}","AdminController@categoryUpdate");

Route::get('category/delete/{id}',"AdminController@categoryDestroy");
