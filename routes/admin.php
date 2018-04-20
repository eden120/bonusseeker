<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    $settings = \App\Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

    return view('admin.pages.dashboard', compact('settings'));
})->name('dashboard');