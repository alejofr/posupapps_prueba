<?php

namespace App\Controllers;

use Lib\Auth\Auth;
use Lib\Request\Request;
use Lib\Response\Json;
use Lib\Response\Redirect;
use Lib\Response\View;

class Controller{

    use View, Json, Request, Redirect, Auth;

}