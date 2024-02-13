<?php 

namespace Lib\Response;


trait Redirect{

    public function redirect($route)
    {
        header("Location: $route");
    }

}