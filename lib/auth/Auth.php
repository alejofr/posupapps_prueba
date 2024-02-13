<?php

namespace Lib\Auth;

use App\Models\User;
use Lib\Response\Redirect;

trait Auth {
    use Redirect;
    public $nameCookie = "token";
    public function authenticate(User $user)
    {
        $hast = password_hash( $user->id, PASSWORD_BCRYPT );
        setcookie($this->nameCookie, $hast);

        $_SESSION['user'] = [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name
        ];

        return ['user' => $_SESSION['user'], "token" => $_COOKIE[$this->nameCookie] ];
    }

    public function user()
    {
        if( isset($_SESSION['user']) ){
            return $_SESSION['user'];
        }

        return null;
    }

    public function token()
    {
        if( isset($_COOKIE[$this->nameCookie]) ){
            return $_COOKIE[$this->nameCookie];
        }

        return null;
    }
    
    public function checkAuth()
    {
        $user = $this->user();
        $token = $this->token();

        if( $user !== null && $token !== null && $this->verify_token($token, $user['id']) ){

            return true;
        }

        return false;
    }

    public function destroyAuth()
    {

        $_SESSION['user'] = null;
        setcookie($this->nameCookie, null);
        
        session_destroy();

        $this->redirect('/');
    }

    public function verify_token($token, $id)  {
        return password_verify($id, $token);
    }
    
}