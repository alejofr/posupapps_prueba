<?php

namespace Lib\Request;
trait Request {


    public function all($method = 'GET'){
        $data = [];


        switch ($method) {
            case 'POST':
                $data = $_POST;
                break;
            
            default:
                $data = $_GET;
                break;
        }

        return $data;
    }

    public function only($key, $method = 'GET')
    {
        $data = $this->all($method);

        if( array_key_exists($key, $data) ){
            return $data[$key];
        }

        return null;
    }

}