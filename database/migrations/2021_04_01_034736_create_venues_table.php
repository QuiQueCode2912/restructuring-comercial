<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
          $table->id('venue_id');
          $table->string('id', 18)->index();
          $table->string('parent_id', 18)->index()->nullable()->default(null);
          $table->string('name', 255);
          $table->text('main_text');
          $table->text('secondary_text')->nullable()->default(null);
          $table->string('type', 100);
          $table->decimal('hour_fee', 16, 2);
          $table->decimal('mid_day_fee', 16, 2);
          $table->decimal('all_day_fee', 16, 2);
          $table->string('url', 255)->nullable()->default(null);
          $table->string('status', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Venue');
    }
}
