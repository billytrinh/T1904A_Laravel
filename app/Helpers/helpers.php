<?php

if(!function_exists("is_admin")){
    function is_admin(){
        if(\Illuminate\Support\Facades\Auth::check()){
            if(\Illuminate\Support\Facades\Auth::user()->role == \App\User::ADMIN){
                return true;
            }
        }
        return false;
    }
}

