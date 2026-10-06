<?php

/* Copyright (C) 2006-2011	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2022-2026  Frédéric France			<frederic.france@free.fr>
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
 *  @param		string		$siren			SIREN to check
 *  @param  	int			$lengthonly		Make surface test only (length, ...)
 *  @return		boolean						True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidSiren($siren, $lengthonly = 0)
{
}
/**
 *  Check the syntax validity of a SIRET.
 *
 *  @param		string		$siret			SIRET to check
 *  @param  	int			$lengthonly		Make surface test only (length, ...)
 *  @return		boolean						True if valid, False otherwise
 *  @since		Dolibarr V20
 */
function isValidSiret($siret, $lengthonly = 0)
{
}
/**
 *  Check the syntax validity of a Portuguese (PT) Tax Identification Number (TIN).
 *  (NIF = Numero de Identificacao Fiscal)
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
 *  (NIF = Tax Identification Number)
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
 *  (NN = National Number)
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
 *  - NIF = Numero de Identificacion Fiscal (used for residents only before 2008. Used for both residents and companies since 2008.)
 *  - CIF = Codigo de Identificacion Fiscal (used for companies only before 2008. Replaced by NIF since 2008.)
 *  - NIE = Numero de Identidad de Extranjero
 *
 *  @param		string		$str		TIN to check
 *  @return		int<-4,3>				1 if NIF ok, 2 if CIF ok, 3 if NIE ok, -1 if NIF bad, -2 if CIF bad, -3 if NIE bad, -4 if unexpected bad
 *  @since		Dolibarr V20
 */
function isValidTinForES($str)
{
}
/**
 *  Return whether the recorded value of a professional id never holds a space, in which case the spaces
 *  of a value copy/pasted from an official document (SIREN "849 943 618") are only separators.
 *
 *  Some prof ids are free text where a space carries a meaning (French idprof4 "RCS Poitiers B 849 943
 *  618"), so this cannot be assumed of all of them.
 *
 *  @param		int			$idprof			1,2,3,4,5,6 (Example: 1=siren, 2=siret, 3=naf, 4=rcs/rm)
 *  @param		string		$country_code	Country code of the third party (Example: 'FR')
 *  @return		bool						True if a space can only be a separator
 *  @since		Dolibarr V24
 */
function isProfIdWithoutSpace($idprof, $country_code)
{
}
/**
 *  Check the validity of a professional identifier according to the properties (country) of the company (siren, siret, ...)
 *
 *  @param	int			$idprof         1,2,3,4 (Example: 1=siren, 2=siret, 3=naf, 4=rcs/rm)
 *  @param  Societe		$thirdparty     Object societe
 *  @param  int			$lenghtonly		Make surface test only (length, ...)
 *  @return int             			Return integer <=0 if KO, >0 if OK
 */
function isValidProfIds($idprof, $thirdparty, $lenghtonly = 0)
{
}