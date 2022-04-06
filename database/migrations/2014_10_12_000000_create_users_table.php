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

     /*-- up() function used to define name of columns of database*/
    public function up()
    {
         /* create schema for 'users' table*/
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //table column id
            $table->string('name'); //table column name
            $table->string('email')->unique(); //table column email
            $table->timestamp('email_verified_at')->nullable(); //table column email_verified_at
            $table->string('password');//table column password
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

      /* down() function used to drop the data */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
