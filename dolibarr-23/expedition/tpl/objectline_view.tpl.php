<?php

// add html5 elements
$domData = ' data-element="' . $line->element . '"';
// Lines for extrafield
$objectline = new \ExpeditionLigne($object->db);
$coldisplay = 0;
$tmpproduct = new \Product($object->db);
$tmpexpe = new \Expedition($object->db);
$label = \measuringUnitString((int) $line->fk_unit, '', \null, 1);