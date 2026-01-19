<?php

/* Copyright (C) 2017-2022  OpenDSI     <support@open-dsi.fr>
 * Copyright (C) 2024-2025	MDW							<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 * Copyright (C) 2024       Alexandre Janniaux <alexandre.janniaux@gmail.com>
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
 * Class to manage accounting journals
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
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = '';
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
     * @var array<string,array{found:bool,label:string,code_formatted_1:string,label_formatted_1:string,label_formatted_2:string}> 	Accounting account cached
     */
    public static $accounting_account_cached = array();
    /**
     * @var array<int,string>	Nature mapping
     */
    public static $nature_maps = array(1 => 'variousoperations', 2 => 'sells', 3 => 'purchases', 4 => 'bank', 5 => 'expensereports', 8 => 'inventories', 9 => 'hasnew');
    /**
     * Constructor
     *
     * @param DoliDB $db Database handle
     */
    public function __construct($db)
    {
    }
    /**
     * Create a new Accounting Journal.
     *
     * @param  User	$user the user that created the journal, currently unused
     * @return int  Return integer <0 on error, or the ID of the created object
     */
    public function create($user)
    {
    }
    /**
     * Load an object from database
     *
     * @param	int			$rowid			Id of record to load
     * @param 	?string		$journal_code	Journal code
     * @return	int							Return integer <0 if KO, Id of record if OK and found
     */
    public function fetch($rowid = 0, $journal_code = \null)
    {
    }
    /**
     * Return clickable name (with picto eventually)
     *
     * @param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     * @param	int		$withlabel		0=No label, 1=Include label of journal, 2=Include nature of journal
     * @param	int  	$nourl			1=Disable url
     * @param	string  $moretitle		Add more text to title tooltip
     * @param	int  	$notooltip		1=Disable tooltip
     * @return	string	String with URL
     */
    public function getNomUrl($withpicto = 0, $withlabel = 0, $nourl = 0, $moretitle = '', $notooltip = 0)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int<0,6>	$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 				       Label of status
     */
    public function getLibType($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return type of an accounting journal
     *
     *  @param	int			$nature		Id type
     *  @param  int<0,1>	$mode	  	0=label long, 1=label short
     *  @return string 				   	Label of type
     */
    public function LibType($nature, $mode = 0)
    {
    }
    /**
     *  Get journal data
     *
     * @param 	User			$user				User who get infos
     * @param 	string			$type				Type data returned ('view', 'bookkeeping', 'csv')
     * @param 	int				$date_start			Filter 'start date'
     * @param 	int				$date_end			Filter 'end date'
     * @param 	string			$in_bookkeeping		Filter 'in bookkeeping' ('already', 'notyet')
     * @return	int<-1,-1>|array<int,array{ref:string,error:?string,blocks:array<array<array{date:string,piece:string,account_accounting:string,subledger_account:string,label_operation:string,debit:string,credit:string}|array{doc_date:string,date_lim_reglement:string,doc_ref:string,date_creation:string,doc_type:string,fk_doc:string,fk_docdet:string,thirdparty_code:string,subledger_account:string,subledger_label:string,numero_compte:string,label_compte:string,label_operation:string,montant:string,sens:string,debit:string,credit:string,code_journal:string,journal_label:string,piece_num:string,import_key:string,fk_user_author:string,entity:string}>>}>	Return integer <0 if KO, array
     */
    public function getData(\User $user, $type = 'view', $date_start = \null, $date_end = \null, $in_bookkeeping = 'notyet')
    {
    }
    /**
     *  Get asset data for various journal
     *
     * @param 	User			$user				User who get infos
     * @param 	'view'|'bookkeeping'|'csv'	$type	Type data returned ('view', 'bookkeeping', 'csv')
     * @param 	?int			$date_start			Filter 'start date'
     * @param 	?int			$date_end			Filter 'end date'
     * @param 	'already'|'notyet'	$in_bookkeeping		Filter 'in bookkeeping' ('already', 'notyet')
     * @return	int<-1,-1>|array<int,array{ref:string,error:?string,blocks:array<array<array{date:string,piece:string,account_accounting:string,subledger_account:string,label_operation:string,debit:string,credit:string}|array{doc_date:''|int,date_lim_reglement:string,doc_ref:string,date_creation:int,doc_type:string,fk_doc:int|string,fk_docdet:int|string,thirdparty_code:string,subledger_account:string,subledger_label:string,numero_compte:string,label_compte:string,label_operation:string,montant:string,sens:string,debit:int|float|string,credit:int|float|string,code_journal:string,journal_label:string,piece_num:string,import_key:string,fk_user_author:string,entity:string}>>}>	Return integer <0 if KO, array
     */
    public function getAssetData(\User $user, $type = 'view', $date_start = \null, $date_end = \null, $in_bookkeeping = 'notyet')
    {
    }
    /**
     *  Write bookkeeping
     *
     * @param	User		$user				User who write in the bookkeeping
     * @param	array<int,array{ref?:string,error?:string,blocks:array<array<array{doc_date:int|string,date_lim_reglement:int|string,doc_ref:string,date_creation:int,doc_type:string,fk_doc:int|string,fk_docdet:int|string,thirdparty_code:string,subledger_account:string,subledger_label:string,numero_compte:string,label_compte:string,label_operation:string,montant:float|string,sens:string,debit:int|float|string,credit:int|float|string,code_journal:string,journal_label:string,piece_num:int|string,import_key:string,fk_user_author:string,entity:string}>>}>	$journal_data		Journal data to write in the bookkeeping
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              $journal_data = array(
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .	id_element => array(
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'ref' => 'ref',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'error' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'blocks' => array(
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		pos_block => array(
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		num_line => array(
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'doc_date' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'date_lim_reglement' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'doc_ref' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'date_creation' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'doc_type' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'fk_doc' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'fk_docdet' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'thirdparty_code' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              . 		'subledger_account' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'subledger_label' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'numero_compte' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'label_compte' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'label_operation' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'montant' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'sens' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'debit' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'credit' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'code_journal' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'journal_label' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'piece_num' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'import_key' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'fk_user_author' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .		'entity' => '',
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .	),
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .	),
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .	),
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              .	),
     *                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              );
     * @param	int		$max_nb_errors			Nb errors authorized before stopping the process
     * @return 	int								Return integer <0 if KO, >0 if OK
     */
    public function writeIntoBookkeeping(\User $user, &$journal_data = array(), $max_nb_errors = 10)
    {
    }
    /**
     *	Export journal CSV
     * 	ISO and not UTF8 !
     *
     * @param	array<int,array{blocks:array<array<array<string>>>}>	$journal_data			Journal data to write in the bookkeeping
     *                                                                                          $journal_data = array(
     *                                                                                          id_element => array(
     *                                                                                          'continue' => false,
     *                                                                                          'blocks' => array(
     *                                                                                          pos_block => array(
     *                                                                                          num_line => array(
     *                                                                                          data to write in the CSV line
     *                                                                                          ),
     *                                                                                          ),
     *                                                                                          ),
     *                                                                                          ),
     *                                                                                          );
     * @param	int				$search_date_end		Search date end
     * @param	string			$sep					CSV separator
     * @return 	int|string								Return integer <0 if KO, >0 if OK
     */
    public function exportCsv(&$journal_data = array(), $search_date_end = 0, $sep = '')
    {
    }
    /**
     *  Get accounting account info
     *
     * @param	string	$account	Accounting account number
     * @return	array{found:bool,label:string,code_formatted_1:string,label_formatted_1:string,label_formatted_2:string}		Accounting account info
     */
    public function getAccountingAccountInfos($account)
    {
    }
}