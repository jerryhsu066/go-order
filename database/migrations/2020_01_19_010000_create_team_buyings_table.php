<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamBuyingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_buyings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('initiator_id')->index();
            $table->string('title');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('restaurant_id')->index();
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
        Schema::dropIfExists('team_buyings');
    }
}
