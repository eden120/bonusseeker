<?php

namespace App\Http\Controllers;

use App\News;
use App\Setting;
use Exception;

class FrontEndAmpController extends Controller
{
    public function newsIndex()
    {
        $settings       = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $published_news = News::orderBy('updated_at', 'desc')->where(['is_active' => 1])->paginate(50);

        return view('amp.news-index', compact('settings', 'published_news'));
    }

    public function showNews($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $news     = News::with('region')->whereSlug($slug)->first();

        return view('amp.show-news', compact('settings', 'news'));
    }
}