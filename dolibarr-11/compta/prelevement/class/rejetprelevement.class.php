<?php

/* Copyright (C) 2005      Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010-2013 Juanjo Menent        <jmenent@2byte.es>
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
 *
 */
/**
 *  \file       htdocs/compta/prelevement/class/rejetprelevement.class.php
 *  \ingroup    prelevement
 *  \brief      File of class to manage standing orders rejects
 */
/**
 *	Class to manage standing orders rejects
 */
class RejetPrelevement
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     *  Constructor
     *
     *  @param	DoliDb	$db			Database handler
     *  @param 	User	$user       Objet user
     */
    public function __construct($db, $user)
    {
    }
    /**
     * Create
     *
     * @param 	User		$user				User object
     * @param 	int			$id					Id
     * @param 	string		$motif				Motif
     * @param 	int	$date_rejet			Date rejet
     * @param 	int			$bonid				Bon id
     * @param 	int			$facturation		Facturation
     * @return	void
     */
    public function create($user, $id, $motif, $date_rejet, $bonid, $facturation = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Send email to all users that has asked the withdraw request
     *
     * 	@param	Facture		$fac			Invoice object
     * 	@return	void
     */
    private function _send_email($fac)
    {
    }
    /**
     * Retrieve the list of invoices
     *
     * @param 	int		$amounts 	If you want to get the amount of the order for each invoice
     * @return	array				Array List of invoices related to the withdrawal line
     * @todo	A withdrawal line is today linked to one and only one invoice. So the function should return only one object ?
     */
    private function getListInvoices($amounts = 0)
    {
    }
    /**
     *    Retrieve withdrawal object
     *
     *    @param    int		$rowid       id of invoice to retrieve
     *    @return	int
     */
    public function fetch($rowid)
    {
    }
}