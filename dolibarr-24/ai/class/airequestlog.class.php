<?php

/**
 * Class for AI Request Log entries
 */
class AiRequestLog extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     *             Used by getEntity('airequestlog')
     */
    public $element = 'airequestlog';
    /**
     * @var string Name of table without prefix
     */
    public $table_element = 'ai_request_log';
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var int User ID
     */
    public $fk_user;
    /**
     * @var int|string Date of request
     */
    public $date_request;
    /**
     * @var string Query text
     */
    public $query_text;
    /**
     * @var string Tool name
     */
    public $tool_name;
    /**
     * @var string Provider
     */
    public $provider;
    /**
     * @var float Execution time
     */
    public $execution_time;
    /**
     * @var float Confidence
     */
    public $confidence;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var string Error message
     */
    public $error_msg;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
}