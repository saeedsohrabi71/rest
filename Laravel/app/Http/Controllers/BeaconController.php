<?php

namespace App\Http\Controllers;

use App\app_codes\ErrorCodes;
use App\app_codes\UserLocationsManager;
use App\Beacon;
use App\User;
use Auth;
use Illuminate\Http\Request;

class BeaconController extends Controller
{

    public function __construct()
    {

        // $this->middleware( 'auth' );
    }

    protected function all()
    {

        return Beacon::all();
    }

    public function userAllBeacons( Request $request )
    {

        $user = User::find( $request->get( 'id' ) );

        if ( !empty( $user ) ) {
            $var = Beacon::where( 'userId', '=', $request->get( 'id' ) )->get();
            return $var;
        }
        return [ ];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function sendBeacon( Request $request )
    {

        try {
            $user = Auth::user();

            $input = new Beacon( $request->request->all() );

            $input->setAttribute( 'userId', $user->getAttributeValue( 'id' ) );

            if ( $input->save() ) {


                $user->setAttribute( 'last_beacon_id', $input->id );

                if ( $user->save() )
                    return ResponseManager::createSuccessJsonResponse( $input->id );

                return ResponseManager::createFailedResponse
                (
                    null,
                    ErrorCodes::$SQL_OPERATION_FAILED_CODE,
                    ErrorCodes::$SQL_OPERATION_FAILED_MESSAGE,
                    200
                );
            }
        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }
    }


    /**
     * @param Request $request
     * @return Beacon
     * @internal param $id
     */
    public function getLastBeacon()
    {

        try {

            $beacon = Beacon::where( 'id', '=', Auth::user()->
            getAttribute( "last_beacon_id" ) )->get()->first();

            if ( !empty( $beacon ) )
                return ResponseManager::createSuccessJsonResponse( $beacon );

            return ResponseManager::createFailedResponse
            (
                null,
                ErrorCodes::$BEACON_NOT_FOUND_CODE,
                ErrorCodes::$BEACON_NOT_FOUND_MESSAGE,
                200
            );
        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }
    }


    public function getUserAllFollowingsBeacons()
    {

        try {

            return ResponseManager::createSuccessJsonResponse( UserLocationsManager::getUserAllFriendsLocation() );
        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }
    }



}
