<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('roles_id')->nullable();
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('nik')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('foto')->nullable();
            $table->string('email')->unique();
            $table->string('no_handphone')->nullable();
            $table->string('password');
            $table->integer('referral_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
