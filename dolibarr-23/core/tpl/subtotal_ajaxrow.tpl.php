<?php

$id = $object->id;
$fk_element = empty($object->fk_element) ? $fk_element : $object->fk_element;
$table_element_line = empty($table_element_line) ? $object->table_element_line : $table_element_line;
$nboflines = \count($object->lines);
$forcereloadpage = \getDolGlobalInt('MAIN_FORCE_RELOAD_PAGE');
$tagidfortablednd = empty($tagidfortablednd) ? 'tablelines' : $tagidfortablednd;
$filepath = empty($filepath) ? '' : $filepath;