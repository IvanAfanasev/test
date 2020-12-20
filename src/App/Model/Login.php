<?php

namespace App\Model;

use Core\Boot;
use Core\DataBase\DB;

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
            $res = DB::boot()->connect()->query("SELECT * FROM `users` WHERE `login` = '$login'");
            if(is_array($res) && is_array($res[0]) && $res[0]['password']==$password){
                $_SESSION['USERID']= $res[0]['id'];
                Boot::boot()->response('home');
            }else{
                Boot::boot()->response('auth');
            }
        }
    }
}