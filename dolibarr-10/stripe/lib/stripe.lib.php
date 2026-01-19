<?php

/* Copyright (C) 2017      Alexandre Spangaro   <aspangaro@open-dsi.fr>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 *	\file			htdocs/stripe/lib/stripe.lib.php
 *	\ingroup		stripe
 *  \brief			Library for common stripe functions
 */
/**
 *  Define head array for tabs of stripe tools setup pages
 *
 *  @return			Array of head
 */
function stripeadmin_prepare_head()
{
}
/**
 * Return string with full Url
 *
 * @param   string	$type		Type of URL ('free', 'order', 'invoice', 'contractline', 'membersubscription' ...)
 * @param	string	$ref		Ref of object
 * @return	string				Url string
 */
function showStripePaymentUrl($type, $ref)
{
}
/**
 * Return string with full Url
 *
 * @param   int		$mode		0=True url, 1=Url formated with colors
 * @param   string	$type		Type of URL ('free', 'order', 'invoice', 'contractline', 'membersubscription' ...)
 * @param	string	$ref		Ref of object
 * @param	int		$amount		Amount
 * @param	string	$freetag	Free tag
 * @return	string				Url string
 */
function getStripePaymentUrl($mode, $type, $ref = '', $amount = '9.99', $freetag = 'your_tag')
{
}
/**
 * Show footer of company in HTML pages
 *
 * @param   Societe		$fromcompany	Third party
 * @param   Translate	$langs			Output language
 * @return	void
 */
function html_print_stripe_footer($fromcompany, $langs)
{
}