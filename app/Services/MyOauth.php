<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-10-21
 * Time: 下午9:14
 */

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class Oauth
 * @package App\Services\Server
 */
class MyOauth extends Server
{
    /**
     * doing oauth
     */
    public function oauth()
    {
            $this->app->oauth->user();
    }

    /**
     * Create Wechat user into application database
     */
    public function createWechatUser()
    {

    }

    /**
     * check this wechat user is exist in application database
     */
    public function checkUser()
    {
        return true;
    }

    public function getCodeUrl()
    {

    }
}