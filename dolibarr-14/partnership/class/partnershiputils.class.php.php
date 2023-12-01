<?php

/**
 *	Class with cron tasks of Partnership module
 */
class PartnershipUtils
{
    public $db;
    //!< To store db handler
    public $error;
    //!< To return error code (or message)
    public $errors = array();
    //!< To return several error codes (or messages)
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
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
     * @return  int                 0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doWarningOfPartnershipIfDolibarrBacklinkNotfound()
    {
    }
    /**
     * Action to check if Dolibarr backlink not found on partner website
     *
     * @param  $website      Website	Partner's website
     * @return  int                 	0 if KO, 1 if OK
     */
    private function checkDolibarrBacklink($website = \null)
    {
    }
}