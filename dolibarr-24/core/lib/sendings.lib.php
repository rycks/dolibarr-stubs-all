<?php

/**
 * Prepare array with list of tabs
 *
 * @param   Expedition	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function shipping_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   Delivery	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function delivery_prepare_head($object)
{
}
/**
 * List sendings and receive receipts
 *
 * @param   string		$origin			Origin ('commande', ...)
 * @param	int			$origin_id		Origin id
 * @param	string		$filter			Filter (Do not use a string from a user input)
 * @return	int							Return integer <0 if KO, >0 if OK
 */
function show_list_sending_receive($origin, $origin_id, $filter = '')
{
}