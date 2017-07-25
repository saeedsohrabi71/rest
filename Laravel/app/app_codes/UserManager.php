<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 7/11/2017
 * Time: 1:16 PM
 */

namespace App\app_codes;

use App\User;
use Auth;

class UserManager
{

    public static function getCurrentUserProfile()
    {

        return Auth::user()->getAttributeValue();
    }

    public static function getUserInfo( $id )
    {

        return User::where( 'id', '=', $id )->get( [ 'name', 'email' ] )->first();
    }

    public static function getUsersInfo( $ids )
    {

        return User::wherein( 'id', $ids )->get( [ 'name', 'email' ] );
    }
}