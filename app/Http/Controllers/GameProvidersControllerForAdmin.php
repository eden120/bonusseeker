<?php

namespace App\Http\Controllers;

use App\GameProvider;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class GameProvidersControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $game_providers = DB::table('game_providers')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.game-providers.index', compact('settings', 'game_providers'));
    }

    public function store()
    {
        $rules = [
            'name'     => 'required|max:255',
            'slug'     => 'required|unique:game_providers|max:255',
            'cta_text' => 'max:100|nullable',
            'cta_link' => 'max:1536|url|nullable',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $gameProvider = new GameProvider;
            $gameProvider->is_active = Input::get('is_active');
            $gameProvider->name = trim(Input::get('name'));
            $gameProvider->slug = trim(str_slug(Input::get('slug')));
            $gameProvider->cta_text = trim(Input::get('cta_text'));
            $gameProvider->cta_link = trim(Input::get('cta_link'));
            $gameProvider->save();

            return Redirect::to(route('admin.game-providers.index'))->with('gameProviderCreated', 'Game Provider created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editGameProvider = GameProvider::where('slug', $slug)->get();

        return view('admin.plugins.game-providers.edit', compact('settings', 'editGameProvider'));
    }

    public function update($id)
    {
        $rules = [
            'name'     => 'required|max:255',
            'slug'     => 'required|max:255|unique:game_providers,slug,' . $id,
            'cta_text' => 'max:100|nullable',
            'cta_link' => 'max:1536|url|nullable',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $gameProvider = GameProvider::findOrFail($id);
            $gameProvider->is_active = Input::get('is_active');
            $gameProvider->name = trim(Input::get('name'));
            $gameProvider->slug = trim(str_slug(Input::get('slug')));
            $gameProvider->cta_text = trim(Input::get('cta_text'));
            $gameProvider->cta_link = trim(Input::get('cta_link'));
            $gameProvider->save();

            return Redirect::to(route('admin.game-providers.index'))->with('gameProviderUpdated', 'Game Provider updated successfully.');
        }
    }

    public function destroy($id)
    {
        $gameProvider = GameProvider::findOrFail($id);
        $gameProvider->delete();

        return Redirect::to(route('admin.game-providers.index'))->with('gameProviderDeleted', 'Game Provider deleted successfully.');
    }
}