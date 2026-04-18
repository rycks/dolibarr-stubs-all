<?php

// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'propal', $socid, '');
/*
 *	View
 */
$companystatic = new \Societe($db);
/*
 * Prospects par statut
 */
$sql = "SELECT count(*) as cc, st.libelle as stcomm, st.picto, st.id";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$sql = "SELECT p.rowid, p.ref, p.price, s.nom as sname";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);
$sql = "SELECT s.nom as name, s.rowid as socid, s.client, s.canvas,";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);
/*
 * Companies to contact
 */
$sql = "SELECT s.nom as name, s.rowid as socid, s.client, s.canvas";
// If the internal user must only see his customers, force searching by him
$search_sale = 0;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;