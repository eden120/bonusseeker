<?php

namespace App\Http\Controllers;

use App\Casino;
use App\Game;
use App\GameCategory;
use App\GameProvider;
use App\News;
use App\PromoCode;
use Illuminate\Http\Request;
use DB;

class SitemapController extends Controller
{
    public function index()
    {
        $casino = Casino::orderBy('updated_at', 'desc')->first();
        $promo_codes = PromoCode::orderBy('updated_at', 'desc')->first();
        $games = Game::orderBy('updated_at', 'desc')->first();
        $game_providers = GameProvider::orderBy('updated_at', 'desc')->first();
        $game_categories = GameCategory::orderBy('updated_at', 'desc')->first();
        $news = News::orderBy('updated_at', 'desc')->first();

        return response()->view('sitemap.index', compact('casino', 'promo_codes', 'games', 'game_providers', 'game_categories', 'news'))->header('Content-Type', 'text/xml');
    }

    public function pages()
    {
        $regions = DB::table('regions')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();
        $old_pages = DB::table('old_pages')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.pages', compact('regions', 'old_pages'))->header('Content-Type', 'text/xml');
    }

    public function casinos()
    {
        $casinos = DB::table('casinos')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.casinos', compact('casinos'))->header('Content-Type', 'text/xml');
    }

    public function promoCodes()
    {
        $promo_codes = DB::table('promo_codes')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.promo-codes', compact('promo_codes'))->header('Content-Type', 'text/xml');
    }

    public function games()
    {
        $games = DB::table('games')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.games', compact('games'))->header('Content-Type', 'text/xml');
    }

    public function gameProviders()
    {
        $game_providers = DB::table('game_providers')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.game-providers', compact('game_providers'))->header('Content-Type', 'text/xml');
    }

    public function gameCategories()
    {
        $game_categories = DB::table('game_categories')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.game-categories', compact('game_categories'))->header('Content-Type', 'text/xml');
    }

    public function news()
    {
        $news = DB::table('news')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->get();

        return response()->view('sitemap.news', compact('news'))->header('Content-Type', 'text/xml');
    }
}