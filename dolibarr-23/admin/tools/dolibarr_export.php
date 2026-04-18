<?php

$action = \GETPOST('action', 'aZ09');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
$action = '';
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$label = $db::LABEL;
$type = $db->type;
//var_dump($db);
$help_url = 'EN:Backups|FR:Sauvegardes|ES:Copias_de_seguridad';
$title = $langs->trans("Backup");
$title = $langs->trans("BackupDumpWizard");
$execmethod = 0;
$prefix = 'dump';
$ext = '.sql';
$file = $prefix . '_' . $dolibarr_main_db_name . '_' . \dol_sanitizeFileName(\DOL_VERSION) . '_' . \dol_print_date(\dol_now('gmt'), "dayhourlogsmall", 'tzuser') . '.' . $ext;
// Define compressions array
$compression = array();
$i = 0;
$filearray = \dol_dir_list($conf->admin->dir_output . '/backup', 'files', 0, '', '', $sortfield, \strtolower($sortorder) == 'asc' ? \SORT_ASC : \SORT_DESC, 1);
$result = $formfile->list_of_documents($filearray, \null, 'systemtools', '', 1, 'backup/', 1, 3, $langs->trans("NoBackupFileAvailable"), 0, $langs->trans("PreviousDumpFiles"), '', 0, -1, '', '', 'ASC', 1, 0, -1, 'style="height:250px; overflow: auto;"');
$title = $langs->trans("BackupZipWizard");
$prefix = 'documents';
$ext = 'zip';
$file = $prefix . '_' . $dolibarr_main_db_name . '_' . \dol_sanitizeFileName(\DOL_VERSION) . '_' . \dol_print_date(\dol_now('gmt'), "dayhourlogsmall", 'tzuser');
$filecompression = $compression;
$i = 0;
$filearray = \dol_dir_list($conf->admin->dir_output . '/documents', 'files', 0, '', '', $sortfield, \strtolower($sortorder) == 'asc' ? \SORT_ASC : \SORT_DESC, 1);
$result = $formfile->list_of_documents($filearray, \null, 'systemtools', '', 1, 'documents/', 1, 3, $langs->trans("NoBackupFileAvailable"), 0, $langs->trans("PreviousArchiveFiles"), '', 0, -1, '', '', 'ASC', 1, 0, -1, 'style="height:250px; overflow: auto;"');