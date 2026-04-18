<?php

$langs = $GLOBALS['langs'];
/**
 * @var CommonObject $object
 * @var Translate $langs
 */
$linkedObjectBlock = $GLOBALS['linkedObjectBlock'];
$linkedObjectBlock = \dol_sort_array($linkedObjectBlock, 'date,ref', 'desc', 0, 0, 1);
// Repeat because type lost after dol_sort_array)
/** @var Fichinter[] $linkedObjectBlock */
$ilink = 0;