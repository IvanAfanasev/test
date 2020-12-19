<?php

namespace Core\Boot;


/**
 * Trait BootSimpleTrait
 * @package Core\Enginering\Traits\BootTrait
 */
trait BootSimpleTrait{
    /**
     * @var string
     */
    public $bootType = 'Simple';

    /**
     * // TODO temp(only dev)
     * @var array
     */
    protected static $_boot_instances=[];

    /**
     * @param mixed ...$arguments
     * @return static
     */
    public static function boot(...$arguments){
        /**
         * @var $object static
         */
        $object = new static(...$arguments);
        static::$_boot_instances['new'][]=$object;
        return $object;
    }


    /**
     * Space constructor.
     * @param mixed ...$arguments
     */
    private function __construct(...$arguments)
    {
    }

}