<?php

use Pusher\Pusher;

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

if(!function_exists("notify")){
    function notify($chanel,$event,$data){
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            '6c3775f766196d272451',
            '05df2aaefed4a7378ff6',
            '797719',
            $options
        );

        $pusher->trigger($chanel, $event, $data);
    }
}
