<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('news_categories');
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('know_before_you_play')->default(0);
            $table->tinyInteger('is_trending')->default(0);
            $table->unsignedInteger('sort_by')->default(0)->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('featured_image')->nullable();
            $table->text('news_content')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
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
        Schema::dropIfExists('news');
    }
}
