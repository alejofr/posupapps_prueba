<?php

namespace App\Controllers;


class HomeController extends Controller{

    public function index(){
        
        return $this->view('home');
    }

    public function logout(){
        
        return $this->destroyAuth();
    }

}