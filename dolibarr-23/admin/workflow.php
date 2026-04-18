<?php

$action = \GETPOST('action', 'aZ09');
/** @var array<string,array{family:string,position:int,enabled:bool,picto?:string,warning?:string,deprecated?:int<0,1>,reloadpage?:int<0,1>}> $workflowcodes */
$workflowcodes = array(
    // Automatic creation
    'WORKFLOW_PROPAL_AUTOCREATE_ORDER' => array('family' => 'create', 'position' => 10, 'enabled' => \isModEnabled("propal") && \isModEnabled('order'), 'picto' => 'order'),
    'WORKFLOW_ORDER_AUTOCREATE_INVOICE' => array('family' => 'create', 'position' => 20, 'enabled' => \isModEnabled('order') && \isModEnabled('invoice'), 'picto' => 'bill'),
    'WORKFLOW_TICKET_CREATE_INTERVENTION' => array('family' => 'create', 'position' => 25, 'enabled' => \isModEnabled('ticket') && \isModEnabled('intervention'), 'picto' => 'ticket'),
    'separator1' => array('family' => 'separator', 'position' => 25, 'title' => '', 'enabled' => \isModEnabled("propal") && \isModEnabled('order') || \isModEnabled('order') && \isModEnabled('invoice') || \isModEnabled('ticket') && \isModEnabled('intervention')),
    // Automatic classification of proposal
    'WORKFLOW_ORDER_CLASSIFY_BILLED_PROPAL' => array('family' => 'classify_proposal', 'position' => 30, 'enabled' => \isModEnabled("propal") && \isModEnabled('order'), 'picto' => 'propal', 'warning' => ''),
    'WORKFLOW_INVOICE_CLASSIFY_BILLED_PROPAL' => array('family' => 'classify_proposal', 'position' => 31, 'enabled' => \isModEnabled("propal") && \isModEnabled('invoice'), 'picto' => 'propal', 'warning' => ''),
    // Automatic classification of order
    'WORKFLOW_ORDER_CLASSIFY_SHIPPED_SHIPPING' => array(
        // when shipping validated
        'family' => 'classify_order',
        'position' => 40,
        'enabled' => \isModEnabled("shipping") && \isModEnabled('order'),
        'picto' => 'order',
    ),
    'WORKFLOW_ORDER_CLASSIFY_SHIPPED_SHIPPING_CLOSED' => array(
        // when shipping closed
        'family' => 'classify_order',
        'position' => 41,
        'enabled' => \isModEnabled("shipping") && \isModEnabled('order'),
        'picto' => 'order',
    ),
    'WORKFLOW_INVOICE_AMOUNT_CLASSIFY_BILLED_ORDER' => array('family' => 'classify_order', 'position' => 42, 'enabled' => \isModEnabled('invoice') && \isModEnabled('order'), 'picto' => 'order', 'warning' => ''),
    // For this option, if module invoice is disabled, it does not exists, so "Classify billed" for order must be done manually from order card.
    'WORKFLOW_SUM_INVOICES_AMOUNT_CLASSIFY_BILLED_ORDER' => array('family' => 'classify_order', 'position' => 43, 'enabled' => \isModEnabled('invoice') && \isModEnabled('order'), 'picto' => 'order', 'warning' => ''),
    // For this option, if module invoice is disabled, it does not exists, so "Classify billed" for order must be done manually from order card.
    // Automatic classification supplier proposal
    'WORKFLOW_ORDER_CLASSIFY_BILLED_SUPPLIER_PROPOSAL' => array('family' => 'classify_supplier_proposal', 'position' => 60, 'enabled' => \isModEnabled('supplier_proposal') && (\isModEnabled("supplier_order") || \isModEnabled("supplier_invoice")), 'picto' => 'supplier_proposal', 'warning' => ''),
    // Automatic classification supplier order
    'WORKFLOW_ORDER_CLASSIFY_RECEIVED_RECEPTION' => array('family' => 'classify_supplier_order', 'position' => 63, 'enabled' => \getDolGlobalString('MAIN_FEATURES_LEVEL') && \isModEnabled("reception") && \isModEnabled('supplier_order'), 'picto' => 'supplier_order', 'warning' => ''),
    'WORKFLOW_ORDER_CLASSIFY_RECEIVED_RECEPTION_CLOSED' => array('family' => 'classify_supplier_order', 'position' => 64, 'enabled' => \getDolGlobalString('MAIN_FEATURES_LEVEL') && \isModEnabled("reception") && \isModEnabled('supplier_order'), 'picto' => 'supplier_order', 'warning' => ''),
    'WORKFLOW_INVOICE_AMOUNT_CLASSIFY_BILLED_SUPPLIER_ORDER' => array('family' => 'classify_supplier_order', 'position' => 65, 'enabled' => \isModEnabled("supplier_order") || \isModEnabled("supplier_invoice"), 'picto' => 'supplier_order', 'warning' => ''),
    // Automatic classification shipping
    /* Replaced by next option
    	'WORKFLOW_SHIPPING_CLASSIFY_CLOSED_INVOICE' => array(
    		'family' => 'classify_shipping',
    		'position' => 90,
    		'enabled' => isModEnabled("shipping") && isModEnabled("invoice"),
    		'picto' => 'shipment',
    		'deprecated' => 1
    	),
    	*/
    'WORKFLOW_SHIPPING_CLASSIFY_BILLED_INVOICE' => array('family' => 'classify_shipping', 'position' => 91, 'enabled' => \isModEnabled("shipping") && \isModEnabled("invoice") && \getDolGlobalString('WORKFLOW_BILL_ON_SHIPMENT') !== '0', 'picto' => 'shipment'),
    // Automatic classification reception
    /*
    'WORKFLOW_RECEPTION_CLASSIFY_CLOSED_INVOICE'=>array(
    	'family'=>'classify_reception',
    	'position'=>95,
    	'enabled'=>(isModEnabled("reception") && (isModEnabled("supplier_order") || isModEnabled("supplier_invoice"))),
    	'picto'=>'reception'
    ),
    */
    'WORKFLOW_RECEPTION_CLASSIFY_BILLED_INVOICE' => array('family' => 'classify_reception', 'position' => 91, 'enabled' => \isModEnabled("reception") && \isModEnabled("supplier_invoice") && \getDolGlobalString('WORKFLOW_BILL_ON_RECEPTION') !== '0', 'picto' => 'shipment'),
    'separator2' => array('family' => 'separator', 'position' => 400, 'enabled' => \isModEnabled('ticket') && \isModEnabled('contract')),
    // Automatic link ticket -> contract
    'WORKFLOW_TICKET_LINK_CONTRACT' => array('family' => 'link_ticket', 'position' => 500, 'enabled' => \isModEnabled('ticket') && \isModEnabled('contract'), 'picto' => 'ticket', 'reloadpage' => 1),
    // This one depends on previous one WORKFLOW_TICKET_LINK_CONTRACT
    'WORKFLOW_TICKET_USE_PARENT_COMPANY_CONTRACTS' => array('family' => 'link_ticket', 'position' => 501, 'enabled' => \isModEnabled('ticket') && \isModEnabled('contract') && \getDolGlobalString('WORKFLOW_TICKET_LINK_CONTRACT'), 'picto' => 'ticket'),
);
// remove not available workflows (based on activated modules and global defined keys)
$workflowcodes = \array_filter(
    $workflowcodes,
    /**
     * @param array{enabled:int<0,1>} $var
     * @return bool
     */
    static function ($var) {
        return (bool) $var['enabled'];
    }
);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Sort on position
$workflowcodes = \dol_sort_array($workflowcodes, 'position');
$oldfamily = '';
$tableopen = 0;
$atleastoneline = 0;