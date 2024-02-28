<?php

/* Copyright (C) 2005      Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2018 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 *		\file       htdocs/core/class/discount.class.php
 * 		\ingroup    core propal facture commande
 *		\brief      File of class to manage absolute discounts
 */
/**
 *		Class to manage absolute discounts
 */
class DiscountAbsolute
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
    /**
     * @var int ID discount
     */
    public $id;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    public $discount_type;
    // 0 => customer discount, 1 => supplier discount
    public $amount_ht;
    //
    public $amount_tva;
    //
    public $amount_ttc;
    //
    public $multicurrency_amount_ht;
    public $multicurrency_amount_tva;
    public $multicurrency_amount_ttc;
    // Vat rate
    public $tva_tx;
    /**
     * @var int User ID Id utilisateur qui accorde la remise
     */
    public $fk_user;
    /**
     * @var string description
     */
    public $description;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * @var int ID invoice line when a discount is used into an invoice line (for absolute discounts)
     */
    public $fk_facture_line;
    /**
     * @var int ID invoice when a discount line is used into an invoice (for credit note)
     */
    public $fk_facture;
    /**
     * @var int ID credit note or deposit used to create the discount
     */
    public $fk_facture_source;
    public $ref_facture_source;
    // Ref credit note or deposit used to create the discount
    public $type_facture_source;
    public $fk_invoice_supplier_source;
    public $ref_invoice_supplier_source;
    // Ref credit note or deposit used to create the discount
    public $type_invoice_supplier_source;
    /**
     *	Constructor
     *
     *  @param  	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Load object from database into memory
     *
     *  @param      int		$rowid       					id discount to load
     *  @param      int		$fk_facture_source				fk_facture_source
     *  @param		int		$fk_invoice_supplier_source		fk_invoice_supplier_source
     *	@return		int										<0 if KO, =0 if not found, >0 if OK
     */
    public function fetch($rowid, $fk_facture_source = 0, $fk_invoice_supplier_source = 0)
    {
    }
    /**
     *      Create a discount into database
     *
     *      @param      User	$user       User that create
     *      @return     int         		<0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *  Delete object in database. If fk_facture_source is defined, we delete all familiy with same fk_facture_source. If not, only with id is removed
     *
     *  @param      User    $user       Object of user asking to delete
     *  @return     int                 <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Link the discount to a particular invoice line or a particular invoice.
     *	When discount is a global discount used as an invoice line, we link using rowidline.
     *	When discount is from a credit note used to reduce payment of an invoice, we link using rowidinvoice
     *
     *	@param		int		$rowidline		Invoice line id (To use discount into invoice lines)
     *	@param		int		$rowidinvoice	Invoice id (To use discount as a credit note to reduc payment of invoice)
     *	@return		int						<0 if KO, >0 if OK
     */
    public function link_to_invoice($rowidline, $rowidinvoice)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Link the discount to a particular invoice line or a particular invoice.
     *	Do not call this if discount is linked to a reconcialiated invoice
     *
     *	@return		int							<0 if KO, >0 if OK
     */
    public function unlink_invoice()
    {
    }
    /**
     *  Return amount (with tax) of discounts currently available for a company, user or other criteria
     *
     *	@param		Societe		$company		Object third party for filter
     *	@param		User		$user			Filtre sur un user auteur des remises
     * 	@param		string		$filter			Filtre autre
     * 	@param		int			$maxvalue		Filter on max value for discount
     *  @param      int			$discount_type  0 => customer discount, 1 => supplier discount
     * 	@return		int						<0 if KO, amount otherwise
     */
    public function getAvailableDiscounts($company = '', $user = '', $filter = '', $maxvalue = 0, $discount_type = 0)
    {
    }
    /**
     *  Return amount (with tax) of all deposits invoices used by invoice as a payment.
     *  Should always be empty, except if option FACTURE_DEPOSITS_ARE_JUST_PAYMENTS is on (not recommended).
     *
     *	@param		CommonInvoice	$invoice		Object invoice (customer of supplier)
     *  @param 		int 		    $multicurrency 	Return multicurrency_amount instead of amount
     *	@return		int				     			<0 if KO, Sum of credit notes and deposits amount otherwise
     */
    public function getSumDepositsUsed($invoice, $multicurrency = 0)
    {
    }
    /**
     *  Return amount (with tax) of all credit notes invoices + excess received used by invoice as a payment
     *
     *	@param      CommonInvoice	  $invoice	    	Object invoice
     *	@param      int			      $multicurrency	Return multicurrency_amount instead of amount
     *	@return     int					        		<0 if KO, Sum of credit notes and excess received amount otherwise
     */
    public function getSumCreditNotesUsed($invoice, $multicurrency = 0)
    {
    }
    /**
     *    	Return amount (with tax) of all converted amount for this credit note
     *
     *	@param		CommonInvoice	  $invoice	    	Object invoice
     *	@param		int			      $multicurrency	Return multicurrency_amount instead of amount
     *	@return		int					        		<0 if KO, Sum of credit notes and deposits amount otherwise
     */
    public function getSumFromThisCreditNotesNotUsed($invoice, $multicurrency = 0)
    {
    }
    /**
     *  Return clickable ref of object (with picto or not)
     *
     *  @param		int		$withpicto		0=No picto, 1=Include picto into link, 2=Picto only
     *  @param		string	$option			Where to link to ('invoice' or 'discount')
     *  @return		string					String with URL
     */
    public function getNomUrl($withpicto, $option = 'invoice')
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