<?php

// constants for IDs of core dictionaries
const DICT_FORME_JURIDIQUE = 1;
const DICT_DEPARTEMENTS = 2;
const DICT_REGIONS = 3;
const DICT_COUNTRY = 4;
const DICT_CIVILITY = 5;
const DICT_ACTIONCOMM = 6;
const DICT_CHARGESOCIALES = 7;
const DICT_TYPENT = 8;
const DICT_CURRENCIES = 9;
const DICT_TVA = 10;
const DICT_TYPE_CONTACT = 11;
const DICT_PAYMENT_TERM = 12;
const DICT_PAIEMENT = 13;
const DICT_ECOTAXE = 14;
const DICT_PAPER_FORMAT = 15;
const DICT_PROSPECTLEVEL = 16;
const DICT_TYPE_FEES = 17;
const DICT_SHIPMENT_MODE = 18;
const DICT_EFFECTIF = 19;
const DICT_INPUT_METHOD = 20;
const DICT_AVAILABILITY = 21;
const DICT_INPUT_REASON = 22;
const DICT_REVENUESTAMP = 23;
const DICT_TYPE_RESOURCE = 24;
const DICT_TYPE_CONTAINER = 25;
//const DICT_UNITS = 26;
const DICT_STCOMM = 27;
const DICT_HOLIDAY_TYPES = 28;
const DICT_LEAD_STATUS = 29;
const DICT_FORMAT_CARDS = 30;
const DICT_INVOICE_SUBTYPE = 31;
const DICT_HRM_PUBLIC_HOLIDAY = 32;
const DICT_HRM_DEPARTMENT = 33;
const DICT_HRM_FUNCTION = 34;
const DICT_EXP_TAX_CAT = 35;
const DICT_EXP_TAX_RANGE = 36;
const DICT_UNITS = 37;
const DICT_SOCIALNETWORKS = 38;
const DICT_PROSPECTCONTACTLEVEL = 39;
const DICT_STCOMMCONTACT = 40;
const DICT_TRANSPORT_MODE = 41;
const DICT_PRODUCT_NATURE = 42;
const DICT_PRODUCTBATCH_QCSTATUS = 43;
const DICT_ASSET_DISPOSAL_TYPE = 44;
/**
 *	Show fields in insert/edit mode
 *
 * 	@param		string[]	$fieldlist		Array of fields
 * 	@param		?Object		$obj			If we show a particular record, obj is filled with record fields
 *  @param		string		$tabname		Name of SQL table
 *  @param		''|'add'|'edit'|'hide'	$context		'add'=Output field for the "add form", 'edit'=Output field for the "edit form", 'hide'=Output field for the "add form" but we don't want it to be rendered
 *	@return		string						'' or value of entity into table
 */
function dictFieldList($fieldlist, $obj = \null, $tabname = '', $context = '')
{
}