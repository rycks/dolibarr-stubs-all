<?php

$formproduct = new \FormProduct($object->db);
$form = new \Form($object->db);
// Define colspan for the button 'Add'
$colspan = 3;
// Lines for extrafield
$objectline = new \ReceptionLineBatch($this->db);
$coldisplay = 0;
$temps = $line->showOptionals($extrafields, 'edit', array('class' => 'tredited'), '', '', '1', 'line');
$unit_type = \false;