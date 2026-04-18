<?php

$module = $object->element;
$formcompany = new \FormCompany($db);
$companystatic = new \Societe($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
// Prepare list
// TODO: replace this with 1 single direct SQL (for both internal and external string to use $db->sort($sortfield, $sortorder)
$list = array();
$sortfield = \GETPOST("sortfield", "aZ09comma");
$sortorder = \GETPOST("sortorder", 'aZ09comma');
// Re-sort list
$list = \dol_sort_array($list, $sortfield, $sortorder, 1, 0, 1);
$arrayfields = array('rowid' => array('label' => $langs->trans("Id"), 'checked' => 1), 'nature' => array('label' => $langs->trans("NatureOfContact"), 'checked' => 1), 'thirdparty' => array('label' => $langs->trans("ThirdParty"), 'checked' => 1), 'contact' => array('label' => $langs->trans("Users") . ' | ' . $langs->trans("Contacts"), 'checked' => 1), 'type' => array('label' => $langs->trans("ContactType"), 'checked' => 1), 'status' => array('label' => $langs->trans("Status"), 'checked' => 1), 'link' => array('label' => $langs->trans("Link"), 'checked' => 1));
$param = 'id=' . $object->id . '&mainmenu=home';
$colspan = 5 + ($permission ? 1 : 0);