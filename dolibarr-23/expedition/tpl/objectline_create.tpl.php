<?php

$formproduct = new \FormProduct($object->db);
// Define colspan for the button 'Add'
$colspan = 3;
// Lines for extrafield
$objectline = new \ExpeditionLigne($this->db);
$nolinesbefore = \count($this->lines) == 0 || $forcetoshowtitlelines;
$coldisplay = 0;
$statustoshow = -1;
$temps = $objectline->showOptionals($extrafields, 'create', array(), '', '', '1', 'line');