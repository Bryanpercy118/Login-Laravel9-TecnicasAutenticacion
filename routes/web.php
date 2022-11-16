<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::view('login','login')->name('login');
route::view('dashboard','dashboard')->middleware('auth');

route::POST('/',function(){
    $credentials= request()->only('email','password');

    if(Auth::attempt($credentials)){
        request()->session()->regenerate();//Para evitar vulnerabilidad de un atacante a robar los datos de usuario
        return redirect('dashboard');
    }
    return 'You Are Failed';
});
