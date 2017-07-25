<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBeaconsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'beacons', function ( Blueprint $table ) {

            $table->increments( 'key' );
            $table->integer( 'userId' );
            $table->unsignedBigInteger( 'time' );
            $table->double( 'accuracy' );
            $table->double( 'speed' );
            $table->double( 'altitude' );
            $table->double( 'latitude' );
            $table->double( 'longLatitude' );
            $table->foreign( 'userId' )->references( 'id' )->on( 'users' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'beacons' );
    }
}
