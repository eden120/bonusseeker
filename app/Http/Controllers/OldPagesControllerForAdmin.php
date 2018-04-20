<?php

namespace App\Http\Controllers;

use App\OldPage;
use App\Services\randomString;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Illuminate\Support\Facades\Storage;

class OldPagesControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $old_pages = DB::table('old_pages')->orderBy('id', 'desc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.old-pages.index', compact('settings', 'old_pages'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.old-pages.create', compact('settings', 'casinoOperators'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:old_pages|max:255',
            'sort_by'         => 'numeric|nullable',
            'featured_image'  => 'mimes:jpg,jpeg,png,gif|max:3072|required',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $featuredImage = $request->file('featured_image');
            $newLogoName = str_slug(trim(Input::get('slug')) . '-' . randomString::stringTen()) . '.' . $featuredImage->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/pages';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $featuredImage, $newLogoName);

            $page = new OldPage;
            $page->is_active = Input::get('is_active');
            $page->sort_by = Input::get('sort_by');
            $page->name = trim(Input::get('name'));
            $page->slug = trim(str_slug(Input::get('slug')));
            $page->page_contents = trim(Input::get('page_contents'));
            $page->featured_image = $uploadLogo;
            $page->seo_title = trim(Input::get('seo_title'));
            $page->seo_description = trim(Input::get('seo_description'));
            $page->seo_keywords = trim(Input::get('seo_keywords'));
            $page->save();

            return Redirect::to(route('admin.old-pages.index'))->with('pageCreated', 'Page created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editPage = OldPage::where('slug', $slug)->get();
        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.old-pages.edit', compact('settings', 'editPage', 'casinoOperators'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'            => 'required|max:255',
            'slug'            => 'required|max:255|unique:old_pages,slug,' . $id,
            'sort_by'         => 'numeric|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $page = OldPage::findOrFail($id);
            $page->is_active = Input::get('is_active');
            $page->sort_by = Input::get('sort_by');
            $page->name = trim(Input::get('name'));
            $page->slug = trim(str_slug(Input::get('slug')));
            $page->page_contents = trim(Input::get('page_contents'));
            $page->seo_title = trim(Input::get('seo_title'));
            $page->seo_description = trim(Input::get('seo_description'));
            $page->seo_keywords = trim(Input::get('seo_keywords'));
            $page->save();

            return Redirect::to(route('admin.old-pages.index'))->with('pageUpdated', 'Page updated successfully.');
        }
    }

    public function updateFeaturedImage(Request $request, $id)
    {
        $rules = [
            'featured_image' => 'mimes:jpg,jpeg,png,gif|max:3072|required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $featuredImage = $request->file('featured_image');
            $newLogoName = str_slug(trim(Input::get('slug')) . '-' . randomString::stringTen()) . '.' . $featuredImage->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/pages';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $featuredImage, $newLogoName);

            $page = OldPage::findOrFail($id);
            $page->featured_image = $uploadLogo;
            $page->save();

            return Redirect::to(route('admin.old-pages.index'))->with('pagesFeaturedImageUpdated', 'Pages Featured Image updated successfully.');
        }
    }

    public function destroy($id)
    {
        $page = OldPage::findOrFail($id);
        $page->delete();

        return Redirect::to(route('admin.old-pages.index'))->with('pageDeleted', 'Page deleted successfully.');
    }
}