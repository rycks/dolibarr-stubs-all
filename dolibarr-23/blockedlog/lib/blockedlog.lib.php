<?php

/* Copyright (C) 2017 ATM Consulting <contact@atm-consulting.fr>
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
 *    \file       htdocs/blockedlog/lib/blockedlog.lib.php
 *    \ingroup    system
 *    \brief      Library for common blockedlog functions
 */
/**
 *  Define head array for tabs of blockedlog tools setup pages
 *
 *  @param	string		$withtabsetup					Add also the tab "Setup"
 *  @return	array<array{0:string,1:string,2:string}>	Array of head
 */
function blockedlogadmin_prepare_head($withtabsetup)
{
}
/**
 * Return if the KYC mandatory parameters are set
 *
 * @return boolean		True or false
 */
function isRegistrationDataSaved()
{
}
/**
 * Return a hash unique identifier of the registration
 *
 * @return string		Hash unique ID (used to idenfiy the registration without disclosing personal data)
 */
function getHashUniqueIdOfRegistration()
{
}
/**
 * Return if the version is a candidate version to get the LNE certification and if the prerequisites are OK in production to be switched to LNE certified mode.
 * The difference with isALNERunningVersion() is that isALNEQualifiedVersion() just checks if it has a sense or not to activate
 * the restrictions (it is not a check to say if we are or not in a mode with restrictions activated, but if we are in a context that has a sense to activate them).
 * It can be used to show warnings or alerts to end users.
 *
 * @param   int<0,1>	$ignoredev			Set this to 1 to ignore the fact the version is an alpha or beta version
 * @param   int<0,1>	$ignoremodule		Set this to 1 to not take into account if module BlockedLog is on, so function can be used during module activation.
 * @return 	boolean							True or false
 */
function isALNEQualifiedVersion($ignoredev = 0, $ignoremodule = 0)
{
}
/**
 * Return if the application is executed with the LNE requirements on.
 * This function can be used to disable some features like custom receipts, or to enable others like showing the information "Certified LNE".
 *
 * @param	int		$blockedlogtestalreadydone	Test on blockedlog used already done
 * @return 	boolean								True or false
 */
function isALNERunningVersion($blockedlogtestalreadydone = 0)
{
}
/**
 * Return if the blocked log was already used to block some events.
 *
 * @param   int<0,1>	$ignoresystem       Ignore system events for the test
 * @return 	boolean							True if blocked log was already used, false if not
 */
function isBlockedLogUsed($ignoresystem = 0)
{
}
/**
 *      Add legal mention
 *
 *      @param	TCPDF      			$pdf            	Object PDF
 *      @param  Translate			$outputlangs		Object lang
 *      @param  Societe				$seller         	Seller company
 *      @param  int					$default_font_size  Default font size
 *      @param  float				$posy            	Y position
 *      @param  CommonDocGenerator	$pdftemplate    	PDF template
 *      @return	int                                 	0 if nothing done, 1 if a mention was printed
 */
function pdfCertifMentionblockedLog(&$pdf, $outputlangs, $seller, $default_font_size, &$posy, $pdftemplate)
{
}
/**
 *      sumAmountsForUnalterableEvent
 *
 *      @param	BlockedLog			$block								Object BlockedLog
 *      @param	array<string,int>	$refinvoicefound					Array of ref of invoice already found (to avoid duplicates. Should be useless but just in case of)
 *      @param  array<string,array<string,float>>	$totalhtamount		Array of total per code event and module
 *      @param  array<string,array<string,float>>	$totalvatamount		Array of total per code event and module
 *      @param  array<string,array<string,float>>	$totalamount		Array of total per code event and module
 *      @param  float				$total_ht							Total HT
 *      @param  float				$total_vat							Total VAT
 *      @param  float				$total_ttc							Total TTC
 *      @return	int                                 					Return > 0
 */
function sumAmountsForUnalterableEvent($block, &$refinvoicefound, &$totalhtamount, &$totalvatamount, &$totalamount, &$total_ht, &$total_vat, &$total_ttc)
{
}