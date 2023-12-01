<?php

/* Copyright (C) 2013-2014  Olivier Geffroy      <jeff@jeffinfo.com>
 * Copyright (C) 2013-2020  Alexandre Spangaro   <aspangaro@open-dsi.fr>
 * Copyright (C) 2013-2014  Florian Henry        <florian.henry@open-concept.pro>
 * Copyright (C) 2014       Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2015       Ari Elbaz (elarifr)  <github@accedinfo.com>
 * Copyright (C) 2018       Frédéric France         <frederic.france@netlogic.fr>
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
 *  \file       htdocs/accountancy/class/accountingaccount.class.php
 *  \ingroup    Accountancy (Double entries)
 *  \brief      File of class to manage accounting accounts
 */
/**
 * Class to manage accounting accounts
 */
class AccountingAccount extends \CommonObject
{
    /**
     * @var string Name of element
     */
    public $element = 'accounting_account';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_account';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'billr';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var integer
     */
    public $restrictiononfksoc = 1;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * @var string pcg version
     */
    public $fk_pcg_version;
    /**
     * @var string pcg type
     */
    public $pcg_type;
    /**
     * @var string account number
     */
    public $account_number;
    /**
     * @var int ID parent account
     */
    public $account_parent;
    /**
     * @var int ID category account
     */
    public $account_category;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var string Label of account
     */
    public $label;
    /**
     * @var string Label short of account
     */
    public $labelshort;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var int active (duplicate with status)
     */
    public $active;
    /**
     * @var int reconcilable
     */
    public $reconcilable;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handle
     */
    public function __construct($db)
    {
    }
    /**
     * Load record in memory
     *
     * @param 	int 	       $rowid 				    Id
     * @param 	string 	       $account_number 	        Account number
     * @param 	int|boolean    $limittocurrentchart     1 or true=Load record only if it is into current active char of account
     * @param   string         $limittoachartaccount    'ABC'=Load record only if it is into chart account with code 'ABC' (better and faster than previous parameter if you have chart of account code).
     * @return 	int                                     <0 if KO, 0 if not found, Id of record if OK and found
     */
    public function fetch($rowid = \null, $account_number = \null, $limittocurrentchart = 0, $limittoachartaccount = '')
    {
    }
    /**
     * Insert new accounting account in chart of accounts
     *
     * @param  User    $user       User making action
     * @param  int     $notrigger  Disable triggers
     * @return int                 <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * Update record
     *
     * @param  User $user      Use making update
     * @return int             <0 if KO, >0 if OK
     */
    public function update($user)
    {
    }
    /**
     * Check usage of accounting code
     *
     * @return int <0 if KO, >0 if OK
     */
    public function checkUsage()
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user User that deletes
     * @param int $notrigger 0=triggers after, 1=disable triggers
     * @return int <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Return clicable name (with picto eventually)
     *
     * @param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     * @param	int		$withlabel					0=No label, 1=Include label of account
     * @param	int  	$nourl						1=Disable url
     * @param	string  $moretitle					Add more text to title tooltip
     * @param	int  	$notooltip					1=Disable tooltip
     * @param	int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @param	int     $withcompletelabel		    0=Short label (field short label), 1=Complete label (field label)
     * @param	string	$option						'ledger', 'journals', 'accountcard'
     * @return  string	String with URL
     */
    public function getNomUrl($withpicto = 0, $withlabel = 0, $nourl = 0, $moretitle = '', $notooltip = 0, $save_lastsearch_value = -1, $withcompletelabel = 0, $option = '')
    {
    }
    /**
     * Information on record
     *
     * @param int $id of record
     * @return void
     */
    public function info($id)
    {
    }
    /**
     * Deactivate an account (for status active or status reconcilable)
     *
     * @param  int  $id         Id
     * @param  int  $mode       0=field active, 1=field reconcilable
     * @return int              <0 if KO, >0 if OK
     */
    public function accountDeactivate($id, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Account activated
     *
     * @param  int  $id         Id
     * @param  int  $mode       0=field active, 1=field reconcilable
     * @return int              <0 if KO, >0 if OK
     */
    public function account_activate($id, $mode = 0)
    {
    }
    /**
     *  Retourne le libelle du statut d'un user (actif, inactif)
     *
     *  @param  int     $mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string              Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param  int     $status     Id status
     *  @param  int     $mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string              Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
}