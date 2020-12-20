<?php
namespace Core;

use App\Application;
use App\Model\Login;
use Core\Boot\BootSingleTrait;


/**
 * Class Boot
 * @package src\Core
 */
class Boot{
    use BootSingleTrait;
    public $data;
    public function run(){
        session_start();
       if(isset($_POST['command'])){
          $this->data=json_decode($_POST['data'],JSON_FORCE_OBJECT);
           switch ($_POST['command']){
               case 'init':{
                   Application::boot('app')->init();
               }break;
               case 'login':{
                   Login::boot()->login();

               }
           }

       }else{
           Application::boot('app')->base();
       }
    }

    /**
     * @param $file
     */
    public function responseHtml($file){
        readfile($file);
    }

    public function response($command,$data=[]){
        $response = ['command'=>$command,'data'=>$data];
        echo json_encode($response);
    }
}