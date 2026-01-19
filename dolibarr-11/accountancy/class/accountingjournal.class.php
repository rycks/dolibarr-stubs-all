<?php

/* Copyright (C) 2017		Alexandre Spangaro   <aspangaro@open-dsi.fr>
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
 * \file		htdocs/accountancy/class/accountingjournal.class.php
 * \ingroup		Accountancy (Double entries)
 * \brief		File of class to manage accounting journals
 */
/**
 * Class to manage accounting accounts
 */
class AccountingJournal extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'accounting_journal';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_journal';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = '';
    /**
     * @var int 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 0;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var string Accounting journal code
     */
    public $code;
    /**
     * @var string Accounting Journal label
     */
    public $label;
    /**
     * @var int 1:various operations, 2:sale, 3:purchase, 4:bank, 5:expense-report, 8:inventory, 9: has-new
     */
    public $nature;
    /**
     * @var int is active or not
     */
    public $active;
    /**
     * @var array array of lines
     */
    public $lines;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handle
     */
    public function __construct($db)
    {
    }
    /**
     * Load an object from database
     *
     * @param	int		$rowid				Id of record to load
     * @param 	string 	$journal_code		Journal code
     * @return	int							<0 if KO, Id of record if OK and found
     */
    public function fetch($rowid = \null, $journal_code = \null)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string $sortorder Sort Order
     * @param string $sortfield Sort field
     * @param int $limit offset limit
     * @param int $offset offset limit
     * @param array $filter filter array
     * @param string $filtermode filter mode (AND or OR)
     *
     * @return int <0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Return clicable name (with picto eventually)
     *
     * @param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     * @param	int		$withlabel		0=No label, 1=Include label of journal
     * @param	int  	$nourl			1=Disable url
     * @param	string  $moretitle		Add more text to title tooltip
     * @param	int  	$notooltip		1=Disable tooltip
     * @return	string	String with URL
     */
    public function getNomUrl($withpicto = 0, $withlabel = 0, $nourl = 0, $moretitle = '', $notooltip = 0)
    {
    }
    /**
     *  Retourne le libelle du statut d'un user (actif, inactif)
     *
     *  @param	int		$mode		  0=libelle long, 1=libelle court
     *  @return	string 				   Label of type
     */
    public function getLibType($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return type of an accounting journal
     *
     *  @param	int		$nature			Id type
     *  @param  int		$mode		  	0=libelle long, 1=libelle court
     *  @return string 				   	Label of type
     */
    public function LibType($nature, $mode = 0)
    {
    }
}