<?php

namespace App\Http\Controllers;

use App\Services\BS;
use AWeberAPI;
use Illuminate\Http\Request;
use Validator;

class AweberController {
	function __construct() {
		$this->consumerKey    = 'AkvahWSwtBt0tSmzC71J3nzG';
		$this->consumerSecret = 'HUkIm3dhI7ztaXdevroUcrE5YHxoQCbYtnfYjh8u';
		$this->accessToken    = 'AgOWqJySk0DiLcxiiH1O0dCD';
		$this->accessSecret   = 'Wwg08TcQNNCV3qxqAeSEKf1ewuZUMxNmMxmzT7nM';

		$this->application = new AWeberAPI($this->consumerKey, $this->consumerSecret);
	}

	public function index() {
		return response()->json(['success' => 'API working.']);
	}

	function addSubscriber(Request $request) {
		# get your aweber account
		$account = $this->application->getAccount($this->accessToken, $this->accessSecret);

		# get your list
		$listUrl = "/accounts/$account->id/lists/4976710";
		$list    = $account->loadFromUrl($listUrl);

		try {

			$email = $request->get('email');

			$rules = [
				'email' => 'required|not_throw_away|email',
			];

			$messages = [
				'not_throw_away' => 'The email domain is invalid or restricted by admin.',
			];

			$validator = Validator::make($request->all(), $rules, $messages);

			if($validator->fails()) {
				return response()->json([$validator->messages()]);
			} else {
				$subscriber = [
					'meta_web_form_id'  => $request->get('meta_web_form_id'),
					'meta_split_id'     => $request->get('meta_split_id'),
					'redirect'          => $request->get('redirect'),
					'meta_adtracking'   => $request->get('meta_adtracking'),
					'meta_message'      => $request->get('meta_message'),
					'meta_required'     => $request->get('meta_required'),
					'meta_forward_vars' => $request->get('meta_forward_vars'),
					'meta_tooltip'      => $request->get('meta_tooltip'),
					'ip_address'        => BS::ipAddress(),
					'email'             => $email,
				];

				# create your subscriber
				$list->subscribers->create($subscriber);

				return response()->json([$subscriber]);
			}
		} catch(\Exception $exc) {
			return response()->json([$exc]);
		}
	}
}