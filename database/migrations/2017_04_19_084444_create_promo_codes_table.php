<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('casino_id')->unsigned();
            $table->foreign('casino_id')->references('id')->on('casinos');
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->unsignedInteger('sort_by')->default(0)->nullable();
            $table->string('permalink', 40);
            $table->string('name');
            $table->string('slug');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('promo_code', 50)->nullable();
            $table->string('max_promo_amount', 30)->nullable();
            $table->string('banner')->nullable();
            $table->text('description')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->integer('promo_type_id')->unsigned()->nullable();
            $table->foreign('promo_type_id')->references('id')->on('promo_types');
            $table->integer('entry_instruction_id')->unsigned()->nullable();
            $table->foreign('entry_instruction_id')->references('id')->on('promo_entry_instructions');
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
        Schema::dropIfExists('promo_codes');
    }
}