<?php

/* Copyright (C) 2005      Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010-2011 Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2015      Marcos García        <marcosgdf@gmail.com>
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
 *  \file       htdocs/compta/prelevement/class/ligneprelevement.class.php
 *  \ingroup    prelevement
 *  \brief      File of class to manage lines of Direct Debit orders
 */
/**
 *	Class to manage withdrawals
 */
class LignePrelevement
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $statuts = array();
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
     *  Recupere l'objet prelevement
     *
     *  @param	int		$rowid       id de la facture a recuperer
     *  @return	integer
     */
    public function fetch($rowid)
    {
    }
    /**
     *    Return status label of object
     *
     *    @param	int		$mode       0=Label, 1=Picto + label, 2=Picto, 3=Label + Picto
     * 	  @return   string      		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return status label for a status
     *
     *    @param	int		$status     Id status
     *    @param    int		$mode       0=Label, 1=Picto + label, 2=Picto, 3=Label + Picto
     * 	  @return   string      		Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
}