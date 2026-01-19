<?php

class ippException extends \Exception
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
class BasicIPP
{
    public $paths = array("root" => "/", "admin" => "/admin/", "printers" => "/printers/", "jobs" => "/jobs/");
    public $http_timeout = 30;
    // timeout at http connection (seconds) 0 => default => 30.
    public $http_data_timeout = 30;
    // data reading timeout (milliseconds) 0 => default => 30.
    public $ssl = \false;
    public $debug_level = 3;
    // max 3: almost silent
    public $alert_on_end_tag;
    // debugging purpose: echo "END tag OK" if (1 and  reads while end tag)
    public $with_exceptions = 1;
    // compatibility mode for old scripts		// DOL_LDR_CHANGE set this to 1
    public $handle_http_exceptions = 1;
    // readables variables
    public $jobs = array();
    public $jobs_uri = array();
    public $status = array();
    public $response_completed = array();
    public $last_job = "";
    public $attributes;
    // object you can read: attributes after validateJob()
    public $printer_attributes;
    // object you can read: printer's attributes after getPrinterAttributes()
    public $job_attributes;
    // object you can read: last job attributes
    public $jobs_attributes;
    // object you can read: jobs attributes after getJobs()
    public $available_printers = array();
    public $printer_map = array();
    public $printers_uri = array();
    public $debug = array();
    public $response;
    public $meta;
    // protected variables;
    protected $log_level = 2;
    // max 3: very verbose
    protected $log_type = 3;
    // 3: file | 1: e-mail | 0: logger
    protected $log_destination;
    // e-mail or file
    protected $serveroutput;
    protected $setup;
    protected $stringjob;
    protected $data;
    protected $debug_count = 0;
    protected $username;
    protected $charset;
    protected $password;
    protected $requesring_user;
    protected $client_hostname = "localhost";
    protected $stream;
    protected $host = "localhost";
    protected $port = "631";
    protected $requesting_user = '';
    protected $printer_uri;
    protected $timeout = "20";
    //20 secs
    protected $errNo;
    protected $errStr;
    protected $datatype;
    protected $datahead;
    protected $datatail;
    protected $operation_id;
    protected $delay;
    protected $error_generation;
    //devel feature
    protected $debug_http = 0;
    protected $no_disconnect;
    protected $job_tags;
    protected $operation_tags;
    protected $index;
    protected $collection;
    //RFC3382
    protected $collection_index;
    //RFC3382
    protected $collection_key = array();
    //RFC3382
    protected $collection_depth = -1;
    //RFC3382
    protected $end_collection = \false;
    //RFC3382
    protected $collection_nbr = array();
    //RFC3382
    protected $unix = \false;
    // true -> use unix sockets instead of http
    protected $output;
    public function __construct()
    {
    }
    public function setPort($port = '631')
    {
    }
    public function setUnix($socket = '/var/run/cups/cups.sock')
    {
    }
    public function setHost($host = 'localhost')
    {
    }
    public function setTimeout($timeout)
    {
    }
    public function setPrinterURI($uri)
    {
    }
    public function setData($data)
    {
    }
    public function setRawText()
    {
    }
    public function unsetRawText()
    {
    }
    public function setBinary()
    {
    }
    public function setFormFeed()
    {
    }
    public function unsetFormFeed()
    {
    }
    public function setCharset($charset = 'utf-8')
    {
    }
    public function setLanguage($language = 'en_us')
    {
    }
    public function setDocumentFormat($mime_media_type = 'application/octet-stream')
    {
    }
    // setDocumentFormat alias for backward compatibility
    public function setMimeMediaType($mime_media_type = "application/octet-stream")
    {
    }
    public function setCopies($nbrcopies = 1)
    {
    }
    public function setDocumentName($document_name = "")
    {
    }
    public function setJobName($jobname = '', $absolute = \false)
    {
    }
    public function setUserName($username = 'PHP-SERVER')
    {
    }
    public function setAuthentification($username, $password)
    {
    }
    public function setAuthentication($username, $password)
    {
    }
    public function setSides($sides = 2)
    {
    }
    public function setFidelity()
    {
    }
    public function unsetFidelity()
    {
    }
    public function setMessage($message = '')
    {
    }
    public function setPageRanges($page_ranges)
    {
    }
    public function setAttribute($attribute, $values)
    {
    }
    public function unsetAttribute($attribute)
    {
    }
    //
    // LOGGING / DEBUGGING
    //
    /**
     * Sets log file destination. Creates the file if has permission.
     *
     * @param string $log_destination
     * @param string $destination_type
     * @param int $level
     *
     * @throws ippException
     */
    public function setLog($log_destination, $destination_type = 'file', $level = 2)
    {
    }
    public function printDebug()
    {
    }
    public function getDebug()
    {
    }
    //
    // OPERATIONS
    //
    public function printJob()
    {
    }
    //
    // HTTP OUTPUT
    //
    protected function _sendHttp($post_values, $uri)
    {
    }
    //
    // INIT
    //
    protected function _initTags()
    {
    }
    //
    // SETUP
    //
    protected function _setOperationId()
    {
    }
    protected function _setJobId()
    {
    }
    protected function _setJobUri($job_uri)
    {
    }
    //
    // RESPONSE PARSING
    //
    protected function _parseServerOutput()
    {
    }
    protected function _parseHttpHeaders()
    {
    }
    protected function _parseIppVersion()
    {
    }
    protected function _parseStatusCode()
    {
    }
    protected function _parseRequestID()
    {
    }
    protected function _interpretInteger($value)
    {
    }
    protected function _parseResponse()
    {
    }
    //
    // REQUEST BUILDING
    //
    protected function _stringJob()
    {
    }
    protected function _buildValues(&$operationattributes, &$jobattributes, &$printerattributes)
    {
    }
    protected function _giveMeStringLength($string)
    {
    }
    protected function _enumBuild($tag, $value)
    {
    }
    protected function _integerBuild($value)
    {
    }
    protected function _rangeOfIntegerBuild($integers)
    {
    }
    protected function _setJobAttribute($attribute, $value)
    {
    }
    protected function _setOperationAttribute($attribute, $value)
    {
    }
    protected function _setPrinterAttribute($attribute, $value)
    {
    }
    //
    // DEBUGGING
    //
    protected function _putDebug($string, $level = 1)
    {
    }
    //
    // LOGGING
    //
    protected function _errorLog($string_to_log, $level)
    {
    }
}