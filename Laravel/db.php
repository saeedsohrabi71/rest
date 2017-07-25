<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 4/30/2017
 * Time: 1:17 PM
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


Schema::create('beacons', function (Blueprint $table) {
    $table->increments('id');
    $table->int('userId');
    $table->bigInteger('latitude');
    $table->timestamps();
});