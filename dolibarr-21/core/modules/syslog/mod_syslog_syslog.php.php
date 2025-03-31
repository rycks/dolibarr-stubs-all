<?php

/**
 * Class to manage logging to syslog
 */
class mod_syslog_syslog extends \LogHandler
{
    public $code = 'syslog';
    /**
     * 	Return name of logger
     *
     * 	@return	string		Name of logger
     */
    public function getName()
    {
    }
    /**
     * Version of the module ('x.y.z' or 'dolibarr' or 'experimental' or 'development')
     *
     * @return string
     */
    public function getVersion()
    {
    }
    /**
     * Content of the info tooltip.
     *
     * @return false|string
     */
    public function getInfo()
    {
    }
    /**
     * Is the logger active ?
     *
     * @return int<0,1>		1 if logger enabled
     */
    public function isActive()
    {
    }
    /**
     * 	Return array of configuration data
     *
     * 	@return	array<array{name:string,constant:string,default:string,css?:string}>	Return array of configuration data
     */
    public function configure()
    {
    }
    /**
     * 	Return if configuration is valid
     *
     * 	@return	bool		True if ok.
     */
    public function checkConfiguration()
    {
    }
    /**
     * Export the message
     *
     * @param	array{level:int,ip:string,ospid:string,osuser:string,message:string}	$content 	Array containing the info about the message
     * @param   string  $suffixinfilename   When output is a file, append this suffix into default log filename.
     * @return  void
     */
    public function export($content, $suffixinfilename = '')
    {
    }
}