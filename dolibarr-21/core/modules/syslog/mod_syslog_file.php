<?php

/**
 * Class to manage logging to a file
 */
class mod_syslog_file extends \LogHandler
{
    /**
     * @var string
     */
    public $code = 'file';
    /**
     * @var float|int Last log time, used to compute delay
     */
    public $lastTime = 0;
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
     * @return int<0,1>		If logger enabled
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
     * 	@return	bool		true if ok
     */
    public function checkConfiguration()
    {
    }
    /**
     * Return the parsed logfile path
     *
     * @param	string	$suffixinfilename	When output is a file, append this suffix into default log filename.
     * @return	string
     */
    private function getFilename($suffixinfilename = '')
    {
    }
    // @phan-suppress-next-line PhanPluginDuplicateArrayKey
    const DOL_LOG_LEVELS = array(\LOG_EMERG => 'EMERG', \LOG_ALERT => 'ALERT', \LOG_CRIT => 'CRIT', \LOG_ERR => 'ERR', \LOG_WARNING => 'WARNING', \LOG_NOTICE => 'NOTICE', \LOG_INFO => 'INFO', \LOG_DEBUG => 'DEBUG');
    /**
     * Export the message
     *
     * @param	array{level:int,ip:string,ospid:string,osuser:string,message:string}	$content 	Array containing the info about the message
     * @param	string	$suffixinfilename	When output is a file, append this suffix into default log filename.
     * @return	void
     * @phan-suppress PhanPluginDuplicateArrayKey
     */
    public function export($content, $suffixinfilename = '')
    {
    }
}