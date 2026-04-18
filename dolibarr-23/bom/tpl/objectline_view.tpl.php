<?php

// Lines for extrafield
$objectline = new \BOMLine($object->db);
$coldisplay = 0;
$tmpproduct = new \Product($object->db);
$tmpbom = new \BOM($object->db);
$res = $tmpbom->fetch((int) $line->fk_bom_child);
$temps = $line->showOptionals($extrafields, 'view', array(), '', '', '1', 'line');
$workstation = new \Workstation($object->db);
$res = $workstation->fetch($line->fk_default_workstation);
// Cost
$total_cost = 0;
// Select of all the sub-BOM lines
// From this point to the end of the file, we only take care of sub-BOM lines
$sql = 'SELECT rowid, fk_bom_child, fk_product, qty FROM ' . \MAIN_DB_PREFIX . 'bom_bomline AS bl';
$resql = $object->db->query($sql);