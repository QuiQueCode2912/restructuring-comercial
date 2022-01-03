<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVenuesDesignsTablesRemoveMinPaxColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('venues_designs', function (Blueprint $table) {
        $table->dropColumn('min_pax');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('venues_designs', function (Blueprint $table) {
        $table->integer('min_pax')->default(0);
      });
    }
}
