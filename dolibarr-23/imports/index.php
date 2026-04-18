<?php

$export = new \Export($db);
$import = new \Import($db);
/*
 * View
 */
$form = new \Form($db);
$title = "ImportExportArea";
$out = '';
$model = new \ModeleImports();
$list = $model->listOfAvailableImportFormat($db);
$out = '';
$model = new \ModeleExports($db);
$liste = $model->listOfAvailableExportFormat($db);