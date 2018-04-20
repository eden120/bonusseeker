<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->string('game_provider_id')->references('id')->on('game_providers')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->unsignedInteger('sort_by')->default(0)->nullable();
            $table->string('permalink', 40);
            $table->string('name');
            $table->string('slug');
            $table->string('subtitle')->nullable();
            $table->string('logo')->nullable();
            $table->string('video', 1024)->nullable();
            $table->text('short_summary')->nullable();
            $table->mediumText('summary')->nullable();
            $table->string('special_features')->nullable();
            $table->string('established', 4)->nullable();
            $table->string('payout', 10)->nullable();
            $table->string('software')->nullable();
            $table->string('languages')->nullable();
            $table->string('currencies')->nullable();
            $table->string('operating_systems')->nullable();
            $table->string('casino_versions')->nullable();
            $table->string('awards')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('website', 1024)->nullable();
            $table->tinyInteger('live_chat')->default(0);
            $table->string('editors_review_casino_bonus', 5)->nullable();
            $table->string('editors_review_game_selection', 5)->nullable();
            $table->string('editors_review_support', 5)->nullable();
            $table->string('editors_review_banking', 5)->nullable();
            $table->string('cashiering_deposit_methods', 100)->nullable();
            $table->string('cashiering_minimum_deposit', 20)->nullable();
            $table->string('cashiering_withdrawal_methods', 100)->nullable();
            $table->string('cashiering_withdrawal_limits', 20)->nullable();
            $table->string('cashiering_minimum_withdrawal', 20)->nullable();
            $table->string('cashiering_withdrawal_timeframes', 30)->nullable();
            $table->string('cta_text', 100)->nullable();
            $table->string('cta_link', 1536)->nullable();
            $table->string('no_deposit_bonus')->nullable();
            $table->string('no_deposit_bonus_code')->nullable();
            $table->string('free_spins')->nullable();
            $table->string('free_spin_jackpot')->nullable();
            $table->string('no_deposit_bonus_amount')->nullable();
            $table->string('no_deposit_bonus_playthrough_requirement')->nullable();
            $table->string('no_deposit_bonus_cta')->nullable();
            $table->string('no_deposit_bonus_info')->nullable();
            $table->timestamp('no_deposit_bonus_start_day')->nullable();
            $table->timestamp('no_deposit_bonus_end_day')->nullable();
            $table->string('first_deposit_bonus')->nullable();
            $table->string('first_deposit_bonus_code')->nullable();
            $table->string('first_deposit_bonus_cta')->nullable();
            $table->string('first_deposit_bonus_info')->nullable();
            $table->timestamp('first_deposit_bonus_start_day')->nullable();
            $table->timestamp('first_deposit_bonus_end_day')->nullable();
            $table->string('play_store_link', 1536)->nullable();
            $table->string('ios_link', 1536)->nullable();
            $table->text('cont_software')->nullable();
            $table->text('cont_mobile_app')->nullable();
            $table->text('cont_network_partners')->nullable();
            $table->text('cont_game_selection')->nullable();
            $table->text('cont_vip_program')->nullable();
            $table->text('cont_deposit_methods')->nullable();
            $table->text('cont_customer_support')->nullable();
            $table->text('cont_background')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('admins');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casinos');
    }
}