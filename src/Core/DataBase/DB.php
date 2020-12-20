<?php
namespace Core\DataBase;

use Core\Boot\BootSingleTrait;
use PDO;

class DB{
    use BootSingleTrait;

    /**
     * @var PDO;
     */
    public $PDO=false;

    public function connect(){

        if($this->PDO==false){
            $host = '127.0.0.1';
            $db   = 'test';
            $user = 'root';
            $pass = '';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->PDO = new PDO($dsn,$user,$pass,$opt);

        }
        return $this;
    }

    public function query($s){

        $query = $this->PDO->query($s);
        return $query->fetchAll();
    }




}