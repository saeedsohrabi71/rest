<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 5/7/2017
 * Time: 2:34 AM
 */


namespace Infrastructure\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\LoginProxy;
use Infrastructure\Auth\LoginRequest;

class LoginController extends Controller
{

    private $loginProxy;

    public function __construct( LoginProxy $loginProxy )
    {

        $this->loginProxy = $loginProxy;
    }

    public function login( LoginRequest $request )
    {

        $email = $request->get( 'email' );
        $password = $request->get( 'password' );

        return $this->response( $this->loginProxy->attemptLogin( $email, $password ) );
    }

    public function refresh( Request $request )
    {

        return $this->response( $this->loginProxy->attemptRefresh() );
    }

    public function logout()
    {

        $this->loginProxy->logout();

        return $this->response( null, 204 );
    }
}