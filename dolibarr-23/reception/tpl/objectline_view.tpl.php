<?php

// add html5 elements
$domData = ' data-element="' . $line->element . '"';
// Lines for extrafield
$objectline = new \ReceptionLineBatch($this->db);
$coldisplay = 0;
$tmpproduct = new \Product($object->db);
$tmprecep = new \Reception($object->db);
$label = \measuringUnitString((int) $line->fk_unit, '', \null, 1);