<?php
namespace App;

use App\Model\Login;
use App\Model\Product;
use Core\Boot;

/**
 * Class Application
 * @package App
 */
class Application{
    use Boot\BootSingleTrait;

    public function base(){
        Boot::boot()->responseHtml(__DIR__.'/View/Base.html');
    }

    public function init(){
        if(isset($_SESSION['USERID']) and  $_SESSION['USERID']!=false){
            $this->home();
        }else{
            Boot::boot()->response('auth');
        }
    }

    public function home(){
        $list  = Product::boot()->getList();
        Boot::boot()->response('home',$list);
    }
    /**
     * @param $command
     * @param array $data
     */
    public function command($command,$data=[]){
        switch ($command){
            case 'init':{
               $this->init();
            }break;
            case 'login':{
                Login::boot()->login();
            }break;
            case 'addProduct':{
                Product::boot()->addProduct();
            }
        }
    }


}