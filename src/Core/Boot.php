<?php
namespace Core;

use App\Application;
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
           Application::boot()->command($_POST['command'], $this->data);
       }else{
           Application::boot()->base();
       }
    }

    /**
     * @param $file
     */
    public function responseHtml($file){
        readfile($file);
    }

    /**
     * @param $command
     * @param array $data
     */
    public function response($command,$data=[]){
        $response = ['command'=>$command,'data'=>$data];
        echo json_encode($response);
    }
}