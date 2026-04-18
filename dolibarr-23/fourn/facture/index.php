<?php

// Filter to show only result of one supplier
$socid = \GETPOSTINT('socid');
// Maximum elements of the tables
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$maxDraftCount = \getDolGlobalInt('MAIN_MAXLIST_OVERLOAD', 500);
$maxLatestEditCount = 5;
$maxOpenCount = \getDolGlobalInt('MAIN_MAXLIST_OVERLOAD', 500);
$tmp = \getNumberInvoicesPieChart('suppliers');
$tmp = \getDraftSupplierTable($max, $socid);
$tmp = \getPurchaseInvoiceLatestEditTable($maxLatestEditCount, $socid);
$tmp = \getPurchaseInvoiceUnpaidOpenTable($max, $socid);