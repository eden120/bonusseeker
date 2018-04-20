<?php

namespace App\Http\Controllers;

use App\PromoCode;
use App\Services\randomString;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class PromoCodesControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $promos = DB::table('promo_codes')->orderBy('updated_at', 'desc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.promo-codes.index', compact('settings', 'promos'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.promo-codes.create', compact('settings', 'casinoOperators'));
    }

    public function store(Request $request)
    {
        $rules = [
            'casino_id'            => 'required',
            'promo_type_id'        => 'required',
            'entry_instruction_id' => 'required',
            'name'                 => 'required|max:255',
            'slug'                 => 'required|unique:promo_codes|max:255',
            'sort_by'              => 'numeric|nullable',
            'start_date'           => 'required',
            'end_date'             => 'required',
            'banner'               => 'mimes:jpg,jpeg,png,gif|max:3072|required',
            'promo_code'           => 'max:50',
            'max_promo_amount'     => 'max:30',
            'seo_title'            => 'max:255',
            'seo_description'      => 'max:255',
            'seo_keywords'         => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $startDateInput = $request->get('start_date');
        $startDateFormat = 'Y-m-d H:i:s';
        $startDate = Carbon::createFromFormat($startDateFormat, $startDateInput);

        $endDateInput = $request->get('end_date');
        $endDateFormat = 'Y-m-d H:i:s';
        $endDate = Carbon::createFromFormat($endDateFormat, $endDateInput);

        $stringFifteen = randomString::stringFifteen();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $promoCodeBanner = $request->file('banner');
            $newLogoName = str_slug(trim(Input::get('slug')) . '-' . $stringFifteen) . '.' . $promoCodeBanner->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/promo-codes';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $promoCodeBanner, $newLogoName);

            $promo = new PromoCode;
            $promo->casino_id = Input::get('casino_id');
            $promo->is_active = Input::get('is_active');
            $promo->is_featured = $request->has('is_featured') ? Input::get('is_featured') : 0;
            $promo->sort_by = $request->has('sort_by') ? Input::get('sort_by') : NULL;
            $promo->permalink = str_slug($stringFifteen);
            $promo->name = trim(Input::get('name'));
            $promo->slug = trim(str_slug($stringFifteen . '-' . Input::get('slug')));
            $promo->start_date = $startDate;
            $promo->end_date = $endDate;
            $promo->promo_code = trim(strtoupper(Input::get('promo_code')));
            $promo->max_promo_amount = trim(Input::get('max_promo_amount'));
            $promo->banner = $uploadLogo;
            $promo->description = trim(Input::get('description'));
            $promo->terms_and_conditions = trim(Input::get('terms_and_conditions'));
            $promo->seo_title = trim(Input::get('seo_title'));
            $promo->seo_description = trim(Input::get('seo_description'));
            $promo->seo_keywords = trim(Input::get('seo_keywords'));
            $promo->promo_type_id = Input::get('promo_type_id');
            $promo->entry_instruction_id = Input::get('entry_instruction_id');
            $promo->save();

            return Redirect::to(route('admin.promo-codes.index'))->with('promoCodeCreated', 'Promo Code created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editPromo = PromoCode::where('slug', $slug)->get();
        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.promo-codes.edit', compact('settings', 'editPromo', 'casinoOperators'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'casino_id'            => 'required',
            'promo_type_id'        => 'required',
            'entry_instruction_id' => 'required',
            'name'                 => 'required|max:255',
            'slug'                 => 'max:255|unique:promo_codes,slug,' . $id,
            'sort_by'              => 'numeric|nullable',
            'start_date'           => 'required',
            'end_date'             => 'required',
            'promo_code'           => 'max:50',
            'max_promo_amount'     => 'max:30',
            'seo_title'            => 'max:255',
            'seo_description'      => 'max:255',
            'seo_keywords'         => 'max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $startDateInput = $request->get('start_date');
        $startDateFormat = 'Y-m-d H:i:s';
        $startDate = Carbon::createFromFormat($startDateFormat, $startDateInput);

        $endDateInput = $request->get('end_date');
        $endDateFormat = 'Y-m-d H:i:s';
        $endDate = Carbon::createFromFormat($endDateFormat, $endDateInput);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $promo = PromoCode::findOrFail($id);
            $promo->casino_id = Input::get('casino_id');
            $promo->is_active = Input::get('is_active');
            $promo->is_featured = $request->has('is_featured') ? Input::get('is_featured') : 0;
            $promo->sort_by = $request->has('sort_by') ? Input::get('sort_by') : NULL;
            $promo->name = trim(Input::get('name'));
            $promo->slug = trim(str_slug(Input::get('slug')));
            $promo->start_date = $startDate;
            $promo->end_date = $endDate;
            $promo->promo_code = trim(strtoupper(Input::get('promo_code')));
            $promo->max_promo_amount = trim(Input::get('max_promo_amount'));
            $promo->description = trim(Input::get('description'));
            $promo->terms_and_conditions = trim(Input::get('terms_and_conditions'));
            $promo->seo_title = trim(Input::get('seo_title'));
            $promo->seo_description = trim(Input::get('seo_description'));
            $promo->seo_keywords = trim(Input::get('seo_keywords'));
            $promo->promo_type_id = Input::get('promo_type_id');
            $promo->entry_instruction_id = Input::get('entry_instruction_id');
            $promo->save();

            return Redirect::to(route('admin.promo-codes.index'))->with('promoCodeUpdated', 'Promo Code updated successfully.');
        }
    }

    public function updateBanner(Request $request, $id)
    {
        $rules = [
            'banner' => 'mimes:jpg,jpeg,png,gif|max:3072|required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        $stringFifteen = randomString::stringFifteen();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $promoCodeBanner = $request->file('banner');
            $newLogoName = str_slug(trim($stringFifteen . '-' . Input::get('slug'))) . '.' . $promoCodeBanner->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/promo-codes';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $promoCodeBanner, $newLogoName);

            $promo = PromoCode::findOrFail($id);
            $promo->banner = $uploadLogo;
            $promo->save();

            return Redirect::to(route('admin.promo-codes.index'))->with('promoCodeBannerUpdated', 'Promo Code Banner updated successfully.');
        }
    }

    public function destroy($id)
    {
        $promo = PromoCode::findOrFail($id);
        $promo->delete();

        return Redirect::to(route('admin.promo-codes.index'))->with('promoCodeDeleted', 'Promo Code deleted successfully.');
    }
}