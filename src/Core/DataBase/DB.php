<?php
namespace Core\DataBase;

use App\Config\DbConfig;
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
            $host = DbConfig::boot()->host;
            $db   = DbConfig::boot()->db;
            $user = DbConfig::boot()->user;
            $pass = DbConfig::boot()->pass;
            $charset = DbConfig::boot()->charset;
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