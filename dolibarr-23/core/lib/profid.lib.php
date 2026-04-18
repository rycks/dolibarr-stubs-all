<?php

/* Copyright (C) 2006-2011	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2022		Frédéric France			<frederic.france@netlogic.fr>
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
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/profid.lib.php
 *  \brief		Set of functions for professional identifiers
 */
/**
 *  Check if a string passes the Luhn algorithm test.
 *  @param		string|int		$str		string to check
 *  @return		bool						True if the string passes the Luhn algorithm check, False otherwise
 *  @since		Dolibarr V20
 */
function isValidLuhn($str)
{
}
/**
 *  Check the syntax validity of a SIREN.
 *
 *  @param		string		$siren		SIREN to check
 *  @return		boolean					True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidSiren($siren)
{
}
/**
 *  Check the syntax validity of a SIRET.
 *
 *  @param		string		$siret		SIRET to check
 *  @return		boolean					True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidSiret($siret)
{
}
/**
 *  Check the syntax validity of a Portuguese (PT) Tax Identification Number (TIN).
 *  (NIF = Número de Identificação Fiscal)
 *
 *  @param		string		$str		NIF to check
 *  @return		boolean					True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidTinForPT($str)
{
}
/**
 *  Check the syntax validity of an Algerian (DZ) Tax Identification Number (TIN).
 *  (NIF = Numéro d'Identification Fiscale)
 *
 *  @param		string		$str		TIN to check
 *  @return		boolean					True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidTinForDZ($str)
{
}
/**
 *  Check the syntax validity of a Belgium (BE) Tax Identification Number (TIN).
 *  (NN = Numéro National)
 *
 *  @param		string		$str		NN to check
 *  @return		boolean					True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidTinForBE($str)
{
}
/**
 *  Check the syntax validity of a Spanish (ES) Tax Identification Number (TIN), where:
 *  - NIF = Número de Identificación Fiscal (used for residents only before 2008. Used for both residents and companies since 2008.)
 *  - CIF = Código de Identificación Fiscal (used for companies only before 2008. Replaced by NIF since 2008.)
 *  - NIE = Número de Identidad de Extranjero
 *
 *  @param		string		$str		TIN to check
 *  @return		int<-4,3>				1 if NIF ok, 2 if CIF ok, 3 if NIE ok, -1 if NIF bad, -2 if CIF bad, -3 if NIE bad, -4 if unexpected bad
 *  @since		Dolibarr V20
 */
function isValidTinForES($str)
{
}