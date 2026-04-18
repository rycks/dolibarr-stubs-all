<?php

/**
 * DolibarrCollector class
 */
class DolibarrCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    /**
     *	Return collector name
     *
     *  @return string     Name
     */
    public function getName()
    {
    }
    /**
     * Return collected data
     *
     * @return array<string,mixed>		Array of collected data
     */
    public function collect()
    {
    }
    /**
     *	Return database info as an HTML string
     *
     *  @return string         HTML string
     */
    protected function getDatabaseInfo()
    {
    }
    /**
     *	Return dolibarr info as an HTML string
     *
     * @return string      HTML string
     */
    protected function getDolibarrInfo()
    {
    }
    /**
     *	Return mail info as an HTML string
     *
     * @return string      HTML string
     */
    protected function getMailInfo()
    {
    }
    /**
     *	Return widget settings
     *
     *  @return array<string,array{icon?:string,indicator?:string,widget?:string,tooltip?:string|array{html:string,class:string},map:string,default:string}>      Array
     */
    public function getWidgets()
    {
    }
    /**
     *	Return collector assets
     *
     * @return array<string,string>		Array
     */
    public function getAssets()
    {
    }
}