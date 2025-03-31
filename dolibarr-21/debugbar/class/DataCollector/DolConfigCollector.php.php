<?php

/**
 * DolConfigCollector class
 */
class DolConfigCollector extends \DebugBar\DataCollector\ConfigCollector
{
    /**
     *	Return widget settings
     *
     *  @return array<string,array{icon?:string,widget?:string,tooltip?:string,map:string,default:string}>      Array
     */
    public function getWidgets()
    {
    }
    /**
     *	Return collected data
     *
     *  @return    array{count:int,messages:string[]}   Array of collected data
     */
    public function collect()
    {
    }
    /**
     * Returns an array with config data
     *
     * @return array<string,array<string,string|mixed[]>>       Array of config
     */
    protected function getConfig()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Convert an object to array
     *
     * @param  mixed   $obj        Object
     * @return array<string,mixed> Array
     */
    protected function objectToArray($obj)
    {
    }
}