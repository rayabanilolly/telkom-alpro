<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdcPorts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odc_ports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odc_id');
            $table->integer('distribution_id')->nullable();
            $table->integer('gpon_id')->nullable();
            $table->integer('splitter_id')->nullable();
            $table->tinyInteger('splitter_port')->nullable();
            $table->tinyInteger('distributin_core')->nullable();
            $table->tinyInteger('gpon_slot')->nullable();
            $table->tinyInteger('gpon_port')->nullable();
            $table->tinyInteger('panel')->unsigned();
            $table->tinyInteger('port')->nullable();
            $table->enum('type', ['in', 'out']);
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
        Schema::dropIfExists('odc_ports');
    }
}
