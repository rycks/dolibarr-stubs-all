<?php

$ok = 0;
// This page may be long. We are increasing the time allowed.
// Only works if not in safe_mode.
$err = \error_reporting();
$setuplang = \GETPOST("selectlang", 'aZ09', 3) ? \GETPOST("selectlang", 'aZ09', 3) : 'auto';
/*
 * View
 */
$form = new \Form($db);
// Action to launch the repair script
$actiondone = 1;
$error = 0;
$db = \getDoliDBInstance($conf->db->type, $conf->db->host, $conf->db->user, $conf->db->pass, $conf->db->name, (int) $conf->db->port);
$warning_using_utf8mb4 = '';
$sections = ['Standard' => [['name' => 'standard', 'info' => '']], 'Modules' => [['name' => 'force_disable_of_modules_not_found', 'info' => 'Disable modules not found']], 'Files' => [['name' => 'restore_thirdparties_logos', 'info' => 'Restore logos for thirdparties'], ['name' => 'restore_user_pictures', 'info' => 'Restore user pictures'], ['name' => 'rebuild_product_thumbs', 'info' => 'Rebuild product thumbnails'], ['name' => 'repair_mailing_path', 'info' => 'Repair path of mailing files', 'tooltip' => 'Should be applied when using emailing module with > 99 mailings. In that case, please also set MAILING_USE_NEW_PATH_FOR_FILES.']], 'Clean tables and data' => [['name' => 'clean_linked_elements', 'info' => 'Clean linked elements'], ['name' => 'clean_menus', 'info' => 'Clean menus'], ['name' => 'clean_orphelin_dir', 'info' => 'Clean orphan directories'], ['name' => 'clean_product_stock_batch', 'info' => 'Clean product stock batch'], ['name' => 'clean_perm_table', 'info' => 'Clean permissions table'], ['name' => 'clean_ecm_files_table', 'info' => 'Clean ECM files table'], ['name' => 'repair_link_dispatch_lines_supplier_order_lines', 'info' => 'Repair link between dispatch lines and supplier order lines']], 'Init data' => [['name' => 'set_empty_time_spent_amount', 'info' => 'Init empty time spent amount']], 'Structure' => [['name' => 'force_utf8_on_tables', 'info' => 'Force utf8 + row=dynamic, for mysql/mariadb only'], ['name' => 'force_utf8mb4_on_tables', 'info' => 'Force utf8mb4 + row=dynamic, for mysql/mariadb only' . $warning_using_utf8mb4], ['name' => 'force_collation_from_conf_on_tables', 'info' => 'Force ' . $conf->db->character_set . '/' . $conf->db->dolibarr_main_db_collation . ' + row=dynamic, for mysql/mariadb only']], 'Rebuild sequence' => [['name' => 'rebuild_sequences', 'info' => 'For postgresql only']]];
/* Start action here */
$oneoptionset = 0;
$oneoptionset = \GETPOST('standard', 'alpha') || \GETPOST('restore_thirdparties_logos', 'alpha') || \GETPOST('clean_linked_elements', 'alpha') || \GETPOST('clean_menus', 'alpha') || \GETPOST('clean_orphelin_dir', 'alpha') || \GETPOST('clean_product_stock_batch', 'alpha') || \GETPOST('set_empty_time_spent_amount', 'alpha') || \GETPOST('rebuild_product_thumbs', 'alpha') || \GETPOST('clean_perm_table', 'alpha') || \GETPOST('clean_ecm_files_table', 'alpha') || \GETPOST('force_disable_of_modules_not_found', 'alpha') || \GETPOST('force_utf8_on_tables', 'alpha') || \GETPOST('force_utf8mb4_on_tables', 'alpha') || \GETPOST('force_collation_from_conf_on_tables', 'alpha') || \GETPOST('rebuild_sequences', 'alpha') || \GETPOST('recalculateinvoicetotal', 'alpha') || \GETPOST('repair_mailing_path', 'alpha');
$dir = "mysql/migration/";
$filelist = array();
$i = 0;
$ok = 0;
// Recupere list fichier
$filesindir = array();
$handle = \opendir($dir);
$sql = "SELECT name, entity, value";
$resql = $db->query($sql);
$sql = "SELECT file, entity FROM " . \MAIN_DB_PREFIX . "boxes_def";
$resql = $db->query($sql);
//$exts=array('gif','png','jpg');
$ext = '';
$sql = "SELECT s.rowid, s.nom as name, s.logo FROM " . \MAIN_DB_PREFIX . "societe as s ORDER BY s.nom";
$resql = $db->query($sql);
//$exts=array('gif','png','jpg');
$ext = '';
$sql = "SELECT s.rowid, s.firstname, s.lastname, s.login, s.photo FROM " . \MAIN_DB_PREFIX . "user as s ORDER BY s.rowid";
$resql = $db->query($sql);
$ext = '';
$sql = "SELECT s.rowid, s.ref FROM " . \MAIN_DB_PREFIX . "product as s ORDER BY s.ref";
$resql = $db->query($sql);
$sql = "SELECT rowid, module";
$resql = $db->query($sql);
$methodtofix = '';
$methodtofix = \GETPOST('methodtofix', 'alpha') ? \GETPOST('methodtofix', 'alpha') : 'updatestock';
$sql = "SELECT p.rowid, p.ref, p.tobatch, ps.rowid as psrowid, ps.fk_entrepot, ps.reel, SUM(pb.qty) as reelbatch";
$resql = $db->query($sql);
$sql = "SELECT p.rowid, p.ref, p.tobatch, ps.rowid as psrowid, ps.fk_entrepot, ps.reel, SUM(pb.qty) as reelbatch";
$resql = $db->query($sql);
$sql = "SELECT COUNT(ptt.rowid) as nb, u.rowid as user_id, u.login, u.thm as user_thm";
$resql = $db->query($sql);
$listofmods = '';
$sql = "SELECT id, libelle as label, module from " . \MAIN_DB_PREFIX . "rights_def WHERE module NOT IN (" . $db->sanitize($listofmods, 1) . ") AND id > 100000";
$resql = $db->query($sql);
$MAXTODELETE = 100;
$sql = "SELECT rowid, filename, filepath, entity from " . \MAIN_DB_PREFIX . "ecm_files";
$nbfile = 0;
$nbfiletodelete = 0;
$resql = $db->query($sql);
/*
 * This script is meant to be run when upgrading from a dolibarr version < 3.8
 * to a newer version.
 *
 * Version 3.8 introduces a new column in llx_commande_fournisseur_dispatch, which
 * matches the dispatch to a specific supplier order line (so that if there are
 * several with the same product, the user can specifically tell which products of
 * which line were dispatched where).
 *
 * However when migrating, the new column has a default value of 0, which means that
 * old supplier orders whose lines were dispatched using the old dolibarr version
 * have unspecific dispatch lines, which are not taken into account by the new version,
 * thus making the order look like it was never dispatched at all.
 *
 * This scripts sets this foreign key to the first matching supplier order line whose
 * product (and supplier order of course) are the same as the dispatch’s.
 *
 * If the dispatched quantity is more than indicated on the order line (this happens if
 * there are several order lines for the same product), it creates new dispatch lines
 * pointing to the other order lines accordingly, until all the dispatched quantity is
 * accounted for.
 */
$repair_link_dispatch_lines_supplier_order_lines = \GETPOST('repair_link_dispatch_lines_supplier_order_lines', 'alpha');
$sql_dispatch = 'SELECT * FROM ' . \MAIN_DB_PREFIX . 'receptiondet_batch WHERE COALESCE(fk_elementdet, 0) = 0';
$resql_dispatch = $db->query($sql_dispatch);
$n_processed_rows = 0;
$errors = array();
$err = 0;
// Query to find all duplicate supplier orders
$sql = "SELECT * FROM " . \MAIN_DB_PREFIX . "commande_fournisseur";
// Build a list of ref => []CommandeFournisseur
$duplicateSupplierOrders = [];
$resql = $db->query($sql);
$err = 0;
$sql = "\n\t\tSELECT\n\t\t\tf.rowid,\n\t\t\tSUM(fd.total_ht) as total_ht\n\t\tFROM " . \MAIN_DB_PREFIX . "facture f\n\t\t\tLEFT JOIN " . \MAIN_DB_PREFIX . "facturedet fd\n\t\t\t\tON fd.fk_facture = f.rowid\n\t\tWHERE f.total_ht = 0\n\t\tGROUP BY fd.fk_facture HAVING SUM(fd.total_ht) <> 0";
$resql = $db->query($sql);
$sav_user = \is_object($user) ? clone $user : $user;
/**
 * Migrate file from old path to new one for mailing $mailing
 *
 * @param 	Mailing $mailing		Object mailing
 * @return 	void
 */
function migrate_mailing_filespath($mailing)
{
}
$mailing = new \Mailing($db);
$sql = "SELECT rowid as mid from " . \MAIN_DB_PREFIX . "mailing";
// Get list of all mailing
$resql = $db->query($sql);
$user = $sav_user;