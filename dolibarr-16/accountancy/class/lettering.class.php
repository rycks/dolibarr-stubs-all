<?php

/**
 * Class Lettering
 */
class Lettering extends \BookKeeping
{
    /**
     * @var BookKeeping[] 	Bookkeeping cached
     */
    public static $bookkeeping_cached = array();
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
     * @return	int									<0 if error (nb lettered = result -1), 0 if noting to lettering, >0 if OK (nb lettered)
     */
    public function bookkeepingLetteringAll($bookkeeping_ids, $unlettering = \false)
    {
    }
    /**
     * Lettering bookkeeping lines
     *
     * @param	array		$bookkeeping_ids		Lettering specific list of bookkeeping id
     * @param	string		$type					Type of bookkeeping type to lettering ('customer_invoice' or 'supplier_invoice')
     * @param	bool		$unlettering			Do unlettering
     * @return	int									<0 if error (nb lettered = result -1), 0 if noting to lettering, >0 if OK (nb lettered)
     */
    public function bookkeepingLettering($bookkeeping_ids, $type = 'customer_invoice', $unlettering = \false)
    {
    }
    /**
     * Lettering bookkeeping lines
     *
     * @param	array			$bookkeeping_ids		Lettering specific list of bookkeeping id
     * @param	string			$type					Type of bookkeeping type to lettering ('customer_invoice' or 'supplier_invoice')
     * @return	array|int								<0 if error otherwise all linked lines by block
     */
    public function getLinkedLines($bookkeeping_ids, $type = 'customer_invoice')
    {
    }
    /**
     * Linked payment by group
     *
     * @param	array			$payment_ids			list of payment id
     * @param	string			$type					Type of bookkeeping type to lettering ('customer_invoice' or 'supplier_invoice')
     * @return	array|int								<0 if error otherwise all linked lines by block
     */
    public function getLinkedPaymentByGroup($payment_ids, $type)
    {
    }
    /**
     * Get payment ids grouped by payment id and element id in common
     *
     * @param	array	$payment_by_element		List of payment ids by element id
     * @param	array	$element_by_payment		List of element ids by payment id
     * @param	int		$element_id				Element Id (used for recursive function)
     * @param	array	$current_group			Current group (used for recursive function)
     * @return	array							List of payment ids grouped by payment id and element id in common
     */
    public function getGroupElements(&$payment_by_element, &$element_by_payment, $element_id = 0, &$current_group = array())
    {
    }
}