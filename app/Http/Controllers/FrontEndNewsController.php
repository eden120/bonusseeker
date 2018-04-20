<?php

namespace App\Http\Controllers;

use App\Casino;
use App\News;
use App\NewsCategory;
use App\Page;
use App\Region;
use App\Setting;
use Exception;
use Folklore\Image\Facades\Image;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use SEOMeta;
use OpenGraph;
use Twitter;
use SEO;
use Illuminate\Support\Facades\URL;

class FrontEndNewsController extends Controller {
    public function news($region) {
        try {
            $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

            $get_region = Region::whereSlug($region)->first();

            $featuredNews = News::with([
                'region',
                'category',
            ])->orderBy('updated_at', 'desc')->orderBy('is_featured', 'desc')->where([
                'region_id'   => $get_region->id,
                'is_active'   => 1,
                'is_featured' => 1,
            ])->take(2)->get();

            $publishedNews = News::with([
                'region',
                'category',
            ])->orderBy('updated_at', 'desc')->where([
                'region_id'   => $get_region->id,
                'is_active'   => 1,
                'is_featured' => 0,
            ])->paginate(50);

            $categories = NewsCategory::orderBy('name')->where(['is_active' => 1])->pluck('name');

            $casinoSpecialOffers = Casino::orderBy('sort_by')->where([
                'region_id' => 1,
                'is_active' => 1,
            ])->where('sort_by', '>', 1)->take(4)->get(['cta_link', 'cta_text', 'logo']);

            // SEO Meta Section
            $page_contents = Page::whereId(6)->get();

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

            return view('frontend.news-pages.index', compact('settings', 'featuredNews', 'publishedNews', 'categories', 'casinoSpecialOffers'));
        }
        catch(Exception $exception) {
            return view('errors.404');
            //return $exception->getMessage();
        }
    }

    public function showNews($region, $slug) {
        $settings   = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $news       = News::with('category')->where('slug', $slug)->first();
        $categories = NewsCategory::orderBy('name')->where(['is_active' => 1])->pluck('name');

        if( ! empty($news)) {
            $casinoSpecialOffers = Casino::orderBy('sort_by')->where([
                'region_id' => 1,
                'is_active' => 1,
            ])->where('sort_by', '>', 1)->take(4)->get(['cta_link', 'cta_text', 'logo']);

            // SEO Meta Section
            SEOMeta::setTitle($news->seo_title);
            SEOMeta::setDescription($news->seo_description);
            SEOMeta::addMeta('og:updated_time', $news->updated_at->toW3CString(), 'property');
            OpenGraph::setDescription($news->seo_description);
            OpenGraph::setTitle($news->seo_title);
            OpenGraph::setUrl(URL::current());
            OpenGraph::addProperty('see_also', URL::current());
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('locale', 'en_US');
            OpenGraph::addImage(url(Image::url(Storage::url($news->featured_image), 600, 315)), [
                'height' => 600,
                'width'  => 315,
            ]);
            Twitter::setType('summary');
            Twitter::setTitle($news->seo_title);
            Twitter::setSite(env('TWITTER_USERNAME'));
            Twitter::setDescription($news->seo_description);
            Twitter::setUrl(URL::current());
            Twitter::addImage(url(Image::url(Storage::url($news->featured_image), 600, 315)));

            // End of SEO Meta

            return view('frontend.news-pages.show', compact('settings', 'news', 'categories', 'casinoSpecialOffers'));
        } else {
            return view('errors.404');
            //return $exception->getMessage();
        }
    }
}