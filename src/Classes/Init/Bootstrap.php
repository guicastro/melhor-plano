<?php

namespace Init;

use \Controllers;

abstract class Bootstrap
{
    protected $Routes;

    public function __construct() {

        $this->initRoutes();
        $this->run($this->getUrl());

    }

    abstract protected function initRoutes();

    protected function run($url) {

        array_walk($this->Routes,function($routeConfig, $routeInterface) use ($url){

            $splitURL = explode("/public/", $url);
            $splitArgs = explode("/", $splitURL[1]);
            
            if(trim($splitArgs[0]."/".$splitArgs[1])==trim($routeInterface)) {

                $class = "\Controllers\\".ucfirst($routeConfig['controller'])."Controller";
                $method = $_SERVER['REQUEST_METHOD'];
                $action = $routeConfig['action'];
                $view = $routeConfig['view'];
                $args = array_slice($splitArgs, 2);
                $controller = new $class($action, $view, $method, $args);
            }
        });
    }

    protected function setRoutes(array $routes) {

        $this->Routes = $routes;
    }

    protected function getUrl() {

        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }

}