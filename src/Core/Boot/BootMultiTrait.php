<?php

namespace Core\Boot;


/**
 * Trait BootMultiTrait
 * @package Core\Enginering\Traits\BootTrait
 */
trait BootMultiTrait
{

    /**
     * @var array
     */
    private static $bootInstances = [];

    /**
     * @var null
     */
    public $bootKey = null;

    /**
     * @var string
     */
    public $bootType = 'Multi';

    /**
     * Space constructor.
     * @param mixed ...$arguments
     */
    private function __construct(...$arguments)
    {
    }

    /**
     * @param $key string
     * @param mixed ...$arguments
     * @return static
     */
    public static function boot(string $key, ...$arguments)
    {
        if (!isset(static::$bootInstances[$key])) {

            $object = new static(...$arguments);
            static::$bootInstances[$key] = $object;
            $object->bootKey = $key;
        } else $object = static::$bootInstances[$key];
        return $object;
    }

    /**
     * @param string $key
     * @return static|null
     */
    public static function bootIsset(string $key)
    {
        if (isset(static::$bootInstances[$key])) {
            return static::$bootInstances[$key];
        } else {
            return null;
        }
    }

    /**
     * @return null|string
     */
    public function getBootKey()
    {

        return $this->bootKey;
    }
}