<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('editor')->user();

    //dd($users);

    return view('editor.home');
})->name('home');

