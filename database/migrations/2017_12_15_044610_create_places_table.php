<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('add');
            $table->unsignedInteger('dist_id');
            $table->string('image');
            $table->time('open-hour')->nullable();
            $table->time('close-hour')->nullable();
            $table->string('range');
            $table->unsignedInteger('avg_service_rate');
            $table->unsignedInteger('avg_quality_rate');
            $table->unsignedInteger('total_rate');
            $table->boolean('status');
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
        Schema::dropIfExists('places');
    }
}
