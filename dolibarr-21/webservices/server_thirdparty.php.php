<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
// Full methods code
/**
 * Get a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @param	string		$ref_ext	   		external reference
 * @param	string		$barcode	   		barcode
 * @param	string		$profid1	   		profid1
 * @param	string		$profid2	   		profid2
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getThirdParty($authentication, $id = '', $ref = '', $ref_ext = '', $barcode = '', $profid1 = '', $profid2 = '')
{
}
/**
 * Create a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,fk_user_author:string,status:string,client:string,supplier:string,customer_code:string,supplier_code:string,customer_code_accountancy:string,supplier_code_accountancy:string,date_creation:string,date_modification:string,note_private:string,note_public:string,address:string,zip:string,town:string,region_code:string,country_id:string,country_code:string,country:string,phone:string,fax:string,email:string,url:string,profid1:string,profid2:string,profid3:string,profid4:string,profid5:string,profid6:string,capital:string,vat_used:string,vat_number:string}		$thirdparty		    Thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createThirdParty($authentication, $thirdparty)
{
}
/**
 * Update a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,fk_user_author:string,status:string,client:string,supplier:string,customer_code:string,supplier_code:string,customer_code_accountancy:string,supplier_code_accountancy:string,date_creation:string,date_modification:string,note_private:string,note_public:string,address:string,zip:string,town:string,region_code:string,country_id:string,country_code:string,country:string,phone:string,fax:string,email:string,url:string,profid1:string,profid2:string,profid3:string,profid4:string,profid5:string,profid6:string,capital:string,vat_used:string,vat_number:string}		$thirdparty		    Thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateThirdParty($authentication, $thirdparty)
{
}
/**
 * getListOfThirdParties
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array<string,mixed>		$filterthirdparty	Filter fields (key=>value to filer on. For example 'client'=>2, 'supplier'=>1, 'category'=>idcateg, 'name'=>'searchstring', ...)
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getListOfThirdParties($authentication, $filterthirdparty)
{
}
/**
 * Delete a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @param	string		$ref_ext	   		external reference
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function deleteThirdParty($authentication, $id = '', $ref = '', $ref_ext = '')
{
}