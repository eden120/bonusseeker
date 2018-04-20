<?php

namespace App\Http\Controllers;

use App\Casino;
use App\Game;
use App\GameCategory;
use App\GameProvider;
use App\Page;
use App\Setting;
use Folklore\Image\Facades\Image;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use SEOMeta;
use OpenGraph;
use Twitter;
use SEO;
use URL;

class FrontEndGameController extends Controller {
	public function onlineGames() {
		$settings   = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$games      = DB::table('games')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();
		$categories = DB::table('game_categories')->orderBy('name', 'asc')->where(['is_active' => 1])->get();
		$providers  = DB::table('game_providers')->orderBy('name', 'asc')->where(['is_active' => 1])->get();

		$featuredGames      = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by', 'asc')->where(['is_active' => 1])->paginate(30);
		$allSlotsGames      = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by', 'asc')->where(['is_active' => 1])->where(['category_id' => 1])->paginate(30);
		$liveDealerGames    = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by', 'asc')->where(['is_active' => 1])->where(['category_id' => 5])->paginate(30);
		$allTableGames      = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by', 'asc')->where(['is_active' => 1])->where(['category_id' => 2])->paginate(30);
		$allVideoPokerGames = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by', 'asc')->where(['is_active' => 1])->where(['category_id' => 3])->paginate(30);

		// SEO Meta Section
		$page_contents = Page::whereId(5)->get();

		if( ! empty($page_contents)) {
			foreach($page_contents as $page_content) :
				SEOMeta::setTitle($page_content->seo_title);
				SEOMeta::setDescription($page_content->seo_description);
				SEOMeta::addMeta('og:updated_time', $page_content->updated_at->toW3CString(), 'property');
				OpenGraph::setDescription($page_content->seo_description);
				OpenGraph::setTitle($page_content->seo_title);
				OpenGraph::setUrl(URL::current());
				OpenGraph::addProperty('see_also', URL::current());
				OpenGraph::addProperty('type', 'website');
				OpenGraph::addProperty('locale', 'en_US');
				OpenGraph::addImage(url('img/default-logo-for-sharing.jpg'), ['height' => 600, 'width' => 315]);
				Twitter::setType('summary');
				Twitter::setTitle($page_content->seo_title);
				Twitter::setSite(env('TWITTER_USERNAME'));
				Twitter::setDescription($page_content->seo_description);
				Twitter::setUrl(URL::current());
				Twitter::addImage(url('img/default-logo-for-sharing.jpg'));
			endforeach;
		}

		// End of SEO Meta

		return view('frontend.games-pages.index', compact('settings', 'games', 'categories', 'providers', 'featuredGames', 'allSlotsGames', 'liveDealerGames', 'allTableGames', 'allVideoPokerGames'));
	}

	public function showGame($slug) {
		$settings   = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$game       = Game::with(['providerId', 'categoryId', 'subcategoryId'])->where('slug', $slug)->first();
		$categories = GameCategory::orderBy('name')->where(['is_active' => 1])->get();
		$providers  = GameProvider::orderBy('name')->where(['is_active' => 1])->get();
		$games      = Game::where(['is_active' => 1])->take(20)->inRandomOrder()->get();

		$casinoSpecialOffers = Casino::orderBy('sort_by', 'asc')->where(['region_id' => 1])->where(['is_active' => 1])->where('sort_by', '>', 1)->take(4)->get();

		// SEO Meta Section
		if( ! empty($game)) {
			SEOMeta::setTitle($game->seo_title . ' - Online Casino Games');
			SEOMeta::setDescription($game->seo_description);
			SEOMeta::addMeta('og:updated_time', $game->updated_at->toW3CString(), 'property');
			OpenGraph::setDescription($game->seo_description);
			OpenGraph::setTitle($game->seo_title . ' - Online Casino Games');
			OpenGraph::setUrl(URL::current());
			OpenGraph::addProperty('see_also', URL::current());
			OpenGraph::addProperty('type', 'website');
			OpenGraph::addProperty('locale', 'en_US');
			OpenGraph::addImage(url(Image::url(Storage::url($game->logo), 600, 315)), [
				'height' => 600,
				'width'  => 315,
			]);
			Twitter::setType('summary');
			Twitter::setTitle($game->seo_title . ' - Online Casino Games');
			Twitter::setSite(env('TWITTER_USERNAME'));
			Twitter::setDescription($game->seo_description);
			Twitter::setUrl(URL::current());
			Twitter::addImage(url(Image::url(Storage::url($game->logo), 600, 315)));
		}

		// End of SEO Meta

		return view('frontend.games-pages.show', compact('settings', 'game', 'games', 'categories', 'providers', 'casinoSpecialOffers'));
	}

	/**
	 * @param $slug
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function gameProviders($slug) {
		$settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

		if(GameProvider::whereSlug($slug)->exists()) {
			$getGameProvider = GameProvider::whereSlug($slug)->first();
			//
			$games      = DB::table('games')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();
			$categories = DB::table('game_categories')->orderBy('name', 'asc')->where(['is_active' => 1])->get();
			$providers  = DB::table('game_providers')->orderBy('name', 'asc')->where(['is_active' => 1])->get();

			SEOMeta::setTitle('Games developed by ' . $getGameProvider->name . ' - ' . $settings->name);
			SEOMeta::setDescription('Games developed by ' . $getGameProvider->name . ' - ' . $settings->seo_title);
			SEOMeta::addMeta('og:updated_time', $getGameProvider->updated_at->toW3CString(), 'property');
			OpenGraph::setDescription('Games developed by ' . $getGameProvider->name . ' - ' . $settings->seo_title);
			OpenGraph::setTitle('Games developed by ' . $getGameProvider->name . ' - ' . $settings->name);
			OpenGraph::setUrl(URL::current());
			OpenGraph::addProperty('see_also', URL::current());
			OpenGraph::addProperty('type', 'website');
			OpenGraph::addProperty('locale', 'en_US');
			OpenGraph::addImage(url('img/default-logo-for-sharing.jpg'), ['height' => 600, 'width' => 315]);
			Twitter::setType('summary');
			Twitter::setTitle('Games developed by ' . $getGameProvider->name . ' - ' . $settings->name);
			Twitter::setSite(env('TWITTER_USERNAME'));
			Twitter::setDescription('Games developed by ' . $getGameProvider->name . ' - ' . $settings->seo_title);
			Twitter::setUrl(URL::current());
			Twitter::addImage(url('img/default-logo-for-sharing.jpg'));

			return view('frontend.games-pages.game-providers', compact('settings', 'getGameProvider', 'games', 'categories', 'providers'));
		} else {
			return view('errors.404');
		}
	}

	public function gameCategories($slug) {
		$settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		if(GameCategory::whereSlug($slug)->exists()) {
			$getGameCategory = GameCategory::whereSlug($slug)->first();
			//
			$games      = DB::table('games')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();
			$categories = DB::table('game_categories')->orderBy('name', 'asc')->where(['is_active' => 1])->get();
			$providers  = DB::table('game_providers')->orderBy('name', 'asc')->where(['is_active' => 1])->get();

			SEOMeta::setTitle('Games in ' . $getGameCategory->name . ' Category - ' . $settings->name);
			SEOMeta::setDescription('Games in ' . $getGameCategory->name . ' Category - ' . $settings->seo_title);
			SEOMeta::addMeta('og:updated_time', $getGameCategory->updated_at->toW3CString(), 'property');
			OpenGraph::setDescription('Games in ' . $getGameCategory->name . ' Category - ' . $settings->seo_title);
			OpenGraph::setTitle('Games in ' . $getGameCategory->name . ' Category - ' . $settings->name);
			OpenGraph::setUrl(URL::current());
			OpenGraph::addProperty('see_also', URL::current());
			OpenGraph::addProperty('type', 'website');
			OpenGraph::addProperty('locale', 'en_US');
			OpenGraph::addImage(url('img/default-logo-for-sharing.jpg'), ['height' => 600, 'width' => 315]);
			Twitter::setType('summary');
			Twitter::setTitle('Games in ' . $getGameCategory->name . ' Category - ' . $settings->name);
			Twitter::setSite(env('TWITTER_USERNAME'));
			Twitter::setDescription('Games in ' . $getGameCategory->name . ' Category - ' . $settings->seo_title);
			Twitter::setUrl(URL::current());
			Twitter::addImage(url('img/default-logo-for-sharing.jpg'));

			return view('frontend.games-pages.game-categories', compact('settings', 'getGameCategory', 'games', 'categories', 'providers'));
		} else {
			return view('errors.404');
		}
	}

	public function gamesForMobile() {
		$settings       = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$games          = DB::table('games')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();
		$categories     = DB::table('game_categories')->orderBy('name', 'asc')->where(['is_active' => 1])->get();
		$providers      = DB::table('game_providers')->orderBy('name', 'asc')->where(['is_active' => 1])->get();
		$publishedGames = DB::table('games')->orderBy('sort_by', 'asc')->where([
			'is_active' => 1,
			'is_html5'  => 1,
		])->paginate(35);

		return view('frontend.games-pages.games-for-mobile', compact('settings', 'games', 'categories', 'providers', 'publishedGames'));
	}
}