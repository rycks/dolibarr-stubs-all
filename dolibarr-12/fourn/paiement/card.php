<?php

/**
 *	Liste des factures
 */
$sql = 'SELECT f.rowid, f.ref, f.ref_supplier, f.total_ttc, pf.amount, f.rowid as facid, f.paye, f.fk_statut, s.nom as name, s.rowid as socid';