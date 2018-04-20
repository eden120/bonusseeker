<?php

namespace App\Http\Controllers;

use App\PromoType;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class PromoTypesControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $promo_types = DB::table('promo_types')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.promo-types.index', compact('settings', 'promo_types'));
    }

    public function store()
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:promo_types|max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $promoType = new PromoType;
            $promoType->is_active = Input::get('is_active');
            $promoType->name = trim(Input::get('name'));
            $promoType->slug = trim(str_slug(Input::get('slug')));
            $promoType->save();

            return Redirect::to(route('admin.promo-types.index'))->with('promoTypeCreated', 'Promo Type created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editPromoType = PromoType::where('slug', $slug)->get();

        return view('admin.plugins.promo-types.edit', compact('settings', 'editPromoType'));
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:promo_types,slug,' . $id,
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $promoType = PromoType::findOrFail($id);
            $promoType->is_active = Input::get('is_active');
            $promoType->name = trim(Input::get('name'));
            $promoType->slug = trim(str_slug(Input::get('slug')));
            $promoType->save();

            return Redirect::to(route('admin.promo-types.index'))->with('promoTypeUpdated', 'Promo Type updated successfully.');
        }
    }

    public function destroy($id)
    {
        $promoType = PromoType::findOrFail($id);
        $promoType->delete();

        return Redirect::to(route('admin.promo-types.index'))->with('promoTypeDeleted', 'Promo Type deleted successfully.');
    }
}