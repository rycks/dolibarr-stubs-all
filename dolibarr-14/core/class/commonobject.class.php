<?php

/* Copyright (C) 2006-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2013 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010-2020 Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2012-2013 Christophe Battarel  <christophe.battarel@altairis.fr>
 * Copyright (C) 2011-2019 Philippe Grand       <philippe.grand@atoo-net.com>
 * Copyright (C) 2012-2015 Marcos García        <marcosgdf@gmail.com>
 * Copyright (C) 2012-2015 Raphaël Doursenaud   <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2012      Cedric Salvador      <csalvador@gpcsolutions.fr>
 * Copyright (C) 2015-2021 Alexandre Spangaro   <aspangaro@open-dsi.fr>
 * Copyright (C) 2016      Bahfir abbes         <dolipar@dolipar.org>
 * Copyright (C) 2017      ATM Consulting       <support@atm-consulting.fr>
 * Copyright (C) 2017-2019 Nicolas ZABOURI      <info@inovea-conseil.com>
 * Copyright (C) 2017      Rui Strecht          <rui.strecht@aliartalentos.com>
 * Copyright (C) 2018-2021 Frédéric France      <frederic.france@netlogic.fr>
 * Copyright (C) 2018      Josep Lluís Amador   <joseplluis@lliuretic.cat>
 * Copyright (C) 2021      Gauthier VERDOL      <gauthier.verdol@atm-consulting.fr>
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
 *	\file       htdocs/core/class/commonobject.class.php
 *	\ingroup    core
 *	\brief      File of parent class of all other business classes (invoices, contracts, proposals, orders, ...)
 */
/**
 *	Parent class of all other business classes (invoices, contracts, proposals, orders, ...)
 */
abstract class CommonObject
{
    /**
     * @var DoliDb		Database handler (result of a new DoliDB)
     */
    public $db;
    /**
     * @var int The object identifier
     */
    public $id;
    /**
     * @var int The environment ID when using a multicompany module
     */
    public $entity;
    /**
     * @var string 		Error string
     * @see             $errors
     */
    public $error;
    /**
     * @var string 		Error string that is hidden but can be used to store complementatry technical code.
     */
    public $errorhidden;
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
    /**
     * @var string ID to identify managed object
     */
    public $element;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var string		Key value used to track if data is coming from import wizard
     */
    public $import_key;
    /**
     * @var mixed		Contains data to manage extrafields
     */
    public $array_options = array();
    /**
     * @var mixed		Array to store alternative languages values of object
     */
    public $array_languages = \null;
    // Value is array() when load already tried
    /**
     * @var int[][]		Array of linked objects ids. Loaded by ->fetchObjectLinked
     */
    public $linkedObjectsIds;
    /**
     * @var mixed		Array of linked objects. Loaded by ->fetchObjectLinked
     */
    public $linkedObjects;
    /**
     * @var Object      To store a cloned copy of object before to edit it and keep track of old properties
     */
    public $oldcopy;
    /**
     * @var string		Column name of the ref field.
     */
    protected $table_ref_field = '';
    // Following vars are used by some objects only. We keep this property here in CommonObject to be able to provide common method using them.
    /**
     * @var array<string,mixed>		Can be used to pass information when only object is provided to method
     */
    public $context = array();
    /**
     * @var string		Contains canvas name if record is an alternative canvas record
     */
    public $canvas;
    /**
     * @var Project The related project
     * @see fetch_projet()
     */
    public $project;
    /**
     * @var int The related project ID
     * @see setProject(), project
     */
    public $fk_project;
    /**
     * @deprecated
     * @see project
     */
    public $projet;
    /**
     * @var Contact a related contact
     * @see fetch_contact()
     */
    public $contact;
    /**
     * @var int The related contact ID
     * @see fetch_contact()
     */
    public $contact_id;
    /**
     * @var Societe A related thirdparty
     * @see fetch_thirdparty()
     */
    public $thirdparty;
    /**
     * @var User A related user
     * @see fetch_user()
     */
    public $user;
    /**
     * @var string 	The type of originating object ('commande', 'facture', ...)
     * @see fetch_origin()
     */
    public $origin;
    /**
     * @var int 	The id of originating object
     * @see fetch_origin()
     */
    public $origin_id;
    /**
     * @var string The object's reference
     */
    public $ref;
    /**
     * @var string An external reference for the object
     */
    public $ref_ext;
    /**
     * @var string The object's previous reference
     */
    public $ref_previous;
    /**
     * @var string The object's next reference
     */
    public $ref_next;
    /**
     * @var string Ref to store on object to save the new ref to use for example when making a validate() of an object
     */
    public $newref;
    /**
     * @var int The object's status
     * @see setStatut()
     */
    public $statut;
    /**
     * @var int The object's status
     * @see setStatut()
     */
    public $status;
    /**
     * @var string
     * @see getFullAddress()
     */
    public $country;
    /**
     * @var int
     * @see getFullAddress(), country
     */
    public $country_id;
    /**
     * @var string
     * @see getFullAddress(), isInEEC(), country
     */
    public $country_code;
    /**
     * @var string
     * @see getFullAddress()
     */
    public $state;
    /**
     * @var int
     * @see getFullAddress(), state
     */
    public $state_id;
    /**
     * @var string
     * @see getFullAddress(), $state
     */
    public $state_code;
    /**
     * @var int
     * @see getFullAddress(), $region_code, $region
     */
    public $region_id;
    /**
     * @var string
     * @see getFullAddress(), $region_id, $region
     */
    public $region_code;
    /**
     * @var string
     * @see getFullAddress(), $region_id, $region_code
     */
    public $region;
    /**
     * @var int
     * @see fetch_barcode()
     */
    public $barcode_type;
    /**
     * @var string
     * @see fetch_barcode(), barcode_type
     */
    public $barcode_type_code;
    /**
     * @var string
     * @see fetch_barcode(), barcode_type
     */
    public $barcode_type_label;
    /**
     * @var string
     * @see fetch_barcode(), barcode_type
     */
    public $barcode_type_coder;
    /**
     * @var int Payment method ID (cheque, cash, ...)
     * @see setPaymentMethods()
     */
    public $mode_reglement_id;
    /**
     * @var int Payment terms ID
     * @see setPaymentTerms()
     */
    public $cond_reglement_id;
    /**
     * @var int Demand reason ID
     */
    public $demand_reason_id;
    /**
     * @var int Transport mode ID (For module intracomm report)
     * @see setTransportMode()
     */
    public $transport_mode_id;
    /**
     * @var int Payment terms ID
     * @deprecated Kept for compatibility
     * @see cond_reglement_id;
     */
    public $cond_reglement;
    /**
     * @var int Delivery address ID
     * @see setDeliveryAddress()
     * @deprecated
     */
    public $fk_delivery_address;
    /**
     * @var int Shipping method ID
     * @see setShippingMethod()
     */
    public $shipping_method_id;
    /**
     * @var string
     * @see SetDocModel()
     */
    public $model_pdf;
    /**
     * @var string
     * @deprecated
     * @see $model_pdf
     */
    public $modelpdf;
    /**
     * @var string
     * Contains relative path of last generated main file
     */
    public $last_main_doc;
    /**
     * @var int Bank account ID sometimes, ID of record into llx_bank sometimes
     * @deprecated
     * @see $fk_account
     */
    public $fk_bank;
    /**
     * @var int Bank account ID
     * @see SetBankAccount()
     */
    public $fk_account;
    /**
     * @var string	Open ID
     */
    public $openid;
    /**
     * @var string Public note
     * @see update_note()
     */
    public $note_public;
    /**
     * @var string Private note
     * @see update_note()
     */
    public $note_private;
    /**
     * @deprecated
     * @see $note_private
     */
    public $note;
    /**
     * @var float Total amount before taxes
     * @see update_price()
     */
    public $total_ht;
    /**
     * @var float Total VAT amount
     * @see update_price()
     */
    public $total_tva;
    /**
     * @var float Total local tax 1 amount
     * @see update_price()
     */
    public $total_localtax1;
    /**
     * @var float Total local tax 2 amount
     * @see update_price()
     */
    public $total_localtax2;
    /**
     * @var float Total amount with taxes
     * @see update_price()
     */
    public $total_ttc;
    /**
     * @var CommonObjectLine[]
     */
    public $lines;
    /**
     * @var mixed		Contains comments
     * @see fetchComments()
     */
    public $comments = array();
    /**
     * @var string The name
     */
    public $name;
    /**
     * @var string The lastname
     */
    public $lastname;
    /**
     * @var string The firstname
     */
    public $firstname;
    /**
     * @var string The civility code, not an integer
     */
    public $civility_id;
    // Dates
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string $date_validation;
     */
    public $date_validation;
    // Date validation
    /**
     * @var integer|string $date_modification;
     */
    public $date_modification;
    // Date last change (tms field)
    public $next_prev_filter;
    /**
     * @var int 1 if object is specimen
     */
    public $specimen = 0;
    /**
     * @var	int	Id of contact to send object (used by the trigger of module Agenda)
     */
    public $sendtoid;
    /**
     * @var	float	Amount already paid (used to show correct status)
     */
    public $alreadypaid;
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var array    List of child tables. To know object to delete on cascade.
     *               If name is like '@ClassName:FilePathClass:ParentFkFieldName', it will
     *               call method deleteByParentField(parentId, ParentFkFieldName) to fetch and delete child object.
     */
    protected $childtablesoncascade = array();
    // No constructor as it is an abstract class
    /**
     * Check an object id/ref exists
     * If you don't need/want to instantiate object and just need to know if object exists, use this method instead of fetch
     *
     *  @param	string	$element   	String of element ('product', 'facture', ...)
     *  @param	int		$id      	Id of object
     *  @param  string	$ref     	Ref of object to check
     *  @param	string	$ref_ext	Ref ext of object to check
     *  @return int     			<0 if KO, 0 if OK but not found, >0 if OK and exists
     */
    public static function isExistingObject($element, $id, $ref = '', $ref_ext = '')
    {
    }
    /**
     * Method to output saved errors
     *
     * @return	string		String with errors
     */
    public function errorsToString()
    {
    }
    /**
     * Return customer ref for screen output.
     *
     * @param  string      $objref        Customer ref
     * @return string                     Customer ref formated
     */
    public function getFormatedCustomerRef($objref)
    {
    }
    /**
     * Return supplier ref for screen output.
     *
     * @param  string      $objref        Supplier ref
     * @return string                     Supplier ref formated
     */
    public function getFormatedSupplierRef($objref)
    {
    }
    /**
     *	Return full name (civility+' '+name+' '+lastname)
     *
     *	@param	Translate	$langs			Language object for translation of civility (used only if option is 1)
     *	@param	int			$option			0=No option, 1=Add civility
     * 	@param	int			$nameorder		-1=Auto, 0=Lastname+Firstname, 1=Firstname+Lastname, 2=Firstname, 3=Firstname if defined else lastname, 4=Lastname, 5=Lastname if defined else firstname
     * 	@param	int			$maxlen			Maximum length
     * 	@return	string						String with full name
     */
    public function getFullName($langs, $option = 0, $nameorder = -1, $maxlen = 0)
    {
    }
    /**
     * Set to upper or ucwords/lower if needed
     *
     * @return void;
     */
    public function setUpperOrLowerCase()
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '')
    {
    }
    /**
     * 	Return full address of contact
     *
     * 	@param		int			$withcountry		1=Add country into address string
     *  @param		string		$sep				Separator to use to build string
     *  @param		int		    $withregion			1=Add region into address string
     *  @param		string		$extralangcode		User extralanguages as value
     *	@return		string							Full address string
     */
    public function getFullAddress($withcountry = 0, $sep = "\n", $withregion = 0, $extralangcode = '')
    {
    }
    /**
     * 	Return full address for banner
     *
     * 	@param		string		$htmlkey            HTML id to make banner content unique
     *  @param      Object      $object				Object (thirdparty, thirdparty of contact for contact, null for a member)
     *	@return		string							Full address string
     */
    public function getBannerAddress($htmlkey, $object)
    {
    }
    /**
     * Return the link of last main doc file for direct public download.
     *
     * @param	string	$modulepart			Module related to document
     * @param	int		$initsharekey		Init the share key if it was not yet defined
     * @param	int		$relativelink		0=Return full external link, 1=Return link relative to root of file
     * @return	string						Link or empty string if there is no download link
     */
    public function getLastMainDocLink($modulepart, $initsharekey = 0, $relativelink = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add a link between element $this->element and a contact
     *
     *  @param	int			$fk_socpeople       Id of thirdparty contact (if source = 'external') or id of user (if souce = 'internal') to link
     *  @param 	int|string	$type_contact 		Type of contact (code or id). Must be id or code found into table llx_c_type_contact. For example: SALESREPFOLL
     *  @param  string		$source             external=Contact extern (llx_socpeople), internal=Contact intern (llx_user)
     *  @param  int			$notrigger			Disable all triggers
     *  @return int         	        		<0 if KO, 0 if already added, >0 if OK
     */
    public function add_contact($fk_socpeople, $type_contact, $source = 'external', $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Copy contact from one element to current
     *
     *    @param    CommonObject    $objFrom    Source element
     *    @param    string          $source     Nature of contact ('internal' or 'external')
     *    @return   int                         >0 if OK, <0 if KO
     */
    public function copy_linked_contact($objFrom, $source = 'internal')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Update a link to contact line
     *
     *      @param	int		$rowid              Id of line contact-element
     * 		@param	int		$statut	            New status of link
     *      @param  int		$type_contact_id    Id of contact type (not modified if 0)
     *      @param  int		$fk_socpeople	    Id of soc_people to update (not modified if 0)
     *      @return int                 		<0 if KO, >= 0 if OK
     */
    public function update_contact($rowid, $statut, $type_contact_id = 0, $fk_socpeople = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Delete a link to contact line
     *
     *    @param	int		$rowid			Id of contact link line to delete
     *    @param	int		$notrigger		Disable all triggers
     *    @return   int						>0 if OK, <0 if KO
     */
    public function delete_contact($rowid, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Delete all links between an object $this and all its contacts
     *
     *	  @param	string	$source		'' or 'internal' or 'external'
     *	  @param	string	$code		Type of contact (code or id)
     *    @return   int					>0 if OK, <0 if KO
     */
    public function delete_linked_contact($source = '', $code = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Get array of all contacts for an object
     *
     *    @param	int			$status		Status of links to get (-1=all)
     *    @param	string		$source		Source of contact: 'external' or 'thirdparty' (llx_socpeople) or 'internal' (llx_user)
     *    @param	int         $list       0:Return array contains all properties, 1:Return array contains just id
     *    @param    string      $code       Filter on this code of contact type ('SHIPPING', 'BILLING', ...)
     *    @return	array|int		        Array of contacts, -1 if error
     */
    public function liste_contact($status = -1, $source = 'external', $list = 0, $code = '')
    {
    }
    /**
     * 		Update status of a contact linked to object
     *
     * 		@param	int		$rowid		Id of link between object and contact
     * 		@return	int					<0 if KO, >=0 if OK
     */
    public function swapContactStatus($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Return array with list of possible values for type of contacts
     *
     *      @param	string	$source     'internal', 'external' or 'all'
     *      @param	string	$order		Sort order by : 'position', 'code', 'rowid'...
     *      @param  int		$option     0=Return array id->label, 1=Return array code->label
     *      @param  int		$activeonly 0=all status of contact, 1=only the active
     *		@param	string	$code		Type of contact (Example: 'CUSTOMER', 'SERVICE')
     *      @return array       		Array list of type of contacts (id->label if option=0, code->label if option=1)
     */
    public function liste_type_contact($source = 'internal', $order = 'position', $option = 0, $activeonly = 0, $code = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Return array with list of possible values for type of contacts
     *
     *      @param	string	$source     		'internal', 'external' or 'all'
     *      @param  int		$option     		0=Return array id->label, 1=Return array code->label
     *      @param  int		$activeonly 		0=all status of contact, 1=only the active
     *		@param	string	$code				Type of contact (Example: 'CUSTOMER', 'SERVICE')
     *		@param	string	$element			Filter on 1 element type
     *      @param	string	$excludeelement		Exclude 1 element type. Example: 'agenda'
     *      @return array       				Array list of type of contacts (id->label if option=0, code->label if option=1)
     */
    public function listeTypeContacts($source = 'internal', $option = 0, $activeonly = 0, $code = '', $element = '', $excludeelement = '')
    {
    }
    /**
     *      Return id of contacts for a source and a contact code.
     *      Example: contact client de facturation ('external', 'BILLING')
     *      Example: contact client de livraison ('external', 'SHIPPING')
     *      Example: contact interne suivi paiement ('internal', 'SALESREPFOLL')
     *
     *		@param	string	$source		'external' or 'internal'
     *		@param	string	$code		'BILLING', 'SHIPPING', 'SALESREPFOLL', ...
     *		@param	int		$status		limited to a certain status
     *      @return array       		List of id for such contacts
     */
    public function getIdContact($source, $code, $status = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load object contact with id=$this->contact_id into $this->contact
     *
     *		@param	int		$contactid      Id du contact. Use this->contact_id if empty.
     *		@return	int						<0 if KO, >0 if OK
     */
    public function fetch_contact($contactid = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Load the third party of object, from id $this->socid or $this->fk_soc, into this->thirdparty
     *
     *		@param		int		$force_thirdparty_id	Force thirdparty id
     *		@return		int								<0 if KO, >0 if OK
     */
    public function fetch_thirdparty($force_thirdparty_id = 0)
    {
    }
    /**
     * Looks for an object with ref matching the wildcard provided
     * It does only work when $this->table_ref_field is set
     *
     * @param string $ref Wildcard
     * @return int >1 = OK, 0 = Not found or table_ref_field not defined, <0 = KO
     */
    public function fetchOneLike($ref)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load data for barcode into properties ->barcode_type*
     *	Properties ->barcode_type that is id of barcode. Type is used to find other properties, but
     *  if it is not defined, ->element must be defined to know default barcode type.
     *
     *	@return		int			<0 if KO, 0 if can't guess type of barcode (ISBN, EAN13...), >0 if OK (all barcode properties loaded)
     */
    public function fetch_barcode()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the project with id $this->fk_project into this->project
     *
     *		@return		int			<0 if KO, >=0 if OK
     */
    public function fetch_project()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the project with id $this->fk_project into this->project
     *
     *		@return		int			<0 if KO, >=0 if OK
     */
    public function fetch_projet()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the product with id $this->fk_product into this->product
     *
     *		@return		int			<0 if KO, >=0 if OK
     */
    public function fetch_product()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the user with id $userid into this->user
     *
     *		@param	int		$userid 		Id du contact
     *		@return	int						<0 if KO, >0 if OK
     */
    public function fetch_user($userid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Read linked origin object
     *
     *	@return		void
     */
    public function fetch_origin()
    {
    }
    /**
     *  Load object from specific field
     *
     *  @param	string	$table		Table element or element line
     *  @param	string	$field		Field selected
     *  @param	string	$key		Import key
     *  @param	string	$element	Element name
     *	@return	int					<0 if KO, >0 if OK
     */
    public function fetchObjectFrom($table, $field, $key, $element = \null)
    {
    }
    /**
     *	Getter generic. Load value from a specific field
     *
     *	@param	string	$table		Table of element or element line
     *	@param	int		$id			Element id
     *	@param	string	$field		Field selected
     *	@return	int					<0 if KO, >0 if OK
     */
    public function getValueFrom($table, $id, $field)
    {
    }
    /**
     *	Setter generic. Update a specific field into database.
     *  Warning: Trigger is run only if param trigkey is provided.
     *
     *	@param	string		$field			Field to update
     *	@param	mixed		$value			New value
     *	@param	string		$table			To force other table element or element line (should not be used)
     *	@param	int			$id				To force other object id (should not be used)
     *	@param	string		$format			Data format ('text', 'date'). 'text' is used if not defined
     *	@param	string		$id_field		To force rowid field name. 'rowid' is used if not defined
     *	@param	User|string	$fuser			Update the user of last update field with this user. If not provided, current user is used except if value is 'none'
     *  @param  string      $trigkey    	Trigger key to run (in most cases something like 'XXX_MODIFY')
     *  @param	string		$fk_user_field	Name of field to save user id making change
     *	@return	int							<0 if KO, >0 if OK
     *  @see updateExtraField()
     */
    public function setValueFrom($field, $value, $table = '', $id = \null, $format = '', $id_field = '', $fuser = \null, $trigkey = '', $fk_user_field = 'fk_user_modif')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load properties id_previous and id_next by comparing $fieldid with $this->ref
     *
     *      @param	string	$filter		Optional filter. Example: " AND (t.field1 = 'aa' OR t.field2 = 'bb')". Do not allow user input data here.
     *	 	@param  string	$fieldid   	Name of field to use for the select MAX and MIN
     *		@param	int		$nodbprefix	Do not include DB prefix to forge table name
     *      @return int         		<0 if KO, >0 if OK
     */
    public function load_previous_next_ref($filter, $fieldid, $nodbprefix = 0)
    {
    }
    /**
     *      Return list of id of contacts of object
     *
     *      @param	string	$source     Source of contact: external (llx_socpeople) or internal (llx_user) or thirdparty (llx_societe)
     *      @return array				Array of id of contacts (if source=external or internal)
     * 									Array of id of third parties with at least one contact on object (if source=thirdparty)
     */
    public function getListContactId($source = 'external')
    {
    }
    /**
     *	Link element with a project
     *
     *	@param     	int		$projectid		Project id to link element to
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setProject($projectid)
    {
    }
    /**
     *  Change the payments methods
     *
     *  @param		int		$id		Id of new payment method
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setPaymentMethods($id)
    {
    }
    /**
     *  Change the multicurrency code
     *
     *  @param		string	$code	multicurrency code
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setMulticurrencyCode($code)
    {
    }
    /**
     *  Change the multicurrency rate
     *
     *  @param		double	$rate	multicurrency rate
     *  @param		int		$mode	mode 1 : amounts in company currency will be recalculated, mode 2 : amounts in foreign currency will be recalculated
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setMulticurrencyRate($rate, $mode = 1)
    {
    }
    /**
     *  Change the payments terms
     *
     *  @param		int		$id		Id of new payment terms
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setPaymentTerms($id)
    {
    }
    /**
     *  Change the transport mode methods
     *
     *  @param		int		$id		Id of transport mode
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setTransportMode($id)
    {
    }
    /**
     *  Change the retained warranty payments terms
     *
     *  @param		int		$id		Id of new payment terms
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setRetainedWarrantyPaymentTerms($id)
    {
    }
    /**
     *	Define delivery address
     *  @deprecated
     *
     *	@param      int		$id		Address id
     *	@return     int				<0 si ko, >0 si ok
     */
    public function setDeliveryAddress($id)
    {
    }
    /**
     *  Change the shipping method
     *
     *  @param      int     $shipping_method_id     Id of shipping method
     *  @param      bool    $notrigger              false=launch triggers after, true=disable triggers
     *  @param      User	$userused               Object user
     *
     *  @return     int              1 if OK, 0 if KO
     */
    public function setShippingMethod($shipping_method_id, $notrigger = \false, $userused = \null)
    {
    }
    /**
     *  Change the warehouse
     *
     *  @param      int     $warehouse_id     Id of warehouse
     *  @return     int              1 if OK, 0 if KO
     */
    public function setWarehouse($warehouse_id)
    {
    }
    /**
     *		Set last model used by doc generator
     *
     *		@param		User	$user		User object that make change
     *		@param		string	$modelpdf	Modele name
     *		@return		int					<0 if KO, >0 if OK
     */
    public function setDocModel($user, $modelpdf)
    {
    }
    /**
     *  Change the bank account
     *
     *  @param		int		$fk_account		Id of bank account
     *  @param      bool    $notrigger      false=launch triggers after, true=disable triggers
     *  @param      User	$userused		Object user
     *  @return		int				1 if OK, 0 if KO
     */
    public function setBankAccount($fk_account, $notrigger = \false, $userused = \null)
    {
    }
    // TODO: Move line related operations to CommonObjectLine?
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Save a new position (field rang) for details lines.
     *  You can choose to set position for lines with already a position or lines without any position defined.
     *
     * 	@param		boolean		$renum			   True to renum all already ordered lines, false to renum only not already ordered lines.
     * 	@param		string		$rowidorder		   ASC or DESC
     * 	@param		boolean		$fk_parent_line    Table with fk_parent_line field or not
     * 	@return		int                            <0 if KO, >0 if OK
     */
    public function line_order($renum = \false, $rowidorder = 'ASC', $fk_parent_line = \true)
    {
    }
    /**
     * 	Get children of line
     *
     * 	@param	int		$id		            Id of parent line
     * 	@param	int		$includealltree		0 = 1st level child, 1 = All level child
     * 	@return	array			            Array with list of children lines id
     */
    public function getChildrenOfLine($id, $includealltree = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update a line to have a lower rank
     *
     * 	@param 	int			$rowid				Id of line
     * 	@param	boolean		$fk_parent_line		Table with fk_parent_line field or not
     * 	@return	void
     */
    public function line_up($rowid, $fk_parent_line = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update a line to have a higher rank
     *
     * 	@param	int			$rowid				Id of line
     * 	@param	boolean		$fk_parent_line		Table with fk_parent_line field or not
     * 	@return	void
     */
    public function line_down($rowid, $fk_parent_line = \true)
    {
    }
    /**
     * 	Update position of line (rang)
     *
     * 	@param	int		$rowid		Id of line
     * 	@param	int		$rang		Position
     * 	@return	void
     */
    public function updateRangOfLine($rowid, $rang)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update position of line with ajax (rang)
     *
     * 	@param	array	$rows	Array of rows
     * 	@return	void
     */
    public function line_ajaxorder($rows)
    {
    }
    /**
     * 	Update position of line up (rang)
     *
     * 	@param	int		$rowid		Id of line
     * 	@param	int		$rang		Position
     * 	@return	void
     */
    public function updateLineUp($rowid, $rang)
    {
    }
    /**
     * 	Update position of line down (rang)
     *
     * 	@param	int		$rowid		Id of line
     * 	@param	int		$rang		Position
     * 	@param	int		$max		Max
     * 	@return	void
     */
    public function updateLineDown($rowid, $rang, $max)
    {
    }
    /**
     * 	Get position of line (rang)
     *
     * 	@param		int		$rowid		Id of line
     *  @return		int     			Value of rang in table of lines
     */
    public function getRangOfLine($rowid)
    {
    }
    /**
     * 	Get rowid of the line relative to its position
     *
     * 	@param		int		$rang		Rang value
     *  @return     int     			Rowid of the line
     */
    public function getIdOfLine($rang)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Get max value used for position of line (rang)
     *
     * 	@param		int		$fk_parent_line		Parent line id
     *  @return     int  			   			Max value of rang in table of lines
     */
    public function line_max($fk_parent_line = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update external ref of element
     *
     *  @param      string		$ref_ext	Update field ref_ext
     *  @return     int      		   		<0 if KO, >0 if OK
     */
    public function update_ref_ext($ref_ext)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update note of element
     *
     *  @param      string		$note		New value for note
     *  @param		string		$suffix		'', '_public' or '_private'
     *  @return     int      		   		<0 if KO, >0 if OK
     */
    public function update_note($note, $suffix = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update public note (kept for backward compatibility)
     *
     * @param      string		$note		New value for note
     * @return     int      		   		<0 if KO, >0 if OK
     * @deprecated
     * @see update_note()
     */
    public function update_note_public($note)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update total_ht, total_ttc, total_vat, total_localtax1, total_localtax2 for an object (sum of lines).
     *  Must be called at end of methods addline or updateline.
     *
     *	@param	int		$exclspec          	>0 = Exclude special product (product_type=9)
     *  @param  string	$roundingadjust    	'none'=Do nothing, 'auto'=Use default method (MAIN_ROUNDOFTOTAL_NOT_TOTALOFROUND if defined, or '0'), '0'=Force mode total of rounding, '1'=Force mode rounding of total
     *  @param	int		$nodatabaseupdate	1=Do not update database. Update only properties of object.
     *  @param	Societe	$seller				If roundingadjust is '0' or '1' or maybe 'auto', it means we recalculate total for lines before calculating total for object and for this, we need seller object.
     *	@return	int    			           	<0 if KO, >0 if OK
     */
    public function update_price($exclspec = 0, $roundingadjust = 'none', $nodatabaseupdate = 0, $seller = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add objects linked in llx_element_element.
     *
     *	@param		string	$origin		Linked element type
     *	@param		int		$origin_id	Linked element id
     * 	@param		User	$f_user		User that create
     * 	@param		int		$notrigger	1=Does not execute triggers, 0=execute triggers
     *	@return		int					<=0 if KO, >0 if OK
     *	@see		fetchObjectLinked(), updateObjectLinked(), deleteObjectLinked()
     */
    public function add_object_linked($origin = \null, $origin_id = \null, $f_user = \null, $notrigger = 0)
    {
    }
    /**
     *	Fetch array of objects linked to current object (object of enabled modules only). Links are loaded into
     *		this->linkedObjectsIds array +
     *		this->linkedObjects array if $loadalsoobjects = 1
     *  Possible usage for parameters:
     *  - all parameters empty -> we look all link to current object (current object can be source or target)
     *  - source id+type -> will get target list linked to source
     *  - target id+type -> will get source list linked to target
     *  - source id+type + target type -> will get target list of the type
     *  - target id+type + target source -> will get source list of the type
     *
     *	@param	int		$sourceid			Object source id (if not defined, id of object)
     *	@param  string	$sourcetype			Object source type (if not defined, element name of object)
     *	@param  int		$targetid			Object target id (if not defined, id of object)
     *	@param  string	$targettype			Object target type (if not defined, elemennt name of object)
     *	@param  string	$clause				'OR' or 'AND' clause used when both source id and target id are provided
     *  @param  int		$alsosametype		0=Return only links to object that differs from source type. 1=Include also link to objects of same type.
     *  @param  string	$orderby			SQL 'ORDER BY' clause
     *  @param	int		$loadalsoobjects	Load also array this->linkedObjects (Use 0 to increase performances)
     *	@return int							<0 if KO, >0 if OK
     *  @see	add_object_linked(), updateObjectLinked(), deleteObjectLinked()
     */
    public function fetchObjectLinked($sourceid = \null, $sourcetype = '', $targetid = \null, $targettype = '', $clause = 'OR', $alsosametype = 1, $orderby = 'sourcetype', $loadalsoobjects = 1)
    {
    }
    /**
     *	Update object linked of a current object
     *
     *	@param	int		$sourceid		Object source id
     *	@param  string	$sourcetype		Object source type
     *	@param  int		$targetid		Object target id
     *	@param  string	$targettype		Object target type
     * 	@param	User	$f_user			User that create
     * 	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return							int	>0 if OK, <0 if KO
     *	@see	add_object_linked(), fetObjectLinked(), deleteObjectLinked()
     */
    public function updateObjectLinked($sourceid = \null, $sourcetype = '', $targetid = \null, $targettype = '', $f_user = \null, $notrigger = 0)
    {
    }
    /**
     *	Delete all links between an object $this
     *
     *	@param	int		$sourceid		Object source id
     *	@param  string	$sourcetype		Object source type
     *	@param  int		$targetid		Object target id
     *	@param  string	$targettype		Object target type
     *  @param	int		$rowid			Row id of line to delete. If defined, other parameters are not used.
     * 	@param	User	$f_user			User that create
     * 	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return     					int	>0 if OK, <0 if KO
     *	@see	add_object_linked(), updateObjectLinked(), fetchObjectLinked()
     */
    public function deleteObjectLinked($sourceid = \null, $sourcetype = '', $targetid = \null, $targettype = '', $rowid = '', $f_user = \null, $notrigger = 0)
    {
    }
    /**
     * Function used to get an array with all items linked to an object id in association table
     *
     * @param	int		$fk_object_where		id of object we need to get linked items
     * @param	string	$field_select			name of field we need to get a list
     * @param	string	$field_where			name of field of object we need to get linked items
     * @param	string	$table_element			name of association table
     * @return 	array							Array of record
     */
    public static function getAllItemsLinkedByObjectID($fk_object_where, $field_select, $field_where, $table_element)
    {
    }
    /**
     * Function used to remove all items linked to an object id in association table
     *
     * @param	int		$fk_object_where		id of object we need to remove linked items
     * @param	string	$field_where			name of field of object we need to delete linked items
     * @param	string	$table_element			name of association table
     * @return 	int								<0 if KO, 0 if nothing done, >0 if OK and something done
     */
    public static function deleteAllItemsLinkedByObjectID($fk_object_where, $field_where, $table_element)
    {
    }
    /**
     *      Set status of an object
     *
     *      @param	int		$status			Status to set
     *      @param	int		$elementId		Id of element to force (use this->id by default)
     *      @param	string	$elementType	Type of element to force (use this->table_element by default)
     *      @param	string	$trigkey		Trigger key to use for trigger
     *      @return int						<0 if KO, >0 if OK
     */
    public function setStatut($status, $elementId = \null, $elementType = '', $trigkey = '')
    {
    }
    /**
     *  Load type of canvas of an object if it exists
     *
     *  @param      int		$id     Record id
     *  @param      string	$ref    Record ref
     *  @return		int				<0 if KO, 0 if nothing done, >0 if OK
     */
    public function getCanvas($id = 0, $ref = '')
    {
    }
    /**
     * 	Get special code of a line
     *
     * 	@param	int		$lineid		Id of line
     * 	@return	int					Special code
     */
    public function getSpecialCode($lineid)
    {
    }
    /**
     *  Function to check if an object is used by others.
     *  Check is done into this->childtables. There is no check into llx_element_element.
     *
     *  @param	int		$id			Force id of object
     *  @return	int					<0 if KO, 0 if not used, >0 if already used
     */
    public function isObjectUsed($id = 0)
    {
    }
    /**
     *  Function to say how many lines object contains
     *
     *	@param	int		$predefined		-1=All, 0=Count free product/service only, 1=Count predefined product/service only, 2=Count predefined product, 3=Count predefined service
     *  @return	int						<0 if KO, 0 if no predefined products, nb of lines with predefined products if found
     */
    public function hasProductsOrServices($predefined = -1)
    {
    }
    /**
     * Function that returns the total amount HT of discounts applied for all lines.
     *
     * @return 	float|string			Total amout of discount
     */
    public function getTotalDiscount()
    {
    }
    /**
     * Return into unit=0, the calculated total of weight and volume of all lines * qty
     * Calculate by adding weight and volume of each product line, so properties ->volume/volume_units/weight/weight_units must be loaded on line.
     *
     * @return  array                           array('weight'=>...,'volume'=>...)
     */
    public function getTotalWeightVolume()
    {
    }
    /**
     *	Set extra parameters
     *
     *	@return	int      <0 if KO, >0 if OK
     */
    public function setExtraParameters()
    {
    }
    // --------------------
    // TODO: All functions here must be redesigned and moved as they are not business functions but output functions
    // --------------------
    /* This is to show add lines */
    /**
     *	Show add free and predefined products/services form
     *
     *  @param	int		        $dateSelector       1=Show also date range input fields
     *  @param	Societe			$seller				Object thirdparty who sell
     *  @param	Societe			$buyer				Object thirdparty who buy
     *  @param	string			$defaulttpldir		Directory where to find the template
     *	@return	void
     */
    public function formAddObjectLine($dateSelector, $seller, $buyer, $defaulttpldir = '/core/tpl')
    {
    }
    /* This is to show array of line of details */
    /**
     *	Return HTML table for object lines
     *	TODO Move this into an output class file (htmlline.class.php)
     *	If lines are into a template, title must also be into a template
     *	But for the moment we don't know if it's possible as we keep a method available on overloaded objects.
     *
     *	@param	string		$action				Action code
     *	@param  string		$seller            	Object of seller third party
     *	@param  string  	$buyer             	Object of buyer third party
     *	@param	int			$selected		   	Object line selected
     *	@param  int	    	$dateSelector      	1=Show also date range input fields
     *  @param	string		$defaulttpldir		Directory where to find the template
     *	@return	void
     */
    public function printObjectLines($action, $seller, $buyer, $selected = 0, $dateSelector = 0, $defaulttpldir = '/core/tpl')
    {
    }
    /**
     *	Return HTML content of a detail line
     *	TODO Move this into an output class file (htmlline.class.php)
     *
     *	@param	string      		$action				GET/POST action
     *	@param  CommonObjectLine 	$line			    Selected object line to output
     *	@param  string	    		$var               	Is it a an odd line (true)
     *	@param  int		    		$num               	Number of line (0)
     *	@param  int		    		$i					I
     *	@param  int		    		$dateSelector      	1=Show also date range input fields
     *	@param  string	    		$seller            	Object of seller third party
     *	@param  string	    		$buyer             	Object of buyer third party
     *	@param	int					$selected		   	Object line selected
     *  @param  Extrafields			$extrafields		Object of extrafields
     *  @param	string				$defaulttpldir		Directory where to find the template (deprecated)
     *	@return	void
     */
    public function printObjectLine($action, $line, $var, $num, $i, $dateSelector, $seller, $buyer, $selected = 0, $extrafields = \null, $defaulttpldir = '/core/tpl')
    {
    }
    /* This is to show array of line of details of source object */
    /**
     * 	Return HTML table table of source object lines
     *  TODO Move this and previous function into output html class file (htmlline.class.php).
     *  If lines are into a template, title must also be into a template
     *  But for the moment we don't know if it's possible, so we keep the method available on overloaded objects.
     *
     *	@param	string		$restrictlist		''=All lines, 'services'=Restrict to services only
     *  @param  array       $selectedLines      Array of lines id for selected lines
     *  @return	void
     */
    public function printOriginLinesList($restrictlist = '', $selectedLines = array())
    {
    }
    /**
     * 	Return HTML with a line of table array of source object lines
     *  TODO Move this and previous function into output html class file (htmlline.class.php).
     *  If lines are into a template, title must also be into a template
     *  But for the moment we don't know if it's possible as we keep a method available on overloaded objects.
     *
     * 	@param	CommonObjectLine	$line				Line
     * 	@param	string				$var				Var
     *	@param	string				$restrictlist		''=All lines, 'services'=Restrict to services only (strike line if not)
     *  @param	string				$defaulttpldir		Directory where to find the template
     *  @param  array       		$selectedLines      Array of lines id for selected lines
     * 	@return	void
     */
    public function printOriginLine($line, $var, $restrictlist = '', $defaulttpldir = '/core/tpl', $selectedLines = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add resources to the current object : add entry into llx_element_resources
     *	Need $this->element & $this->id
     *
     *	@param		int		$resource_id		Resource id
     *	@param		string	$resource_type		'resource'
     *	@param		int		$busy				Busy or not
     *	@param		int		$mandatory			Mandatory or not
     *	@return		int							<=0 if KO, >0 if OK
     */
    public function add_element_resource($resource_id, $resource_type, $busy = 0, $mandatory = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Delete a link to resource line
     *
     *    @param	int		$rowid			Id of resource line to delete
     *    @param	int		$element		element name (for trigger) TODO: use $this->element into commonobject class
     *    @param	int		$notrigger		Disable all triggers
     *    @return   int						>0 if OK, <0 if KO
     */
    public function delete_resource($rowid, $element, $notrigger = 0)
    {
    }
    /**
     * Overwrite magic function to solve problem of cloning object that are kept as references
     *
     * @return void
     */
    public function __clone()
    {
    }
    /**
     * Common function for all objects extending CommonObject for generating documents
     *
     * @param 	string 		$modelspath 	Relative folder where generators are placed
     * @param 	string 		$modele 		Generator to use. Caller must set it to obj->model_pdf or GETPOST('model_pdf','alpha') for example.
     * @param 	Translate 	$outputlangs 	Output language to use
     * @param 	int 		$hidedetails 	1 to hide details. 0 by default
     * @param 	int 		$hidedesc 		1 to hide product description. 0 by default
     * @param 	int 		$hideref 		1 to hide product reference. 0 by default
     * @param   null|array  $moreparams     Array to provide more information
     * @return 	int 						>0 if OK, <0 if KO
     * @see	addFileIntoDatabaseIndex()
     */
    protected function commonGenerateDocument($modelspath, $modele, $outputlangs, $hidedetails, $hidedesc, $hideref, $moreparams = \null)
    {
    }
    /**
     *  Build thumb
     *  @todo Move this into files.lib.php
     *
     *  @param      string	$file           Path file in UTF8 to original file to create thumbs from.
     *	@return		void
     */
    public function addThumbs($file)
    {
    }
    /* Functions common to commonobject and commonobjectline */
    /* For default values */
    /**
     * Return the default value to use for a field when showing the create form of object.
     * Return values in this order:
     * 1) If parameter is available into POST, we return it first.
     * 2) If not but an alternate value was provided as parameter of function, we return it.
     * 3) If not but a constant $conf->global->OBJECTELEMENT_FIELDNAME is set, we return it (It is better to use the dedicated table).
     * 4) Return value found into database (TODO No yet implemented)
     *
     * @param   string              $fieldname          Name of field
     * @param   string              $alternatevalue     Alternate value to use
     * @return  string|string[]                         Default value (can be an array if the GETPOST return an array)
     **/
    public function getDefaultCreateValueFor($fieldname, $alternatevalue = \null)
    {
    }
    /* For triggers */
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Call trigger based on this instance.
     * Some context information may also be provided into array property this->context.
     * NB:  Error from trigger are stacked in interface->errors
     * NB2: If return code of triggers are < 0, action calling trigger should cancel all transaction.
     *
     * @param   string    $triggerName   trigger's name to execute
     * @param   User      $user           Object user
     * @return  int                       Result of run_triggers
     */
    public function call_trigger($triggerName, $user)
    {
    }
    /* Functions for data in other language */
    /**
     *  Function to get alternative languages of a data into $this->array_languages
     *  This method is NOT called by method fetch of objects but must be called separately.
     *
     *  @return	int						<0 if error, 0 if no values of alternative languages to find nor found, 1 if a value was found and loaded
     *  @see fetch_optionnals()
     */
    public function fetchValuesForExtraLanguages()
    {
    }
    /**
     * Fill array_options property of object by extrafields value (using for data sent by forms)
     *
     * @param	string	$onlykey		Only the following key is filled. When we make update of only one language field ($action = 'update_languages'), calling page must set this to avoid to have other languages being reset.
     * @return	int						1 if array_options set, 0 if no value, -1 if error (field required missing for example)
     */
    public function setValuesForExtraLanguages($onlykey = '')
    {
    }
    /* Functions for extrafields */
    /**
     * Function to make a fetch but set environment to avoid to load computed values before.
     *
     * @param	int		$id			ID of object
     * @return	int					>0 if OK, 0 if not found, <0 if KO
     */
    public function fetchNoCompute($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to get extra fields of an object into $this->array_options
     *  This method is in most cases called by method fetch of objects but you can call it separately.
     *
     *  @param	int		$rowid			Id of line. Use the id of object if not defined. Deprecated. Function must be called without parameters.
     *  @param  array	$optionsArray   Array resulting of call of extrafields->fetch_name_optionals_label(). Deprecated. Function must be called without parameters.
     *  @return	int						<0 if error, 0 if no values of extrafield to find nor found, 1 if an attribute is found and value loaded
     *  @see fetchValuesForExtraLanguages()
     */
    public function fetch_optionals($rowid = \null, $optionsArray = \null)
    {
    }
    /**
     *	Delete all extra fields values for the current object.
     *
     *  @return	int		<0 if KO, >0 if OK
     *  @see deleteExtraLanguages(), insertExtraField(), updateExtraField(), setValueFrom()
     */
    public function deleteExtraFields()
    {
    }
    /**
     *	Add/Update all extra fields values for the current object.
     *  Data to describe values to insert/update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *  This function delete record with all extrafields and insert them again from the array $this->array_options.
     *
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int 						-1=error, O=did nothing, 1=OK
     *  @see insertExtraLanguages(), updateExtraField(), deleteExtraField(), setValueFrom()
     */
    public function insertExtraFields($trigger = '', $userused = \null)
    {
    }
    /**
     *	Add/Update all extra fields values for the current object.
     *  Data to describe values to insert/update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *  This function delete record with all extrafields and insert them again from the array $this->array_options.
     *
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int 						-1=error, O=did nothing, 1=OK
     *  @see insertExtraFields(), updateExtraField(), setValueFrom()
     */
    public function insertExtraLanguages($trigger = '', $userused = \null)
    {
    }
    /**
     *	Update 1 extra field value for the current object. Keep other fields unchanged.
     *  Data to describe values to update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *
     *  @param  string      $key    		Key of the extrafield to update (without starting 'options_')
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int                 		-1=error, O=did nothing, 1=OK
     *  @see updateExtraLanguages(), insertExtraFields(), deleteExtraFields(), setValueFrom()
     */
    public function updateExtraField($key, $trigger = \null, $userused = \null)
    {
    }
    /**
     *	Update an extra language value for the current object.
     *  Data to describe values to update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *
     *  @param  string      $key    		Key of the extrafield (without starting 'options_')
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int                 		-1=error, O=did nothing, 1=OK
     *  @see updateExtraFields(), insertExtraLanguages()
     */
    public function updateExtraLanguages($key, $trigger = \null, $userused = \null)
    {
    }
    /**
     * Return HTML string to put an input field into a page
     * Code very similar with showInputField of extra fields
     *
     * @param  array   		$val	       Array of properties for field to show (used only if ->fields not defined)
     * @param  string  		$key           Key of attribute
     * @param  string|array	$value         Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param  string  		$moreparam     To add more parameters on html input tag
     * @param  string  		$keysuffix     Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string  		$keyprefix     Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string|int	$morecss       Value for css to define style/length of field. May also be a numeric.
     * @param  int			$nonewbutton   Force to not show the new button on field that are links to object
     * @return string
     */
    public function showInputField($val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = 0, $nonewbutton = 0)
    {
    }
    /**
     * Return HTML string to show a field into a page
     * Code very similar with showOutputField of extra fields
     *
     * @param  array   $val		       Array of properties of field to show
     * @param  string  $key            Key of attribute
     * @param  string  $value          Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value)
     * @param  string  $moreparam      To add more parametes on html input tag
     * @param  string  $keysuffix      Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string  $keyprefix      Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  mixed   $morecss        Value for css to define size. May also be a numeric.
     * @return string
     */
    public function showOutputField($val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '')
    {
    }
    /**
     * Function to show lines of extrafields with output datas.
     * This function is responsible to output the <tr> and <td> according to correct number of columns received into $params['colspan'] or <div> according to $display_type
     *
     * @param 	Extrafields $extrafields    Extrafield Object
     * @param 	string      $mode           Show output ('view') or input ('create' or 'edit') for extrafield
     * @param 	array       $params         Optional parameters. Example: array('style'=>'class="oddeven"', 'colspan'=>$colspan)
     * @param 	string      $keysuffix      Suffix string to add after name and id of field (can be used to avoid duplicate names)
     * @param 	string      $keyprefix      Prefix string to add before name and id of field (can be used to avoid duplicate names)
     * @param	string		$onetrtd		All fields in same tr td. Used by objectline_create.tpl.php for example.
     * @param	string		$display_type	"card" for form display, "line" for document line display (extrafields on propal line, order line, etc...)
     * @return 	string
     */
    public function showOptionals($extrafields, $mode = 'view', $params = \null, $keysuffix = '', $keyprefix = '', $onetrtd = 0, $display_type = 'card')
    {
    }
    /**
     * @param 	string 	$type	Type for prefix
     * @return 	string			Javacript code to manage dependency
     */
    public function getJSListDependancies($type = '_extra')
    {
    }
    /**
     * Returns the rights used for this class
     * @return stdClass
     */
    public function getRights()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     * This function is meant to be called from replaceThirdparty with the appropiate tables
     * Column name fk_soc MUST be used to identify thirdparties
     *
     * @param  DoliDB 	   $db 			  Database handler
     * @param  int 		   $origin_id     Old thirdparty id (the thirdparty to delete)
     * @param  int 		   $dest_id       New thirdparty id (the thirdparty that will received element of the other)
     * @param  string[]    $tables        Tables that need to be changed
     * @param  int         $ignoreerrors  Ignore errors. Return true even if errors. We need this when replacement can fails like for categories (categorie of old thirdparty may already exists on new one)
     * @return bool						  True if success, False if error
     */
    public static function commonReplaceThirdparty(\DoliDB $db, $origin_id, $dest_id, array $tables, $ignoreerrors = 0)
    {
    }
    /**
     * Get buy price to use for margin calculation. This function is called when buy price is unknown.
     *	 Set buy price = sell price if ForceBuyingPriceIfNull configured,
     *   else if calculation MARGIN_TYPE = 'costprice' and costprice is defined, use costprice as buyprice
     *	 else if calculation MARGIN_TYPE = 'pmp' and pmp is calculated, use pmp as buyprice
     *	 else set min buy price as buy price
     *
     * @param float		$unitPrice		 Product unit price
     * @param float		$discountPercent Line discount percent
     * @param int		$fk_product		 Product id
     * @return	float                    <0 if KO, buyprice if OK
     */
    public function defineBuyPrice($unitPrice = 0.0, $discountPercent = 0.0, $fk_product = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show photos of an object (nbmax maximum), into several columns
     *
     *  @param		string	$modulepart		'product', 'ticket', ...
     *  @param      string	$sdir        	Directory to scan (full absolute path)
     *  @param      int		$size        	0=original size, 1='small' use thumbnail if possible
     *  @param      int		$nbmax       	Nombre maximum de photos (0=pas de max)
     *  @param      int		$nbbyrow     	Number of image per line or -1 to use div. Used only if size=1.
     * 	@param		int		$showfilename	1=Show filename
     * 	@param		int		$showaction		1=Show icon with action links (resize, delete)
     * 	@param		int		$maxHeight		Max height of original image when size='small' (so we can use original even if small requested). If 0, always use 'small' thumb image.
     * 	@param		int		$maxWidth		Max width of original image when size='small'
     *  @param      int     $nolink         Do not add a href link to view enlarged imaged into a new tab
     *  @param      int     $notitle        Do not add title tag on image
     *  @param		int		$usesharelink	Use the public shared link of image (if not available, the 'nophoto' image will be shown instead)
     *  @return     string					Html code to show photo. Number of photos shown is saved in this->nbphoto
     */
    public function show_photos($modulepart, $sdir, $size = 0, $nbmax = 0, $nbbyrow = 5, $showfilename = 0, $showaction = 0, $maxHeight = 120, $maxWidth = 160, $nolink = 0, $notitle = 0, $usesharelink = 0)
    {
    }
    /**
     * Function test if type is array
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if array
     */
    protected function isArray($info)
    {
    }
    /**
     * Function test if type is date
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if date
     */
    public function isDate($info)
    {
    }
    /**
     * Function test if type is duration
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if field of type duration
     */
    public function isDuration($info)
    {
    }
    /**
     * Function test if type is integer
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if integer
     */
    public function isInt($info)
    {
    }
    /**
     * Function test if type is float
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if float
     */
    public function isFloat($info)
    {
    }
    /**
     * Function test if type is text
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if type text
     */
    public function isText($info)
    {
    }
    /**
     * Function test if field can be null
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if it can be null
     */
    protected function canBeNull($info)
    {
    }
    /**
     * Function test if field is forced to null if zero or empty
     *
     * @param   array   $info   content informations of field
     * @return  bool			true if forced to null
     */
    protected function isForcedToNullIfZero($info)
    {
    }
    /**
     * Function test if is indexed
     *
     * @param   array   $info   content informations of field
     * @return                  bool
     */
    protected function isIndex($info)
    {
    }
    /**
     * Function to prepare a part of the query for insert.
     * Note $this->${field} are set by the page that make the createCommon or the updateCommon.
     * $this->${field} should be a clean value. The page can run
     *
     * @return array
     */
    protected function setSaveQuery()
    {
    }
    /**
     * Function to load data from a SQL pointer into properties of current object $this
     *
     * @param   stdClass    $obj    Contain data of object from database
     * @return void
     */
    public function setVarsFromFetchObj(&$obj)
    {
    }
    /**
     * Function to concat keys of fields
     *
     * @param   string   $alias   	String of alias of table for fields. For example 't'.
     * @return  string				list of alias fields
     */
    public function getFieldList($alias = '')
    {
    }
    /**
     * Add quote to field value if necessary
     *
     * @param 	string|int	$value			Value to protect
     * @param	array		$fieldsentry	Properties of field
     * @return 	string
     */
    protected function quote($value, $fieldsentry)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, Id of created object if OK
     */
    public function createCommon(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	int    	$id				Id object
     * @param	string 	$ref			Ref
     * @param	string	$morewhere		More SQL filters (' AND ...')
     * @return 	int         			<0 if KO, 0 if not found, >0 if OK
     */
    public function fetchCommon($id, $ref = \null, $morewhere = '')
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	string	$morewhere		More SQL filters (' AND ...')
     * @return 	int         			<0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLinesCommon($morewhere = '')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      	User that modifies
     * @param  bool $notrigger 	false=launch triggers after, true=disable triggers
     * @return int             	<0 if KO, >0 if OK
     */
    public function updateCommon(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param 	User 	$user       			User that deletes
     * @param 	bool 	$notrigger  			false=launch triggers after, true=disable triggers
     * @param	int		$forcechilddeletion		0=no, 1=Force deletion of children
     * @return 	int             				<=0 if KO, >0 if OK
     */
    public function deleteCommon(\User $user, $notrigger = \false, $forcechilddeletion = 0)
    {
    }
    /**
     * Delete all child object from a parent ID
     *
     * @param		int		$parentId      Parent Id
     * @param		string	$parentField   Name of Foreign key parent column
     * @return		int						<0 if KO, >0 if OK
     * @throws Exception
     */
    public function deleteByParentField($parentId = 0, $parentField = '')
    {
    }
    /**
     *  Delete a line of object in database
     *
     *	@param  User	$user       User that delete
     *  @param	int		$idline		Id of line to delete
     *  @param 	bool 	$notrigger  false=launch triggers after, true=disable triggers
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteLineCommon(\User $user, $idline, $notrigger = \false)
    {
    }
    /**
     *	Set to a status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$status			New status to set (often a constant like self::STATUS_XXX)
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *  @param  string  $triggercode    Trigger code to use
     *	@return	int						<0 if KO, >0 if OK
     */
    public function setStatusCommon($user, $status, $notrigger = 0, $triggercode = '')
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimenCommon()
    {
    }
    /* Part for comments */
    /**
     * Load comments linked with current task
     *	@return boolean	1 if ok
     */
    public function fetchComments()
    {
    }
    /**
     * Return nb comments already posted
     *
     * @return int
     */
    public function getNbComments()
    {
    }
    /**
     * Trim object parameters
     *
     * @param string[] $parameters array of parameters to trim
     * @return void
     */
    public function trimParameters($parameters)
    {
    }
    /* Part for categories/tags */
    /**
     * Sets object to given categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	string 		$type_categ 	Category type ('customer', 'supplier', 'website_page', ...)
     * @return	int							Array of category objects or < 0 if KO
     */
    public function getCategoriesCommon($type_categ)
    {
    }
    /**
     * Sets object to given categories.
     *
     * Adds it to non existing supplied categories.
     * Deletes object from existing categories not supplied (if remove_existing==true).
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 		Category ID or array of Categories IDs
     * @param 	string 		$type_categ 		Category type ('customer', 'supplier', 'website_page', ...) definied into const class Categorie type
     * @param 	boolean		$remove_existing 	True: Remove existings categories from Object if not supplies by $categories, False: let them
     * @return	int							<0 if KO, >0 if OK
     */
    public function setCategoriesCommon($categories, $type_categ = '', $remove_existing = \true)
    {
    }
    /**
     * Copy related categories to another object
     *
     * @param  int		$fromId	Id object source
     * @param  int		$toId	Id object cible
     * @param  string	$type	Type of category ('product', ...)
     * @return int      < 0 if error, > 0 if ok
     */
    public function cloneCategories($fromId, $toId, $type = '')
    {
    }
    /**
     * Delete related files of object in database
     *
     * @param	integer		$mode		0=Use path to find record, 1=Use src_object_xxx fields (Mode 1 is recommanded for new objects)
     * @return 	bool					True if OK, False if KO
     */
    public function deleteEcmFiles($mode = 0)
    {
    }
}