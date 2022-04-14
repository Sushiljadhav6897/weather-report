<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('city_id');
            $table->string('weather_condition');
            $table->float('temperature',8,2);
            $table->float('feels_like',8,2);
            $table->float('humidity',8,2);
            $table->float('wind_speed',8,2);
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
        Schema::dropIfExists('cities_records');
    }
}
