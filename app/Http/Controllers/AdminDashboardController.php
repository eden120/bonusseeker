<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Spatie\Analytics\AnalyticsFacade;
use Spatie\Analytics\Period;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function fileManager()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        return view('admin.plugins.file-manager.index', compact('settings'));
    }

    public function siteAnalytics()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $fetch_visitors_and_page_views = AnalyticsFacade::fetchVisitorsAndPageViews(Period::days(30));
        $fetch_total_visitors_and_page_views = AnalyticsFacade::fetchTotalVisitorsAndPageViews(Period::days(30));
        $fetch_top_referrers = AnalyticsFacade::fetchTopReferrers(Period::days(30));
        $fetch_top_browsers = AnalyticsFacade::fetchTopBrowsers(Period::days(30));

        return view('admin.pages.analytics', compact('settings', 'fetch_visitors_and_page_views', 'fetch_total_visitors_and_page_views', 'fetch_top_referrers', 'fetch_top_browsers'));
    }
}