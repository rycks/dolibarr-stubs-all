<?php

$qtytoconsumeforline = $this->tpl['qty'] / (!empty($this->tpl['efficiency']) ? $this->tpl['efficiency'] : 1);
/*if ((empty($this->tpl['qty_frozen']) && $this->tpl['qty_bom'] > 1)) {
	$qtytoconsumeforline = $qtytoconsumeforline / $this->tpl['qty_bom'];
}*/
$qtytoconsumeforline = \price2num($qtytoconsumeforline, 'MS');
$tmpproduct = new \Product($db);
$tmpbom = new \BOM($db);
$res = 0;
//print '<td class="right">'.$this->tpl['efficiency'].'</td>';
$selected = 1;
// Select of all the sub-BOM lines
$sql = 'SELECT rowid, fk_bom_child, fk_product, qty FROM ' . \MAIN_DB_PREFIX . 'bom_bomline AS bl';
$resql = $db->query($sql);