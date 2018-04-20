<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCasinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->after('sort_by');
            $table->boolean('pm_visa')->default(FALSE)->after('cont_background');
            $table->boolean('pm_mastercard')->default(FALSE)->after('pm_visa');
            $table->boolean('pm_prepaid_card')->default(FALSE)->after('pm_mastercard');
            $table->boolean('pm_cash_at_the_cage')->default(FALSE)->after('pm_prepaid_card');
            $table->boolean('pm_ach')->default(FALSE)->after('pm_cash_at_the_cage');
            $table->boolean('pm_paypal')->default(FALSE)->after('pm_ach');
            $table->boolean('pm_skrill')->default(FALSE)->after('pm_paypal');
            $table->boolean('pm_pay_near_me')->default(FALSE)->after('pm_skrill');
            $table->boolean('gt_casino_slots')->default(FALSE)->after('pm_pay_near_me');
            $table->boolean('gt_casino_blackjack')->default(FALSE)->after('gt_casino_slots');
            $table->boolean('gt_casino_roulette')->default(FALSE)->after('gt_casino_blackjack');
            $table->boolean('gt_casino_live_games')->default(FALSE)->after('gt_casino_roulette');
            $table->boolean('gt_casino_video_poker')->default(FALSE)->after('gt_casino_live_games');
            $table->boolean('gt_casino_baccarat')->default(FALSE)->after('gt_casino_video_poker');
            $table->boolean('gt_casino_bingo')->default(FALSE)->after('gt_casino_baccarat');
            $table->boolean('gt_poker_texas_hold_em')->default(FALSE)->after('gt_casino_bingo');
            $table->boolean('gt_poker_omaha')->default(FALSE)->after('gt_poker_texas_hold_em');
            $table->boolean('gt_poker_stud')->default(FALSE)->after('gt_poker_omaha');
            $table->boolean('gt_poker_draw')->default(FALSE)->after('gt_poker_stud');
            $table->boolean('gt_sportsbetting_nfl')->default(FALSE)->after('gt_poker_draw');
            $table->boolean('gt_sportsbetting_nba')->default(FALSE)->after('gt_sportsbetting_nfl');
            $table->boolean('gt_sportsbetting_mlb')->default(FALSE)->after('gt_sportsbetting_nba');
            $table->boolean('gt_sportsbetting_mls')->default(FALSE)->after('gt_sportsbetting_mlb');
            $table->boolean('gt_sportsbetting_nhl')->default(FALSE)->after('gt_sportsbetting_mls');
            $table->boolean('gt_sportsbetting_epl')->default(FALSE)->after('gt_sportsbetting_nhl');
            $table->boolean('gt_sportsbetting_esports')->default(FALSE)->after('gt_sportsbetting_epl');
            $table->boolean('gt_racing_horse_racing')->default(FALSE)->after('gt_sportsbetting_esports');
            $table->boolean('gt_racing_greyhound_racing')->default(FALSE)->after('gt_racing_horse_racing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->dropColumn(['uuid', 'pm_visa', 'pm_mastercard', 'pm_prepaid_card', 'pm_cash_at_the_cage', 'pm_ach', 'pm_paypal', 'pm_skrill', 'pm_pay_near_me', 'gt_casino_slots', 'gt_casino_blackjack', 'gt_casino_roulette', 'gt_casino_live_games', 'gt_casino_video_poker', 'gt_casino_baccarat', 'gt_casino_bingo', 'gt_poker_texas_hold_em', 'gt_poker_omaha', 'gt_poker_stud', 'gt_poker_draw', 'gt_sportsbetting_nfl', 'gt_sportsbetting_nba', 'gt_sportsbetting_mlb', 'gt_sportsbetting_mls', 'gt_sportsbetting_nhl', 'gt_sportsbetting_epl', 'gt_sportsbetting_esports', 'gt_racing_horse_racing', 'gt_racing_greyhound_racing']);
        });
    }
}