<?php

/**
 * Class to manage reports for accounting categories
 */
class AccountancyReport
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string        Error string
     */
    public $error;
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var string ID to identify managed object
     */
    public $element = 'c_accounting_report';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_accounting_report';
    /**
     * @var int ID
     * @deprecated
     */
    public $rowid;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Accountancy code
     */
    public $code;
    /**
     * @var string Accountancy Category label
     */
    public $label;
    /**
     * @var int country id
     */
    public $fk_country;
    /**
     * @var int Is active
     */
    public $active;
    /**
     *  Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     * @param User $user User that create
     * @param int $notrigger 0=launch triggers after, 1=disable triggers
     * @return     int                 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     * @param int $id Id object
     * @param string $code Code
     * @param string $label Label
     * @return     int            Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $code = '', $label = '')
    {
    }
    /**
     *  Update object into database
     *
     * @param User $user User that modify
     * @param int $notrigger 0=launch triggers after, 1=disable triggers
     * @return     int                 Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     * @param User $user User that delete
     * @param int $notrigger 0=launch triggers after, 1=disable triggers
     * @return    int                     Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
}