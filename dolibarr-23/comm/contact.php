<?php

$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
$type = \GETPOST('type', 'alpha');
$search_lastname = \GETPOST('search_nom') ? \GETPOST('search_nom') : \GETPOST('search_lastname');
// For backward compatibility
$search_firstname = \GETPOST('search_firstname') ? \GETPOST('search_firstname') : \GETPOST('search_firstname');
// For backward compatibility
$search_company = \GETPOST('search_societe') ? \GETPOST('search_societe') : \GETPOST('search_company');
// For backward compatibility
$contactname = \GETPOST('contactname');
$begin = \GETPOST('begin', 'alpha');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $socid, '');
$urlfiche = \null;
/*
 * List mode
 */
$sql = "SELECT s.rowid, s.nom as name, st.libelle as stcomm,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);