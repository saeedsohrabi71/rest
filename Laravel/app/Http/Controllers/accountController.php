<?php

namespace App\Http\Controllers;

use App\app_codes\ErrorCodes;
use App\app_codes\UserManager;
use App\Http\Controllers\Auth as mAuth;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{

    /**
     * @param Request $request
     * @return \App\ResponsePayload
     */
    public function createUser( Request $request )
    {

        $register = new mAuth\RegisterController();

        $validate = $register->v( $request->request->all() );

        if ( !$validate->fails() )
            return ResponseManager::createSuccessJsonResponse( $register->c( $request->request->all() ) );


        return ResponseManager::createFailedResponse(
            $validate->failed(),
            ErrorCodes::$VALIDATION_FAILED_CODE,
            ErrorCodes::$VALIDATION_FAILED_MESSAGE,
            null
        );

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function searchUser( Request $request )
    {

        try {

            return ResponseManager::createSuccessJsonResponse(
                User::where( 'name', 'LIKE', $request->request->get( 'query' ) )->get()->toArray() );

        }
        catch ( \Exception $e ) {

            return ResponseManager:: createRuntimeExceptionResponse( $e );
        }

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {

        try {

            return new ResponseManager( User::all() );

        }
        catch ( \Exception $e ) {

            ResponseManager::createRuntimeExceptionResponse( $e );
        }

    }

    public function getCurrentUser()
    {

        try {

            return ResponseManager::createSuccessJsonResponse( Auth::user() );
        }
        catch ( \Exception $e ) {
            return ResponseManager::createRuntimeExceptionResponse( $e );

        }

    }

    /**
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function getUsersAllFollowings()
    {

        try {
            return ResponseManager::createSuccessJsonResponse(

                Auth::user()->Friends()->get()
            );
        }
        catch ( \Exception $e ) {
            return ResponseManager::createRuntimeExceptionResponse( $e );

        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function followFriend( Request $request )
    {

        try {

            return ResponseManager::createSuccessJsonResponse(
                Auth::user()->Friends()->attach( $request->request->get( 'second_user_id' ) )
            );

        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function unfollowFriend( Request $request )
    {

        try {

            return ResponseManager::createSuccessJsonResponse(
                Auth::user()->Friends()->detach( $request->request->get( 'second_user_id' ) )
            );

        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function toggleUsersFollowing( Request $request )
    {

        try {

            Auth::user()->Friends()->toggle( $request->request->get( 'second_user_id' ) );
            return ResponseManager::createSuccessJsonResponse( 1 );

        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }

    }


    public function getUserInfo( Request $request )
    {

        try {

            return ResponseManager::createSuccessJsonResponse(

                UserManager::getUserInfo( $request->request->get( 'id' ) )
            );
        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }

      // return DB::select('select name,email from users where id=?',[$request->request->get('id')]);

       // return User::where( 'id', '=', $request->request->get('id') )->get( [ 'name', 'email' ] );
    }

    public function getUsersInfo(Request $request){

        try {

            return ResponseManager::createSuccessJsonResponse(

                UserManager::getUsersInfo( $request->request->get( 'ids' ) )
            );
        }
        catch ( \Exception $e ) {

            return ResponseManager::createRuntimeExceptionResponse( $e );

        }

    }


}
