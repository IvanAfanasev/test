<?php

namespace Core\Boot;


/**
 * Trait BootSingleTrait
 * @package Core\Enginering\Traits\BootTrait
 */
trait BootSingleTrait{
    /**
     * @var static
     */
    protected static $bootInstance=null;
    /**
     * @var string
     */
    public $bootType = 'Single';
    /**
     * @param mixed ...$arguments
     * @return static
     */
    public static function boot(...$arguments){
        if (static::$bootInstance===null) {
            $object= new static(...$arguments);
            static::$bootInstance = $object;
        }else $object=static::$bootInstance;
        return $object;
    }
    /**
     * @return static|null
     */
    public static function bootIsset(){
        if (static::$bootInstance!==null) {
            return static::$bootInstance;
        }else{
            return null;
        }
    }
    /**
     * @param object $instance
     * @return static
     */
    public static function setInstance(object $instance){
        static::$bootInstance=$instance;
        return static::$bootInstance;
    }

    /**
     * BootSingleTrait constructor.
     * @param mixed ...$arguments
     */
    private function __construct(...$arguments)
    {
    }
}