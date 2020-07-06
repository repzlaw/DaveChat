<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPPixToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function($table){
            $table->string('fname');
            $table->string('lname');
            $table->string('oname');
            $table->string('dob');
            //$table->string('email');
            $table->string('gender');
            //$table->string('p_pix');
           // $table->string('phone');
            //$table->string('p_pix');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
