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
            $table->int('label', 11);
            $table->string('name', 50);
            $table->string('frame', 50);
            $table->string('power', 50)->nullable();
            $table->integer('odpspec_id')->default(1);
            $table->integer('odc_id');
            $table->integer('distribution_id');
            $table->integer('panel')->nullable();
            $table->enum('port', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'])->nullable();
            $table->integer('regional_id');
            $table->integer('witel_id');
            $table->integer('sto_id');
            $table->integer('mitra_id');
            $table->integer('project_id');
            $table->integer('statuscons_id')->default(1);
            $table->integer('statusinv_id')->default(1);
            $table->string('lat', 10)->nullable();
            $table->string('lng', 10)->nullable();
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
