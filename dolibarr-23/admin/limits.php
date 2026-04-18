<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$currencycode = \GETPOST('currencycode', 'alpha');
$mainmaxdecimalsunit = 'MAIN_MAX_DECIMALS_UNIT' . (!empty($currencycode) ? '_' . $currencycode : '');
$mainmaxdecimalstot = 'MAIN_MAX_DECIMALS_TOT' . (!empty($currencycode) ? '_' . $currencycode : '');
$mainmaxdecimalsshown = 'MAIN_MAX_DECIMALS_SHOWN' . (!empty($currencycode) ? '_' . $currencycode : '');
$mainroundingruletot = 'MAIN_ROUNDING_RULE_TOT' . (!empty($currencycode) ? '_' . $currencycode : '');
$valmainmaxdecimalsunit = \GETPOSTINT($mainmaxdecimalsunit);
$valmainmaxdecimalstot = \GETPOSTINT($mainmaxdecimalstot);
$valmainmaxdecimalsshown = \GETPOST($mainmaxdecimalsshown, 'alpha');
// Can be 'x.y' but also 'x...'
$valmainroundingruletot = \price2num(\GETPOST($mainroundingruletot, 'alphanohtml'), '', 2);
$error = 0;
$MAXDEC = 8;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("LimitsSetup");
$help_url = '';
$aCurrencies = array(\getDolCurrency());
$sql = "SELECT rowid, code FROM " . \MAIN_DB_PREFIX . "multicurrency";
// Default currency always first position
$resql = $db->query($sql);