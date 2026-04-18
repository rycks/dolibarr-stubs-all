<?php

$notePublic = \GETPOST('note_public', 'restricthtml');
$result_update = $object->update_note(\dol_html_entity_decode($notePublic, \ENT_QUOTES | \ENT_HTML5, 'UTF-8', 1), '_public');