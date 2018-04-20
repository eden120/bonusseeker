<?php

namespace App\Http\Controllers;

use App\PageModule;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class PagesModuleControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $page_modules = DB::table('page_modules')->orderBy('id', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.page-modules.index', compact('settings', 'page_modules'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        return view('admin.plugins.page-modules.create', compact('settings'));
    }

    public function store()
    {
        $rules = [
            'title'           => 'required|max:255',
            'page_id'         => 'required',
            'sort_by'         => 'required|numeric|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $page_module = new PageModule;
            $page_module->page_id = trim(Input::get('page_id'));
            $page_module->is_active = Input::get('is_active');
            $page_module->title = trim(Input::get('title'));
            $page_module->contents = trim(Input::get('contents'));
            $page_module->sort_by = trim(Input::get('sort_by'));
            $page_module->seo_title = trim(Input::get('seo_title'));
            $page_module->seo_description = trim(Input::get('seo_description'));
            $page_module->seo_keywords = trim(Input::get('seo_keywords'));
            $page_module->save();

            return Redirect::to(route('admin.page-modules.index'))->with('pageModuleCreated', 'Page Module created successfully.');
        }
    }

    public function edit($id)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editPageModule = PageModule::where('id', $id)->get();

        return view('admin.plugins.page-modules.edit', compact('settings', 'editPageModule'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title'           => 'required|max:255',
            'page_id'         => 'required',
            'sort_by'         => 'required|numeric|nullable',
            'seo_title'       => 'max:255',
            'seo_description' => 'max:255',
            'seo_keywords'    => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $page_module = PageModule::findOrFail($id);
            $page_module->page_id = trim(Input::get('page_id'));
            $page_module->is_active = Input::get('is_active');
            $page_module->title = trim(Input::get('title'));
            $page_module->contents = trim(Input::get('contents'));
            $page_module->sort_by = trim(Input::get('sort_by'));
            $page_module->seo_title = trim(Input::get('seo_title'));
            $page_module->seo_description = trim(Input::get('seo_description'));
            $page_module->seo_keywords = trim(Input::get('seo_keywords'));
            $page_module->save();

            return Redirect::to(route('admin.page-modules.index'))->with('pageModuleUpdated', 'Page Module updated successfully.');
        }
    }

    public function destroy($id)
    {
        $page_module = PageModule::findOrFail($id);
        $page_module->delete();

        return Redirect::to(route('admin.page-modules.index'))->with('pageModuleDeleted', 'Page Module deleted successfully.');
    }
}