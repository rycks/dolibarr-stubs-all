<?php

/**
 * DolRequestDataCollector class
 */
class DolHooksCollector extends \DebugBar\DataCollector\RequestDataCollector
{
    /**
     * Collects the data from the collectors
     *
     * @return array{nb_of_hooks:int,hooks:array<string,array{contexts:string}>}       Array of collected data
     */
    public function collect()
    {
    }
    /**
     *	Return widget settings
     *
     *  @return		array<string,array{icon?:string,widget?:string,map:string,default:int|string}>  Array
     */
    public function getWidgets()
    {
    }
    /**
     * @return string
     */
    public function getName()
    {
    }
}