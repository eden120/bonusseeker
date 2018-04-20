<?php

namespace App;

class Casino extends Base {
    protected $fillable = [
        'region_id',
        'game_provider_id',
        'is_active',
        'is_featured',
        'sort_by',
        'uuid',
        'name',
        'slug',
        'subtitle',
        'logo',
        'video',
        'short_summary',
        'summary',
        'special_features',
        'established',
        'payout',
        'software',
        'languages',
        'currencies',
        'operating_systems',
        'casino_versions',
        'awards',
        'phone',
        'email',
        'website',
        'live_chat',
        'editors_review_casino_bonus',
        'editors_review_game_selection',
        'editors_review_support',
        'editors_review_banking',
        'cashiering_deposit_methods',
        'cashiering_minimum_deposit',
        'cashiering_withdrawal_methods',
        'cashiering_withdrawal_limits',
        'cashiering_minimum_withdrawal',
        'cashiering_withdrawal_timeframes',
        'cta_text',
        'cta_link',
        'no_deposit_bonus',
        'no_deposit_bonus_code',
        'free_spins',
        'free_spin_jackpot',
        'no_deposit_bonus_amount',
        'no_deposit_bonus_playthrough_requirement',
        'no_deposit_bonus_cta',
        'no_deposit_bonus_info',
        'no_deposit_bonus_start_day',
        'no_deposit_bonus_end_day',
        'first_deposit_bonus',
        'first_deposit_bonus_code',
        'first_deposit_bonus_cta',
        'first_deposit_bonus_info',
        'first_deposit_bonus_start_day',
        'first_deposit_bonus_end_day',
        'play_store_link',
        'ios_link',
        'cont_software',
        'cont_mobile_app',
        'cont_network_partners',
        'cont_game_selection',
        'cont_vip_program',
        'cont_deposit_methods',
        'cont_customer_support',
        'cont_background',
        'pm_visa',
        'pm_mastercard',
        'pm_prepaid_card',
        'pm_cash_at_the_cage',
        'pm_ach',
        'pm_paypal',
        'pm_skrill',
        'pm_pay_near_me',
        'gt_casino_slots',
        'gt_casino_blackjack',
        'gt_casino_roulette',
        'gt_casino_live_games',
        'gt_casino_video_poker',
        'gt_casino_baccarat',
        'gt_casino_bingo',
        'gt_poker_texas_hold_em',
        'gt_poker_omaha',
        'gt_poker_stud',
        'gt_poker_draw',
        'gt_sportsbetting_nfl',
        'gt_sportsbetting_nba',
        'gt_sportsbetting_mlb',
        'gt_sportsbetting_mls',
        'gt_sportsbetting_nhl',
        'gt_sportsbetting_epl',
        'gt_sportsbetting_esports',
        'gt_racing_horse_racing',
        'gt_racing_greyhound_racing',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public static function boot() {
        parent::boot();
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function gameProviderId() {
        return $this->belongsTo(GameProvider::class, 'game_provider_id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function getEmailAttribute($value) {
        return strtolower($value);
    }
}