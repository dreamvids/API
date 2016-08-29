<?php

/**
 * Created by PhpStorm.
 * User: peter_000
 * Date: 29/08/2016
 * Time: 11:15
 */
class Router {
    private static $instance = null;
    public static $controllers = [
        'home',
        'user'
    ];

    private $controller = null;

    private function __construct() {
        if (self::controllerExists()) {
            $this->controller = Request::get()->getArg(0);
        }
        else {
            (new Response(Response::HTTP_404_NOT_FOUND))->render();
        }
    }

    public static function get() {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function controllerExists() {
        return in_array(Request::get()->getArg(0), self::$controllers);
    }

    public function getPathToRequire() {
        return CONTROLLERS.$this->controller.'.php';
    }
}