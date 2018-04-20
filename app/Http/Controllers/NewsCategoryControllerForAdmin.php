<?php

namespace App\Http\Controllers;

use App\NewsCategory;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class NewsCategoryControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $news_categories = DB::table('news_categories')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.news-categories.index', compact('settings', 'news_categories'));
    }

    public function store()
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:news_categories|max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $newsCategory = new NewsCategory;
            $newsCategory->is_active = Input::get('is_active');
            $newsCategory->name = trim(Input::get('name'));
            $newsCategory->slug = trim(str_slug(Input::get('slug')));
            $newsCategory->save();

            return Redirect::to(route('admin.news-categories.index'))->with('newsCategoryCreated', 'News Category created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editNewsCategory = NewsCategory::where('slug', $slug)->get();

        return view('admin.plugins.news-categories.edit', compact('settings', 'editNewsCategory'));
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:news_categories,slug,' . $id,
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $newsCategory = NewsCategory::findOrFail($id);
            $newsCategory->is_active = Input::get('is_active');
            $newsCategory->name = trim(Input::get('name'));
            $newsCategory->slug = trim(str_slug(Input::get('slug')));
            $newsCategory->save();

            return Redirect::to(route('admin.news-categories.index'))->with('newsCategoryUpdated', 'News Category updated successfully.');
        }
    }

    public function destroy($id)
    {
        $newsCategory = NewsCategory::findOrFail($id);
        $newsCategory->delete();

        return Redirect::to(route('admin.news-categories.index'))->with('newsCategoryDeleted', 'News Category deleted successfully.');
    }
}