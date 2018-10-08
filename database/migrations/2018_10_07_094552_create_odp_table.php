<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique', 10)->unique();
            $table->string('name', 50);
            $table->string('frame', 50);
            $table->string('power', 50)->default('-');
            $table->integer('odpspec_id');
            $table->integer('odcs_id');
            $table->integer('distribution_id');
            $table->integer('panel');
            $table->enum('port', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->integer('regional_id');
            $table->integer('witel_id');
            $table->integer('sto_id');
            $table->integer('mitra_id');
            $table->integer('project_id');
            $table->integer('statuscons_id');
            $table->integer('statusinv_id');
            $table->string('lat', 10);
            $table->string('lng', 10);
            $table->enum('deleted', ['0', '1'])->default('0');
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
        Schema::dropIfExists('odp');
    }
}
