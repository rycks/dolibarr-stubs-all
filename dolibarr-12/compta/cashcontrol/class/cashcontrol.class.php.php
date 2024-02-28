<?php

/* Copyright (C) 2008 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2009 Regis Houssin        <regis.houssin@capnetworks.com>
 * Copyright (C) 2016 Marcos García        <marcosgdf@gmail.com>
 * Copyright (C) 2018 Andreu Bisquerra     <jove@bisquerra.com>
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
 * \file       cashcontrol/class/cashcontrol.class.php
 * \ingroup    cashdesk|takepos
 * \brief      This file is CRUD class file (Create/Read/Update/Delete) for cash fence table
 */
/**
 *    Class to manage cash fence
 */
class CashControl extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'cashcontrol';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'pos_cash_fence';
    /**
     * @var int  Does pos_cash_fence support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does pos_cash_fence support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * @var string String with name of icon for pos_cash_fence. Must be the part after the 'object_' into object_pos_cash_fence.png
     */
    public $picto = 'cash-register';
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 10), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 15), 'ref' => array('type' => 'varchar(64)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 18), 'posmodule' => array('type' => 'varchar(30)', 'label' => 'Module', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 19), 'posnumber' => array('type' => 'varchar(30)', 'label' => 'Terminal', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 20, 'css' => 'center'), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => 0, 'position' => 24), 'opening' => array('type' => 'price', 'label' => 'Opening', 'enabled' => 1, 'visible' => 1, 'position' => 25), 'cash' => array('type' => 'price', 'label' => 'Cash', 'enabled' => 1, 'visible' => 1, 'position' => 30), 'cheque' => array('type' => 'price', 'label' => 'Cheque', 'enabled' => 1, 'visible' => 1, 'position' => 33), 'card' => array('type' => 'price', 'label' => 'CreditCard', 'enabled' => 1, 'visible' => 1, 'position' => 36), 'year_close' => array('type' => 'integer', 'label' => 'Year close', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 50, 'css' => 'center'), 'month_close' => array('type' => 'integer', 'label' => 'Month close', 'enabled' => 1, 'visible' => 1, 'position' => 55, 'css' => 'center'), 'day_close' => array('type' => 'integer', 'label' => 'Day close', 'enabled' => 1, 'visible' => 1, 'position' => 60, 'css' => 'center'), 'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 490), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500), 'tms' => array('type' => 'timestamp', 'label' => 'Tms', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 505), 'import_key' => array('type' => 'varchar(14)', 'label' => 'Import key', 'enabled' => 1, 'visible' => 0, 'position' => 510), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'position' => 1000, 'notnull' => 1, 'index' => 1, 'arrayofkeyval' => array('0' => 'Brouillon', '1' => 'Validated')));
    public $id;
    public $opening;
    public $status;
    public $year_close;
    public $month_close;
    public $day_close;
    public $posmodule;
    public $posnumber;
    public $cash;
    public $cheque;
    public $card;
    /**
     * @var integer|string $date_valid
     */
    public $date_valid;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string $date_modification
     */
    public $date_modification;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CLOSED = 1;
    // For the moment CLOSED = VALIDATED
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *  Create in database
     *
     * @param  User $user User that create
     * @param  int $notrigger 0=launch triggers after, 1=disable triggers
     * @return int <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Validate cash fence
     *
     * @param 	User 		$user		User
     * @param 	number 		$notrigger	No trigger
     * @return 	int						<0 if KO, >0 if OK
     */
    public function valid(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     *  Return label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Return clicable link of object (with eventually picto)
     *
     *  @param  int     $withpicto                  Add picto into link
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
}