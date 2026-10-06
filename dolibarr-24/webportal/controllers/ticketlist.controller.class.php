<?php

/**
 * Class for TicketListController
 */
class TicketListController extends \AbstractListController
{
    /**
     * @var array<int,User>
     */
    public $userStaticCache = array();
    /**
     * Check current access to controller
     *
     * @return  bool
     */
    public function checkAccess()
    {
    }
    /**
     * Action method is called before html output
     * can be used to manage security and change context
     *
     * @return  int     Return integer < 0 on error, > 0 on success
     */
    public function action()
    {
    }
    /**
     * Set array fields for ticket list
     *
     * @return	void
     */
    public function listSetArrayFields()
    {
    }
    /**
     * Called before print value for list
     *
     * @param	string				$field_key		Field key
     * @param	array<string,mixed>	$field_spec		Field specification
     * @param	stdClass			$record			Contain data of object from database
     * @return	string						HTML input
     */
    public function listPrintValueBefore($field_key, $field_spec, &$record)
    {
    }
    /**
     * Display
     *
     * @return  void
     */
    public function display()
    {
    }
}