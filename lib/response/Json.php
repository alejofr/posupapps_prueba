<?php 

namespace Lib\Response;


trait Json{

    public function json($data = [], array $headers = [])
    {
       header('Content-Type', 'application/json');

       foreach ($headers as $key => $value) {
            header($key, $value);
       }

       return json_encode($data);
    }

}