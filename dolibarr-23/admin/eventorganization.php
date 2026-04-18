<?php

// Parameters
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'myobject';
$arrayofparameters = array(
    'EVENTORGANIZATION_TASK_LABEL' => array('type' => 'textarea', 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_CATEG_THIRDPARTY_CONF' => array('type' => 'category:' . \Categorie::TYPE_CUSTOMER, 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_CATEG_THIRDPARTY_BOOTH' => array('type' => 'category:' . \Categorie::TYPE_CUSTOMER, 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_FILTERATTENDEES_CAT' => array('type' => 'category:' . \Categorie::TYPE_CUSTOMER, 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_FILTERATTENDEES_TYPE' => array('type' => 'thirdparty_type:', 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_TEMPLATE_EMAIL_ASK_CONF' => array('type' => 'emailtemplate:conferenceorbooth', 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_TEMPLATE_EMAIL_ASK_BOOTH' => array('type' => 'emailtemplate:conferenceorbooth', 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_TEMPLATE_EMAIL_AFT_SUBS_BOOTH' => array('type' => 'emailtemplate:conferenceorbooth', 'enabled' => 1, 'css' => ''),
    'EVENTORGANIZATION_TEMPLATE_EMAIL_AFT_SUBS_EVENT' => array('type' => 'emailtemplate:conferenceorbooth', 'enabled' => 1, 'css' => ''),
    //'EVENTORGANIZATION_TEMPLATE_EMAIL_BULK_SPEAKER'=>array('type'=>'emailtemplate:conferenceorbooth', 'enabled'=>1, 'css' => ''),
    //'EVENTORGANIZATION_TEMPLATE_EMAIL_BULK_ATTENDES'=>array('type'=>'emailtemplate:conferenceorbooth', 'enabled'=>1, 'css' => ''),
    'SERVICE_BOOTH_LOCATION' => array('type' => 'product', 'enabled' => 1, 'css' => 'maxwidth500'),
    'SERVICE_CONFERENCE_ATTENDEE_SUBSCRIPTION' => array('type' => 'product', 'enabled' => 1, 'css' => 'maxwidth500'),
);
$error = 0;
$setupnotempty = 0;
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$maskconstorder = \GETPOST('maskconstorder', 'aZ09');
$maskorder = \GETPOST('maskorder', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$page_name = "EventOrganizationSetup";
// Subheader
$linkback = '<a href="' . ($backtopage ? $backtopage : \DOL_URL_ROOT . '/admin/modules.php?restore_lastsearch_values=1') . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
// Configuration header
$head = \eventorganizationAdminPrepareHead();