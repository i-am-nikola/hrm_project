<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('roles', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->timestamps();
    });

    Schema::create('role_user', function (Blueprint $table) {
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('role_id');
      $table->foreign('role_id')->references('id')->on('roles')
        ->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')
        ->onUpdate('cascade')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('role_user');
    Schema::dropIfExists('roles');
  }
}
