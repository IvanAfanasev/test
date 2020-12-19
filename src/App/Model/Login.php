<?php

namespace App\Model;

use Core\Boot;
/**
 * Class Login
 * @package App\Model
 */
class Login{
    use Boot\BootSingleTrait;

    public function login(){
        $data = Boot::boot()->data;
        $login = $data['login'];
        $password = $data['password'];
        if($login && $password){
            if($login=='admin' && $password=='admin'){
                Boot::boot()->response('home');
            }else{
                Boot::boot()->response('auth');
            }
        }
    }
}