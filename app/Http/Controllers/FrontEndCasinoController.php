<?php

namespace App\Http\Controllers;

use App\Casino;
use App\Page;
use App\PageModule;
use App\PromoCode;
use App\Setting;
use Folklore\Image\Facades\Image;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use SEOMeta;
use OpenGraph;
use Twitter;
use SEO;
use Illuminate\Support\Facades\URL;

class FrontEndCasinoController extends Controller
{
    public function showCasino($slug)
    {
        $settings   = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $showCasino = Casino::where('slug', $slug)->get();

        // SEO Meta Section
        if (!empty($showCasino)) {
            foreach ($showCasino as $show_casino) :
                SEOMeta::setTitle($show_casino->seo_title);
                SEOMeta::setDescription($show_casino->seo_description);
                SEOMeta::addMeta('og:updated_time', $show_casino->updated_at->toW3CString(), 'property');
                OpenGraph::setDescription($show_casino->seo_description);
                OpenGraph::setTitle($show_casino->seo_title);
                OpenGraph::setUrl(URL::current());
                OpenGraph::addProperty('see_also', URL::current());
                OpenGraph::addProperty('type', 'website');
                OpenGraph::addProperty('locale', 'en_US');
                OpenGraph::addImage(url(Image::url(Storage::url($show_casino->logo), 600, 315)), ['height' => 600, 'width' => 315]);
                Twitter::setType('summary');
                Twitter::setTitle($show_casino->seo_title);
                Twitter::setSite(env('TWITTER_USERNAME'));
                Twitter::setDescription($show_casino->seo_description);
                Twitter::setUrl(URL::current());
                Twitter::addImage(url(Image::url(Storage::url($show_casino->logo), 600, 315)));
            endforeach;
        }

        // End of SEO Meta

        return view('frontend.casino-pages.show-casino', compact('settings', 'showCasino'));
    }

    public function promoCodes($region)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        if (\App\Region::whereSlug($region)->exists()) {
            $runningPromoCodes  = DB::table('promo_codes')->orderBy('end_date', 'asc')->where(['is_active' => 1])->paginate(50);
            $comingUpPromoCodes = DB::table('promo_codes')->orderBy('start_date', 'asc')->where(['is_active' => 1])->paginate(50);
            $endedPromoCodes    = DB::table('promo_codes')->orderBy('start_date', 'asc')->where(['is_active' => 1])->paginate(50);
            //
            $casinos = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['region_id' => 1])->where(['id' => 10])->where(['is_active' => 1])->take(1)->get();
            //
            $casinoSpecialOffers = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['region_id' => 1])->where(['is_active' => 1])->where('sort_by', '>', 1)->take(4)->get();

            // SEO Meta Section
            $page_contents = Page::whereId(4)->get();

            if (!empty($page_contents)) {
                foreach ($page_contents as $page_content) :
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
        }

        return view('frontend.casino-pages.promo-codes', compact('settings', 'runningPromoCodes', 'comingUpPromoCodes', 'endedPromoCodes', 'casinos', 'casinoSpecialOffers'));
    }

    public function showPromo($region, $slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        if (\App\Region::whereSlug($region)->exists()) {
            $promoCode           = PromoCode::where('slug', $slug)->get();
            $casinoSpecialOffers = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['region_id' => 1])->where(['is_active' => 1])->where('sort_by', '>', 1)->take(4)->get();

            // SEO Meta Section
            if (!empty($promoCode)) {
                foreach ($promoCode as $show_promo_code) :
                    SEOMeta::setTitle($show_promo_code->seo_title);
                    SEOMeta::setDescription($show_promo_code->seo_description);
                    SEOMeta::addMeta('og:updated_time', $show_promo_code->updated_at->toW3CString(), 'property');
                    OpenGraph::setDescription($show_promo_code->seo_description);
                    OpenGraph::setTitle($show_promo_code->seo_title);
                    OpenGraph::setUrl(URL::current());
                    OpenGraph::addProperty('see_also', URL::current());
                    OpenGraph::addProperty('type', 'website');
                    OpenGraph::addProperty('locale', 'en_US');
                    OpenGraph::addImage(url(Image::url(Storage::url($show_promo_code->banner), 600, 315)), ['height' => 600, 'width' => 315]);
                    Twitter::setType('summary');
                    Twitter::setTitle($show_promo_code->seo_title);
                    Twitter::setSite(env('TWITTER_USERNAME'));
                    Twitter::setDescription($show_promo_code->seo_description);
                    Twitter::setUrl(URL::current());
                    Twitter::addImage(url(Image::url(Storage::url($show_promo_code->banner), 600, 315)));
                endforeach;
            }

            // End of SEO Meta
        }

        return view('frontend.casino-pages.show-promo', compact('settings', 'promoCode', 'casinoSpecialOffers'));
    }

    public function bonusCodes($region)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        if (\App\Region::whereSlug($region)->exists()) {
            $casinosWhereIn = Casino::orderByDesc('id')->whereIn('id', [5, 3, 1])->orderByRaw('IF(id = 5, 3, 1)')->where(['region_id' => 1])->where(['is_active' => 1])->get();

            $casinosWhereNotIn = Casino::whereNotIn('id', [5, 3, 1])->orderBy('sort_by')->where(['region_id' => 1])->where(['is_active' => 1])->get();

            $casinoSpecialOffers = Casino::orderBy('sort_by')->where(['region_id' => 1])->where(['is_active' => 1])->where('sort_by', '>', 1)->take(4)->get();

            $page_modules = PageModule::whereId(2)->get();

            // SEO Meta Section
            $page_contents = Page::whereId(3)->get();

            if (!empty($page_contents)) {
                foreach ($page_contents as $page_content) :
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
        }

        return view('frontend.casino-pages.bonus-codes', compact('settings', 'casinosWhereIn', 'casinosWhereNotIn', 'casinoSpecialOffers', 'page_modules'));
    }
}