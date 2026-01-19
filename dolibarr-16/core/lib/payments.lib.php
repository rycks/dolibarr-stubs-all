<?php

/**
 * Copyright (C) 2013	    Marcos García	        <marcosgdf@gmail.com>
 * Copyright (C) 2018       Frédéric France         <frederic.france@netlogic.fr>
 * Copyright (C) 2020       Abbes Bahfir            <bafbes@gmail.com>
 * Copyright (C) 2021       Waël Almoman            <info@almoman.com>
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
 * @return array Tabs for the payment section
 */
function payment_prepare_head(\Paiement $object)
{
}
/**
 * Returns an array with the tabs for the "Bannkline" section
 * It loads tabs from modules looking for the entity payment
 *
 * @param 	int		$id		ID of bank line
 * @return 	array 			Tabs for the Bankline section
 */
function bankline_prepare_head($id)
{
}
/**
 * Returns an array with the tabs for the "Supplier payment" section
 * It loads tabs from modules looking for the entity payment_supplier
 *
 * @param Paiement $object Current payment object
 * @return array Tabs for the payment section
 */
function payment_supplier_prepare_head(\Paiement $object)
{
}
/**
 * Return array of valid payment mode
 *
 * @param	string	$paymentmethod		Filter on this payment method (''=none, 'paypal', ...)
 * @return	array						Array of valid payment method
 */
function getValidOnlinePaymentMethods($paymentmethod = '')
{
}
/**
 * Return string with full online payment Url
 *
 * @param   string	$type		Type of URL ('free', 'order', 'invoice', 'contractline', 'member' ...)
 * @param	string	$ref		Ref of object
 * @return	string				Url string
 */
function showOnlinePaymentUrl($type, $ref)
{
}
/**
 * Return string with HTML link for online payment
 *
 * @param	string	$type		Type of URL ('free', 'order', 'invoice', 'contractline', 'member' ...)
 * @param	string	$ref		Ref of object
 * @param	string	$label		Text or HTML tag to display, if empty it display the URL
 * @return	string			Url string
 */
function getHtmlOnlinePaymentLink($type, $ref, $label = '')
{
}
/**
 * Return string with full Url
 *
 * @param   int		$mode		      0=True url, 1=Url formated with colors
 * @param   string	$type		      Type of URL ('free', 'order', 'invoice', 'contractline', 'member', 'boothlocation', ...)
 * @param	string	$ref		      Ref of object
 * @param	int		$amount		      Amount (required and used for $type='free' only)
 * @param	string	$freetag	      Free tag (required and used for $type='free' only)
 * @param   string  $localorexternal  0=Url for browser, 1=Url for external access
 * @return	string				      Url string
 */
function getOnlinePaymentUrl($mode, $type, $ref = '', $amount = '9.99', $freetag = 'your_tag', $localorexternal = 1)
{
}
/**
 * Show footer of company in HTML pages
 *
 * @param   Societe		$fromcompany	Third party
 * @param   Translate	$langs			Output language
 * @param	int			$addformmessage	Add the payment form message
 * @param	string		$suffix			Suffix to use on constants
 * @param	Object		$object			Object related to payment
 * @return	void
 */
function htmlPrintOnlinePaymentFooter($fromcompany, $langs, $addformmessage = 0, $suffix = '', $object = \null)
{
}