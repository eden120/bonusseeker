<?php

namespace App\Http\Controllers;

use App\Casino;
use App\Game;
use App\News;
use App\Newsletter;
use App\PageModule;
use App\PromoCode;
use App\Services\BS;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use URL;
use SEOMeta;
use OpenGraph;
use Twitter;
use SEO;
use Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FrontEndIndexController extends Controller {
	public function index() {
		$settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		if( ! empty($settings)) {
			SEOMeta::setTitle($settings->seo_title);
			SEOMeta::setDescription($settings->seo_description);
			SEOMeta::addMeta('og:updated_time', $settings->updated_at->toW3CString(), 'property');
			OpenGraph::setDescription($settings->seo_descriptions);
			OpenGraph::setTitle($settings->seo_title);
			OpenGraph::setUrl(URL::current());
			OpenGraph::addProperty('see_also', URL::current());
			OpenGraph::addProperty('type', 'website');
			OpenGraph::addProperty('locale', 'en_US');
			OpenGraph::addImage(url('img/default-logo-for-sharing.jpg'), ['height' => 600, 'width' => 315]);
			Twitter::setType('summary');
			Twitter::setTitle($settings->seo_title);
			Twitter::setSite(env('TWITTER_USERNAME'));
			Twitter::setDescription($settings->seo_description);
			Twitter::setUrl(URL::current());
			Twitter::addImage(url('img/default-logo-for-sharing.jpg'));
		}

		$best_online_casinos = Casino::with('region')->orderBy('sort_by')->whereRegionId(1)->whereIsActive(1)->where('sort_by', '>=', 1)->take(5)->get();

		$casinos = Casino::with('region')->orderBy('sort_by')->whereRegionId(1)->whereIsActive(1)->where('sort_by', '>=', 1)->take(30)->get();

		$casinoPromoCodes = PromoCode::with([
			'casino',
			'promoType',
		])->orderBy('end_date')->where('end_date', '>', Carbon::now())->whereIsActive(1)->take(30)->get();

		$featuredGames      = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by')->whereIsActive(1)->take(15)->get();
		$allSlotsGames      = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by')->whereIsActive(1)->where(['category_id' => 1])->take(15)->get();
		$liveDealerGames    = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by')->whereIsActive(1)->where(['category_id' => 5])->take(15)->get();
		$allTableGames      = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by')->whereIsActive(1)->where(['category_id' => 2])->take(15)->get();
		$allVideoPokerGames = Game::with([
			'providerId',
			'categoryId',
		])->orderBy('sort_by')->whereIsActive(1)->where(['category_id' => 3])->take(15)->get();

		$know_before_you_play = News::with('region')->orderBy('updated_at', 'desc')->where(['know_before_you_play' => 1])->whereIsActive(1)->where(['is_trending' => 0])->take(4)->get();

		$trending_news = News::with('region')->orderBy('updated_at', 'desc')->where(['is_trending' => 1])->whereIsActive(1)->where(['know_before_you_play' => 0])->take(4)->get();

		$index_page_main_description = PageModule::whereId(4)->first();

		$videos = DB::table('videos')->orderBy('sort_by')->whereIsActive(1)->where('sort_by', '>=', 1)->take(2)->get();

		return view('frontend.index-page.index', compact('settings', 'best_online_casinos', 'casinos', 'casinoPromoCodes', 'featuredGames', 'allSlotsGames', 'liveDealerGames', 'allTableGames', 'allVideoPokerGames', 'know_before_you_play', 'trending_news', 'index_page_main_description', 'videos'));
	}

	public function exclusive() {
		$settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$casinos  = DB::table('casinos')->orderBy('sort_by')->where('sort_by', '!=', 0)->whereIsActive(1)->where(['region_id' => 1])->get();

		SEOMeta::setTitle('Exclusive');
		SEOMeta::setDescription('Exclusive Description');
		SEOMeta::addMeta('og:updated_time', Carbon::now()->subHours(3)->toW3CString(), 'property');
		OpenGraph::setDescription('Exclusive Description');
		OpenGraph::setTitle('Exclusive');
		OpenGraph::setUrl(URL::current());
		OpenGraph::addProperty('see_also', URL::current());
		OpenGraph::addProperty('type', 'website');
		OpenGraph::addProperty('locale', 'en_US');
		OpenGraph::addImage(url('img/default-logo-for-sharing.jpg'));
		Twitter::setType('summary');
		Twitter::setTitle('Exclusive');
		Twitter::setSite(env('TWITTER_USERNAME'));
		Twitter::setDescription('Exclusive Description');
		Twitter::setUrl(URL::current());
		Twitter::addImage(url('img/default-logo-for-sharing.jpg'));

		return view('frontend.index-page.exclusive.index', compact('settings', 'casinos'));
	}

	public function subscribed() {
		$settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

		return view('newsletter.subscribed', compact('settings'));
	}
}