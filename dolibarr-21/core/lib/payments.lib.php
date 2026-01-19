<?php

/**
 * Copyright (C) 2013	    Marcos García	        <marcosgdf@gmail.com>
 * Copyright (C) 2018-2024  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2020       Abbes Bahfir            <bafbes@gmail.com>
 * Copyright (C) 2021       Waël Almoman            <info@almoman.com>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 * Returns an array with the tabs for the "Payment" section
 * It loads tabs from modules looking for the entity payment
 *
 * @param Paiement $object Current payment object
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs for the payment section
 */
function payment_prepare_head(\Paiement $object)
{
}
/**
 * Returns an array with the tabs for the "Bannkline" section
 * It loads tabs from modules looking for the entity payment
 *
 * @param 	int		$id		ID of bank line
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs for the Banline section
 */
function bankline_prepare_head($id)
{
}
/**
 * Returns an array with the tabs for the "Supplier payment" section
 * It loads tabs from modules looking for the entity payment_supplier
 *
 * @param Paiement $object Current payment object
 * @return	array<array{0:string,1:string,2:string}>	Tabs for the payment section
 */
function payment_supplier_prepare_head(\Paiement $object)
{
}
/**
 * Return array of valid payment mode
 *
 * @param	string	$paymentmethod		Filter on this payment method (''=none, 'paypal', 'stripe', ...)
 * @return	array<string,string>		Array of valid payment method
 */
function getValidOnlinePaymentMethods($paymentmethod = '')
{
}
/**
 * Return string with full online payment Url
 *
 * @param   string		$type		Type of URL ('free', 'order', 'invoice', 'contractline', 'member' ...)
 * @param	string		$ref		Ref of object
 * @param	int|float	$amount		Amount of money to request for
 * @return	string					Url string
 */
function showOnlinePaymentUrl($type, $ref, $amount = 0)
{
}
/**
 * Return string with HTML link for online payment
 *
 * @param	string		$type		Type of URL ('free', 'order', 'invoice', 'contractline', 'member' ...)
 * @param	string		$ref		Ref of object
 * @param	string		$label		Text or HTML tag to display, if empty it display the URL
 * @param	int|float	$amount		Amount of money to request for
 * @return	string					Url string
 */
function getHtmlOnlinePaymentLink($type, $ref, $label = '', $amount = 0)
{
}
/**
 * Return string with full Url
 *
 * @param   int			$mode		      0=True url, 1=Url formatted with colors
 * @param   string		$type		      Type of URL ('free', 'order', 'invoice', 'contractline', 'member', 'boothlocation', ...)
 * @param	string		$ref		      Ref of object
 * @param	int|float	$amount		      Amount of money to request for
 * @param	string		$freetag	      Free tag (required and used for $type='free' only)
 * @param   int|string 	$localorexternal  0=Url of current browsing, 1=Url for external access, or string with virtual host url
 * @return	string					      Url string
 */
function getOnlinePaymentUrl($mode, $type, $ref = '', $amount = 0, $freetag = 'your_tag', $localorexternal = 1)
{
}