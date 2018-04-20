<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operator_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('casino_id')->unsigned();
            $table->foreign('casino_id')->references('id')->on('casinos');
            $table->boolean('is_active')->default(FALSE);
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('slider_image');
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
        Schema::dropIfExists('operator_sliders');
    }
}
