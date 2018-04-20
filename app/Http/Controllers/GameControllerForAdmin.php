<?php

namespace App\Http\Controllers;

use App\Game;
use App\Services\randomString;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\In;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class GameControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $games = DB::table('games')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.games.index', compact('settings', 'games'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        return view('admin.plugins.games.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $rules = [
            'provider_id'     => 'required',
            'category_id'     => 'required',
            'subcategory_id'  => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:games|max:255',
            'sort_by'         => 'numeric|nullable',
            'logo'            => 'mimes:jpg,jpeg,png,gif|max:3072|required',
            'url'             => 'max:1024|url|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $stringFifteen = randomString::stringFifteen();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $gameLogo = $request->file('logo');
            $newLogoName = str_slug($stringFifteen . '-' . trim(Input::get('slug'))) . '.' . $gameLogo->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/games';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $gameLogo, $newLogoName);

            $game = new Game;
            $game->provider_id = Input::get('provider_id');
            $game->category_id = Input::get('category_id');
            $game->subcategory_id = Input::get('subcategory_id');
            $game->is_active = Input::get('is_active');
            $game->is_featured = Input::get('is_featured');
            $game->is_html5 = Input::get('is_html5');
            $game->sort_by = Input::get('sort_by');
            $game->name = trim(Input::get('name'));
            $game->slug = trim(str_slug(Input::get('slug')));
            $game->logo = $uploadLogo;
            $game->description = trim(Input::get('description'));
            $game->url = Input::get('url');
            $game->seo_title = trim(Input::get('seo_title'));
            $game->seo_description = trim(Input::get('seo_description'));
            $game->seo_keywords = trim(Input::get('seo_keywords'));
            $game->save();

            return Redirect::to(route('admin.games.index'))->with('gameCreated', 'Game created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editGame = Game::where('slug', $slug)->get();

        return view('admin.plugins.games.edit', compact('settings', 'editGame'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'provider_id'     => 'required',
            'category_id'     => 'required',
            'subcategory_id'  => 'required',
            'name'            => 'required|max:255',
            'slug'            => 'max:255|unique:games,slug,' . $id,
            'sort_by'         => 'numeric|nullable',
            'url'             => 'max:1024|url|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $game = Game::findOrFail($id);
            $game->provider_id = Input::get('provider_id');
            $game->category_id = Input::get('category_id');
            $game->subcategory_id = Input::get('subcategory_id');
            $game->is_active = Input::get('is_active');
            $game->is_featured = Input::get('is_featured');
            $game->is_html5 = Input::get('is_html5');
            $game->sort_by = Input::get('sort_by');
            $game->name = trim(Input::get('name'));
            $game->slug = trim(str_slug(Input::get('slug')));
            $game->description = trim(Input::get('description'));
            $game->url = Input::get('url');
            $game->seo_title = trim(Input::get('seo_title'));
            $game->seo_description = trim(Input::get('seo_description'));
            $game->seo_keywords = trim(Input::get('seo_keywords'));
            $game->save();

            return Redirect::to(route('admin.games.index'))->with('gameUpdated', 'Game updated successfully.');
        }
    }

    public function updateLogo(Request $request, $id)
    {
        $rules = [
            'logo' => 'mimes:jpg,jpeg,png,gif|max:3072|required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $stringFifteen = randomString::stringFifteen();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $gameLogo = $request->file('logo');
            $newLogoName = str_slug($stringFifteen . '-' . trim(Input::get('slug'))) . '.' . $gameLogo->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/games';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $gameLogo, $newLogoName);

            $game = Game::findOrFail($id);
            $game->logo = $uploadLogo;
            $game->save();

            return Redirect::to(route('admin.games.index'))->with('gameLogoUpdated', 'Game Logo updated successfully.');
        }
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return Redirect::to(route('admin.games.index'))->with('gameDeleted', 'Game deleted successfully.');
    }
}