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

    public function run(){
        $command = [
            'init'=>''
        ];
       if(isset($_POST['command'])){
           Application::boot('app')->init();
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