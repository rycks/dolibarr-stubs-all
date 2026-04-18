<?php

$langs = $GLOBALS['langs'];
/**
 * @var Translate $langs
 * @var CommonObject $object
 */
$linkedObjectBlock = $GLOBALS['linkedObjectBlock'];
$linkedObjectBlock = \dol_sort_array($linkedObjectBlock, 'date,ref', 'desc', 0, 0, 1);
// Repeat because type lost after dol_sort_array)
/** @var Task[] $linkedObjectBlock */
$total = 0;
$ilink = 0;