<?php

namespace App\Http\Controllers;

use App\Page;
use App\Region;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class PagesControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $pages = DB::table('pages')->orderBy('id', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.pages.index', compact('settings', 'pages'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        return view('admin.plugins.pages.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $rules = [
            'region_id'       => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:pages|max:255',
            'description'     => 'max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $page = new Page;
            $page->region_id = trim(Input::get('region_id'));
            $page->is_active = Input::get('is_active');
            $page->name = trim(Input::get('name'));
            $page->slug = trim(str_slug(str_slug(Input::get('slug'))));
            $page->description = trim(Input::get('description'));
            $page->seo_title = trim(Input::get('seo_title'));
            $page->seo_description = trim(Input::get('seo_description'));
            $page->seo_keywords = trim(Input::get('seo_keywords'));
            $page->save();

            return Redirect::to(route('admin.pages.index'))->with('pageCreated', ucwords(Input::get('name')) . ' Page created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editPage = Page::where('slug', $slug)->get();

        return view('admin.plugins.pages.edit', compact('settings', 'editPage'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'region_id'       => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'required|max:255|unique:pages,slug,' . $id,
            'description'     => 'max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $page = Page::findOrFail($id);
            $page->region_id = trim(Input::get('region_id'));
            $page->is_active = Input::get('is_active');
            $page->name = trim(Input::get('name'));
            $page->slug = trim(str_slug(Input::get('slug')));
            $page->description = trim(Input::get('description'));
            $page->seo_title = trim(Input::get('seo_title'));
            $page->seo_description = trim(Input::get('seo_description'));
            $page->seo_keywords = trim(Input::get('seo_keywords'));
            $page->save();

            return Redirect::to(route('admin.pages.index'))->with('pageUpdated', ucwords(Input::get('name')) . ' Page updated successfully.');
        }
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return Redirect::to(route('admin.pages.index'))->with('pageDeleted', 'Page deleted successfully.');
    }
}