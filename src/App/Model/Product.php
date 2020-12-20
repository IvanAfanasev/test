<?php
namespace App\Model;

use App\Application;
use Core\Boot;
use Core\Boot\BootSingleTrait;
use Core\DataBase\DB;

/**
 * Class Product
 * @package App\Model
 */
class Product{
    use BootSingleTrait;

    public function addProduct(){
        $data = Boot::boot()->data;
        $name = $data['name'];
        DB::boot()->connect()->query("INSERT INTO `product`(`name`) VALUES ('$name')");
        Application::boot()->home();
    }

    public function getList(){
        return DB::boot()->connect()->query("SELECT * FROM `product`");
    }
}