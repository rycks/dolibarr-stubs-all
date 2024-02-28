<?php

/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author PrestaShop SA <contact@prestashop.com>
* @copyright  2007-2013 PrestaShop SA
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
* International Registered Trademark & Property of PrestaShop SA
* PrestaShop Webservice Library
* @package PrestaShopWebservice
*/
/**
 * @package PrestaShopWebservice
 */
class PrestaShopWebservice
{
    /** @var string Shop URL */
    protected $url;
    /** @var string Authentification key */
    protected $key;
    /** @var boolean is debug activated */
    protected $debug;
    /** @var string PS version */
    protected $version;
    /** @var array compatible versions of PrestaShop Webservice */
    const PSCOMPATIBLEVERSIONMIN = '1.4.0.0';
    const PSCOMPATIBLEVERSIONMAX = '1.7.99.99';
    /**
     * PrestaShopWebservice constructor. Throw an exception when CURL is not installed/activated
     * <code>
     * <?php
     * require_once './PrestaShopWebservice.php';
     * try
     * {
     * 	$ws = new PrestaShopWebservice('http://mystore.com/', 'ZQ88PRJX5VWQHCWE4EE7SQ7HPNX00RAJ', false);
     * 	// Now we have a webservice object to play with
     * }
     * catch (PrestaShopWebserviceException $ex)
     * {
     * 	echo 'Error : '.$ex->getMessage();
     * }
     * ?>
     * </code>
     * @param string $url Root URL for the shop
     * @param string $key Authentification key
     * @param mixed $debug Debug mode Activated (true) or deactivated (false)
     */
    public function __construct($url, $key, $debug = \true)
    {
    }
    /**
     * Take the status code and throw an exception if the server didn't return 200 or 201 code
     *
     * @param int $status_code Status code of an HTTP return
     * @return void
     */
    protected function checkStatusCode($status_code)
    {
    }
    /**
     * Handles a CURL request to PrestaShop Webservice. Can throw exception.
     *
     * @param 	string 	$url 			Resource name
     * @param 	mixed 	$curl_params 	CURL parameters (sent to curl_set_opt)
     * @return 	array 					status_code, response
     */
    public function executeRequest($url, $curl_params = array())
    {
    }
    /**
     * Output debug info
     *
     * @param 	string	$title		Title
     * @param 	string	$content	Content
     * @return	void
     */
    public function printDebug($title, $content)
    {
    }
    /**
     * Return version
     *
     * @return	string		Version
     */
    public function getVersion()
    {
    }
    /**
     * Load XML from string. Can throw exception
     *
     * @param 	string 				$response 	String from a CURL response
     * @return 	SimpleXMLElement|boolean		status_code, response
     *
     * @throw PrestaShopWebserviceException
     */
    protected function parseXML($response)
    {
    }
    /**
     * Add (POST) a resource
     * <p>Unique parameter must take : <br><br>
     * 'resource' => Resource name<br>
     * 'postXml' => Full XML string to add resource<br><br>
     * Examples are given in the tutorial</p>
     *
     * @param 	array 				$options	Options
     * @return 	SimpleXMLElement|boolean 		status_code, response
     *
     * @throw PrestaShopWebserviceException
     */
    public function add($options)
    {
    }
    /**
     * Retrieve (GET) a resource
     * <p>Unique parameter must take : <br><br>
     * 'url' => Full URL for a GET request of Webservice (ex: http://mystore.com/api/customers/1/)<br>
     * OR<br>
     * 'resource' => Resource name,<br>
     * 'id' => ID of a resource you want to get<br><br>
     * </p>
     * <code>
     * <?php
     * require_once './PrestaShopWebservice.php';
     * try
     * {
     * $ws = new PrestaShopWebservice('http://mystore.com/', 'ZQ88PRJX5VWQHCWE4EE7SQ7HPNX00RAJ', false);
     * $xml = $ws->get(array('resource' => 'orders', 'id' => 1));
     *	// Here in $xml, a SimpleXMLElement object you can parse
     * foreach ($xml->children()->children() as $attName => $attValue)
     * 	echo $attName.' = '.$attValue.'<br>';
     * }
     * catch (PrestaShopWebserviceException $ex)
     * {
     * 	echo 'Error : '.$ex->getMessage();
     * }
     * ?>
     * </code>
     * @param 	array 			$options 	Array representing resource to get.
     * @return 	SimpleXMLElement|boolean	status_code, response
     *
     * @throw PrestaShopWebserviceException
     */
    public function get($options)
    {
    }
    /**
     * Head method (HEAD) a resource
     *
     * @param 	array 				$options 	Array representing resource for head request.
     * @return 	SimpleXMLElement 				status_code, response
     *
     * @throw PrestaShopWebserviceException
     */
    public function head($options)
    {
    }
    /**
     * Edit (PUT) a resource
     * <p>Unique parameter must take : <br><br>
     * 'resource' => Resource name ,<br>
     * 'id' => ID of a resource you want to edit,<br>
     * 'putXml' => Modified XML string of a resource<br><br>
     * Examples are given in the tutorial</p>
     *
     * @param 	array 				$options 	Array representing resource to edit.
     * @return	SimpleXMLElement|boolean 		status_code, response
     *
     * @throw PrestaShopWebserviceException
     */
    public function edit($options)
    {
    }
}
/**
 * @package PrestaShopWebservice
 */
class PrestaShopWebserviceException extends \Exception
{
}