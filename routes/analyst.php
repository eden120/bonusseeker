<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('analyst')->user();

    //dd($users);

    return view('analyst.home');
})->name('home');

