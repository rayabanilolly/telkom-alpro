<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique', 10)->unique();
            $table->string('name', 50);
            $table->integer('odcspec_id');
            $table->integer('odf_id')->default('0');
            $table->integer('regional_id');
            $table->integer('witel_id');
            $table->integer('sto_id');
            $table->integer('mitra_id');
            $table->integer('project_id')->default('0');
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
        Schema::dropIfExists('odc');
    }
}
