<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    /*-- up() function used to define name of columns of database*/
     
    public function up()
    { 
          /* create schema for 'failed_jobs' table*/

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();                      //table column id 
            $table->string('uuid')->unique();   //table column uuid
            $table->text('connection');          //table column connection
            $table->text('queue');                 //table column queue
            $table->longText('payload');            //table column payload
            $table->longText('exception');            //table column exception
            $table->timestamp('failed_at')->useCurrent();    //table column failed_at
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
        Schema::dropIfExists('failed_jobs');
    }
}
