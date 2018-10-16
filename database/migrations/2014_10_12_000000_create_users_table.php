<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique', 10)->unique();
            $table->string('name', 20);
            $table->string('nik', 10);
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('mitra_id');
            $table->enum('level', ['1', '2', '3'])->default('3');
            $table->enum('active', ['0', '1'])->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
