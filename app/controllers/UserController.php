<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller{
    public function __construct() {
        if ( $this->checkAuth() ){
            $this->redirect('/publications');
        }
    }
    public function create()
    {
        return $this->view('auth.sign-up');
    }
    public function signup()
    {   
        $data = $this->all('POST');
        $data['password'] = password_hash( $data['password'], PASSWORD_BCRYPT );

        User::create($data);

        return $this->redirect('/');
    }

    public function login()
    {
        return $this->view('auth.sign-in');
    }

    public function signin()
    {   

        $user = User::where([
            ['email', $this->only('email', 'POST')]
        ])->first();


        if( $user == null || ( $user != null && !password_verify($this->only('password', 'POST'), $user->password) ) ){

            return $this->view('auth.sign-in', [
                "error" => "Correo o contraseña invalida.",
                ...$this->all('POST')
            ]);

        }

        $this->authenticate($user);

        return $this->redirect('/publications');
    }

}