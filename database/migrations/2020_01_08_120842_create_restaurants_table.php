<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->string('branch')->nullable();
            $table->string('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('logo');
            $table->text('address')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('url');
            $table->tinyInteger('open');
            $table->integer('bestMatch');
            $table->integer('newestScore');
            $table->tinyInteger('ratingAverage');
            $table->integer('popularity');
            $table->float('averageProductPrice')->nullable();
            $table->float('deliveryCosts')->nullable();
            $table->float('minimumOrderAmount')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
