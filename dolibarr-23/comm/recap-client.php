<?php

// Security check
$socid = \GETPOSTINT("socid");
$id = 0;
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);