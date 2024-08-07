<?php

\define('CSRFCHECK_WITH_TOKEN', '1');
/**
 *	Show fields in insert/edit mode
 *
 *  @param	string[]	$fieldlist      Array of fields
 *  @param	Object		$obj            If we show a particular record, obj is filled with record fields
 *  @param	string		$tabname        Name of SQL table
 *  @param	string		$context        'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'hide'=Output field for the "add form" but we don't want it to be rendered
 *  @return	void
 */
function fieldListJournal($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}