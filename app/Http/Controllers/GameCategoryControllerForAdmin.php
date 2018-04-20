<?php

namespace App\Http\Controllers;

use App\GameCategory;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class GameCategoryControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $game_categories = DB::table('game_categories')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.game-categories.index', compact('settings', 'game_categories'));
    }

    public function store()
    {
        $rules = [
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:game_categories|max:255',
            'description'     => 'max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $gameCategory = new GameCategory;
            $gameCategory->is_active = Input::get('is_active');
            $gameCategory->name = trim(Input::get('name'));
            $gameCategory->slug = trim(str_slug(Input::get('slug')));
            $gameCategory->description = trim(Input::get('description'));
            $gameCategory->seo_title = trim(Input::get('seo_title'));
            $gameCategory->seo_description = trim(Input::get('seo_description'));
            $gameCategory->seo_keywords = trim(Input::get('seo_keywords'));
            $gameCategory->save();

            return Redirect::to(route('admin.game-categories.index'))->with('gameCategoryCreated', 'Game Category created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editGameCategory = GameCategory::where('slug', $slug)->get();

        return view('admin.plugins.game-categories.edit', compact('settings', 'editGameCategory'));
    }

    public function update($id)
    {
        $rules = [
            'name'            => 'required|max:255',
            'slug'            => 'max:255|unique:game_categories,slug,' . $id,
            'description'     => 'max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $gameCategory = GameCategory::findOrFail($id);
            $gameCategory->is_active = Input::get('is_active');
            $gameCategory->name = trim(Input::get('name'));
            $gameCategory->slug = trim(str_slug(Input::get('slug')));
            $gameCategory->description = trim(Input::get('description'));
            $gameCategory->seo_title = trim(Input::get('seo_title'));
            $gameCategory->seo_description = trim(Input::get('seo_description'));
            $gameCategory->seo_keywords = trim(Input::get('seo_keywords'));
            $gameCategory->save();

            return Redirect::to(route('admin.game-categories.index'))->with('gameCategoryUpdated', 'Game Category updated successfully.');
        }
    }

    public function destroy($id)
    {
        $gameCategory = GameCategory::findOrFail($id);
        $gameCategory->delete();

        return Redirect::to(route('admin.game-categories.index'))->with('gameCategoryDeleted', 'Game Category deleted successfully.');
    }
}