<?php

/* Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
 */
/*
* 2007-2022 PrestaShop SA and Contributors
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* https://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to https://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2022 PrestaShop SA
*  @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
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
    /** @var string Authentication key */
    protected $key;
    /** @var boolean is debug activated */
    protected $debug;
    /** @var string PS version */
    protected $version;
    /** @var string Minimal version of PrestaShop to use with this library */
    const PS_COMPATIBLE_VERSIONS_MIN = '1.4.0.0';
    /** @var string Maximal version of PrestaShop to use with this library */
    const PS_COMPATIBLE_VERSIONS_MAX = '8.1.1';
    /**
     * PrestaShopWebservice constructor. Throw an exception when CURL is not installed/activated
     * <code>
     * <?php
     * require_once('./PrestaShopWebservice.php');
     * try
     * {
     *    $ws = new PrestaShopWebservice('https://mystore.com/', 'ZQ88PRJX5VWQHCWE4EE7SQ7HPNX00RAJ', false);
     *    // Now we have a webservice object to play with
     * }
     * catch (PrestaShopWebserviceException $ex)
     * {
     *    echo 'Error : '.$ex->getMessage();
     * }
     * ?>
     * </code>
     *
     * @param string $url Root URL for the shop
     * @param string $key Authentication key
     * @param bool $debug Debug mode Activated (true) or deactivated (false)
     *
     * @throws PrestaShopWebserviceException if curl is not loaded
     */
    public function __construct($url, $key, $debug = \true)
    {
    }
    /**
     * Take the status code and throw an exception if the server didn't return 200 or 201 code
     * <p>Unique parameter must take : <br><br>
     * 'status_code' => Status code of an HTTP return<br>
     * 'response' => CURL response
     * </p>
     *
     * @param array{status_code:int,response:string} $request Response elements of CURL request
     *
     * @return void
     * @throws PrestaShopWebserviceException if HTTP status code is not 200 or 201
     */
    protected function checkStatusCode($request)
    {
    }
    /**
     * Provides default parameters for the curl connection(s)
     * @return array<int,bool|int|string|string[]|array<int,string>> Default parameters for curl connection(s)
     */
    protected function getCurlDefaultParams()
    {
    }
    /**
     * Handles a CURL request to PrestaShop Webservice. Can throw exception.
     *
     * @param string $url Resource name
     * @param array<int,null|int|bool|string|float>	$curl_params CURL parameters (sent to curl_set_opt)
     *
     * @return array{status_code:int,response:?string,header:string}
     *
     * @throws PrestaShopWebserviceException
     */
    public function executeRequest($url, $curl_params = array())
    {
    }
    /**
     * Output debug info
     *
     * @param       string  $title          Title
     * @param       string  $content        Content
     * @return      void
     */
    public function printDebug($title, $content)
    {
    }
    /**
     * Return version
     *
     * @return      string          Version
     */
    public function getVersion()
    {
    }
    /**
     * Load XML from string. Can throw exception
     *
     * @param string $response String from a CURL response
     *
     * @return SimpleXMLElement status_code, response
     * @throws PrestaShopWebserviceException
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
     * @param array{url?:string,resource?:string,id?:string,id_shop?:string,id_group_shop?:string,postXml:mixed} $options Array representing resource to add.
     *
     * @return SimpleXMLElement status_code, response
     * @throws PrestaShopWebserviceException
     */
    public function add($options)
    {
    }
    /**
     * Retrieve (GET) a resource
     * <p>Unique parameter must take : <br><br>
     * 'url' => Full URL for a GET request of Webservice (ex: https://mystore.com/api/customers/1/)<br>
     * OR<br>
     * 'resource' => Resource name,<br>
     * 'id' => ID of a resource you want to get<br><br>
     * </p>
     * <code>
     * <?php
     * require_once('./PrestaShopWebservice.php');
     * try
     * {
     * $ws = new PrestaShopWebservice('https://mystore.com/', 'ZQ88PRJX5VWQHCWE4EE7SQ7HPNX00RAJ', false);
     * $xml = $ws->get(array('resource' => 'orders', 'id' => 1));
     *    // Here in $xml, a SimpleXMLElement object you can parse
     * foreach ($xml->children()->children() as $attName => $attValue)
     *    echo $attName.' = '.$attValue.'<br>';
     * }
     * catch (PrestaShopWebserviceException $ex)
     * {
     *    echo 'Error : '.$ex->getMessage();
     * }
     * ?>
     * </code>
     *
     * @param array<string,string> $options Array representing resource to get.
     *
     * @return SimpleXMLElement status_code, response
     * @throws PrestaShopWebserviceException
     */
    public function get($options)
    {
    }
    /**
     * Head method (HEAD) a resource
     *
     * @param array<string,string> $options Array representing resource for head request.
     *
     * @return string
     * @throws PrestaShopWebserviceException
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
     * @param array{url?:string,resource?:string,id?:string,id_shop?:string,id_group_shop?:string,putXml:mixed} $options Array representing resource to edit.
     *
     * @return SimpleXMLElement
     * @throws PrestaShopWebserviceException
     */
    public function edit($options)
    {
    }
    /**
     * Delete (DELETE) a resource.
     * Unique parameter must take : <br><br>
     * 'resource' => Resource name<br>
     * 'id' => ID or array which contains IDs of a resource(s) you want to delete<br><br>
     * <code>
     * <?php
     * require_once('./PrestaShopWebservice.php');
     * try
     * {
     * $ws = new PrestaShopWebservice('https://mystore.com/', 'ZQ88PRJX5VWQHCWE4EE7SQ7HPNX00RAJ', false);
     * $xml = $ws->delete(array('resource' => 'orders', 'id' => 1));
     *    // Following code will not be executed if an exception is thrown.
     *    echo 'Successfully deleted.';
     * }
     * catch (PrestaShopWebserviceException $ex)
     * {
     *    echo 'Error : '.$ex->getMessage();
     * }
     * ?>
     * </code>
     *
     * @param array{url?:string,resource?:string,id?:string,id_shop?:string,id_group_shop?:string} $options Array representing resource to delete.
     *
     * @return bool
     * @throws PrestaShopWebserviceException
     */
    public function delete($options)
    {
    }
}
/**
 * @package PrestaShopWebservice
 */
class PrestaShopWebserviceException extends \Exception
{
}