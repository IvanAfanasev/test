<?php
namespace App\Config;

use Core\Boot\BootSingleTrait;

/**
 * Class DbConfig
 * @package App\Config
 */
class DbConfig{
    use BootSingleTrait;
    public $host = '127.0.0.1';
    public $db   = 'test';
    public $user = 'root';
    public $pass = '';
    public $charset = 'utf8';
}