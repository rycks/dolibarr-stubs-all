<?php

/* Copyright (C) 2007-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *      \file       compta/facture/class/paymentterm.class.php
 *      \ingroup    facture
 *      \brief      This file is an example for a CRUD class file (Create/Read/Update/Delete)
 */
/**
 *	Class to manage payment terms records in dictionary
 */
class PaymentTerm
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    //public  $element='c_payment_term';			//!< Id that identify managed objects
    //public  $table_element='c_payment_term';	//!< Name of table without prefix where object is stored
    public $context = array();
    /**
     * @var int ID
     */
    public $id;
    public $code;
    public $sortorder;
    public $active;
    public $libelle;
    public $libelle_facture;
    public $type_cdr;
    public $nbjour;
    public $decalage;
    /**
     * 	Constructor
     *
     * 	@param	DoliDB		$db			Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *      Create in database
     *
     *      @param      User	$user        	User that create
     *      @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *      @return     int       			  	<0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *    Load object in memory from database
     *
     *    @param      int		$id     Id object
     *    @param      string    $code   Code object
     *    @return     int         		<0 if KO, >0 if OK
     */
    public function fetch($id, $code = '')
    {
    }
    /**
     *    Return id of default payment term
     *
     *    @return     int         <0 if KO, >0 if OK
     */
    public function getDefaultId()
    {
    }
    /**
     *  Update database
     *
     *  @param      User	$user        	User that modify
     *  @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return     int       			  	<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param      User	$user  		User that delete
     *  @param      int		$notrigger	0=launch triggers after, 1=disable triggers
     *	@return		int					<0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *  Load an object from its id and create a new one in database
     *
     *  @param	    User	$user		User making the clone
     *  @param      int		$fromid     Id of object to clone
     *  @return		int					New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
}