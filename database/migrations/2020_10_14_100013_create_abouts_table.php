<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('details');
            $table->string('subtitle');
            $table->string('image');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('github');
            $table->string('location');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('lat');
            $table->string('long');
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
        Schema::dropIfExists('abouts');
    }
}
