<?php

namespace App\Http\Controllers;

use App\GameSubcategory;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class GameSubcategoryControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $game_subcategories = DB::table('game_subcategories')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.game-subcategories.index', compact('settings', 'game_subcategories'));
    }

    public function store()
    {
        $rules = [
            'category_id'     => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:game_subcategories|max:255',
            'description'     => 'max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $gameSubcategory = new GameSubcategory;
            $gameSubcategory->category_id = Input::get('category_id');
            $gameSubcategory->is_active = Input::get('is_active');
            $gameSubcategory->name = trim(Input::get('name'));
            $gameSubcategory->slug = trim(str_slug(Input::get('slug')));
            $gameSubcategory->description = trim(Input::get('description'));
            $gameSubcategory->seo_title = trim(Input::get('seo_title'));
            $gameSubcategory->seo_description = trim(Input::get('seo_description'));
            $gameSubcategory->seo_keywords = trim(Input::get('seo_keywords'));
            $gameSubcategory->save();

            return Redirect::to(route('admin.game-subcategories.index'))->with('gameSubcategoryCreated', 'Game Subcategory created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editGameSubcategory = GameSubcategory::where('slug', $slug)->get();

        return view('admin.plugins.game-subcategories.edit', compact('settings', 'editGameSubcategory'));
    }

    public function update($id)
    {
        $rules = [
            'category_id'     => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'max:255|unique:game_subcategories,slug,' . $id,
            'description'     => 'max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $gameSubcategory = GameSubcategory::findOrFail($id);
            $gameSubcategory->category_id = Input::get('category_id');
            $gameSubcategory->is_active = Input::get('is_active');
            $gameSubcategory->name = trim(Input::get('name'));
            $gameSubcategory->slug = trim(str_slug(Input::get('slug')));
            $gameSubcategory->description = trim(Input::get('description'));
            $gameSubcategory->seo_title = trim(Input::get('seo_title'));
            $gameSubcategory->seo_description = trim(Input::get('seo_description'));
            $gameSubcategory->seo_keywords = trim(Input::get('seo_keywords'));
            $gameSubcategory->save();

            return Redirect::to(route('admin.game-subcategories.index'))->with('gameSubcategoryUpdated', 'Game Subcategory updated successfully.');
        }
    }

    public function destroy($id)
    {
        $gameSubcategory = GameSubcategory::findOrFail($id);
        $gameSubcategory->delete();

        return Redirect::to(route('admin.game-subcategories.index'))->with('gameSubcategoryDeleted', 'Game Subcategory deleted successfully.');
    }
}