<?php

/* Copyright (C) 2004-2009  Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2006-2007  Yannick Warnier     <ywarnier@beeznest.org>
 * Copyright (C) 2011	    Regis Houssin       <regis.houssin@inodbox.com>
 * Copyright (C) 2012-2017  Juanjo Menent       <jmenent@2byte.es>
 * Copyright (C) 2012       Cédric Salvador     <csalvador@gpcsolutions.fr>
 * Copyright (C) 2012-2014  Raphaël Doursenaud  <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2015       Marcos García       <marcosgdf@gmail.com>
 * Copyright (C) 2021-2022  Open-Dsi            <support@open-dsi.fr>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 */
/**
 *      \file       htdocs/core/lib/tax.lib.php
 *      \ingroup    tax
 *      \brief      Library for tax module
 */
/**
 * Prepare array with list of tabs
 *
 * @param   ChargeSociales	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function tax_prepare_head(\ChargeSociales $object)
{
}
/**
 *  Look for collectable VAT clients in the chosen year (and month)
 *
 *  @param	'vat'|'localtax1'|'localtax2'	$type	Tax type, either 'vat', 'localtax1' or 'localtax2'
 *  @param	DoliDB		 $db          	Database handle
 *  @param  int			 $y           	Year
 *  @param  int|''		 $date_start  	Start date
 *  @param  int|''		 $date_end    	End date
 *  @param  int			 $modetax     	Not used
 *  @param  'sell'|'buy' $direction     'sell' or 'buy'
 *  @param  int<0,12>	 $m				Month
 *  @param  int<0,4>	 $q           	Quarter
 *  @return int<-3,-1>|array<int|string,array{totalht:float,vat:float,localtax1:float,localtax2:float,dtotal_ttc:float[],dtype:int[],datef:int[],datep:int[],company_name:string[],company_id:int[],company_alias:string[],company_email:string[],company_tva_intra:string[],company_client:int[],company_fournisseur:int[],company_customer_code:string[],company_supplier_code:string[],company_customer_accounting_code:string[],company_supplier_accounting_code:string[],company_status:int[],user_id:int[],drate:string[],ddate_start:int[],ddate_end:int[],facid:int[],facnum:string[],type:int[],ftotal_ttc:float[],descr:string[],totalht_list:string[],vat_list:float[],localtax1_list:float[],localtax2_list:float[],pid:int[],pref:string[],ptype:int[],payment_id:int[],payment_ref:string[],payment_amount:float[]}>  Array with details of VATs (per third party), -1 if no accountancy module, -2 if not yet developed, -3 if error
 */
function tax_by_thirdparty($type, $db, $y, $date_start, $date_end, $modetax, $direction, $m = 0, $q = 0)
{
}
/**
 *  Gets Tax to collect for the given year (and given quarter or month)
 *  The function gets the Tax in split results, as the Tax declaration asks
 *  to report the amounts for different Tax rates as different lines.
 *
 *  @param	'vat'|'localtax1'|'localtax2'	$type	Tax type, either 'vat', 'localtax1' or 'localtax2'
 *  @param	DoliDB		 $db			Database handler object
 *  @param  int			 $y				Year
 *  @param  int<0,4>	 $q           	Quarter
 *  @param  int|''		 $date_start  	Start date
 *  @param  int|''		 $date_end    	End date
 *  @param  int			 $modetax     	Not used
 *  @param  'sell'|'buy' $direction   	'sell' (customer invoice) or 'buy' (supplier invoices)
 *  @param  int<0,12>	 $m           	Month
 *  @return int<-3,-1>|array<int|string,array{totalht:float,vat:float,localtax1:float,localtax2:float,dtotal_ttc:float[],dtype:int[],datef:int[],datep:int[],company_name:string[],company_id:int[],company_alias:string[],company_email:string[],company_tva_intra:string[],company_client:int[],company_fournisseur:int[],company_customer_code:string[],company_supplier_code:string[],company_customer_accounting_code:string[],company_supplier_accounting_code:string[],company_status:int[],user_id:int[],drate:string[],ddate_start:int[],ddate_end:int[],facid:int[],facnum:string[],type:int[],ftotal_ttc:float[],descr:string[],totalht_list:string[],vat_list:float[],localtax1_list:float[],localtax2_list:float[],pid:int[],pref:string[],ptype:int[],payment_id:int[],payment_ref:string[],payment_amount:float[]}>  Array with details of VATs (per rate), -1 if no accountancy module, -2 if not yet developed, -3 if error
 */
function tax_by_rate($type, $db, $y, $q, $date_start, $date_end, $modetax, $direction, $m = 0)
{
}