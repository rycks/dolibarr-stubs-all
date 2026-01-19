<?php

namespace Webklex\PHPIMAP\Support\Masks;

/**
 * Class Mask
 *
 * @package Webklex\PHPIMAP\Support\Masks
 */
class Mask
{
    /**
     * Available attributes
     *
     * @var array $attributes
     */
    protected $attributes = [];
    /**
     * Parent instance
     *
     * @var object $parent
     */
    protected $parent;
    /**
     * Mask constructor.
     * @param $parent
     */
    public function __construct($parent)
    {
    }
    /**
     * Boot method made to be used by any custom mask
     */
    protected function boot()
    {
    }
    /**
     * Call dynamic attribute setter and getter methods and inherit the parent calls
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     * @throws MethodNotFoundException
     */
    public function __call($method, $arguments)
    {
    }
    /**
     * Magic setter
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    public function __set($name, $value)
    {
    }
    /**
     * Magic getter
     * @param $name
     *
     * @return mixed|null
     */
    public function __get($name)
    {
    }
    /**
     * Get the parent instance
     *
     * @return mixed
     */
    public function getParent()
    {
    }
    /**
     * Get all available attributes
     *
     * @return array
     */
    public function getAttributes()
    {
    }
}