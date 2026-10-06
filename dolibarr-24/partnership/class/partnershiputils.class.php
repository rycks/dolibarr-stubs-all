<?php

/**
 *	Class with cron tasks of Partnership module
 */
class PartnershipUtils
{
    /**
     * @var DoliDB
     */
    public $db;
    //!< To store db handler
    /**
     * @var string
     */
    public $error;
    //!< To return error code (or message)
    /**
     * @var string[]
     */
    public $errors = array();
    //!< To return several error codes (or messages)
    /**
     * @var string To store output of some cron methods
     */
    public $output;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Action executed by scheduler to cancel status of partnership when subscription is expired + x days. (Max number of action batch per call = $conf->global->PARTNERSHIP_MAX_EXPIRATION_CANCEL_PER_CALL)
     *
     * CAN BE A CRON TASK
     *
     * @return  int                 0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doCancelStatusOfMemberPartnership()
    {
    }
    /**
     * Action executed by scheduler to check if Dolibarr backlink not found on partner website. (Max number of action batch per call = $conf->global->PARTNERSHIP_MAX_WARNING_BACKLINK_PER_CALL)
     *
     * CAN BE A CRON TASK
     *
     * @param	int		$maxpercall		Max per call
     * @return  int                 	0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doWarningOfPartnershipIfDolibarrBacklinkNotfound($maxpercall = 0)
    {
    }
    /**
     * Action to check if Dolibarr backlink not found on partner website
     *
     * @param  	string	$website      	Partner's website URL
     * @return  int                 	0 if KO, 1 if OK
     */
    private function checkDolibarrBacklink($website = \null)
    {
    }
}