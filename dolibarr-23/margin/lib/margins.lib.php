<?php

/* Copyright (C) 2012      Christophe Battarel <christophe.battarel@altairis.fr>
 * Copyright (C) 2014-2015 Marcos García       <marcosgdf@gmail.com>
 * Copyright (C) 2016	   Florian Henry       <florian.henry@open-concept.pro>
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
 *	\file			/htdocs/margin/lib/margins.lib.php
 *  \ingroup		margin
 *  \brief			Library for common margin functions
 */
/**
 *  Define head array for tabs of marges tools setup pages
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function marges_admin_prepare_head()
{
}
/**
 * Return array of tabs to used on pages for third parties cards.
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function marges_prepare_head()
{
}
/**
 * Return an array with margins information of a line
 *
 * @param 	float 	$pv_ht				Selling price without tax
 * @param 	float	$remise_percent		Discount percent on line
 * @param 	float	$tva_tx				Vat rate (not used)
 * @param 	float	$localtax1_tx		Vat rate special 1 (not used)
 * @param 	float	$localtax2_tx		Vat rate special 2 (not used)
 * @param 	int		$fk_pa				Id of buying price (prefer set this to 0 and provide $pa_ht instead. With id, buying price may have change)
 * @param 	float	$pa_ht				Buying price without tax
 * @return	array{0:float,1:float,2:float}	Array of margin info (buying price, marge rate, marque rate)
 */
function getMarginInfos($pv_ht, $remise_percent, $tva_tx, $localtax1_tx, $localtax2_tx, $fk_pa, $pa_ht)
{
}