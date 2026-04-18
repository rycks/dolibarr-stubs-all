<?php

// Filter to show only result of one customer
$socid = \GETPOSTINT('socid');
// Maximum elements of the tables
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
$maxDraftCount = \getDolGlobalInt('MAIN_MAXLIST_OVERLOAD', $max);
$maxOpenCount = \getDolGlobalInt('MAIN_MAXLIST_OVERLOAD', $max);
$tmp = \getNumberInvoicesPieChart('customers');
$tmp = \getCustomerInvoiceDraftTable($maxDraftCount, $socid);
$tmp = \getCustomerInvoiceLatestEditTable($max, $socid);
$tmp = \getCustomerInvoiceUnpaidOpenTable($maxOpenCount, $socid);