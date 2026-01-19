<?php

/* Copyright (C) 2002-2006 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2006-2008 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2010-2013 Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2012      Christophe Battarel  <christophe.battarel@altairis.fr>
 * Copyright (C) 2012      Cédric Salvador      <csalvador@gpcsolutions.fr>
 * Copyright (C) 2012-2014 Raphaël Doursenaud   <rdoursenaud@gpcsolutions.fr>
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
 *		\file 		htdocs/core/lib/price.lib.php
 *		\brief 		Library with functions to calculate prices
 */
/**
 *		Calculate totals (net, vat, ...) of a line.
 *		Value for localtaxX_type are	'0' : local tax not applied
 *										'1' : local tax apply on products and services without vat (localtax is calculated on amount without tax)
 *										'2' : local tax apply on products and services including vat (localtax is calculated on amount + tax)
 *										'3' : local tax apply on products without vat (localtax is calculated on amount without tax)
 *										'4' : local tax apply on products including vat (localtax is calculated on amount + tax)
 *										'5' : local tax apply on services without vat (localtax is calculated on amount without tax)
 *										'6' : local tax apply on services including vat (localtax is calculated on amount + tax)
 *
 *		@param	int		$qty						Quantity
 * 		@param 	float	$pu                         Unit price (HT or TTC selon price_base_type)
 *		@param 	float	$remise_percent_ligne       Discount for line
 *		@param 	float	$txtva                      0=do not apply VAT tax, VAT rate=apply (this is VAT rate only without text code, we don't need text code because we alreaydy have all tax info into $localtaxes_array)
 *		@param  float	$uselocaltax1_rate          0=do not use this localtax, >0=apply and get value from localtaxes_array (or database if empty), -1=autodetect according to seller if we must apply, get value from localtaxes_array (or database if empty). Try to always use -1.
 *		@param  float	$uselocaltax2_rate          0=do not use this localtax, >0=apply and get value from localtaxes_array (or database if empty), -1=autodetect according to seller if we must apply, get value from localtaxes_array (or database if empty). Try to always use -1.
 *		@param 	float	$remise_percent_global		0
 *		@param	string	$price_base_type 			HT=Unit price parameter is HT, TTC=Unit price parameter is TTC
 *		@param	int		$info_bits					Miscellaneous informations on line
 *		@param	int		$type						0/1=Product/service
 *		@param  Societe	$seller						Thirdparty seller (we need $seller->country_id property). Provided only if seller is the supplier, otherwise $seller will be $mysoc.
 *		@param  array	$localtaxes_array			Array with localtaxes info array('0'=>type1,'1'=>rate1,'2'=>type2,'3'=>rate2) (loaded by getLocalTaxesFromRate(vatrate, 0, ...) function).
 *		@param  integer	$progress                   Situation invoices progress (value from 0 to 100, 100 by default)
 *		@param  double	$multicurrency_tx           Currency rate (1 by default)
 * 		@param  double	$pu_devise					Amount in currency
 *		@return         array [
 *                       0=total_ht,
 *						 1=total_vat, (main vat only)
 *						 2=total_ttc, (total_ht + main vat + local taxes)
 *						 3=pu_ht,
 *						 4=pu_vat, (main vat only)
 *						 5=pu_ttc,
 *						 6=total_ht_without_discount,
 *						 7=total_vat_without_discount, (main vat only)
 *						 8=total_ttc_without_discount, (total_ht + main vat + local taxes)
 *						 9=total_tax1 for total_ht,
 *						10=total_tax2 for total_ht,
 *
 *						11=pu_tax1 for pu_ht, 							!! should not be used
 *						12=pu_tax2 for pu_ht, 							!! should not be used
 *						13=??                 							!! should not be used
 *						14=total_tax1 for total_ht_without_discount,	!! should not be used
 *						15=total_tax2 for total_ht_without_discount,	!! should not be used
 *
 * 						16=multicurrency_total_ht
 * 						17=multicurrency_total_tva
 * 						18=multicurrency_total_ttc
 * 						19=multicurrency_pu_ht
 * 						20=multicurrency_pu_vat
 * 						21=multicurrency_pu_ttc
 * 						22=multicurrency_total_ht_without_discount
 * 						23=multicurrency_total_vat_without_discount
 * 						24=multicurrency_total_ttc_without_discount
 * 						25=multicurrency_total_tax1 for total_ht
 *                      26=multicurrency_total_tax2 for total_ht
 */
function calcul_price_total($qty, $pu, $remise_percent_ligne, $txtva, $uselocaltax1_rate, $uselocaltax2_rate, $remise_percent_global, $price_base_type, $info_bits, $type, $seller = '', $localtaxes_array = '', $progress = 100, $multicurrency_tx = 1, $pu_devise = 0)
{
}