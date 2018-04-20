<?php

namespace App\Http\Controllers;

use App\Region;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $regions = DB::table('regions')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.regions.index', compact('settings', 'regions'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.regions.create', compact('settings', 'casinoOperators'));
    }

    public function store()
    {
        $rules = [
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:regions|max:255',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $region = new Region;
            $region->is_active = Input::get('is_active');
            $region->name = trim(Input::get('name'));
            $region->region_contents_top = trim(Input::get('region_contents_top'));
            $region->region_contents = trim(Input::get('region_contents'));
            $region->slug = trim(str_slug(Input::get('slug')));
            $region->seo_title = trim(Input::get('seo_title'));
            $region->seo_description = trim(Input::get('seo_description'));
            $region->seo_keywords = trim(Input::get('seo_keywords'));
            $region->save();

            return Redirect::to(route('admin.regions.index'))->with('regionCreated', ucwords(Input::get('name')) . ' Region created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editRegion = Region::where('slug', $slug)->get();

        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.regions.edit', compact('settings', 'editRegion', 'casinoOperators'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'            => 'required|max:255',
            'slug'            => 'required|max:255|unique:regions,slug,' . $id,
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $region = Region::findOrFail($id);
            $region->is_active = Input::get('is_active');
            $region->name = trim(Input::get('name'));
            $region->region_contents_top = trim(Input::get('region_contents_top'));
            $region->region_contents = trim(Input::get('region_contents'));
            $region->slug = trim(str_slug(Input::get('slug')));
            $region->seo_title = trim(Input::get('seo_title'));
            $region->seo_description = trim(Input::get('seo_description'));
            $region->seo_keywords = trim(Input::get('seo_keywords'));
            $region->save();

            return Redirect::to(route('admin.regions.index'))->with('regionUpdated', ucwords(Input::get('name')) . ' Region updated successfully.');
        }
    }

    public function destroy($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return Redirect::to(route('admin.regions.index'))->with('regionDeleted', 'Region deleted successfully.');
    }
}