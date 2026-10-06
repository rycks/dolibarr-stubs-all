<?php

/* @(#) $Header: /sources/phpprintipp/phpprintipp/php_classes/http_class.php,v 1.7 2010/08/22 15:45:17 harding Exp $ */
/* vim: set expandtab tabstop=2 shiftwidth=2 foldmethod=marker: */
/* ====================================================================
 * GNU Lesser General Public License
 * Version 2.1, February 1999
 *
 * Class http_class - Basic http client with "Basic" and Digest/MD5
 * authorization mechanism.
 * handle ipv4/v6 addresses, Unix sockets, http and https
 * have file streaming capability, to cope with php "memory_limit"
 *
 *   Copyright (C) 2006,2007,2008  Thomas HARDING
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * $Id: http_class.php,v 1.7 2010/08/22 15:45:17 harding Exp $
 */
/**
 *  This class is intended to implement a subset of Hyper Text Transfer Protocol
 *  (HTTP/1.1) on client side  (currently: POST operation), with file streaming
 *  capability.
 *
 *  It can perform Basic and Digest authentication.
 *
 *  References needed to debug / add functionnalities:
 *  - RFC 2616
 *  - RFC 2617
 *
 *
 * Class and Function List:
 * Function list:
 * - __construct()
 * - getErrorFormatted()
 * - getErrno()
 * - __construct()
 * - GetRequestArguments()
 * - Open()
 * - SendRequest()
 * - ReadReplyHeaders()
 * - ReadReplyBody()
 * - Close()
 * - _StreamRequest()
 * - _ReadReply()
 * - _ReadStream()
 * - _BuildDigest()
 * Classes list:
 * - httpException extends Exception
 * - http_class
 */
/***********************
 *
 * httpException class
 *
 ************************/
class httpException extends \Exception
{
    protected $errno;
    public function __construct($msg, $errno = \null)
    {
    }
    public function getErrorFormatted()
    {
    }
    public function getErrno()
    {
    }
}
/***********************
 *
 * class http_class
 *
 ************************/
class http_class
{
    // variables declaration
    public $debug;
    public $html_debug;
    public $timeout = 30;
    // time waiting for connection, seconds
    public $data_timeout = 30;
    // time waiting for data, milliseconds
    public $data_chunk_timeout = 1;
    // time waiting between data chunks, millisecond
    public $force_multipart_form_post;
    public $username;
    public $password;
    public $request_headers = array();
    public $request_body = "Not a useful information";
    public $status;
    public $window_size = 1024;
    // chunk size of data
    public $with_exceptions = 0;
    // compatibility mode for old scripts
    public $port;
    public $host;
    private $default_port = 631;
    private $headers;
    private $reply_headers = array();
    private $reply_body = array();
    private $connection;
    private $arguments;
    private $bodystream = array();
    private $last_limit;
    private $connected;
    private $nc = 1;
    private $user_agent = "PRINTIPP/0.81+CVS";
    private $readed_bytes = 0;
    public function __construct()
    {
    }
    /*********************
     *
     * Public functions
     *
     **********************/
    public function GetRequestArguments($url, &$arguments)
    {
    }
    public function Open($arguments)
    {
    }
    public function SendRequest($arguments)
    {
    }
    public function ReadReplyHeaders(&$headers)
    {
    }
    public function ReadReplyBody(&$body, $chunk_size)
    {
    }
    public function Close()
    {
    }
    /*********************
     *
     *  Private functions
     *
     *********************/
    private function _HttpError($msg, $level, $errno = \null)
    {
    }
    private function _streamString($string)
    {
    }
    private function _StreamRequest($arguments)
    {
    }
    private function _ReadReply()
    {
    }
    private function _ReadStream()
    {
    }
    private function _BuildDigest()
    {
    }
}
function error2string($value)
{
}