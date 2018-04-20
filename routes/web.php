<?php

// XML Sitemaps Generator
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.index');
Route::get('/sitemap/pages.xml', 'SitemapController@pages')->name('sitemap.pages');
Route::get('/sitemap/operators.xml', 'SitemapController@casinos')->name('sitemap.casinos');
Route::get('/sitemap/promo-codes.xml', 'SitemapController@promoCodes')->name('sitemap.promo-codes');
Route::get('/sitemap/games.xml', 'SitemapController@games')->name('sitemap.games');
Route::get('/sitemap/game-providers.xml', 'SitemapController@gameProviders')->name('sitemap.game-providers');
Route::get('/sitemap/game-categories.xml', 'SitemapController@gameCategories')->name('sitemap.game-categories');
Route::get('/sitemap/news.xml', 'SitemapController@news')->name('sitemap.news');

require __DIR__ . '/missing-pages.php';

Route::get('test-lab', function() {
	/*$str = '';
	for ($i = 1; $i <= 15; $i++) {
		$str .= trim(\App\Services\randomString::stringTen()) . ',';
	}

	echo rtrim($str, ',');*/

	/*$str = '';
	for ($i = 1; $i <= 40; $i++) {
		$str .= \App\Services\randomString::uuid();
		$str .= '<br>';
	}

	echo $str;*/
});

Route::get('search-casino/{permalink}', function($permalink) {
	if(\App\Casino::where('permalink', 'LIKE', '%' . $permalink . '%')->exists()) {
		$casino_info = \App\Casino::where('permalink', 'LIKE', '%' . $permalink . '%')->get([
			'id',
			'name',
			'permalink',
		]);

		foreach($casino_info as $casino) {
			return response()->json([
				'status'     => 'success',
				'casinoName' => $casino->name,
				'Permalink'  => $casino->permalink,
			], 200);
		}
	} else {
		return response()->json(['status' => 'failed', 'message' => 'No data available to show'], 200);
	}
});

Route::group(['prefix' => '/', 'as' => 'front-end.section.'], function() {
	Route::get('/', 'FrontEndIndexController@index')->name('index');

	Route::get('/online-casino-games', 'FrontEndGameController@onlineGames')->name('games');
	Route::paginate('online-casino-games', 'FrontEndGameController@onlineGames');
	Route::get('/online-casino-games/{slug}', 'FrontEndGameController@showGame')->name('show-game');
	Route::get('/online-casino-games-provider/{slug}', 'FrontEndGameController@gameProviders')->name('game-providers');
	Route::get('/online-casino-games-category/{slug}', 'FrontEndGameController@gameCategories')->name('game-categories');
	Route::get('/online-casino-games-for-mobile', 'FrontEndGameController@gamesForMobile')->name('casino-games-for-mobile');

	Route::get('/exclusive', 'FrontEndIndexController@exclusive');

	// Aweber email subscription
	Route::get('/subscribed', 'FrontEndIndexController@subscribed');
	Route::get('/aweber', 'AweberController@index')->name('aweber');
	Route::post('/aweber', 'AweberController@addSubscriber')->name('aweber');
});

Route::group(['prefix' => 'amp', 'as' => 'amp.'], function() {
	Route::get('news', 'FrontEndAmpController@newsIndex')->name('news-index');
	Route::get('/news/{slug}', 'FrontEndAmpController@showNews')->name('show-news');
});

// Generate Slugs for Parent Posts
Route::group(['prefix' => '/{region}', 'as' => 'front-end.'], function($region) {
	Route::get('/promo-codes', 'FrontEndCasinoController@promoCodes')->name('promo-codes');
	Route::get('/bonus-codes', 'FrontEndCasinoController@bonusCodes')->name('bonus-codes');
	Route::get('/promo-codes/{slug}', 'FrontEndCasinoController@showPromo')->name('show-promo');

	Route::get('/news', 'FrontEndNewsController@news')->name('news');
	Route::get('/news/{slug}', 'FrontEndNewsController@showNews')->name('show-news');

	Route::get('/', function($region) {
		if(\App\Region::whereSlug($region)->exists()) {
			$settings  = \App\Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
			$getRegion = \App\Region::whereSlug($region)->first();

			// SEO Meta Section
			if( ! empty($getRegion)) {
				SEOMeta::setTitle($getRegion->seo_title);
				SEOMeta::setDescription($getRegion->seo_description);
				SEOMeta::addMeta('og:updated_time', $getRegion->updated_at->toW3CString(), 'property');
				OpenGraph::setDescription($getRegion->seo_descriptions);
				OpenGraph::setTitle($getRegion->seo_title);
				OpenGraph::setUrl(URL::current());
				OpenGraph::addProperty('see_also', URL::current());
				OpenGraph::addProperty('type', 'website');
				OpenGraph::addProperty('locale', 'en_US');
				OpenGraph::addImage(url('img/default-logo-for-sharing.jpg'));
				Twitter::setType('summary');
				Twitter::setTitle($getRegion->seo_title);
				Twitter::setSite(env('TWITTER_USERNAME'));
				Twitter::setDescription($getRegion->seo_description);
				Twitter::setUrl(URL::current());
				Twitter::addImage(url('img/default-logo-for-sharing.jpg'));

				$casinos = \App\Casino::with('region')->orderBy('sort_by', 'asc')->where([
					'region_id' => $getRegion->id,
					'is_active' => 1,
				])->get();
			}

			return view('frontend.index-page.regions.show', compact('settings', 'getRegion', 'casinos'));
		}

		if(\App\OldPage::whereSlug($region)->exists()) {
			$settings   = \App\Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
			$getOldPage = \App\OldPage::whereSlug($region)->first();

			// SEO Meta Section
			if( ! empty($getOldPage)) {
				SEOMeta::setTitle($getOldPage->seo_title);
				SEOMeta::setDescription($getOldPage->seo_description);
				SEOMeta::addMeta('og:updated_time', $getOldPage->updated_at->toW3CString(), 'property');
				OpenGraph::setDescription($getOldPage->seo_descriptions);
				OpenGraph::setTitle($getOldPage->seo_title);
				OpenGraph::setUrl(URL::current());
				OpenGraph::addProperty('see_also', URL::current());
				OpenGraph::addProperty('type', 'website');
				OpenGraph::addProperty('locale', 'en_US');
				OpenGraph::addImage(url(Image::url(Storage::url($getOldPage->featured_image), 600, 315)), [
					'height' => 600,
					'width'  => 315,
				]);
				Twitter::setType('summary');
				Twitter::setTitle($getOldPage->seo_title);
				Twitter::setSite(env('TWITTER_USERNAME'));
				Twitter::setDescription($getOldPage->seo_description);
				Twitter::setUrl(URL::current());
				Twitter::addImage(url(Image::url(Storage::url($getOldPage->featured_image), 600, 315)));
			}

			return view('frontend.index-page.old-pages.show', compact('settings', 'getOldPage'));
		}
	})->name('show-parent-post');

	Route::get('/{casino}', function($region, $casino) {
		try {
			try {
				$settings        = \App\Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
				$getOperator     = \App\Casino::with('region')->where('slug', $casino)->first();
				$promoCodes      = \App\PromoCode::with([
					'casino',
					'promoType',
				])->where('casino_id', $getOperator->id)->get();
				$operatorSliders = \App\OperatorSlider::orderByDesc('id')->where([
					'is_active' => 1,
					'casino_id' => $getOperator->id,
				])->take(3)->get();

				// SEO Meta Section
				SEOMeta::setTitle($getOperator->seo_title);
				SEOMeta::setDescription($getOperator->seo_description);
				SEOMeta::addMeta('og:updated_time', $getOperator->updated_at->toW3CString(), 'property');
				OpenGraph::setDescription($getOperator->seo_description);
				OpenGraph::setTitle($getOperator->seo_title);
				OpenGraph::setUrl(URL::current());
				OpenGraph::addProperty('see_also', URL::current());
				OpenGraph::addProperty('type', 'website');
				OpenGraph::addProperty('locale', 'en_US');
				OpenGraph::addImage(url(Image::url(Storage::url($getOperator->logo), 600, 315)), [
					'height' => 600,
					'width'  => 315,
				]);
				Twitter::setType('summary');
				Twitter::setTitle($getOperator->seo_title);
				Twitter::setSite(env('TWITTER_USERNAME'));
				Twitter::setDescription($getOperator->seo_description);
				Twitter::setUrl(URL::current());
				Twitter::addImage(url(Image::url(Storage::url($getOperator->logo), 600, 315)));

				// End of SEO Meta

				return view('frontend.casino-pages.show-casino', compact('settings', 'getOperator', 'promoCodes', 'operatorSliders'));
			} catch(Exception $exception) {
				return view('errors.404');
			}
		} catch(Exception $exception) {
			return view('errors.404');
		}
	})->name('show-casino');

	Route::get('/visit/{permalink}', function($region, $permalink) {
		if(\App\Region::whereSlug($region)->exists()) {
			$url = \App\Casino::where('permalink', 'LIKE', '%' . $permalink . '%')->first();

			if(preg_match('/{linkid}|{linkId}|{link_id}/', $url->cta_link)) {
				$preg_replace = preg_replace('/{linkid}|{linkId}|{link_id}/', "$permalink", $url->cta_link);

				return redirect($preg_replace, 301); //return $preg_replace;
			} else {
				return redirect($url->cta_link, 301);
			}
		}
	})->name('visit-external');
// end of the prefix
});

Route::group(['prefix' => 'app'], function() {
	Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
		Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
		Route::post('/login', 'AdminAuth\LoginController@login')->name('login');
		Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

		//Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
		//Route::post('/register', 'AdminAuth\RegisterController@register')->name('register');

		Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('email');
		Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('reset');
		Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('reset');
		Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('reset.token');

		//
		Route::resource('/settings', 'SettingsController', ['only' => ['index', 'update']]);
		Route::put('settings/update-logo/{id}', 'SettingsController@updateLogo')->name('update.logo');
		Route::delete('settings/delete-logo/{id}', 'SettingsController@destroyLogo')->name('delete.logo');

		Route::get('/purge', function() {
			Artisan::call('cloudflare:cache:purge');

			return Artisan::output();
		})->name('purge');

		//
		Route::get('file-manager', 'AdminDashboardController@fileManager')->name('file.manager');
		Route::resource('videos', 'BackendVideoController', ['except' => ['show']]);

		//
		Route::get('site-stats', 'AdminDashboardController@siteAnalytics')->name('site-stats');

		// Region Route
		Route::resource('regions', 'RegionController', ['except' => ['show']]);
		//
		Route::resource('pages', 'PagesControllerForAdmin', ['except' => ['show']]);
		Route::resource('page-modules', 'PagesModuleControllerForAdmin', ['except' => ['show']]);
		Route::resource('old-pages', 'OldPagesControllerForAdmin', ['except' => ['show']]);
		Route::put('old-pages/update-old-page-featured-image/{id}', 'OldPagesControllerForAdmin@updateFeaturedImage')->name('update.old-page-featured-image');
		//
		Route::resource('casinos', 'CasinoControllerForAdmin', ['except' => ['show']]);
		Route::put('casinos/update-logo/{id}', 'CasinoControllerForAdmin@updateLogo')->name('casinos.update-logo');

		Route::resource('operator-slider', 'OperatorSliderController', ['except' => ['create', 'show']]);
		Route::put('operator-slider/slider-image/{uuid}', 'OperatorSliderController@updateSliderImage')->name('operator-slider.update.slider-image');

		Route::resource('promo-codes', 'PromoCodesControllerForAdmin', ['except' => ['show']]);
		Route::put('promo-codes/update-banner/{id}', 'PromoCodesControllerForAdmin@updateBanner')->name('promo-codes.update-banner');
		Route::resource('promo-types', 'PromoTypesControllerForAdmin', [
			'only' => [
				'index',
				'store',
				'edit',
				'update',
				'destroy',
			],
		]);
		Route::resource('how-to-enter', 'PromoEntryInstructionsControllerForAdmin', [
			'only' => [
				'index',
				'store',
				'edit',
				'update',
				'destroy',
			],
		]);

		// Games Route
		Route::resource('games', 'GameControllerForAdmin', ['except' => ['show']]);
		Route::put('games/update-logo/{id}', 'GameControllerForAdmin@updateLogo')->name('games.update-logo');

		Route::resource('game-providers', 'GameProvidersControllerForAdmin', [
			'only' => [
				'index',
				'store',
				'edit',
				'update',
				'destroy',
			],
		]);
		Route::resource('game-categories', 'GameCategoryControllerForAdmin', [
			'only' => [
				'index',
				'store',
				'edit',
				'update',
				'destroy',
			],
		]);
		Route::resource('game-subcategories', 'GameSubcategoryControllerForAdmin', [
			'only' => [
				'index',
				'store',
				'edit',
				'update',
				'destroy',
			],
		]);

		// News Route
		Route::resource('news', 'NewsControllerForAdmin', ['except' => ['show']]);
		Route::put('news/update-featured-image/{id}', 'NewsControllerForAdmin@updateFeaturedImage')->name('news.update-featured-image');

		Route::resource('news-categories', 'NewsCategoryControllerForAdmin', [
			'only' => [
				'index',
				'store',
				'edit',
				'update',
				'destroy',
			],
		]);

		Route::get('newsletter', 'NewsletterController@index')->name('newsletter.index');
		Route::get('newsletter/export', 'NewsletterController@export')->name('newsletter.export');
		Route::get('newsletter/archived', 'NewsletterController@archived')->name('newsletter.archived');
		Route::put('newsletter/archive/{id}', 'NewsletterController@update')->name('newsletter.archive');
	});

	/* Route::group(['prefix' => 'user'], function () {
		 Route::get('/login', 'UserAuth\LoginController@showLoginForm');
		 Route::post('/login', 'UserAuth\LoginController@login');
		 Route::post('/logout', 'UserAuth\LoginController@logout');

		 Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm');
		 Route::post('/register', 'UserAuth\RegisterController@register');

		 Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail');
		 Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset');
		 Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm');
		 Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
	 });

	 Route::group(['prefix' => 'seo'], function () {
		 Route::get('/login', 'SeoAuth\LoginController@showLoginForm');
		 Route::post('/login', 'SeoAuth\LoginController@login');
		 Route::post('/logout', 'SeoAuth\LoginController@logout');

		 Route::get('/register', 'SeoAuth\RegisterController@showRegistrationForm');
		 Route::post('/register', 'SeoAuth\RegisterController@register');

		 Route::post('/password/email', 'SeoAuth\ForgotPasswordController@sendResetLinkEmail');
		 Route::post('/password/reset', 'SeoAuth\ResetPasswordController@reset');
		 Route::get('/password/reset', 'SeoAuth\ForgotPasswordController@showLinkRequestForm');
		 Route::get('/password/reset/{token}', 'SeoAuth\ResetPasswordController@showResetForm');
	 });

	 Route::group(['prefix' => 'editor'], function () {
		 Route::get('/login', 'EditorAuth\LoginController@showLoginForm');
		 Route::post('/login', 'EditorAuth\LoginController@login');
		 Route::post('/logout', 'EditorAuth\LoginController@logout');

		 Route::get('/register', 'EditorAuth\RegisterController@showRegistrationForm');
		 Route::post('/register', 'EditorAuth\RegisterController@register');

		 Route::post('/password/email', 'EditorAuth\ForgotPasswordController@sendResetLinkEmail');
		 Route::post('/password/reset', 'EditorAuth\ResetPasswordController@reset');
		 Route::get('/password/reset', 'EditorAuth\ForgotPasswordController@showLinkRequestForm');
		 Route::get('/password/reset/{token}', 'EditorAuth\ResetPasswordController@showResetForm');
	 });

	 Route::group(['prefix' => 'analyst'], function () {
		 Route::get('/login', 'AnalystAuth\LoginController@showLoginForm');
		 Route::post('/login', 'AnalystAuth\LoginController@login');
		 Route::post('/logout', 'AnalystAuth\LoginController@logout');

		 Route::get('/register', 'AnalystAuth\RegisterController@showRegistrationForm');
		 Route::post('/register', 'AnalystAuth\RegisterController@register');

		 Route::post('/password/email', 'AnalystAuth\ForgotPasswordController@sendResetLinkEmail');
		 Route::post('/password/reset', 'AnalystAuth\ResetPasswordController@reset');
		 Route::get('/password/reset', 'AnalystAuth\ForgotPasswordController@showLinkRequestForm');
		 Route::get('/password/reset/{token}', 'AnalystAuth\ResetPasswordController@showResetForm');
	 }); */
});