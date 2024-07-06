<?php

/**
 * Class to manage logging to a file
 */
class mod_syslog_file extends \LogHandler
{
    public $code = 'file';
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
     * @return int		1 if logger enabled
     */
    public function isActive()
    {
    }
    /**
     * 	Return array of configuration data
     *
     * 	@return	array		Return array of configuration data
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
    /**
     * Export the message
     *
     * @param  	array 	$content 			Array containing the info about the message
     * @param	string	$suffixinfilename	When output is a file, append this suffix into default log filename.
     * @return	void
     * @phan-suppress PhanPluginDuplicateArrayKey
     */
    public function export($content, $suffixinfilename = '')
    {
    }
}