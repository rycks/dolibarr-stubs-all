<?php

/*
The NuSOAP project home is:
http://sourceforge.net/projects/nusoap/

The primary support for NuSOAP is the mailing list:
nusoap-general@lists.sourceforge.net
*/
/**
* caches instances of the wsdl class
* 
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @author	Ingo Fischer <ingo@apollon.de>
* @access public 
*/
class nusoap_wsdlcache
{
    /**
     *	@var resource
     *	@access private
     */
    var $fplock;
    /**
     *	@var integer
     *	@access private
     */
    var $cache_lifetime;
    /**
     *	@var string
     *	@access private
     */
    var $cache_dir;
    /**
     *	@var string
     *	@access public
     */
    var $debug_str = '';
    /**
     * constructor
     *
     * @param string $cache_dir directory for cache-files
     * @param integer $cache_lifetime lifetime for caching-files in seconds or 0 for unlimited
     * @access public
     */
    function nusoap_wsdlcache($cache_dir = '.', $cache_lifetime = 0)
    {
    }
    /**
     * creates the filename used to cache a wsdl instance
     *
     * @param string $wsdl The URL of the wsdl instance
     * @return string The filename used to cache the instance
     * @access private
     */
    function createFilename($wsdl)
    {
    }
    /**
     * adds debug data to the class level debug string
     *
     * @param    string $string debug data
     * @access   private
     */
    function debug($string)
    {
    }
    /**
     * gets a wsdl instance from the cache
     *
     * @param string $wsdl The URL of the wsdl instance
     * @return object wsdl The cached wsdl instance, null if the instance is not in the cache
     * @access public
     */
    function get($wsdl)
    {
    }
    /**
     * obtains the local mutex
     *
     * @param string $filename The Filename of the Cache to lock
     * @param string $mode The open-mode ("r" or "w") or the file - affects lock-mode
     * @return boolean Lock successfully obtained ?!
     * @access private
     */
    function obtainMutex($filename, $mode)
    {
    }
    /**
     * adds a wsdl instance to the cache
     *
     * @param object wsdl $wsdl_instance The wsdl instance to add
     * @return boolean WSDL successfully cached
     * @access public
     */
    function put($wsdl_instance)
    {
    }
    /**
     * releases the local mutex
     *
     * @param string $filename The Filename of the Cache to lock
     * @return boolean Lock successfully released
     * @access private
     */
    function releaseMutex($filename)
    {
    }
    /**
     * removes a wsdl instance from the cache
     *
     * @param string $wsdl The URL of the wsdl instance
     * @return boolean Whether there was an instance to remove
     * @access public
     */
    function remove($wsdl)
    {
    }
}
/**
 * For backward compatibility
 */
class wsdlcache extends \nusoap_wsdlcache
{
}