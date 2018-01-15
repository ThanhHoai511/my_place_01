<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNullableFieldPlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->unsignedInteger('avg_service_rate')->nullable()->change();
            $table->unsignedInteger('avg_quality_rate')->nullable()->change();
            $table->unsignedInteger('dist_id')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('range')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
