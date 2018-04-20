<?php

namespace App\Http\Controllers;

use App\Casino;
use App\OperatorSlider;
use App\Services\BS;
use App\Setting;
use Illuminate\Http\Request;
use Storage;
use Validator;

class OperatorSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $operator_sliders = OperatorSlider::with('casino')->orderByDesc('id')->where(['is_active' => 1])->orWhere(['is_active' => 0])->paginate(30);
        $casinos = Casino::orderBy('name')->where(['is_active' => 1])->get();

        return view('admin.plugins.operator-sliders.index', compact('settings', 'operator_sliders', 'casinos'));
    }

    public function store(Request $request)
    {
        $rules = [
            'casino_id'    => 'required',
            'uuid'         => 'unique:operator_sliders|max:36',
            'name'         => 'max:255',
            'slider_image' => 'mimes:jpg,jpeg,png,gif|max:3072|required',
        ];

        $validator = Validator::make($request->all(), $rules);

        $findCasino = Casino::whereId($request->get('casino_id'))->first();

        $uuid = BS::uuid();
        $uuidSplit = str_limit($uuid, 8, '');

        $name = $request->get('name') ?: $findCasino->name;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $OperatorSlider = $request->file('slider_image');
            $newLogoName = str_slug($name . '-' . $uuidSplit) . '.' . $OperatorSlider->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/operator-sliders';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $OperatorSlider, $newLogoName);

            $operator_slider = new OperatorSlider;
            $operator_slider->casino_id = $request->get('casino_id');
            $operator_slider->is_active = TRUE;
            $operator_slider->uuid = $uuid;
            $operator_slider->name = $request->get('name') ?: $findCasino->name . ' - ' . strtoupper($uuidSplit);
            $operator_slider->slider_image = $uploadLogo;
            $operator_slider->save();

            return redirect()->route('admin.operator-slider.edit', ['uuid' => $operator_slider->uuid])->with('operatorSliderCreated', $operator_slider->name);
        }
    }

    public function edit($uuid)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $slider = OperatorSlider::whereUuid($uuid)->first();
        $casinos = Casino::orderBy('name')->where(['is_active' => 1])->get();

        return view('admin.plugins.operator-sliders.edit', compact('settings', 'slider', 'casinos'));
    }

    public function update(Request $request, $uuid)
    {
        $findCasino = Casino::whereId($request->get('casino_id'))->first();

        $rules = [
            'casino_id' => 'required',
            'uuid'      => 'max:36|unique:operator_sliders,uuid,' . $findCasino->id,
            'name'      => 'max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        $uuid5 = BS::uuid();
        $uuidSplit = str_limit($uuid5, 8, '');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $operator_slider = OperatorSlider::whereUuid($uuid)->first();
            $operator_slider->casino_id = $request->get('casino_id');
            $operator_slider->is_active = $request->get('is_active');
            $operator_slider->name = $request->get('name') ?: $findCasino->name . ' - ' . strtoupper($uuidSplit);
            $operator_slider->save();

            return redirect()->route('admin.operator-slider.edit', ['uuid' => $operator_slider->uuid])->with('operatorSliderUpdated', $operator_slider->name);
        }
    }

    public function updateSliderImage(Request $request, $uuid)
    {
        $findCasino = Casino::whereId($request->get('casino_id'))->first();

        $rules = [
            'slider_image' => 'required|mimes:jpg,jpeg,png,gif|max:3072',
        ];

        $validator = Validator::make($request->all(), $rules);

        $uuid5 = BS::uuid();
        $uuidSplit = str_limit($uuid5, 8, '');

        $name = $findCasino->name;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $OperatorSlider = $request->file('slider_image');
            $newLogoName = str_slug($name . '-' . $uuidSplit) . '.' . $OperatorSlider->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/operator-sliders';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $OperatorSlider, $newLogoName);
            //
            $operator_slider = OperatorSlider::whereUuid($uuid)->first();
            $operator_slider->slider_image = $uploadLogo;
            $operator_slider->save();

            return redirect()->route('admin.operator-slider.edit', ['uuid' => $operator_slider->uuid])->with('OperatorSliderImageUpdated', $operator_slider->name);
        }
    }

    public function destroy($uuid)
    {
        $operator_slider = OperatorSlider::whereUuid($uuid)->first();
        $operator_slider->delete();

        Storage::delete($operator_slider->slider_image);

        return redirect()->route('admin.operator-slider.index')->with('OperatorSliderDeleted', $operator_slider->name);
    }
}