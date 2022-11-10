<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->string('ID_ProjectDetail');
            $table->string('ID_Project');
            $table->string('productname');
            $table->string('interface');
            $table->date('interfacedatestart');
            $table->date('interfacedateend');
            $table->string('interfaceowner');
            $table->string('interfacestatus');
            $table->string('data');
            $table->date('datadatestart');
            $table->date('datadateend');
            $table->string('dataowner');
            $table->string('datastatus');
            $table->string('test');
            $table->date('testdatestart');
            $table->date('testdateend');
            $table->string('testowner');
            $table->string('teststatus');
            $table->string('install');
            $table->date('installdatestart');
            $table->date('installdateend');
            $table->string('installowner');
            $table->string('installstatus');
            $table->string('setting');
            $table->date('settingdatestart');
            $table->date('settingdateend');
            $table->string('settingowner');
            $table->string('settingstatus');
            $table->string('edit');
            $table->date('editdatestart');
            $table->date('editdateend');
            $table->string('editowner');
            $table->string('editstatus');
            $table->string('train');
            $table->date('traindatestart');
            $table->date('traindateend');
            $table->string('trainowner');
            $table->string('trainstatus');
            $table->string('using');
            $table->date('usingdatestart');
            $table->date('usingdateend');
            $table->string('usingowner');
            $table->string('usingstatus');
            $table->string('check');
            $table->date('checkdatestart');
            $table->date('checkdateend');
            $table->string('checkowner');
            $table->string('checkstatus');
            $table->string('standby');
            $table->date('standbydatestart');
            $table->date('standbydateend');
            $table->string('standbyowner');
            $table->string('standbystatus');
            $table->string('acceptuser');
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
        Schema::dropIfExists('project_details');
    }
}
