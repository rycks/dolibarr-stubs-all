<?php

/* Copyright (C) 2013 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *      \file       htdocs/core/class/openid.class.php
 *      \ingroup    core
 *      \brief      Class to manage authentication with OpenId
 */
/**
 * 	Class to manage OpenID
 */
class SimpleOpenID
{
    /**
     * @var string
     */
    public $openid_url_identity;
    /**
     * @var array{openid_server?:string,trust_root?:string,cancel?:string,approved?:string}
     */
    public $URLs = array();
    /**
     * @var array{}|array{0:string,1:string}
     */
    public $error = array();
    /**
     * @var array{required:string[],optional:string[]}
     */
    public $fields = array('required' => array(), 'optional' => array());
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetOpenIDServer
     *
     * @param	string	$a		Server
     * @return	void
     */
    public function SetOpenIDServer($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetOpenIDServer
     *
     * @param	string	$a		Server
     * @return	void
     */
    public function SetTrustRoot($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetOpenIDServer
     *
     * @param	string	$a		Server
     * @return	void
     */
    public function SetCancelURL($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetApprovedURL
     *
     * @param	string	$a		Server
     * @return	void
     */
    public function SetApprovedURL($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetRequiredFields
     *
     * @param	string|string[]	$a		Server
     * @return	void
     */
    public function SetRequiredFields($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetOptionalFields
     *
     * @param	string|string[]	$a		Server
     * @return	void
     */
    public function SetOptionalFields($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetIdentity
     *
     * @param	string  $a		Server
     * @return	void
     */
    public function SetIdentity($a)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * GetIdentity
     *
     * @return	string
     */
    public function GetIdentity()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * SetOpenIDServer
     *
     * @return	array{code:string,description:string}
     */
    public function GetError()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * ErrorStore
     *
     * @param	string	$code		Code
     * @param	string	$desc		Description
     * @return	void
     */
    public function ErrorStore($code, $desc = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * IsError
     *
     * @return	boolean
     */
    public function IsError()
    {
    }
    /**
     * splitResponse
     *
     * @param	string	$response		Server
     * @return	array<string,string>
     */
    public function splitResponse($response)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * OpenID_Standarize
     *
     * @param	string	$openid_identity		Server
     * @return	string
     */
    public function OpenID_Standarize($openid_identity = \null)
    {
    }
    /**
     * array2url
     *
     * @param 	array<string,string>	$arr		An array
     * @return false|string		false if KO, string of url if OK
     */
    public function array2url($arr)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * FSOCK_Request
     *
     * @param string 	$url		URL
     * @param string	$method		Method
     * @param string	$params		Params
     * @return boolean|void			True if success, False if error
     */
    public function FSOCK_Request($url, $method = "GET", $params = "")
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * HTML2OpenIDServer
     *
     * @param string	$content	Content
     * @return array{0:string[],1:string[]}		Array of servers
     */
    public function HTML2OpenIDServer($content)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Get openid server
     *
     * @param	string	$url	Url to found endpoint
     * @return 	string|false	Endpoint, of false if error
     */
    public function GetOpenIDServer($url = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * GetRedirectURL
     *
     * @return	string
     */
    public function GetRedirectURL()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Redirect
     *
     * @return	void
     */
    public function Redirect()
    {
    }
    /**
     * validateWithServer
     *
     * @return	boolean
     */
    public function validateWithServer()
    {
    }
    /**
     * Get XRDS response and set possible servers.
     *
     * @param	string	$url	Url of endpoint to request
     * @return 	string|false	First endpoint OpenID server found. False if it failed to found.
     */
    public function sendDiscoveryRequestToGetXRDS($url = '')
    {
    }
}