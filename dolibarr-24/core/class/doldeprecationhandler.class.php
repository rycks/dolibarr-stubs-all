<?php

/* Copyright (C) 2024-2025	MDW							<mdeweerd@users.noreply.github.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * @file          DeprecationHandler.php
 * @ingroup       core
 * @brief         trait for handling deprecated properties and methods
 */
/**
 * Class for handling deprecated properties and methods
 */
trait DolDeprecationHandler
{
    // Define the following in the class using the trait
    // to allow properties to not be defined when referenced.
    // So only deprecated value generate exceptions.
    //
    // protected $enableDynamicProperties = true;
    // Define the following in the class using the trait
    // to disallow Dolibarr deprecation warnings.
    //
    // protected $enableDeprecatedReporting = false;
    /**
     * Get deprecated property
     *
     * @param string 	$name	Name of property
     * @return mixed	Value for replacement property
     */
    public function __get($name)
    {
    }
    /**
     * Set deprecated property
     *
     * @param string 	$name	Name of property
     * @param mixed		$value	Value of property
     * @return void
     */
    public function __set($name, $value)
    {
    }
    /**
     * Unset deprecated property
     *
     * @param string 	$name	Name of property
     * @return void
     */
    public function __unset($name)
    {
    }
    /**
     * Test if deprecated property is set
     *
     * @param string 	$name	Name of property
     * @return void
     */
    public function __isset($name)
    {
    }
    /**
     * Call deprecated method
     *
     * @param string 	$name		Name of method
     * @param mixed[]	$arguments	Method arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
    }
    /**
     * Indicate if deprecations should be reported. Depends on ->enableDeprecatedReporting. If not set, depends on PHP setup.
     *
     * @return bool
     */
    private function isDeprecatedReportingEnabled()
    {
    }
    /**
     * Indicate if dynamic properties are accepted
     *
     * @return bool
     */
    private function isDynamicPropertiesEnabled()
    {
    }
    /**
     * Provide list of deprecated properties
     *
     * Override this method in subclasses
     *
     * @return array<string,string>	Mapping of deprecated properties
     */
    protected function deprecatedProperties()
    {
    }
    /**
     * Provide list of deprecated methods
     *
     * Override this method in subclasses
     *
     * @return array<string,string>	Mapping of deprecated methods
     */
    protected function deprecatedMethods()
    {
    }
    /**
     * Get caller info
     *
     * @return string
     */
    protected static final function getCallerInfoString()
    {
    }
}