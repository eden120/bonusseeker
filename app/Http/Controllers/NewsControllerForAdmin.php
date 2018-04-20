<?php

namespace App\Http\Controllers;

use App\News;
use App\Region;
use App\Services\randomString;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class NewsControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $allNews = DB::table('news')->orderBy('id', 'desc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.news.index', compact('settings', 'allNews'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.news.create', compact('settings', 'casinoOperators'));
    }

    public function store(Request $request)
    {
        $rules = [
            'region_id'       => 'required',
            'category_id'     => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:news|max:255',
            'sort_by'         => 'numeric|nullable',
            'featured_image'  => 'mimes:jpg,jpeg,png,gif|max:3072|required',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $stringFifteen = randomString::stringFifteen();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $newsFeaturedImage = $request->file('featured_image');
            $newImageName = str_slug($stringFifteen . '-' . trim(Input::get('slug'))) . '.' . $newsFeaturedImage->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/news';
            $uploadImage = $localStorage->putFileAs($fileStorage, $newsFeaturedImage, $newImageName);

            $news = new News;
            $news->region_id = trim(Input::get('region_id'));
            $news->category_id = Input::get('category_id');
            $news->is_active = Input::get('is_active');
            $news->is_featured = Input::get('is_featured');
            $news->know_before_you_play = Input::get('know_before_you_play');
            $news->is_trending = Input::get('is_trending');
            $news->sort_by = Input::get('sort_by');
            $news->name = trim(Input::get('name'));
            $news->slug = trim(str_slug(Input::get('slug')));
            $news->featured_image = $uploadImage;
            $news->news_content = trim(Input::get('news_content'));
            $news->seo_title = trim(Input::get('seo_title'));
            $news->seo_description = trim(Input::get('seo_description'));
            $news->seo_keywords = trim(Input::get('seo_keywords'));
            $news->save();

            return Redirect::to(route('admin.news.index'))->with('newsCreated', ucwords(Input::get('name')) . ' News created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editNews = News::where('slug', $slug)->get();

        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.news.edit', compact('settings', 'editNews', 'casinoOperators'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'region_id'       => 'required',
            'category_id'     => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'required|max:255|unique:news,slug,' . $id,
            'sort_by'         => 'numeric|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $news = News::findOrFail($id);
            $news->region_id = trim(Input::get('region_id'));
            $news->category_id = Input::get('category_id');
            $news->is_active = Input::get('is_active');
            $news->is_featured = Input::get('is_featured');
            $news->know_before_you_play = Input::get('know_before_you_play');
            $news->is_trending = Input::get('is_trending');
            $news->sort_by = Input::get('sort_by');
            $news->name = trim(Input::get('name'));
            $news->slug = trim(str_slug(Input::get('slug')));
            $news->news_content = trim(Input::get('news_content'));
            $news->seo_title = trim(Input::get('seo_title'));
            $news->seo_description = trim(Input::get('seo_description'));
            $news->seo_keywords = trim(Input::get('seo_keywords'));
            $news->save();

            return Redirect::to(route('admin.news.index'))->with('newsUpdated', ucwords(Input::get('name')) . ' News updated successfully.');
        }
    }

    public function updateFeaturedImage(Request $request, $id)
    {
        $rules = [
            'featured_image' => 'mimes:jpg,jpeg,png,gif|max:3072|required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $stringFifteen = randomString::stringFifteen();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $newsFeaturedImage = $request->file('featured_image');
            $newImageName = str_slug($stringFifteen . '-' . trim(Input::get('slug'))) . '.' . $newsFeaturedImage->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/news';
            $uploadImage = $localStorage->putFileAs($fileStorage, $newsFeaturedImage, $newImageName);

            $news = News::findOrFail($id);
            $news->featured_image = $uploadImage;
            $news->save();

            return Redirect::to(route('admin.news.index'))->with('newsFeaturedImageUpdated', 'News Featured Image updated successfully.');
        }
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return Redirect::to(route('admin.news.index'))->with('newsDeleted', 'News deleted successfully.');
    }
}