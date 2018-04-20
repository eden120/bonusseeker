<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('seo')->user();

    //dd($users);

    return view('seo.home');
})->name('home');

