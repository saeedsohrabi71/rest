<?php

namespace App;

use Eloquent;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;

class Beacon extends Eloquent
{


    protected $table = 'beacons';

    public $timestamps = false;

    protected $fillable = [ 'userId', 'time', 'accuracy', 'speed', 'altitude', 'latitude', 'longLatitude' ];

    public function User()
    {

        return this . $this->belongsTo( 'App\User' );
    }
}
