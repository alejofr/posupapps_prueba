<?php


spl_autoload_register(function($cls) {

    $route = '../' . str_replace("\\", "/", $cls) . ".php";

    if( file_exists($route)  ){
        require_once $route;
    }

});