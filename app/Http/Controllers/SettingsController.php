<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Storage;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        return view('admin.plugins.settings.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'                     => 'required|max:100',
            'slogan'                   => 'max:100',
            'author'                   => 'max:100',
            'owner'                    => 'max:100',
            'email'                    => 'email|max:100',
            'phone'                    => 'max:20',
            'google_analytics'         => 'required|max:30',
            'facebook_analytics'       => 'max:30',
            'google_site_verification' => 'max:100',
            'bing_site_verification'   => 'max:100',
            'seo_title'                => 'max:255',
            'seo_description'          => 'max:255',
            'seo_keywords'             => 'max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $setting = Setting::findOrFail($id);
            $setting->name = trim(Input::get('name'));
            $setting->slogan = trim(Input::get('slogan'));
            $setting->author = trim(Input::get('author'));
            $setting->owner = trim(Input::get('owner'));
            $setting->email = trim(Input::get('email'));
            $setting->phone = trim(Input::get('phone'));
            $setting->google_analytics = trim(Input::get('google_analytics'));
            $setting->facebook_analytics = trim(Input::get('facebook_analytics'));
            $setting->google_site_verification = trim(Input::get('google_site_verification'));
            $setting->bing_site_verification = trim(Input::get('bing_site_verification'));
            $setting->seo_title = trim(Input::get('seo_title'));
            $setting->seo_description = trim(Input::get('seo_description'));
            $setting->seo_keywords = trim(Input::get('seo_keywords'));
            $setting->save();

            return Redirect::to(route('admin.settings.index'))->with('settingsUpdated', 'Settings updated successfully.');
        }
    }

    public function updateLogo(Request $request, $id)
    {
        $rules = [
            'logo' => 'mimes:jpg,jpeg,png,gif,svg|max:512|required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->hasFile('logo')) {
                $siteLogo = $request->file('logo');
                $newLogoName = 'logo-' . Carbon::now()->format('mdy-his') . '.' . $siteLogo->getClientOriginalExtension();
                $localStorage = Storage::disk('local');
                $fileStorage = '/public/logo';
                $uploadLogo = $localStorage->putFileAs($fileStorage, $siteLogo, $newLogoName);
                $setting = Setting::findOrFail($id);
                $setting->logo = $uploadLogo;
                $setting->save();

                return Redirect::to(route('admin.settings.index'))->with('siteLogoUpdated', 'Site Logo updated successfully.');
            } else {
                return Redirect::to(route('admin.settings.index'))->with('siteLogoNotSelected', 'No Site Logo selected. Please select first.');
            }
        }
    }

    public function destroyLogo($id)
    {
        $setting = Setting::findOrFail($id);
        Storage::delete($setting->logo);
        $setting->logo = '';
        $setting->save();

        return Redirect::to(route('admin.settings.index'))->with('siteLogoDeleted', 'Site Logo deleted successfully.');
    }
}