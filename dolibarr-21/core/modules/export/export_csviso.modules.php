<?php

/**
 *	Class to build export files with format CSV iso
 */
class ExportCsvIso extends \ExportCsv
{
    /**
     *	Constructor
     *
     *	@param	    DoliDB	$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output title line into file
     *
     *  @param	array<string,string>	$array_export_fields_label	Array with list of label of fields
     *  @param	array<string,string>	$array_selected_sorted		Array with list of field to export
     *  @param	Translate				$outputlangs    			Object lang to translate values
     *  @param	array<string,string>	$array_types				Array with types of fields
     * 	@return	int													Return integer <0 if KO, >0 if OK
     */
    public function write_title($array_export_fields_label, $array_selected_sorted, $outputlangs, $array_types)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output record line into file
     *
     *  @param	array<string,string>	$array_selected_sorted	Array with list of field to export
     *  @param	Resource				$objp					A record from a fetch with all fields from select
     *  @param	Translate				$outputlangs			Object lang to translate values
     *  @param	array<string,string>	$array_types			Array with types of fields
     * 	@return	int												Return integer <0 if KO, >0 if OK
     */
    public function write_record($array_selected_sorted, $objp, $outputlangs, $array_types)
    {
    }
}