<?php

$formproduct = new \FormProduct($object->db);
// Define colspan for the button 'Add'
$colspan = 3;
// Columns: total ht + col edit + col delete
//print $object->element;
// Lines for extrafield
$objectline = new \BOMLine($this->db);
$nolinesbefore = \count($this->lines) == 0 || $forcetoshowtitlelines;
$coldisplay = 0;
$statustoshow = -1;
$urltocreateproduct = \DOL_URL_ROOT . '/product/card.php?action=create' . ($filtertype == 1 ? '&leftmenu=service&type=1' : '&leftmenu=product&type=0') . '&backtopage=' . \urlencode($_SERVER["PHP_SELF"] . '?id=' . $object->id);
$temps = $objectline->showOptionals($extrafields, 'create', array(), '', '', '1', 'line');