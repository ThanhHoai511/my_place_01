<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlaceField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropColumn('open-hour');
            $table->dropColumn('close-hour');
            $table->time('open_hour')->nullable();
            $table->time('close_hour')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('places', function (Blueprint $table) {
        //     $table->renameColumn('open_hour', 'open-hour');
        //     $table->renameColumn('close_hour', 'close-hour');
        // });
    }
}
