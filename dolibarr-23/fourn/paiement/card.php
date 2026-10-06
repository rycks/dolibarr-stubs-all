<?php

/**
 *	List of seller's invoices
 */
$sql = 'SELECT f.rowid, f.rowid as facid, f.ref, f.ref_supplier, f.type, f.paye, f.total_ht, f.total_tva, f.total_ttc, f.datef as date, f.fk_statut as status,';