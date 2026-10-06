<?php

namespace Luracast\Restler\Format;

abstract class DependentMultiFormat extends \Luracast\Restler\Format\MultiFormat
{
    /**
     * Get external class => packagist package name as an associative array
     *
     * @return array list of dependencies for the format
     *
     * @example return ['Illuminate\\View\\View' => 'illuminate/view:4.2.*']
     */
    public abstract function getDependencyMap();
    protected function checkDependency($class = null)
    {
    }
    public function __construct()
    {
    }
}