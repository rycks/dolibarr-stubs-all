<?php

$action = \GETPOST('action', 'aZ09');
$sfurl = '';
$version = '0.0';
$url = 'https://wiki.dolibarr.org/index.php/Subscribe';
$url = 'https://saas.dolibarr.org';
$title = $langs->trans("OfficialWebHostingService");
$url = 'https://partners.dolibarr.org';
$title = $langs->trans("ReferencedPreferredPartners");
$showpromotemessage = 1;
$tmp = \versiondolibarrarray();