<?php

/**
 * Class Lettering
 */
class Lettering extends \BookKeeping
{
    public static $doc_type_infos = array('customer_invoice' => array('payment_table' => 'paiement', 'payment_table_fk_bank' => 'fk_bank', 'doc_payment_table' => 'paiement_facture', 'doc_payment_table_fk_payment' => 'fk_paiement', 'doc_payment_table_fk_doc' => 'fk_facture', 'linked_info' => array(array('table' => 'paiement_facture', 'fk_doc' => 'fk_facture', 'fk_link' => 'fk_paiement', 'prefix' => 'p'), array('table' => 'societe_remise_except', 'fk_doc' => 'fk_facture_source', 'fk_link' => 'fk_facture', 'prefix' => 'a', 'is_fk_link_is_also_fk_doc' => \true))), 'supplier_invoice' => array('payment_table' => 'paiementfourn', 'payment_table_fk_bank' => 'fk_bank', 'doc_payment_table' => 'paiementfourn_facturefourn', 'doc_payment_table_fk_payment' => 'fk_paiementfourn', 'doc_payment_table_fk_doc' => 'fk_facturefourn', 'linked_info' => array(array('table' => 'paiementfourn_facturefourn', 'fk_doc' => 'fk_facturefourn', 'fk_link' => 'fk_paiementfourn', 'prefix' => 'p'), array('table' => 'societe_remise_except', 'fk_doc' => 'fk_invoice_supplier_source', 'fk_link' => 'fk_invoice_supplier', 'prefix' => 'a', 'is_fk_link_is_also_fk_doc' => \true))));
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
     *
     * @param	array		$ids			ids array
     * @param	boolean		$notrigger		no trigger
     * @return	int
     */
    public function updateLettering($ids = array(), $notrigger = \false)
    {
    }
    /**
     *
     * @param	array		$ids			ids array
     * @param	boolean		$notrigger		no trigger
     * @return	int
     */
    public function deleteLettering($ids, $notrigger = \false)
    {
    }
    /**
     * Lettering bookkeeping lines all types
     *
     * @param	array		$bookkeeping_ids		Lettering specific list of bookkeeping id
     * @param	bool		$unlettering			Do unlettering
     * @return	int									Return integer <0 if error (nb lettered = result -1), 0 if noting to lettering, >0 if OK (nb lettered)
     */
    public function bookkeepingLetteringAll($bookkeeping_ids, $unlettering = \false)
    {
    }
    /**
     * Lettering bookkeeping lines
     *
     * @param	array		$bookkeeping_ids		Lettering specific list of bookkeeping id
     * @param	bool		$unlettering			Do unlettering
     * @return	int									Return integer <0 if error (nb lettered = result -1), 0 if noting to lettering, >0 if OK (nb lettered)
     */
    public function bookkeepingLettering($bookkeeping_ids, $unlettering = \false)
    {
    }
    /**
     * Lettering bookkeeping lines
     *
     * @param	array			$bookkeeping_ids				Lettering specific list of bookkeeping id
     * @param	bool			$only_has_subledger_account		Get only lines who have subledger account
     * @return	array|int										Return integer <0 if error otherwise all linked lines by block
     */
    public function getLinkedLines($bookkeeping_ids, $only_has_subledger_account = \true)
    {
    }
    /**
     * Get all fk_doc by doc_type from list of bank ids
     *
     * @param	array			$bank_ids		List of bank ids
     * @return	array|int						Return integer <0 if error otherwise all fk_doc by doc_type
     */
    public function getDocTypeAndFkDocFromBankLines($bank_ids)
    {
    }
    /**
     * Get all bank ids from list of document ids of a type
     *
     * @param	array			$document_ids	List of document id
     * @param	string			$doc_type		Type of document ('customer_invoice' or 'supplier_invoice', ...)
     * @return	array|int						Return integer <0 if error otherwise all all bank ids from list of document ids of a type
     */
    public function getBankLinesFromFkDocAndDocType($document_ids, $doc_type)
    {
    }
    /**
     * Get all linked document ids by group and type
     *
     * @param	array			$document_ids	List of document id
     * @param	string			$doc_type		Type of document ('customer_invoice' or 'supplier_invoice', ...)
     * @return	array|int						Return integer <0 if error otherwise all linked document ids by group and type [ [ 'doc_type' => [ doc_id, ... ], ... ], ... ]
     */
    public function getLinkedDocumentByGroup($document_ids, $doc_type)
    {
    }
    /**
     * Get element ids grouped by link or element in common
     *
     * @param	array	$link_by_element	List of payment ids by link key
     * @param	array	$element_by_link	List of element ids by link key
     * @param	string	$link_key			Link key (used for recursive function)
     * @param	array	$current_group		Current group (used for recursive function)
     * @return	array						List of element ids grouped by link or element in common
     */
    public function getGroupElements(&$link_by_element, &$element_by_link, $link_key = '', &$current_group = array())
    {
    }
}