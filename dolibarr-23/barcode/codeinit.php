<?php

// Choice of print year or current year.
$now = \dol_now();
$year = \dol_print_date($now, '%Y');
$month = \dol_print_date($now, '%m');
$day = \dol_print_date($now, '%d');
$eraseallproductbarcode = \GETPOST('eraseallproductbarcode');
$eraseallthirdpartybarcode = \GETPOST('eraseallthirdpartybarcode');
$action = \GETPOST('action', 'aZ09');
$modBarCodeProduct = '';
$modBarCodeThirdparty = '';
$maxperinit = \getDolGlobalInt('BARCODE_INIT_MAX', 1000);
/*
 * Actions
 */
$error = 0;
$action = '';
$action = '';
$nbproductno = $nbproducttotal = 0;
$sql = "SELECT count(rowid) as nb, fk_product_type, datec";
$resql = $db->query($sql);
$sql = "SELECT count(rowid) as nb FROM " . \MAIN_DB_PREFIX . "product";
$resql = $db->query($sql);
$disabledproduct = $disabledproduct1 = 0;
$titleno = '';
//print '<input type="checkbox" id="erasealreadyset" name="erasealreadyset"> '.$langs->trans("ResetBarcodeForAllRecords").'<br>';
$moretagsproduct1 = $disabledproduct || $disabledproduct1 ? ' disabled title="' . \dol_escape_htmltag($titleno) . '"' : '';
$moretagsproduct2 = $nbproductno == $nbproducttotal ? ' disabled' : '';
$nbthirdpartyno = $nbthirdpartytotal = 0;
$sql = "SELECT count(rowid) as nb FROM " . \MAIN_DB_PREFIX . "societe where barcode IS NULL or barcode = ''";
$resql = $db->query($sql);
$sql = "SELECT count(rowid) as nb FROM " . \MAIN_DB_PREFIX . "societe";
$resql = $db->query($sql);
$disabledthirdparty = $disabledthirdparty1 = 0;
$titleno = '';
$moretagsthirdparty1 = $disabledthirdparty || $disabledthirdparty1 ? ' disabled title="' . \dol_escape_htmltag($titleno) . '"' : '';
$moretagsthirdparty2 = $nbthirdpartyno == $nbthirdpartytotal ? ' disabled' : '';