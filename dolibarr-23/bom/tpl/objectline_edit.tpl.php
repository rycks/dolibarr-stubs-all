<?php

$formproduct = new \FormProduct($object->db);
// Define colspan for the button 'Add'
$colspan = 3;
// Columns: total ht + col edit + col delete
// Lines for extrafield
$objectline = new \BOMLine($this->db);
$coldisplay = 0;
$temps = $line->showOptionals($extrafields, 'edit', array('class' => 'tredited'), '', '', '1', 'line');