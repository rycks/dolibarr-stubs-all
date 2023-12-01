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
     *	Return collected data
     *
     * @return array       Array
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
     * @return array       Array
     */
    public function getWidgets()
    {
    }
    /**
     *	Return collector assests
     *
     * @return array       Array
     */
    public function getAssets()
    {
    }
}