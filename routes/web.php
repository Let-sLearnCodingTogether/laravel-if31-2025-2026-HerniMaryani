<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user-profile/{name}/{umur}', function($name, $umur){
    return view("user",[
        'user_name' => $name,
        'user_umur' => $umur
    ]);
});
