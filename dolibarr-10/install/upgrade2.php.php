<?php

/**
 * Reporte liens vers une facture de paiements sur table de jointure (lien n-n paiements factures)
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_paiements($db, $langs, $conf)
{
}
/**
 * Corrige paiement orphelins (liens paumes suite a bugs)
 * Pour verifier s'il reste des orphelins:
 * select * from llx_paiement as p left join llx_paiement_facture as pf on pf.fk_paiement=p.rowid WHERE pf.rowid IS NULL AND (p.fk_facture = 0 OR p.fk_facture IS NULL)
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_paiements_orphelins_1($db, $langs, $conf)
{
}
/**
 * Corrige paiement orphelins (liens paumes suite a bugs)
 * Pour verifier s'il reste des orphelins:
 * select * from llx_paiement as p left join llx_paiement_facture as pf on pf.fk_paiement=p.rowid WHERE pf.rowid IS NULL AND (p.fk_facture = 0 OR p.fk_facture IS NULL)
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_paiements_orphelins_2($db, $langs, $conf)
{
}
/**
 * Mise a jour des contrats (gestion du contrat + detail de contrat)
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_contracts_det($db, $langs, $conf)
{
}
/**
 * Function to migrate links into llx_bank_url
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_links_transfert($db, $langs, $conf)
{
}
/**
 * Mise a jour des date de contrats non renseignees
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_contracts_date1($db, $langs, $conf)
{
}
/*
 * Mise a jour date contrat avec date min effective mise en service si inferieur
 */
function migrate_contracts_date2($db, $langs, $conf)
{
}
/**
 * Mise a jour des dates de creation de contrat
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_contracts_date3($db, $langs, $conf)
{
}
/**
 * Reouverture des contrats qui ont au moins une ligne non fermee
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_contracts_open($db, $langs, $conf)
{
}
/**
 * Factures fournisseurs
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_paiementfourn_facturefourn($db, $langs, $conf)
{
}
/**
 * Mise a jour des totaux lignes de facture
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_price_facture($db, $langs, $conf)
{
}
/**
 * Mise a jour des totaux lignes de propal
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_price_propal($db, $langs, $conf)
{
}
/**
 * Update total of contract lines
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_price_contrat($db, $langs, $conf)
{
}
/**
 * Mise a jour des totaux lignes de commande
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_price_commande($db, $langs, $conf)
{
}
/**
 * Mise a jour des totaux lignes de commande fournisseur
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_price_commande_fournisseur($db, $langs, $conf)
{
}
/**
 * Mise a jour des modeles selectionnes
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_modeles($db, $langs, $conf)
{
}
/**
 * Correspondance des expeditions et des commandes clients dans la table llx_co_exp
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_commande_expedition($db, $langs, $conf)
{
}
/**
 * Correspondance des livraisons et des commandes clients dans la table llx_co_liv
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_commande_livraison($db, $langs, $conf)
{
}
/**
 * Migration des details commandes dans les details livraisons
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_detail_livraison($db, $langs, $conf)
{
}
/**
 * Migration du champ stock dans produits
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_stocks($db, $langs, $conf)
{
}
/**
 * Migration of menus (use only 1 table instead of 3)
 * 2.6 -> 2.7
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_menus($db, $langs, $conf)
{
}
/**
 * Migration du champ fk_adresse_livraison dans expedition
 * 2.6 -> 2.7
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_commande_deliveryaddress($db, $langs, $conf)
{
}
/**
 * Migration du champ fk_remise_except dans llx_facturedet doit correspondre a
 * lien dans llx_societe_remise_except vers llx_facturedet
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	integer|null
 */
function migrate_restore_missing_links($db, $langs, $conf)
{
}
/**
 * Migration du champ fk_user_resp de llx_projet vers llx_element_contact
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_project_user_resp($db, $langs, $conf)
{
}
/**
 * Migration de la table llx_projet_task_actors vers llx_element_contact
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_project_task_actors($db, $langs, $conf)
{
}
/**
 * Migration des tables de relation
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @param	string		$table			Table name
 * @param	int			$fk_source		Id of element source
 * @param	string		$sourcetype		Type of element source
 * @param	int			$fk_target		Id of element target
 * @param	string		$targettype		Type of element target
 * @return	void
 */
function migrate_relationship_tables($db, $langs, $conf, $table, $fk_source, $sourcetype, $fk_target, $targettype)
{
}
/**
 * Migrate duration in seconds
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_project_task_time($db, $langs, $conf)
{
}
/**
 * Migrate order ref_customer and date_delivery fields to llx_expedition
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_customerorder_shipping($db, $langs, $conf)
{
}
/**
 * Migrate link stored into fk_expedition into llx_element_element
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_shipping_delivery($db, $langs, $conf)
{
}
/**
 * We try to complete field ref_customer and date_delivery that are empty into llx_livraison.
 * We set them with value from llx_expedition.
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_shipping_delivery2($db, $langs, $conf)
{
}
/**
 * Migrate link stored into fk_xxxx into fk_element and elementtype
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_actioncomm_element($db, $langs, $conf)
{
}
/**
 * Migrate link stored into fk_mode_reglement
 *
 * @param	DoliDB		$db		Database handler
 * @param	Translate	$langs	Object langs
 * @param	Conf		$conf	Object conf
 * @return	void
 */
function migrate_mode_reglement($db, $langs, $conf)
{
}
/**
 * Delete duplicates in table categorie_association
 *
 * @param	DoliDB		$db			Database handler
 * @param	Translate	$langs		Object langs
 * @param	Conf		$conf		Object conf
 * @return	void
 */
function migrate_clean_association($db, $langs, $conf)
{
}
/**
 * Migrate categorie association
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_categorie_association($db, $langs, $conf)
{
}
/**
 * Migrate event assignement to owner
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_event_assignement($db, $langs, $conf)
{
}
/**
 * Migrate event assignement to owner
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_event_assignement_contact($db, $langs, $conf)
{
}
/**
 * Migrate to reset the blocked log for V7+ algorithm
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_reset_blocked_log($db, $langs, $conf)
{
}
/**
 * Migrate to add entity value into llx_societe_remise
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_remise_entity($db, $langs, $conf)
{
}
/**
 * Migrate to add entity value into llx_societe_remise_except
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_remise_except_entity($db, $langs, $conf)
{
}
/**
 * Migrate to add entity value into llx_user_rights
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_user_rights_entity($db, $langs, $conf)
{
}
/**
 * Migrate to add entity value into llx_usergroup_rights
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @return	void
 */
function migrate_usergroup_rights_entity($db, $langs, $conf)
{
}
/**
 * Migration directory
 *
 * @param	DoliDB		$db			Database handler
 * @param	Translate	$langs		Object langs
 * @param	Conf		$conf		Object conf
 * @param	string		$oldname	Old name (relative to DOL_DATA_ROOT)
 * @param	string		$newname	New name (relative to DOL_DATA_ROOT)
 * @return	void
 */
function migrate_rename_directories($db, $langs, $conf, $oldname, $newname)
{
}
/**
 * Delete deprecated files
 *
 * @param	DoliDB		$db			Database handler
 * @param	Translate	$langs		Object langs
 * @param	Conf		$conf		Object conf
 * @return	void
 */
function migrate_delete_old_files($db, $langs, $conf)
{
}
/**
 * Remove deprecated directories
 *
 * @param	DoliDB		$db			Database handler
 * @param	Translate	$langs		Object langs
 * @param	Conf		$conf		Object conf
 * @return	void
 */
function migrate_delete_old_dir($db, $langs, $conf)
{
}
/**
 * Disable/Reenable features modules.
 * We must do this when internal menu of module or permissions has changed
 * or when triggers have moved.
 *
 * @param	DoliDB		$db				Database handler
 * @param	Translate	$langs			Object langs
 * @param	Conf		$conf			Object conf
 * @param	array		$listofmodule	List of modules
 * @param   int         $force          1=Reload module even if not already loaded
 * @return	void
 */
function migrate_reload_modules($db, $langs, $conf, $listofmodule = array(), $force = 0)
{
}
/**
 * Reload menu if dynamic menus, if modified by version
 *
 * @param	DoliDB		$db			Database handler
 * @param	Translate	$langs		Object langs
 * @param	Conf		$conf		Object conf
 * @param	string		$versionto	Version target
 * @return	void
 */
function migrate_reload_menu($db, $langs, $conf, $versionto)
{
}
/**
 * Migrate file from old path to new one for users
 *
 * @return	void
 */
function migrate_user_photospath()
{
}