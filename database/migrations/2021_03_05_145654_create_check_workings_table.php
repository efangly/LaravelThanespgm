<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckWorkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_workings', function (Blueprint $table) {
            $table->string('id_checkworking');
            $table->string('name');
            $table->string('status');
            $table->string('position');
            $table->string('ipaddress');
            $table->string('imgpath');
            $table->date('lastmodified');
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
        Schema::dropIfExists('check_workings');
    }
}
