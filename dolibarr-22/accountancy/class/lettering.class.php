<?php

/**
 * Class Lettering
 */
class Lettering extends \BookKeeping
{
    /**
     * @var array<string,array{payment_table:string,payment_table_fk_bank:string,doc_payment_table:string,doc_payment_table_fk_payment:string,doc_payment_table_fk_doc:string,linked_info:array<array{table:string,fk_doc:string,fk_link:string,prefix:string,fk_line_link?:string,table_link_line?:string,fk_table_link_line?:string,fk_table_link_line_parent?:string,is_fk_link_is_also_fk_doc?:bool}>}>
     */
    public static $doc_type_infos = array('customer_invoice' => array('payment_table' => 'paiement', 'payment_table_fk_bank' => 'fk_bank', 'doc_payment_table' => 'paiement_facture', 'doc_payment_table_fk_payment' => 'fk_paiement', 'doc_payment_table_fk_doc' => 'fk_facture', 'linked_info' => array(array('table' => 'paiement_facture', 'fk_doc' => 'fk_facture', 'fk_link' => 'fk_paiement', 'prefix' => 'p'), array('table' => 'societe_remise_except', 'fk_doc' => 'fk_facture_source', 'fk_link' => 'fk_facture', 'fk_line_link' => 'fk_facture_line', 'table_link_line' => 'facturedet', 'fk_table_link_line' => 'rowid', 'fk_table_link_line_parent' => 'fk_facture', 'prefix' => 'a', 'is_fk_link_is_also_fk_doc' => \true))), 'supplier_invoice' => array('payment_table' => 'paiementfourn', 'payment_table_fk_bank' => 'fk_bank', 'doc_payment_table' => 'paiementfourn_facturefourn', 'doc_payment_table_fk_payment' => 'fk_paiementfourn', 'doc_payment_table_fk_doc' => 'fk_facturefourn', 'linked_info' => array(array('table' => 'paiementfourn_facturefourn', 'fk_doc' => 'fk_facturefourn', 'fk_link' => 'fk_paiementfourn', 'prefix' => 'p'), array('table' => 'societe_remise_except', 'fk_doc' => 'fk_invoice_supplier_source', 'fk_link' => 'fk_invoice_supplier', 'fk_line_link' => 'fk_invoice_supplier_line', 'table_link_line' => 'facture_fourn_det', 'fk_table_link_line' => 'rowid', 'fk_table_link_line_parent' => 'fk_facture_fourn', 'prefix' => 'a', 'is_fk_link_is_also_fk_doc' => \true))));
    /**
     * letteringThirdparty
     *
     * @param int $socid Thirdparty id
     * @return int 1 OK, <0 error
     */
    public function letteringThirdparty($socid)
    {
    }
    /**
     * @param	int[]		$ids			ids array
     * @param	int			$notrigger		no trigger
     * @param	bool		$partial		Partial lettering
     * @return	int
     */
    public function updateLettering($ids = array(), $notrigger = 0, $partial = \false)
    {
    }
    /**
     * @param	int[]		$ids			ids array
     * @param	int			$notrigger		no trigger
     * @return	int							Nb of affectd rows or <0 if error
     */
    public function deleteLettering($ids, $notrigger = 0)
    {
    }
    /**
     * Lettering bookkeeping lines all types
     *
     * @param	int[]		$bookkeeping_ids		Lettering specific list of bookkeeping id
     * @param	bool		$unlettering			Do unlettering
     * @return	int									Return integer <0 if error (nb lettered = result -1), 0 if noting to lettering, >0 if OK (nb lettered)
     */
    public function bookkeepingLetteringAll($bookkeeping_ids, $unlettering = \false)
    {
    }
    /**
     * Lettering bookkeeping lines
     *
     * @param	int[]		$bookkeeping_ids		Lettering specific list of bookkeeping id
     * @param	bool		$unlettering			Do unlettering
     * @return	int									Return integer <0 if error (nb lettered = result -1), 0 if noting to lettering, >0 if OK (nb lettered)
     */
    public function bookkeepingLettering($bookkeeping_ids, $unlettering = \false)
    {
    }
    /**
     * Lettering bookkeeping lines
     *
     * @param	int[]			$bookkeeping_ids				Lettering specific list of bookkeeping id
     * @param	bool			$only_has_subledger_account		Get only lines who have subledger account
     * @return	int<-1,-1>|array<array<int,array{id:int,piece_num:int,debit:int|float,credit:int|float,lettering_code:string}>>	Return integer <0 if error otherwise all linked lines by block
     */
    public function getLinkedLines($bookkeeping_ids, $only_has_subledger_account = \true)
    {
    }
    /**
     * Get all fk_doc by doc_type from list of bank ids
     *
     * @param	int[]			$bank_ids		List of bank ids
     * @return	array<string,array<int,int>>|int						Return integer <0 if error otherwise all fk_doc by doc_type
     */
    public function getDocTypeAndFkDocFromBankLines($bank_ids)
    {
    }
    /**
     * Get all bank ids from list of document ids of a type
     *
     * @param	int[]		$document_ids	List of document id
     * @param	string		$doc_type		Type of document ('customer_invoice' or 'supplier_invoice', ...)
     * @return	array<int,int>|int<-1,-1>	Return integer <0 if error otherwise all all bank ids from list of document ids of a type
     */
    public function getBankLinesFromFkDocAndDocType($document_ids, $doc_type)
    {
    }
    /**
     * Get all linked document ids by group and type
     *
     * @param	int[]			$document_ids	List of document id
     * @param	string			$doc_type		Type of document ('customer_invoice' or 'supplier_invoice', ...)
     * @return	array<int,array<int,int>>|int<-1,-1>		Return integer <0 if error otherwise all linked document ids by group and type [ [ 'doc_type' => [ doc_id, ... ], ... ], ... ]
     */
    public function getLinkedDocumentByGroup($document_ids, $doc_type)
    {
    }
    /**
     * Get element ids grouped by link or element in common
     *
     * @param	array<array<string,int>>	$link_by_element	List of payment ids by link key
     * @param	array<string,array<int,int>>	$element_by_link	List of element ids by link key
     * @param	string				$link_key			Link key (used for recursive function)
     * @param	array<int,int>		$current_group		Current group (used for recursive function)
     * @return	array<int,array<int,int>>			List of element ids grouped by link or element in common
     */
    public function getGroupElements(&$link_by_element, &$element_by_link, $link_key = '', &$current_group = array())
    {
    }
}