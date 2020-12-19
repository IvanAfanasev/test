<?php
namespace App;

use Core\Boot;

/**
 * Class Application
 * @package App
 */
class Application{
    use Boot\BootMultiTrait;

    public function base(){
        Boot::boot()->responseHtml(__DIR__.'/View/Base.html');
    }


    public function init(){
        if(isset($_SESSION['login']) and  $_SESSION['login']!=false){
            Boot::boot()->response('home');
        }else{
            Boot::boot()->response('auth');
        }
    }
}