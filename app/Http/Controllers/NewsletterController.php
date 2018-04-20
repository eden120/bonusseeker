<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\Setting;
use Illuminate\Http\Request;

class NewsletterController extends Controller {

	public function __construct() {
		$this->middleware('admin', ['except' => []]);
	}

	public function index() {
		$settings    = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$subscribers = Newsletter::whereIsActive(1)->get();

		return view('admin.plugins.newsletter.index', compact('settings', 'subscribers'));
	}

	public function archived() {
		$settings    = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$subscribers = Newsletter::whereIsActive(0)->get();

		return view('admin.plugins.newsletter.archive', compact('settings', 'subscribers'));
	}

	public function export() {
		$settings    = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
		$subscribers = Newsletter::whereIsActive(1)->get();

		return view('admin.plugins.newsletter.export', compact('settings', 'subscribers'));
	}

	public function create() {
		//
	}

	public function store(Request $request) {
		//
	}

	public function show($id) {
		//
	}

	public function edit($id) {
		//
	}

	public function update(Request $request, $id) {
		$newsletter            = Newsletter::findOrFail($id);
		$newsletter->is_active = decrypt($request->get('is_active'));
		$newsletter->save();

		return redirect()->back()->with('subscriberArchived', strtoupper($newsletter->email));
	}

	public function destroy($id) {
		//
	}
}