<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailplans', function (Blueprint $table) {
            $table->string('ID_detial');
            $table->string('ID_Plan');
            $table->string('userID');
            $table->date('Date_PlanS');
            $table->string('Detial_Plan');
            $table->string('Location_Plan');
            $table->string('Plan_Name_All');
            $table->string('Money_Total');
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
        Schema::dropIfExists('detailplans');
    }
}
