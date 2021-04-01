<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues_designs', function (Blueprint $table) {
          $table->id('venue_design_id');
          $table->string('id', 18)->index();
          $table->string('venue_id', 18)->index();
          $table->text('layout');
          $table->integer('max_pax')->default(0);
          $table->integer('min_pax')->default(0);
          $table->string('url', 255)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Diseno');
    }
}
