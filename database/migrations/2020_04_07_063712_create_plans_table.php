<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->string('ID_Plan');
            $table->string('userID');
            $table->date('Date_Start');
            $table->date('Date_End');
            $table->string('Money');
            $table->string('Location');
            $table->string('Plan');
            $table->string('Plan_Name');
            $table->dateTime('Lastmodify');
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
        Schema::dropIfExists('plans');
    }
}
