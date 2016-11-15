<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-10-17
 * Time: 下午3:51
 */

namespace App\Extensions\JWTAuth;

use Exception;
use Illuminate\Contracts\Auth\Guard;
use Tymon\JWTAuth\Providers\Auth\AuthInterface;

class IlluminateAuthAdapter implements AuthInterface
{
    /**
     * @var \Illuminate\Auth\AuthManager
     */
    protected $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Check a user's credentials
     *
     * @param  array $credentials
     *
     * @return bool
     */
    public function byCredentials(array $credentials = [ ])
    {
        return $this->auth->once($credentials);
    }

    /**
     * Authenticate a user via the id
     *
     * @param  mixed $id
     *
     * @return bool
     */
    public function byId($id)
    {
        try {
            return $this->auth->onceUsingId($id);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get the currently authenticated user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->auth->user();
    }
}