<?php

namespace Lib\Route;

use Lib\Route\Helpers;

class Route{
    use Helpers;
    private static $routes;


    public static function get($url, $callback)
    {
       self::$routes['GET'][self::helperUri($url)] = $callback;
    }


    public static function post($url, $callback)
    {
       self::$routes['POST'][self::helperUri($url)] = $callback;
    }

     /**
     *@param string $route
     *@param string $method
     *@return mixed
    */

    public static function init(){
        $method = $_SERVER['REQUEST_METHOD'];
        $uriCurrent = trim($_SERVER['REQUEST_URI'], '/');

        if( strpos($uriCurrent, '?') ){
            $uriCurrent = substr($uriCurrent, 0, strpos($uriCurrent, '?'));
        }

        foreach (self::$routes[$method] as $route => $callback) {

            if( strpos($route, ':') !== false ){
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9]+)', $route);
            }

            if(preg_match("#^$route$#", $uriCurrent, $matches) ){
            
                $params = [];
    
                if ( count($matches) >= 1 ){
                    $params = array_slice($matches, 1);
                }
    
                echo self::dispatch($callback, $params);
                return;
            }
        }

            
        echo "Ups! Error 404. Page not found";
        
    }
   
}