<?php

$depth_array = $depth_array ?? array();
$titles = $titles ?? array();
$formquestion = array();
$page = $_SERVER["PHP_SELF"];
$form_title = $type == 'title' ? $langs->trans('AddTitleLine') : $langs->trans('AddSubtotalLine');