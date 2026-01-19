<?php

/* Copyright (C) 2006-2015  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2007       Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2009-2010  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2015-2016	Marcos García			<marcosgdf@gmail.com>
 * Copyright (C) 2023	   	Gauthier VERDOL			<gauthier.verdol@atm-consulting.fr>
 * Copyright (C) 2024	   	Jean-Rémi TAPONIER		<jean-remi@netlogic.fr>
 * Copyright (C) 2024-2025	MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024		Mélina Joum				<melina.joum@altairis.fr>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
 * \file       htdocs/core/lib/product.lib.php
 * \brief      Ensemble de functions de base pour le module produit et service
 * \ingroup	product
 */
/**
 * Prepare array with list of tabs
 *
 * @param   Product	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function product_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   ProductLot	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function productlot_prepare_head($object)
{
}
/**
 *  Return array head with list of tabs to view object information.
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function product_admin_prepare_head()
{
}
/**
 * Return array head with list of tabs to view object information.
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function product_lot_admin_prepare_head()
{
}
/**
 * Show stats for a product
 *
 * @param	Product		$product	Product object
 * @param 	int			$socid		Thirdparty id
 * @return	integer					NB of lines shown into array
 */
function show_stats_for_company($product, $socid)
{
}
/**
 * Show stats for product batch
 *
 * @param	Productlot	$batch	Product batch object
 * @param 	int			$socid	Thirdparty id
 * @return	integer				NB of lines shown into array
 */
function show_stats_for_batch($batch, $socid)
{
}
/**
 *	Return translation label of a unit key.
 *  Function kept for backward compatibility.
 *
 *  @param	?int	  	$unitscale			Scale of unit: '0', '-3', '6', ...
 *	@param  string		$measuring_style    Style of unit: weight, volume,...
 *	@param	int			$unitid             ID of unit (rowid in llx_c_units table)
 *  @param	int<0,1>	$use_short_label	1=Use short label ('g' instead of 'gram'). Short labels are not translated.
 *  @param	?Translate	$outputlangs		Language object
 *	@return	string	   			         	Unit string
 * 	@see	measuringUnitString() formproduct->selectMeasuringUnits()
 */
function measuring_units_string($unitscale = \null, $measuring_style = '', $unitid = 0, $use_short_label = 0, $outputlangs = \null)
{
}
/**
 *	Return translation label of a unit key
 *
 *	@param	int			$unitid             ID of unit (rowid in llx_c_units table)
 *	@param  string		$measuring_style    Style of unit: 'weight', 'volume', ..., '' = 'net_measure' for option PRODUCT_ADD_NET_MEASURE
 *  @param	?int	  	$unitscale			Scale of unit: '0', '-3', '6', ...
 *  @param	int<0,2>	$use_short_label	1=Use very short label ('g' instead of 'gram'), not translated. 2=Use translated short label.
 *  @param	?Translate	$outputlangs		Language object
 *	@return	string|-1	   			        Unit string if OK, -1 if KO
 * 	@see	formproduct->selectMeasuringUnits()
 */
function measuringUnitString($unitid, $measuring_style = '', $unitscale = \null, $use_short_label = 0, $outputlangs = \null)
{
}
/**
 *	Transform a given unit scale into the square of that unit, if known.
 *
 *	@param	int		$unitscale       Unit scale key (-3,-2,-1,0,98,99...)
 *	@return	int	   			         Squared unit key (-6,-4,-2,0,98,99...)
 * 	@see	formproduct->selectMeasuringUnits
 */
function measuring_units_squared($unitscale)
{
}
/**
 *	Transform a given unit scale into the cube of that unit, if known
 *
 *	@param	int		$unit            Unit scale key (-3,-2,-1,0,98,99...)
 *	@return	int	   			         Cubed unit key (-9,-6,-3,0,88,89...)
 * 	@see	formproduct->selectMeasuringUnits
 */
function measuring_units_cubed($unit)
{
}