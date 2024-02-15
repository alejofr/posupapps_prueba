<?php

namespace Lib\Route;

trait Helpers{
    
    /**
     *@param mixed $callback
     *@param mixed $paylod
     *@return mixed
    */

    private static function dispatch($callback, $paylod)
    {
       switch ($callback) {
        case is_array($callback):
            $controller = new $callback[0];
            return $controller->{$callback[1]}(...$paylod);
        default:
            return $callback();
       }
    }

    /**
     *@param string $uri
     *@return mixed
    */

    private static function helperUri($uri) {
        return trim($uri, '/');
    }


}