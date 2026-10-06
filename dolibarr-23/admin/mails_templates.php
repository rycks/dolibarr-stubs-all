<?php

/**
 *	Show fields in insert/edit mode
 *
 * 	@param		array<int|string,null|int|float|string>	$fieldlist		Array of fields and their values
 * 	@param		?Object	$obj			If we show a particular record, obj is filled with record fields
 *  @param		string	$tabname		Name of SQL table
 *  @param		string	$context		'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'preview'=show in readonly the template, 'hide'=Output field for the "add form" but we don't want it to be rendered
 *	@return		int                    	Number of fields printed
 */
function fieldList($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}