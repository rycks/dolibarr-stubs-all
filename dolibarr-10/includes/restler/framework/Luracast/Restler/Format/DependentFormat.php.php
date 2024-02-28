<?php

namespace Luracast\Restler\Format;

abstract class DependentFormat extends \Luracast\Restler\Format\Format
{
    /**
     * override in the extending class
     *
     * @example symfony/yaml:*
     */
    const PACKAGE_NAME = 'vendor/project:version';
    /**
     * override in the extending class
     *
     * fully qualified class name
     */
    const EXTERNAL_CLASS = 'Namespace\\ClassName';
    /**
     * Get external class => packagist package name as an associative array
     *
     * @return array list of dependencies for the format
     */
    public function getDependencyMap()
    {
    }
    protected function checkDependency($class = null)
    {
    }
    public function __construct()
    {
    }
}