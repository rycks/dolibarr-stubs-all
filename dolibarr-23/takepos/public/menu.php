<?php

\define("NOLOGIN", '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
$categorie = new \Categorie($db);
$categories = $categorie->get_full_arbo('product', \getDolGlobalInt('TAKEPOS_ROOT_CATEGORY_ID') > 0 ? $conf->global->TAKEPOS_ROOT_CATEGORY_ID : 0, 1);
$levelofrootcategory = 0;
$levelofmaincategories = $levelofrootcategory + 1;
$maincategories = array();
$subcategories = array();
$maincategories = \dol_sort_array($maincategories, 'label');