<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVenuesAddSeasonalFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('venues', function (Blueprint $table) {
        $table->decimal('seasonal_hour_fee', 16, 2);
        $table->decimal('seasonal_mid_day_fee', 16, 2);
        $table->decimal('seasonal_all_day_fee', 16, 2);
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
