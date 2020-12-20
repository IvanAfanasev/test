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
        $today = date("d.m.Y h:i:s");
        DB::boot()->connect()->query("INSERT INTO `product`(`name`,`date`) VALUES ('$name','$today')");
        Application::boot()->home();
    }

    public function getList(){
        return DB::boot()->connect()->query("SELECT * FROM `product`");
    }

    public function addActionProduct(){
        $data = Boot::boot()->data;
        $id=(int)$data['productid'];
        $actiontypeid=$data['actiontypeid'];
        $quantity=(INT)$data['quantity'];
        if($quantity>0){
            $userid = $_SESSION['USERID'];
            $product =  DB::boot()->connect()->query("SELECT * FROM `product` WHERE `id`='$id'");
            if($actiontypeid==1){
                $newQuantity =$quantity+$product[0]['quantity'];
            }else{
                $newQuantity =$product[0]['quantity']- $quantity;
            }
            if($newQuantity>=0){
                $today = date("d.m.Y h:i:s");
                DB::boot()->connect()->query("UPDATE `product` SET `quantity` = '$newQuantity' WHERE `product`.`id` = '$id';");
                DB::boot()->connect()->query("INSERT INTO `productaction`(`productid`, `actiontypeid`, `quantity`, `userid`,`date`) VALUES ('$id','$actiontypeid','$quantity','$userid','$today')");
            }
        }

        Application::boot()->home();
    }


    public function productActionHistory(){
        $data = Boot::boot()->data;
        $id=(int)$data['productid'];
        //
        $productActionHistory =  DB::boot()->connect()->query("SELECT productaction.*,users.login FROM `productaction`,`users` WHERE productaction.productid='$id' and productaction.userid=users.id");

        Boot::boot()->response('productHistory',$productActionHistory);
    }
}