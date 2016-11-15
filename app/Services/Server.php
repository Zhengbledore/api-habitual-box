<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16-10-21
 * Time: 下午9:08
 */

namespace App\Services;

use EasyWeChat\Foundation\Application;

/**
 * Class Server
 * @package App\Services\Server
 */
class Server
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var array
     */
    protected $option;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->option = config('wechat');
        $this->initApplication();

    }

    protected function initApplication()
    {
        $this->app = new  Application($this->option);
    }

    protected function setOptions($option)
    {
        $this->option = $option;
        $this->initApplication();
    }

    protected function setOption($option)
    {
        array_merge($this->option, $option);
        $this->initApplication();
    }

//    public function __get($value)
//    {
//        return $this->app->$value;
//    }
}