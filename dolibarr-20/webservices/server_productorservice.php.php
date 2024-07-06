<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get produt or service
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @param	string		$ref				Ref of object
 * @param	string		$ref_ext			Ref external of object
 * @param   string      $lang               Lang to force
 * @return	mixed
 */
function getProductOrService($authentication, $id = 0, $ref = '', $ref_ext = '', $lang = '')
{
}
/**
 * Create an invoice
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$product			Product
 * @return	array							Array result
 */
function createProductOrService($authentication, $product)
{
}
/**
 * Update a product or service
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$product			Product
 * @return	array							Array result
 */
function updateProductOrService($authentication, $product)
{
}
/**
 * Delete a product or service
 *
 * @param	array		$authentication		Array of authentication information
 * @param	string		$listofidstring		List of id with comma
 * @return	array							Array result
 */
function deleteProductOrService($authentication, $listofidstring)
{
}
/**
 * getListOfProductsOrServices
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$filterproduct		Filter fields
 * @return	array							Array result
 */
function getListOfProductsOrServices($authentication, $filterproduct)
{
}
/**
 * Get list of products for a category
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Category id
 * @param	string		$lang				Force lang
 * @return	array							Array result
 */
function getProductsForCategory($authentication, $id, $lang = '')
{
}