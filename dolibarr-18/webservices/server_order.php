<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get order from id, ref or ref_ext.
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return	array							Array result
 */
function getOrder($authentication, $id = '', $ref = '', $ref_ext = '')
{
}
/**
 * Get list of orders for third party
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id of thirdparty
 * @return	array							Array result
 */
function getOrdersForThirdParty($authentication, $idthirdparty)
{
}
/**
 * Create order
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$order				Order info
 * @return	array							array of new order
 */
function createOrder($authentication, $order)
{
}
/**
 * Valid an order
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id of order to validate
 * @param	int			$id_warehouse		Id of warehouse to use for stock decrease
 * @return	array							Array result
 */
function validOrder($authentication, $id = '', $id_warehouse = 0)
{
}
/**
 * Update an order
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$order				Order info
 * @return	array							Array result
 */
function updateOrder($authentication, $order)
{
}