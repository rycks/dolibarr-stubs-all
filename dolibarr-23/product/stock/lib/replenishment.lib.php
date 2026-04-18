<?php

/**
 * Check if there is still some dispatching of stock to do.
 *
 * @param 	int		$order_id		Id of order to check
 * @return	boolean					True = There is some dispatching to do, False = All dispatching is done (may be we receive more) or is not required
 */
function dolDispatchToDo($order_id)
{
}
/**
 * dispatchedOrders
 *
 * @return string		Array of id of orders with all dispatching already done or not required
 */
function dispatchedOrders()
{
}
/**
 * ordered
 *
 * @param 	int		$product_id		Product id
 * @return	string|null
 */
function ordered($product_id)
{
}
/**
 * getProducts
 *
 * @param 	int		$order_id		Order id
 * @return	array|integer[]
 */
function getProducts($order_id)
{
}