<?php

/* Copyright (C) 2014-2016	Alexandre Spangaro	<aspangaro@open-dsi.fr>
 * Copyright (C) 2015-2020	Frederic France     <frederic.france@netlogic.fr>
 * Copyright (C) 2020       Maxime DEMAREST     <maxime@indelog.fr>
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
 *      \file       htdocs/core/lib/loan.lib.php
 *      \ingroup    loan
 *      \brief      Library for loan module
 */
/**
 * Prepare array with list of tabs
 *
 * @param   Object	$object		Object related to tabs
 * @return  array				Array of tabs to show
 */
function loan_prepare_head($object)
{
}
/**
 * Calculate remaining loan mensuality and interests
 *
 * @param   float   $mens				Value of this mensuality (interests include, set 0 if we don't paid interests for this mensuality)
 * @param   float   $capital    		Remaining capital for this mensuality
 * @param   float   $rate				Loan rate
 * @param   int     $numactualloadterm	Actual loan term
 * @param   int   	$nbterm  			Total number of term for this loan
 * @return  array						Array with remaining capital, interest, and mensuality for each remaining terms
 */
function loanCalcMonthlyPayment($mens, $capital, $rate, $numactualloadterm, $nbterm)
{
}