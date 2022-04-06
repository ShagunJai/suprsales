<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

      /*-- up() function used to define name of columns of database*/


    public function up()
    {
        /* create schema for 'password_resets' table*/
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();          //table column email
            $table->string('token');                   //table column token
            $table->timestamp('created_at')->nullable();  //table column created_at
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
        Schema::dropIfExists('password_resets');
    }
}
