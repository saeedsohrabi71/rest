<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'user_user', function ( Blueprint $table ) {

            $table->bigInteger( 'firstUser_Id' );
            $table->foreign( 'firstUser_Id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );

            $table->bigInteger( 'secondUser_Id' );
            $table->foreign( 'secondUser_Id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'user_user' );
    }
}
