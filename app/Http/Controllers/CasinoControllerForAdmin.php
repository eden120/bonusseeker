<?php

namespace App\Http\Controllers;

use App\Casino;
use App\Region;
use App\Services\randomString;
use App\Setting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use Redirect;

class CasinoControllerForAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => []]);
    }

    public function index()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $casinos = Casino::with('region')->orderBy('sort_by', 'asc')->paginate(25);

        return view('admin.plugins.casinos.index', compact('settings', 'casinos'));
    }

    public function create()
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();
        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.casinos.create', compact('settings', 'casinoOperators'));
    }

    public function store(Request $request)
    {
        $rules = [
            'region_id'                                => 'required',
            'game_provider_id'                         => 'nullable',
            'sort_by'                                  => 'numeric|nullable',
            'name'                                     => 'required|max:255',
            'uuid'                                     => 'unique:casinos|max:255',
            'slug'                                     => 'required|unique:casinos|max:255',
            'subtitle'                                 => 'max:255',
            'logo'                                     => 'mimes:jpg,jpeg,png,gif|max:3072|required',
            'video'                                    => 'max:1024|url|nullable',
            'special_features'                         => 'max:255',
            'established'                              => 'max:4',
            'payout'                                   => 'max:10',
            'software'                                 => 'max:255',
            'languages'                                => 'max:100',
            'currencies'                               => 'max:100',
            'operating_systems'                        => 'max:100',
            'casino_versions'                          => 'max:255',
            'awards'                                   => 'max:255',
            'phone'                                    => 'nullable',
            'email'                                    => 'max:100|nullable|email',
            'website'                                  => 'max:1024|url|nullable',
            'editors_review_casino_bonus'              => 'numeric|between:0,5|nullable',
            'editors_review_game_selection'            => 'numeric|between:0,5|nullable',
            'editors_review_support'                   => 'numeric|between:0,5|nullable',
            'editors_review_banking'                   => 'numeric|between:0,5|nullable',
            'cashiering_deposit_methods'               => 'max:100',
            'cashiering_minimum_deposit'               => 'max:20',
            'cashiering_withdrawal_methods'            => 'max:100',
            'cashiering_withdrawal_limits'             => 'max:20',
            'cashiering_minimum_withdrawal'            => 'max:20',
            'cashiering_withdrawal_timeframes'         => 'max:30',
            'cta_text'                                 => 'max:255|nullable',
            'cta_link'                                 => 'url|nullable',
            'no_deposit_bonus'                         => 'max:255|nullable',
            'no_deposit_bonus_code'                    => 'max:255|nullable',
            'free_spins'                               => 'max:255|nullable',
            'free_spin_jackpot'                        => 'max:255|nullable',
            'no_deposit_bonus_amount'                  => 'max:255|nullable',
            'no_deposit_bonus_playthrough_requirement' => 'max:255|nullable',
            'no_deposit_bonus_cta'                     => 'max:255|nullable',
            'no_deposit_bonus_info'                    => 'max:255|nullable',
            'first_deposit_bonus'                      => 'max:255|nullable',
            'first_deposit_bonus_code'                 => 'max:255|nullable',
            'first_deposit_bonus_cta'                  => 'max:255|nullable',
            'first_deposit_bonus_info'                 => 'max:255|nullable',
            'play_store_link'                          => 'max:1536|url|nullable',
            'ios_link'                                 => 'max:1536|url|nullable',
            'seo_title'                                => 'max:255',
            'seo_description'                          => 'max:255',
            'seo_keywords'                             => 'max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        $game_providers = $request->has('game_provider_id') ? implode(', ', $request->get('game_provider_id')) : NULL;

        $languages = implode(', ', $request->get('languages'));

        $currencies = implode(', ', $request->get('currencies'));

        $operating_systems = implode(', ', $request->get('operating_systems'));

        $implodePermalink = '';
        for ($i = 1; $i <= 15; $i++) {
            $implodePermalink .= trim(randomString::stringTen()) . ',';
        }

        if ($request->has('pm_visa')) {
            $pm_visa = 1;
        } else {
            $pm_visa = 0;
        }

        if ($request->has('pm_mastercard')) {
            $pm_mastercard = 1;
        } else {
            $pm_mastercard = 0;
        }

        if ($request->has('pm_prepaid_card')) {
            $pm_prepaid_card = 1;
        } else {
            $pm_prepaid_card = 0;
        }

        if ($request->has('pm_cash_at_the_cage')) {
            $pm_cash_at_the_cage = 1;
        } else {
            $pm_cash_at_the_cage = 0;
        }

        if ($request->has('pm_ach')) {
            $pm_ach = 1;
        } else {
            $pm_ach = 0;
        }

        if ($request->has('pm_paypal')) {
            $pm_paypal = 1;
        } else {
            $pm_paypal = 0;
        }

        if ($request->has('pm_skrill')) {
            $pm_skrill = 1;
        } else {
            $pm_skrill = 0;
        }

        if ($request->has('pm_pay_near_me')) {
            $pm_pay_near_me = 1;
        } else {
            $pm_pay_near_me = 0;
        }

        /*
         * Game Types
         */
        if ($request->has('gt_casino_slots')) {
            $gt_casino_slots = 1;
        } else {
            $gt_casino_slots = 0;
        }

        if ($request->has('gt_casino_blackjack')) {
            $gt_casino_blackjack = 1;
        } else {
            $gt_casino_blackjack = 0;
        }

        if ($request->has('gt_casino_roulette')) {
            $gt_casino_roulette = 1;
        } else {
            $gt_casino_roulette = 0;
        }

        if ($request->has('gt_casino_live_games')) {
            $gt_casino_live_games = 1;
        } else {
            $gt_casino_live_games = 0;
        }

        if ($request->has('gt_casino_video_poker')) {
            $gt_casino_video_poker = 1;
        } else {
            $gt_casino_video_poker = 0;
        }

        if ($request->has('gt_casino_baccarat')) {
            $gt_casino_baccarat = 1;
        } else {
            $gt_casino_baccarat = 0;
        }

        if ($request->has('gt_casino_bingo')) {
            $gt_casino_bingo = 1;
        } else {
            $gt_casino_bingo = 0;
        }

        if ($request->has('gt_poker_texas_hold_em')) {
            $gt_poker_texas_hold_em = 1;
        } else {
            $gt_poker_texas_hold_em = 0;
        }

        if ($request->has('gt_poker_omaha')) {
            $gt_poker_omaha = 1;
        } else {
            $gt_poker_omaha = 0;
        }

        if ($request->has('gt_poker_stud')) {
            $gt_poker_stud = 1;
        } else {
            $gt_poker_stud = 0;
        }

        if ($request->has('gt_poker_draw')) {
            $gt_poker_draw = 1;
        } else {
            $gt_poker_draw = 0;
        }

        if ($request->has('gt_sportsbetting_nfl')) {
            $gt_sportsbetting_nfl = 1;
        } else {
            $gt_sportsbetting_nfl = 0;
        }

        if ($request->has('gt_sportsbetting_nba')) {
            $gt_sportsbetting_nba = 1;
        } else {
            $gt_sportsbetting_nba = 0;
        }

        if ($request->has('gt_sportsbetting_mlb')) {
            $gt_sportsbetting_mlb = 1;
        } else {
            $gt_sportsbetting_mlb = 0;
        }

        if ($request->has('gt_sportsbetting_mls')) {
            $gt_sportsbetting_mls = 1;
        } else {
            $gt_sportsbetting_mls = 0;
        }

        if ($request->has('gt_sportsbetting_nhl')) {
            $gt_sportsbetting_nhl = 1;
        } else {
            $gt_sportsbetting_nhl = 0;
        }

        if ($request->has('gt_sportsbetting_epl')) {
            $gt_sportsbetting_epl = 1;
        } else {
            $gt_sportsbetting_epl = 0;
        }

        if ($request->has('gt_sportsbetting_esports')) {
            $gt_sportsbetting_esports = 1;
        } else {
            $gt_sportsbetting_esports = 0;
        }

        if ($request->has('gt_racing_horse_racing')) {
            $gt_racing_horse_racing = 1;
        } else {
            $gt_racing_horse_racing = 0;
        }

        if ($request->has('gt_racing_greyhound_racing')) {
            $gt_racing_greyhound_racing = 1;
        } else {
            $gt_racing_greyhound_racing = 0;
        }
        /*
         * End of Game Types
         */

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $casinoLogo = $request->file('logo');
            $newLogoName = str_slug(trim($request->get('slug')) . '-' . randomString::stringTen()) . '.' . $casinoLogo->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/casino';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $casinoLogo, $newLogoName);

            $casino = new Casino;
            $casino->region_id = trim($request->get('region_id'));
            $casino->game_provider_id = $game_providers;
            $casino->is_active = $request->get('is_active');
            $casino->is_featured = $request->has('is_featured') ? $request->get('is_featured') : 0;
            $casino->sort_by = $request->has('sort_by') ? $request->get('sort_by') : NULL;
            $casino->uuid = randomString::uuid();
            $casino->permalink = rtrim($implodePermalink, ',');
            $casino->name = trim($request->get('name'));
            $casino->slug = trim(str_slug($request->get('slug')));
            $casino->subtitle = trim($request->get('subtitle'));
            $casino->logo = $uploadLogo;
            $casino->video = $request->has('video') ? $request->get('video') : NULL;
            $casino->short_summary = $request->has('short_summary') ? $request->get('short_summary') : NULL;
            $casino->summary = $request->has('summary') ? $request->get('summary') : NULL;
            $casino->special_features = $request->has('special_features') ? $request->get('special_features') : NULL;
            $casino->established = trim($request->get('established'));
            $casino->payout = trim($request->get('payout'));
            $casino->software = trim($request->get('software'));
            $casino->languages = $languages;
            $casino->currencies = $currencies;
            $casino->operating_systems = $operating_systems;
            $casino->casino_versions = trim($request->get('casino_versions'));
            $casino->awards = trim($request->get('awards'));
            $casino->phone = trim($request->get('phone'));
            $casino->email = trim($request->get('email'));
            $casino->website = trim($request->get('website'));
            $casino->live_chat = $request->get('live_chat');
            $casino->editors_review_casino_bonus = $request->has('editors_review_casino_bonus') ? $request->get('editors_review_casino_bonus') : NULL;
            $casino->editors_review_support = $request->has('editors_review_support') ? $request->get('editors_review_support') : NULL;
            $casino->editors_review_game_selection = $request->has('editors_review_game_selection') ? $request->get('editors_review_game_selection') : NULL;
            $casino->editors_review_banking = $request->has('editors_review_banking') ? $request->get('editors_review_banking') : NULL;
            $casino->cashiering_deposit_methods = trim($request->get('cashiering_deposit_methods'));
            $casino->cashiering_minimum_deposit = $request->has('cashiering_minimum_deposit') ? $request->get('cashiering_minimum_deposit') : NULL;
            $casino->cashiering_withdrawal_methods = trim($request->get('cashiering_withdrawal_methods'));
            $casino->cashiering_withdrawal_limits = $request->has('cashiering_withdrawal_limits') ? $request->get('cashiering_withdrawal_limits') : NULL;
            $casino->cashiering_minimum_withdrawal = $request->has('cashiering_minimum_withdrawal') ? $request->get('cashiering_minimum_withdrawal') : NULL;
            $casino->cashiering_withdrawal_timeframes = trim($request->get('cashiering_withdrawal_timeframes'));
            $casino->cta_text = trim($request->get('cta_text'));
            $casino->cta_link = trim($request->get('cta_link'));
            $casino->no_deposit_bonus = $request->has('no_deposit_bonus') ? $request->get('no_deposit_bonus') : NULL;
            $casino->no_deposit_bonus_code = $request->has('no_deposit_bonus_code') ? $request->get('no_deposit_bonus_code') : NULL;
            $casino->free_spins = $request->has('free_spins') ? $request->get('free_spins') : NULL;
            $casino->free_spin_jackpot = $request->has('free_spin_jackpot') ? $request->get('free_spin_jackpot') : NULL;
            $casino->no_deposit_bonus_amount = $request->has('no_deposit_bonus_amount') ? $request->get('no_deposit_bonus_amount') : NULL;
            $casino->no_deposit_bonus_playthrough_requirement = $request->has('no_deposit_bonus_playthrough_requirement') ? $request->get('no_deposit_bonus_playthrough_requirement') : NULL;
            $casino->no_deposit_bonus_cta = $request->has('no_deposit_bonus_cta') ? $request->get('no_deposit_bonus_cta') : NULL;
            $casino->no_deposit_bonus_info = $request->has('no_deposit_bonus_info') ? $request->get('no_deposit_bonus_info') : NULL;
            $casino->no_deposit_bonus_start_day = $request->has('no_deposit_bonus_start_day') ? $request->get('no_deposit_bonus_start_day') : NULL;
            $casino->no_deposit_bonus_end_day = $request->has('no_deposit_bonus_end_day') ? $request->get('no_deposit_bonus_end_day') : NULL;
            $casino->first_deposit_bonus = $request->has('first_deposit_bonus') ? $request->get('first_deposit_bonus') : NULL;
            $casino->first_deposit_bonus_code = $request->has('first_deposit_bonus_code') ? $request->get('first_deposit_bonus_code') : NULL;
            $casino->first_deposit_bonus_cta = $request->has('first_deposit_bonus_cta') ? $request->get('first_deposit_bonus_cta') : NULL;
            $casino->first_deposit_bonus_info = $request->has('first_deposit_bonus_info') ? $request->get('first_deposit_bonus_info') : NULL;
            $casino->first_deposit_bonus_start_day = $request->has('first_deposit_bonus_start_day') ? $request->get('first_deposit_bonus_start_day') : NULL;
            $casino->first_deposit_bonus_end_day = $request->has('first_deposit_bonus_end_day') ? $request->get('first_deposit_bonus_end_day') : NULL;
            $casino->play_store_link = $request->has('play_store_link') ? $request->get('play_store_link') : NULL;
            $casino->ios_link = $request->has('ios_link') ? $request->get('ios_link') : NULL;
            $casino->cont_software = $request->get('cont_software');
            $casino->cont_mobile_app = $request->get('cont_mobile_app');
            $casino->cont_network_partners = $request->get('cont_network_partners');
            $casino->cont_game_selection = $request->get('cont_game_selection');
            $casino->cont_vip_program = $request->get('cont_vip_program');
            $casino->cont_deposit_methods = $request->get('cont_deposit_methods');
            $casino->cont_customer_support = $request->get('cont_customer_support');
            $casino->cont_background = $request->get('cont_background');
            $casino->pm_visa = $pm_visa;
            $casino->pm_mastercard = $pm_mastercard;
            $casino->pm_prepaid_card = $pm_prepaid_card;
            $casino->pm_cash_at_the_cage = $pm_cash_at_the_cage;
            $casino->pm_ach = $pm_ach;
            $casino->pm_paypal = $pm_paypal;
            $casino->pm_skrill = $pm_skrill;
            $casino->pm_pay_near_me = $pm_pay_near_me;
            $casino->gt_casino_slots = $gt_casino_slots;
            $casino->gt_casino_blackjack = $gt_casino_blackjack;
            $casino->gt_casino_roulette = $gt_casino_roulette;
            $casino->gt_casino_live_games = $gt_casino_live_games;
            $casino->gt_casino_video_poker = $gt_casino_video_poker;
            $casino->gt_casino_baccarat = $gt_casino_baccarat;
            $casino->gt_casino_bingo = $gt_casino_bingo;
            $casino->gt_poker_texas_hold_em = $gt_poker_texas_hold_em;
            $casino->gt_poker_omaha = $gt_poker_omaha;
            $casino->gt_poker_stud = $gt_poker_stud;
            $casino->gt_poker_draw = $gt_poker_draw;
            $casino->gt_sportsbetting_nfl = $gt_sportsbetting_nfl;
            $casino->gt_sportsbetting_nba = $gt_sportsbetting_nba;
            $casino->gt_sportsbetting_mlb = $gt_sportsbetting_mlb;
            $casino->gt_sportsbetting_mls = $gt_sportsbetting_mls;
            $casino->gt_sportsbetting_nhl = $gt_sportsbetting_nhl;
            $casino->gt_sportsbetting_epl = $gt_sportsbetting_epl;
            $casino->gt_sportsbetting_esports = $gt_sportsbetting_esports;
            $casino->gt_racing_horse_racing = $gt_racing_horse_racing;
            $casino->gt_racing_greyhound_racing = $gt_racing_greyhound_racing;
            $casino->seo_title = trim($request->get('seo_title'));
            $casino->seo_description = trim($request->get('seo_description'));
            $casino->seo_keywords = trim($request->get('seo_keywords'));
            $casino->save();

            return Redirect::to(route('admin.casinos.edit', ['uuid' => $casino->uuid]))->with('casinoCreated', ucwords($casino->name));
        }
    }

    public function edit($uuid)
    {
        $settings = Setting::where('id', '>', 0)->orderBy('id', 'desc')->first();

        $casino = Casino::whereUuid($uuid)->first();
        $casinoOperators = DB::table('casinos')->orderBy('sort_by', 'asc')->where(['is_active' => 1])->get();

        return view('admin.plugins.casinos.edit', compact('settings', 'casino', 'casinoOperators'));
    }

    public function update(Request $request, $uuid)
    {
        $getCasino = Casino::whereUuid($uuid)->first();

        $rules = [
            'region_id'                                => 'required',
            'game_provider_id'                         => 'nullable',
            'sort_by'                                  => 'numeric|nullable',
            'name'                                     => 'required|max:255',
            'slug'                                     => 'required|max:255|unique:casinos,slug,' . $getCasino->id,
            'subtitle'                                 => 'max:255',
            'video'                                    => 'max:1024|url|nullable',
            'special_features'                         => 'max:255',
            'established'                              => 'max:4',
            'payout'                                   => 'max:10',
            'software'                                 => 'max:255',
            'languages'                                => 'max:100',
            'currencies'                               => 'max:100',
            'operating_systems'                        => 'max:100',
            'casino_versions'                          => 'max:255',
            'awards'                                   => 'max:255',
            'phone'                                    => 'nullable',
            'email'                                    => 'max:100|nullable|email',
            'website'                                  => 'max:1024|url|nullable',
            'editors_review_casino_bonus'              => 'numeric|between:0,5|nullable',
            'editors_review_game_selection'            => 'numeric|between:0,5|nullable',
            'editors_review_support'                   => 'numeric|between:0,5|nullable',
            'editors_review_banking'                   => 'numeric|between:0,5|nullable',
            'cashiering_deposit_methods'               => 'max:100',
            'cashiering_minimum_deposit'               => 'max:20',
            'cashiering_withdrawal_methods'            => 'max:100',
            'cashiering_withdrawal_limits'             => 'max:20',
            'cashiering_minimum_withdrawal'            => 'max:20',
            'cashiering_withdrawal_timeframes'         => 'max:30',
            'cta_text'                                 => 'max:255|nullable',
            'cta_link'                                 => 'url|nullable',
            'no_deposit_bonus'                         => 'max:255|nullable',
            'no_deposit_bonus_code'                    => 'max:255|nullable',
            'free_spins'                               => 'max:255|nullable',
            'free_spin_jackpot'                        => 'max:255|nullable',
            'no_deposit_bonus_amount'                  => 'max:255|nullable',
            'no_deposit_bonus_playthrough_requirement' => 'max:255|nullable',
            'no_deposit_bonus_cta'                     => 'max:255|nullable',
            'no_deposit_bonus_info'                    => 'max:255|nullable',
            'first_deposit_bonus'                      => 'max:255|nullable',
            'first_deposit_bonus_code'                 => 'max:255|nullable',
            'first_deposit_bonus_cta'                  => 'max:255|nullable',
            'first_deposit_bonus_info'                 => 'max:255|nullable',
            'play_store_link'                          => 'max:1536|url|nullable',
            'ios_link'                                 => 'max:1536|url|nullable',
            'seo_title'                                => 'max:255',
            'seo_description'                          => 'max:255',
            'seo_keywords'                             => 'max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        $game_providers = $request->has('game_provider_id') ? implode(', ', $request->get('game_provider_id')) : NULL;

        $languages = implode(', ', $request->get('languages'));

        $currencies = implode(', ', $request->get('currencies'));

        $operating_systems = implode(', ', $request->get('operating_systems'));

        if ($request->has('pm_visa')) {
            $pm_visa = 1;
        } else {
            $pm_visa = 0;
        }

        if ($request->has('pm_mastercard')) {
            $pm_mastercard = 1;
        } else {
            $pm_mastercard = 0;
        }

        if ($request->has('pm_prepaid_card')) {
            $pm_prepaid_card = 1;
        } else {
            $pm_prepaid_card = 0;
        }

        if ($request->has('pm_cash_at_the_cage')) {
            $pm_cash_at_the_cage = 1;
        } else {
            $pm_cash_at_the_cage = 0;
        }

        if ($request->has('pm_ach')) {
            $pm_ach = 1;
        } else {
            $pm_ach = 0;
        }

        if ($request->has('pm_paypal')) {
            $pm_paypal = 1;
        } else {
            $pm_paypal = 0;
        }

        if ($request->has('pm_skrill')) {
            $pm_skrill = 1;
        } else {
            $pm_skrill = 0;
        }

        if ($request->has('pm_pay_near_me')) {
            $pm_pay_near_me = 1;
        } else {
            $pm_pay_near_me = 0;
        }

        /*
         * Game Types
         */
        if ($request->has('gt_casino_slots')) {
            $gt_casino_slots = 1;
        } else {
            $gt_casino_slots = 0;
        }

        if ($request->has('gt_casino_blackjack')) {
            $gt_casino_blackjack = 1;
        } else {
            $gt_casino_blackjack = 0;
        }

        if ($request->has('gt_casino_roulette')) {
            $gt_casino_roulette = 1;
        } else {
            $gt_casino_roulette = 0;
        }

        if ($request->has('gt_casino_live_games')) {
            $gt_casino_live_games = 1;
        } else {
            $gt_casino_live_games = 0;
        }

        if ($request->has('gt_casino_video_poker')) {
            $gt_casino_video_poker = 1;
        } else {
            $gt_casino_video_poker = 0;
        }

        if ($request->has('gt_casino_baccarat')) {
            $gt_casino_baccarat = 1;
        } else {
            $gt_casino_baccarat = 0;
        }

        if ($request->has('gt_casino_bingo')) {
            $gt_casino_bingo = 1;
        } else {
            $gt_casino_bingo = 0;
        }

        if ($request->has('gt_poker_texas_hold_em')) {
            $gt_poker_texas_hold_em = 1;
        } else {
            $gt_poker_texas_hold_em = 0;
        }

        if ($request->has('gt_poker_omaha')) {
            $gt_poker_omaha = 1;
        } else {
            $gt_poker_omaha = 0;
        }

        if ($request->has('gt_poker_stud')) {
            $gt_poker_stud = 1;
        } else {
            $gt_poker_stud = 0;
        }

        if ($request->has('gt_poker_draw')) {
            $gt_poker_draw = 1;
        } else {
            $gt_poker_draw = 0;
        }

        if ($request->has('gt_sportsbetting_nfl')) {
            $gt_sportsbetting_nfl = 1;
        } else {
            $gt_sportsbetting_nfl = 0;
        }

        if ($request->has('gt_sportsbetting_nba')) {
            $gt_sportsbetting_nba = 1;
        } else {
            $gt_sportsbetting_nba = 0;
        }

        if ($request->has('gt_sportsbetting_mlb')) {
            $gt_sportsbetting_mlb = 1;
        } else {
            $gt_sportsbetting_mlb = 0;
        }

        if ($request->has('gt_sportsbetting_mls')) {
            $gt_sportsbetting_mls = 1;
        } else {
            $gt_sportsbetting_mls = 0;
        }

        if ($request->has('gt_sportsbetting_nhl')) {
            $gt_sportsbetting_nhl = 1;
        } else {
            $gt_sportsbetting_nhl = 0;
        }

        if ($request->has('gt_sportsbetting_epl')) {
            $gt_sportsbetting_epl = 1;
        } else {
            $gt_sportsbetting_epl = 0;
        }

        if ($request->has('gt_sportsbetting_esports')) {
            $gt_sportsbetting_esports = 1;
        } else {
            $gt_sportsbetting_esports = 0;
        }

        if ($request->has('gt_racing_horse_racing')) {
            $gt_racing_horse_racing = 1;
        } else {
            $gt_racing_horse_racing = 0;
        }

        if ($request->has('gt_racing_greyhound_racing')) {
            $gt_racing_greyhound_racing = 1;
        } else {
            $gt_racing_greyhound_racing = 0;
        }
        /*
         * End of Game Types
         */

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        } else {
            $casino = Casino::findOrFail($getCasino->id);
            $casino->region_id = trim($request->get('region_id'));
            $casino->game_provider_id = $game_providers;
            $casino->is_active = $request->get('is_active');
            $casino->is_featured = $request->has('is_featured') ? $request->get('is_featured') : 0;
            $casino->sort_by = $request->has('sort_by') ? $request->get('sort_by') : NULL;
            $casino->name = trim($request->get('name'));
            $casino->slug = trim(str_slug($request->get('slug')));
            $casino->subtitle = trim($request->get('subtitle'));
            $casino->video = $request->has('video') ? $request->get('video') : NULL;
            $casino->short_summary = $request->has('short_summary') ? $request->get('short_summary') : NULL;
            $casino->summary = $request->has('summary') ? $request->get('summary') : NULL;
            $casino->special_features = $request->has('special_features') ? $request->get('special_features') : NULL;
            $casino->established = trim($request->get('established'));
            $casino->payout = trim($request->get('payout'));
            $casino->software = trim($request->get('software'));
            $casino->languages = $languages;
            $casino->currencies = $currencies;
            $casino->operating_systems = $operating_systems;
            $casino->casino_versions = trim($request->get('casino_versions'));
            $casino->awards = trim($request->get('awards'));
            $casino->phone = trim($request->get('phone'));
            $casino->email = trim($request->get('email'));
            $casino->website = trim($request->get('website'));
            $casino->live_chat = $request->get('live_chat');
            $casino->editors_review_casino_bonus = $request->has('editors_review_casino_bonus') ? $request->get('editors_review_casino_bonus') : NULL;
            $casino->editors_review_support = $request->has('editors_review_support') ? $request->get('editors_review_support') : NULL;
            $casino->editors_review_game_selection = $request->has('editors_review_game_selection') ? $request->get('editors_review_game_selection') : NULL;
            $casino->editors_review_banking = $request->has('editors_review_banking') ? $request->get('editors_review_banking') : NULL;
            $casino->cashiering_deposit_methods = trim($request->get('cashiering_deposit_methods'));
            $casino->cashiering_minimum_deposit = $request->has('cashiering_minimum_deposit') ? $request->get('cashiering_minimum_deposit') : NULL;
            $casino->cashiering_withdrawal_methods = trim($request->get('cashiering_withdrawal_methods'));
            $casino->cashiering_withdrawal_limits = $request->has('cashiering_withdrawal_limits') ? $request->get('cashiering_withdrawal_limits') : NULL;
            $casino->cashiering_minimum_withdrawal = $request->has('cashiering_minimum_withdrawal') ? $request->get('cashiering_minimum_withdrawal') : NULL;
            $casino->cashiering_withdrawal_timeframes = trim($request->get('cashiering_withdrawal_timeframes'));
            $casino->cta_text = trim($request->get('cta_text'));
            $casino->cta_link = trim($request->get('cta_link'));
            $casino->no_deposit_bonus = $request->has('no_deposit_bonus') ? $request->get('no_deposit_bonus') : NULL;
            $casino->no_deposit_bonus_code = $request->has('no_deposit_bonus_code') ? $request->get('no_deposit_bonus_code') : NULL;
            $casino->free_spins = $request->has('free_spins') ? $request->get('free_spins') : NULL;
            $casino->free_spin_jackpot = $request->has('free_spin_jackpot') ? $request->get('free_spin_jackpot') : NULL;
            $casino->no_deposit_bonus_amount = $request->has('no_deposit_bonus_amount') ? $request->get('no_deposit_bonus_amount') : NULL;
            $casino->no_deposit_bonus_playthrough_requirement = $request->has('no_deposit_bonus_playthrough_requirement') ? $request->get('no_deposit_bonus_playthrough_requirement') : NULL;
            $casino->no_deposit_bonus_cta = $request->has('no_deposit_bonus_cta') ? $request->get('no_deposit_bonus_cta') : NULL;
            $casino->no_deposit_bonus_info = $request->has('no_deposit_bonus_info') ? $request->get('no_deposit_bonus_info') : NULL;
            $casino->no_deposit_bonus_start_day = $request->has('no_deposit_bonus_start_day') ? $request->get('no_deposit_bonus_start_day') : NULL;
            $casino->no_deposit_bonus_end_day = $request->has('no_deposit_bonus_end_day') ? $request->get('no_deposit_bonus_end_day') : NULL;
            $casino->first_deposit_bonus = $request->has('first_deposit_bonus') ? $request->get('first_deposit_bonus') : NULL;
            $casino->first_deposit_bonus_code = $request->has('first_deposit_bonus_code') ? $request->get('first_deposit_bonus_code') : NULL;
            $casino->first_deposit_bonus_cta = $request->has('first_deposit_bonus_cta') ? $request->get('first_deposit_bonus_cta') : NULL;
            $casino->first_deposit_bonus_info = $request->has('first_deposit_bonus_info') ? $request->get('first_deposit_bonus_info') : NULL;
            $casino->first_deposit_bonus_start_day = $request->has('first_deposit_bonus_start_day') ? $request->get('first_deposit_bonus_start_day') : NULL;
            $casino->first_deposit_bonus_end_day = $request->has('first_deposit_bonus_end_day') ? $request->get('first_deposit_bonus_end_day') : NULL;
            $casino->play_store_link = $request->has('play_store_link') ? $request->get('play_store_link') : NULL;
            $casino->ios_link = $request->has('ios_link') ? $request->get('ios_link') : NULL;
            $casino->cont_software = $request->get('cont_software');
            $casino->cont_mobile_app = $request->get('cont_mobile_app');
            $casino->cont_network_partners = $request->get('cont_network_partners');
            $casino->cont_game_selection = $request->get('cont_game_selection');
            $casino->cont_vip_program = $request->get('cont_vip_program');
            $casino->cont_deposit_methods = $request->get('cont_deposit_methods');
            $casino->cont_customer_support = $request->get('cont_customer_support');
            $casino->cont_background = $request->get('cont_background');
            $casino->pm_visa = $pm_visa;
            $casino->pm_mastercard = $pm_mastercard;
            $casino->pm_prepaid_card = $pm_prepaid_card;
            $casino->pm_cash_at_the_cage = $pm_cash_at_the_cage;
            $casino->pm_ach = $pm_ach;
            $casino->pm_paypal = $pm_paypal;
            $casino->pm_skrill = $pm_skrill;
            $casino->pm_pay_near_me = $pm_pay_near_me;
            $casino->gt_casino_slots = $gt_casino_slots;
            $casino->gt_casino_blackjack = $gt_casino_blackjack;
            $casino->gt_casino_roulette = $gt_casino_roulette;
            $casino->gt_casino_live_games = $gt_casino_live_games;
            $casino->gt_casino_video_poker = $gt_casino_video_poker;
            $casino->gt_casino_baccarat = $gt_casino_baccarat;
            $casino->gt_casino_bingo = $gt_casino_bingo;
            $casino->gt_poker_texas_hold_em = $gt_poker_texas_hold_em;
            $casino->gt_poker_omaha = $gt_poker_omaha;
            $casino->gt_poker_stud = $gt_poker_stud;
            $casino->gt_poker_draw = $gt_poker_draw;
            $casino->gt_sportsbetting_nfl = $gt_sportsbetting_nfl;
            $casino->gt_sportsbetting_nba = $gt_sportsbetting_nba;
            $casino->gt_sportsbetting_mlb = $gt_sportsbetting_mlb;
            $casino->gt_sportsbetting_mls = $gt_sportsbetting_mls;
            $casino->gt_sportsbetting_nhl = $gt_sportsbetting_nhl;
            $casino->gt_sportsbetting_epl = $gt_sportsbetting_epl;
            $casino->gt_sportsbetting_esports = $gt_sportsbetting_esports;
            $casino->gt_racing_horse_racing = $gt_racing_horse_racing;
            $casino->gt_racing_greyhound_racing = $gt_racing_greyhound_racing;
            $casino->seo_title = trim($request->get('seo_title'));
            $casino->seo_description = trim($request->get('seo_description'));
            $casino->seo_keywords = trim($request->get('seo_keywords'));
            $casino->save();

            return Redirect::to(route('admin.casinos.edit', ['uuid' => $casino->uuid]))->with('casinoUpdated', ucwords($casino->name));
        }
    }

    public function updateLogo(Request $request, $id)
    {
        $rules = [
            'logo' => 'mimes:jpg,jpeg,png,gif|max:3072|required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $casinoLogo = $request->file('logo');
            $newLogoName = str_slug(trim($request->get('slug')) . '-' . randomString::stringTen()) . '.' . $casinoLogo->getClientOriginalExtension();
            $localStorage = Storage::disk('local');
            $fileStorage = '/public/casino';
            $uploadLogo = $localStorage->putFileAs($fileStorage, $casinoLogo, $newLogoName);

            $casino = Casino::findOrFail($id);
            $casino->logo = $uploadLogo;
            $casino->save();

            return Redirect::to(route('admin.casinos.index'))->with('casinoLogoUpdated', 'Casino Logo updated successfully.');
        }
    }

    public function destroy($id)
    {
        $casino = Casino::findOrFail($id);
        $casino->delete();

        return Redirect::to(route('admin.casinos.index'))->with('casinoDeleted', 'Casino deleted successfully.');
    }
}