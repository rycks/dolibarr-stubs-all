<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$action = \GETPOST('action', 'aZ09');
$file = \urldecode(\GETPOST('file', 'alpha'));
$section = \GETPOST("section", 'alpha');
$module = \GETPOST("module", 'alpha');
$urlsource = \GETPOST("urlsource", 'alpha');
$search_doc_ref = \GETPOST('search_doc_ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST("sortfield", 'aZ09comma');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$showonrightsize = '';
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$rootdirfordoc = $conf->ecm->dir_output;
$upload_dir = \dirname(\str_replace("../", "/", $rootdirfordoc . '/' . $file));
$ecmdir = new \EcmDirectory($db);
$type = 'directory';
//print '<!-- Page called with mode='.dol_escape_htmltag(isset($mode)?$mode:'').' type='.dol_escape_htmltag($type).' module='.dol_escape_htmltag($module).' url='.dol_escape_htmltag($url).' '.dol_escape_htmltag($_SERVER["PHP_SELF"]).'?'.dol_escape_htmltag($_SERVER["QUERY_STRING"]).' -->'."\n";
$param = ($sortfield ? '&sortfield=' . \urlencode($sortfield) : '') . ($sortorder ? '&sortorder=' . \urlencode($sortorder) : '');
$formfile = new \FormFile($db);
$maxlengthname = 40;
$excludefiles = array('^SPECIMEN\\.pdf$', '^\\.', '(\\.meta|_preview.*\\.png)$', '^temp$', '^payments$', '^CVS$', '^thumbs$');
$sorting = \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC;
// Right area. If module is defined here, we are in automatic ecm.
$automodules = array('company', 'invoice', 'invoice_supplier', 'propal', 'supplier_proposal', 'order', 'order_supplier', 'contract', 'product', 'tax', 'tax-vat', 'salaries', 'project', 'project_task', 'fichinter', 'user', 'expensereport', 'holiday', 'recruitment-recruitmentcandidature', 'banque', 'bank-statement', 'chequereceipt', 'mrp-mo');
$parameters = array('modulepart' => $module);
$reshook = $hookmanager->executeHooks('addSectionECMAuto', $parameters);
// Bottom of page
$useajax = 1;
$urlfile = '';
$section_id = $section;
$form = new \Form($db);
$formquestion = array();