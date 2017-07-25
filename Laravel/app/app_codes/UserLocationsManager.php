<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 6/3/2017
 * Time: 8:22 PM
 */

namespace App\app_codes;


use App\Beacon;
use Auth;

class UserLocationsManager
{

    public static function getUserAllFriendsLocation()
    {

        return Beacon::whereIn( 'id', Auth::user()->Friends()->pluck( 'last_beacon_id' ) )->get()->toArray();

    }


}