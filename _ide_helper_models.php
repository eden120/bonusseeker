<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Admin
 *
 * @property int $id
 * @property int $is_active
 * @property int $is_admin
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Casino[] $casino
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Region[] $region
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App{
/**
 * App\Analyst
 *
 * @property int $id
 * @property int $is_active
 * @property int $is_analyst
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereIsAnalyst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Analyst whereUpdatedAt($value)
 */
	class Analyst extends \Eloquent {}
}

namespace App{
/**
 * App\Base
 *
 * @property-read \App\Admin $createdBy
 * @property-read \App\Admin $updatedBy
 */
	class Base extends \Eloquent {}
}

namespace App{
/**
 * App\Casino
 *
 * @property int $id
 * @property int $region_id
 * @property string|null $game_provider_id
 * @property int $is_active
 * @property int $is_featured
 * @property int|null $sort_by
 * @property string $uuid
 * @property string $permalink
 * @property string $name
 * @property string $slug
 * @property string|null $subtitle
 * @property string|null $logo
 * @property string|null $video
 * @property string|null $short_summary
 * @property string|null $summary
 * @property string|null $special_features
 * @property string|null $established
 * @property string|null $payout
 * @property string|null $software
 * @property string|null $languages
 * @property string|null $currencies
 * @property string|null $operating_systems
 * @property string|null $casino_versions
 * @property string|null $awards
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property int $live_chat
 * @property string|null $editors_review_casino_bonus
 * @property string|null $editors_review_game_selection
 * @property string|null $editors_review_support
 * @property string|null $editors_review_banking
 * @property string|null $cashiering_deposit_methods
 * @property string|null $cashiering_minimum_deposit
 * @property string|null $cashiering_withdrawal_methods
 * @property string|null $cashiering_withdrawal_limits
 * @property string|null $cashiering_minimum_withdrawal
 * @property string|null $cashiering_withdrawal_timeframes
 * @property string|null $cta_text
 * @property string|null $cta_link
 * @property string|null $no_deposit_bonus
 * @property string|null $no_deposit_bonus_code
 * @property string|null $free_spins
 * @property string|null $free_spin_jackpot
 * @property string|null $no_deposit_bonus_amount
 * @property string|null $no_deposit_bonus_playthrough_requirement
 * @property string|null $no_deposit_bonus_cta
 * @property string|null $no_deposit_bonus_info
 * @property string|null $no_deposit_bonus_start_day
 * @property string|null $no_deposit_bonus_end_day
 * @property string|null $first_deposit_bonus
 * @property string|null $first_deposit_bonus_code
 * @property string|null $first_deposit_bonus_cta
 * @property string|null $first_deposit_bonus_info
 * @property string|null $first_deposit_bonus_start_day
 * @property string|null $first_deposit_bonus_end_day
 * @property string|null $play_store_link
 * @property string|null $ios_link
 * @property string|null $cont_software
 * @property string|null $cont_mobile_app
 * @property string|null $cont_network_partners
 * @property string|null $cont_game_selection
 * @property string|null $cont_vip_program
 * @property string|null $cont_deposit_methods
 * @property string|null $cont_customer_support
 * @property string|null $cont_background
 * @property int $pm_visa
 * @property int $pm_mastercard
 * @property int $pm_prepaid_card
 * @property int $pm_cash_at_the_cage
 * @property int $pm_ach
 * @property int $pm_paypal
 * @property int $pm_skrill
 * @property int $pm_pay_near_me
 * @property int $gt_casino_slots
 * @property int $gt_casino_blackjack
 * @property int $gt_casino_roulette
 * @property int $gt_casino_live_games
 * @property int $gt_casino_video_poker
 * @property int $gt_casino_baccarat
 * @property int $gt_casino_bingo
 * @property int $gt_poker_texas_hold_em
 * @property int $gt_poker_omaha
 * @property int $gt_poker_stud
 * @property int $gt_poker_draw
 * @property int $gt_sportsbetting_nfl
 * @property int $gt_sportsbetting_nba
 * @property int $gt_sportsbetting_mlb
 * @property int $gt_sportsbetting_mls
 * @property int $gt_sportsbetting_nhl
 * @property int $gt_sportsbetting_epl
 * @property int $gt_sportsbetting_esports
 * @property int $gt_racing_horse_racing
 * @property int $gt_racing_greyhound_racing
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Admin $admin
 * @property-read \App\Admin|null $createdBy
 * @property-read \App\GameProvider|null $gameProviderId
 * @property-read \App\Region $region
 * @property-read \App\Admin|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereAwards($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCashieringDepositMethods($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCashieringMinimumDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCashieringMinimumWithdrawal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCashieringWithdrawalLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCashieringWithdrawalMethods($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCashieringWithdrawalTimeframes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCasinoVersions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContCustomerSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContDepositMethods($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContGameSelection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContMobileApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContNetworkPartners($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContSoftware($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereContVipProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCtaLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCtaText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereCurrencies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereEditorsReviewBanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereEditorsReviewCasinoBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereEditorsReviewGameSelection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereEditorsReviewSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereEstablished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFirstDepositBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFirstDepositBonusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFirstDepositBonusCta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFirstDepositBonusEndDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFirstDepositBonusInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFirstDepositBonusStartDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFreeSpinJackpot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereFreeSpins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGameProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoBaccarat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoBingo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoBlackjack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoLiveGames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoRoulette($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoSlots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtCasinoVideoPoker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtPokerDraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtPokerOmaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtPokerStud($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtPokerTexasHoldEm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtRacingGreyhoundRacing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtRacingHorseRacing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingEpl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingEsports($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingMlb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingMls($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingNba($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingNfl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereGtSportsbettingNhl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereIosLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereLiveChat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusCta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusEndDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusPlaythroughRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereNoDepositBonusStartDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereOperatingSystems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePermalink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePlayStoreLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmAch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmCashAtTheCage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmMastercard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmPayNearMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmPaypal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmPrepaidCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmSkrill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino wherePmVisa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereShortSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSoftware($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSpecialFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Casino whereWebsite($value)
 */
	class Casino extends \Eloquent {}
}

namespace App{
/**
 * App\Editor
 *
 * @property int $id
 * @property int $is_active
 * @property int $is_editor
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereIsEditor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Editor whereUpdatedAt($value)
 */
	class Editor extends \Eloquent {}
}

namespace App{
/**
 * App\Game
 *
 * @property int $id
 * @property int $provider_id
 * @property int $category_id
 * @property int $subcategory_id
 * @property int $is_active
 * @property int $is_featured
 * @property int $is_html5
 * @property int|null $sort_by
 * @property string $name
 * @property string $slug
 * @property string|null $state
 * @property string|null $race_track
 * @property string|null $logo
 * @property string|null $description
 * @property string|null $address
 * @property string|null $url
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\GameCategory $categoryId
 * @property-read \App\GameProvider $providerId
 * @property-read \App\GameSubcategory $subcategoryId
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereIsHtml5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereRaceTrack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Game whereUrl($value)
 */
	class Game extends \Eloquent {}
}

namespace App{
/**
 * App\GameCategory
 *
 * @property int $id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameCategory whereUpdatedAt($value)
 */
	class GameCategory extends \Eloquent {}
}

namespace App{
/**
 * App\GameProvider
 *
 * @property int $id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property string|null $cta_text
 * @property string|null $cta_link
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Game[] $game
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereCtaLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereCtaText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameProvider whereUpdatedAt($value)
 */
	class GameProvider extends \Eloquent {}
}

namespace App{
/**
 * App\GameRating
 *
 * @property int $id
 * @property int $game_id
 * @property int $is_active
 * @property int|null $positive
 * @property int|null $negative
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereNegative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating wherePositive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameRating whereUpdatedAt($value)
 */
	class GameRating extends \Eloquent {}
}

namespace App{
/**
 * App\GameSubcategory
 *
 * @property int $id
 * @property int $category_id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\GameCategory $gameCategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GameSubcategory whereUpdatedAt($value)
 */
	class GameSubcategory extends \Eloquent {}
}

namespace App{
/**
 * App\News
 *
 * @property int $id
 * @property int $region_id
 * @property int $category_id
 * @property int $is_active
 * @property int $is_featured
 * @property int $know_before_you_play
 * @property int $is_trending
 * @property int|null $sort_by
 * @property string $name
 * @property string $slug
 * @property string|null $featured_image
 * @property string|null $news_content
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\NewsCategory $category
 * @property-read \App\NewsCategory $categoryId
 * @property-read \App\Region $region
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereIsTrending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereKnowBeforeYouPlay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereNewsContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereUpdatedAt($value)
 */
	class News extends \Eloquent {}
}

namespace App{
/**
 * App\NewsCategory
 *
 * @property int $id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsCategory whereUpdatedAt($value)
 */
	class NewsCategory extends \Eloquent {}
}

namespace App{
/**
 * App\Newsletter
 *
 * @property int $id
 * @property int $is_active
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereUpdatedAt($value)
 */
	class Newsletter extends \Eloquent {}
}

namespace App{
/**
 * App\OldPage
 *
 * @property int $id
 * @property int $is_active
 * @property int|null $sort_by
 * @property string $name
 * @property string $slug
 * @property string|null $page_contents
 * @property string|null $featured_image
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage wherePageContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OldPage whereUpdatedAt($value)
 */
	class OldPage extends \Eloquent {}
}

namespace App{
/**
 * App\OperatorSlider
 *
 * @property int $id
 * @property int $casino_id
 * @property int $is_active
 * @property string $uuid
 * @property string $name
 * @property string $slider_image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Casino $casino
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereCasinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereSliderImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperatorSlider whereUuid($value)
 */
	class OperatorSlider extends \Eloquent {}
}

namespace App{
/**
 * App\Page
 *
 * @property int $id
 * @property int $region_id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PageModule[] $module
 * @property-read \App\Region $region
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App{
/**
 * App\PageModule
 *
 * @property int $id
 * @property int $page_id
 * @property int $is_active
 * @property int|null $sort_by
 * @property string $title
 * @property string|null $contents
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PageModule whereUpdatedAt($value)
 */
	class PageModule extends \Eloquent {}
}

namespace App{
/**
 * App\PromoCode
 *
 * @property int $id
 * @property int $casino_id
 * @property int $is_active
 * @property int $is_featured
 * @property int|null $sort_by
 * @property string $permalink
 * @property string $name
 * @property string $slug
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $promo_code
 * @property string|null $max_promo_amount
 * @property string|null $banner
 * @property string|null $description
 * @property string|null $terms_and_conditions
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property int|null $promo_type_id
 * @property int|null $entry_instruction_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Casino $casino
 * @property-read \App\Admin|null $createdBy
 * @property-read \App\PromoEntryInstruction|null $promoEntry
 * @property-read \App\PromoType|null $promoType
 * @property-read \App\Admin|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereCasinoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereEntryInstructionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereMaxPromoAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode wherePermalink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode wherePromoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode wherePromoTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereTermsAndConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoCode whereUpdatedBy($value)
 */
	class PromoCode extends \Eloquent {}
}

namespace App{
/**
 * App\PromoEntryInstruction
 *
 * @property int $id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoEntryInstruction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoEntryInstruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoEntryInstruction whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoEntryInstruction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoEntryInstruction whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoEntryInstruction whereUpdatedAt($value)
 */
	class PromoEntryInstruction extends \Eloquent {}
}

namespace App{
/**
 * App\PromoType
 *
 * @property int $id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromoType whereUpdatedAt($value)
 */
	class PromoType extends \Eloquent {}
}

namespace App{
/**
 * App\Region
 *
 * @property int $id
 * @property int $is_active
 * @property string $name
 * @property string $slug
 * @property string $region_contents_top
 * @property string|null $region_contents
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Casino[] $casino
 * @property-read \App\Admin|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Page[] $page
 * @property-read \App\Admin|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereRegionContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereRegionContentsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereUpdatedBy($value)
 */
	class Region extends \Eloquent {}
}

namespace App{
/**
 * App\Seo
 *
 * @property int $id
 * @property int $is_active
 * @property int $is_seo
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereIsSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Seo whereUpdatedAt($value)
 */
	class Seo extends \Eloquent {}
}

namespace App{
/**
 * App\Setting
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slogan
 * @property string|null $author
 * @property string|null $owner
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $logo
 * @property string|null $google_analytics
 * @property string|null $facebook_analytics
 * @property string|null $google_site_verification
 * @property string|null $bing_site_verification
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereBingSiteVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereFacebookAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereGoogleAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereGoogleSiteVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereUpdatedAt($value)
 */
	class Setting extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int $is_active
 * @property int $is_user
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $ip_address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Video
 *
 * @property int $id
 * @property int|null $region_id
 * @property int $is_active
 * @property int|null $sort_by
 * @property string $name
 * @property string $slug
 * @property string|null $url
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereSortBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Video whereUrl($value)
 */
	class Video extends \Eloquent {}
}

