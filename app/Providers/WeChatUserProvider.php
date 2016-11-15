<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-10-17
 * Time: 下午5:48
 */

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use App\Services\MyOauth;

class WeChatUserProvider extends EloquentUserProvider
{

    /**
     * Create a new database user provider.
     *
     * @param  \Illuminate\Contracts\Hashing\Hasher  $hasher
     * @param  string  $model
     * @return void
     */
    public function __construct(HasherContract $hasher, $model)
    {
        $this->model = $model;
        $this->hasher = $hasher;
    }

    /**
     * Validate a user against the given credentials by CustomProvider.
     * Validate WEChat Code in order to confirm this user is my application User from Front-end box Application
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        if (env('APP_ENV') === 'local') {
            return true;
        }else {
            $oauth = new MyOauth();
            return $oauth->oauth();
        }
    }
}