<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-10-14
 * Time: 下午11:49
 */

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
//use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends BaseController
{

    protected $oauth;

    public function __construct()
    {
    }

    public function index()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function show()
    {
        return '64589654';
    }

    public function show2()
    {
        return 'show22222';
    }

    public function store(Request $request)
    {
        try {
            User::create([
                'name' => 'abc',
                'email' => 'qq@qq.com',
                'password' => bcrypt('abc123456')
            ]);
            return $request;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function testJwt(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'name');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => $credentials], 401);
            // return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function aabbcc(Request $request)
    {
        $header = $request->headers->get('authorization');
        return $header;
    }

    /**
     * @param Request $request
     * @return
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('code', 'disposable_code');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => $credentials], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // check this user is new or not, and create user into database

        // all good so return the token
        return response()->json(compact('token'));
    }
}