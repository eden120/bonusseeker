<?php

namespace App\Http\Controllers;

use App\PromoEntryInstruction;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class PromoEntryInstructionsControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $promoEntryInstruction = DB::table('promo_entry_instructions')->orderBy('name', 'asc')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(25);

        return view('admin.plugins.how-to-enter.index', compact('settings', 'promoEntryInstruction'));
    }

    public function store()
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:promo_entry_instructions|max:255',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            $promoEntry = new PromoEntryInstruction;
            $promoEntry->is_active = Input::get('is_active');
            $promoEntry->name = trim(Input::get('name'));
            $promoEntry->slug = trim(str_slug(Input::get('slug')));
            $promoEntry->save();

            return Redirect::to(route('admin.how-to-enter.index'))->with('promoEntryCreated', 'How To Enter created successfully.');
        }
    }

    public function edit($slug)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $editPromoEntry = PromoEntryInstruction::where('slug', $slug)->get();

        return view('admin.plugins.how-to-enter.edit', compact('settings', 'editPromoEntry'));
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:promo_entry_instructions,slug,' . $id,
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $promoEntry = PromoEntryInstruction::findOrFail($id);
            $promoEntry->is_active = Input::get('is_active');
            $promoEntry->name = trim(Input::get('name'));
            $promoEntry->slug = trim(str_slug(Input::get('slug')));
            $promoEntry->save();

            return Redirect::to(route('admin.how-to-enter.index'))->with('promoEntryUpdated', 'How To Enter updated successfully.');
        }
    }

    public function destroy($id)
    {
        $promoEntry = PromoEntryInstruction::findOrFail($id);
        $promoEntry->delete();

        return Redirect::to(route('admin.how-to-enter.index'))->with('promoEntryDeleted', 'How To Enter deleted successfully.');
    }
}