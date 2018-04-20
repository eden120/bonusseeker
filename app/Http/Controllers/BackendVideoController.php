<?php

namespace App\Http\Controllers;

use App\Region;
use App\Setting;
use App\Video;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class BackendVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $videos = DB::table('videos')->orderBy('id', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.videos.index', compact('settings', 'videos'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        return view('admin.plugins.videos.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $rules = [
            'region_id'       => 'required',
            'sort_by'         => 'numeric|nullable',
            'name'            => 'required|max:255',
            'slug'            => 'required|unique:videos|max:255',
            'url'             => 'max:1536|url|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $video = new Video;
            $video->region_id = trim(Input::get('region_id'));
            $video->is_active = trim(Input::get('is_active'));
            $video->sort_by = trim(Input::get('sort_by'));
            $video->name = trim(Input::get('name'));
            $video->slug = trim(str_slug(Input::get('slug')));
            $video->url = trim(Input::get('url'));
            $video->seo_title = trim(Input::get('seo_title'));
            $video->seo_description = trim(Input::get('seo_description'));
            $video->seo_keywords = trim(Input::get('seo_keywords'));
            $video->save();

            return Redirect::to(route('admin.videos.index'))->with('videoCreated', ucwords(Input::get('name')) . ' Video created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editVideo = Video::where('slug', $slug)->get();

        return view('admin.plugins.videos.edit', compact('settings', 'editVideo'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'region_id'       => 'required',
            'sort_by'         => 'numeric|nullable',
            'name'            => 'required|max:255',
            'slug'            => 'required|max:255|unique:videos,slug,' . $id,
            'url'             => 'max:1536|url|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $video = Video::findOrFail($id);
            $video->region_id = trim(Input::get('region_id'));
            $video->is_active = trim(Input::get('is_active'));
            $video->sort_by = trim(Input::get('sort_by'));
            $video->name = trim(Input::get('name'));
            $video->slug = trim(str_slug(Input::get('slug')));
            $video->url = trim(Input::get('url'));
            $video->seo_title = trim(Input::get('seo_title'));
            $video->seo_description = trim(Input::get('seo_description'));
            $video->seo_keywords = trim(Input::get('seo_keywords'));
            $video->save();

            return Redirect::to(route('admin.videos.index'))->with('videoUpdated', ucwords(Input::get('name')) . ' Video updated successfully.');
        }
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return Redirect::to(route('admin.videos.index'))->with('videoDeleted', 'Video deleted successfully.');
    }
}