<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique', 10)->unique();
            $table->string('name', 100);
            $table->integer('regional_id');
            $table->integer('witel_id');
            $table->integer('sto_id');
            $table->integer('typeproj_id');
            $table->string('no_contract', 15);
            $table->integer('mitra_id');
            $table->integer('odpcount')->default(0);
            $table->integer('statusproj_id')->default(1);
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
        Schema::dropIfExists('project');
    }
}
