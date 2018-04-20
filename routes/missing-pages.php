<?php

Route::get('/hello-world', function () {
    return redirect('/', 301);
});

Route::get('/new-jersey', function () {
    return redirect('/new-jersey-online-casinos', 301);
});

Route::get('/new-jersey/online-casinos', function () {
    return redirect('/new-jersey-online-casinos', 301);
});

Route::get('/new-jersey/online-casino-bonus-codes', function () {
    return redirect('/new-jersey-online-casinos/bonus-codes', 301);
});

Route::get('/new-jersey/online-casino-promo-codes', function () {
    return redirect('/new-jersey-online-casinos/promo-codes', 301);
});

Route::get('/new-jersey/news', function () {
    return redirect('/new-jersey-online-casinos/news', 301);
});

Route::get('/new-jersey/news/are-any-bonus-codes-for-golden-nugget-nj-online-casino-available-new-jersey', function () {
    return redirect('/new-jersey-online-casinos/news/what-are-the-best-golden-nugget-online-casino-bonus-codes-new-jersey-online-casinos', 301);
});

Route::get('/new-jersey-online-casinos/news/are-there-any-bonus-codes-for-sugarhouse-online-casino-new-jersey-new-jersey', function () {
    return redirect('/new-jersey-online-casinos/news/are-there-any-bonus-codes-for-sugarhouse-online-casino', 301);
});

// Broken Casino Links
Route::get('/new-jersey-online-casinos/sugarhouse-online-casino-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/sugarhouse-online-casino-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/virgin-casino-online-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/virgin-casino-online-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/playmgm-online-casino-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/playmgm-online-casino-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/caesars-casino-online-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/caesars-casino-online-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/poker-stars-online-casino-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/poker-stars-online-casino-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/888-casino-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/888-casino-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/borgata-online-casino-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/borgata-online-casino-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/new-jersey-online-casinos/harrahs-online-casino-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/new-jersey-online-casinos/harrahs-online-casino-new-jersey', 301);
});

Route::get('/new-jersey-online-casinos/ten-casino-online-new-jersey-online-casinos', function () {
    return redirect('/new-jersey-online-casinos/ten-casino-online-new-jersey', 301);
});

Route::get('/www.bonusseeker.com/new-jersey-online-casino/bonus-codes', function () {
    return redirect('/new-jersey-online-casinos/bonus-codes', 301);
});

Route::get('/new-jersey/betfair-online-casino-new-jersey', function () {
    return redirect('/new-jersey-online-casinos/betfair-online-casino-new-jersey', 301);
});

Route::get('/sitemap/casinos.xml', function () {
    return redirect('/sitemap/operators.xml', 301);
});

/*Route::get('', function () {
    return redirect('', 301);
});*/

//
Route::any('/wp-content/{all}', function () {
    return redirect(asset('img/default-logo-for-sharing.jpg'), 301);
})->where('all', '.*');

Route::get('/new-jersey/online-casinos/{casino}', function ($casino) {
    return redirect()->route('front-end.show-casino', ['region' => 'new-jersey-online-casinos', 'casino' => $casino], 301);
});

Route::get('/new-jersey/news/{slug}', function ($slug) {
    return redirect()->route('front-end.show-news', ['region' => 'new-jersey-online-casinos', 'slug' => $slug], 301);
});

Route::get('/new-jersey/online-casino-promo-codes/{slug}', function ($slug) {
    return redirect()->route('front-end.show-promo', ['region' => 'new-jersey-online-casinos', 'slug' => $slug], 301);
});

Route::get('/new-jersey/online-casinos/visit/{slug}', function ($slug) {
    return redirect()->route('front-end.visit-external', ['region' => 'new-jersey-online-casinos', 'slug' => $slug], 301);
});