<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues_files', function (Blueprint $table) {
            $table->id();
            $table->string('venue_id', 18)->index();
            $table->string('token')->unique();
            $table->string('name');
            $table->string('path');
            $table->integer('size');
            $table->string('type');
            $table->string('mime_type');
            $table->integer('sort');
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
        Schema::dropIfExists('venues_files');
    }
}
