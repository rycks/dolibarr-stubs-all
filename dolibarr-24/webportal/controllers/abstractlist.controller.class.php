<?php

/**
 * \file        htdocs/webportal/controllers/abstractlist.controller.class.php
 * \ingroup     webportal
 * \brief       This file is an abstract controller with shared logic to display a list
 */
/**
 * Class for AbstractListController
 */
abstract class AbstractListController extends \Controller
{
    /**
     * @var FormListWebPortal Form for list
     */
    public $formList;
    /**
     * Set array fields
     *
     * @return	void
     */
    public function listSetArrayFields()
    {
    }
    /**
     * Set search values
     *
     * @param	bool		$clear		Clear search values
     * @return	void
     */
    public function listSetSearchValues($clear = \false)
    {
    }
    /**
     * Called before print value for list
     *
     * @param	string					$field_key		Field key
     * @param	array<string,mixed>		$field_spec		Field specification
     * @param	stdClass				$record			Contain data of object from database
     * @return	string									HTML input
     */
    public function listPrintValueBefore($field_key, $field_spec, &$record)
    {
    }
    /**
     * Called after print value for list
     *
     * @param	string					$field_key		Field key
     * @param	array<string,mixed>		$field_spec		Field specification
     * @param	stdClass				$record			Contain data of object from database
     * @param	string					$out			Current HTML input
     * @return	string									HTML input
     */
    public function listPrintValueAfter($field_key, $field_spec, &$record, $out)
    {
    }
}