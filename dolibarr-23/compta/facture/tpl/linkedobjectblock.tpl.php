<?php

$langs = $GLOBALS['langs'];
/**
 * @var CommonObject $object
 */
$linkedObjectBlock = $GLOBALS['linkedObjectBlock'];
$linkedObjectBlock = \dol_sort_array($linkedObjectBlock, 'date,ref', 'desc', 0, 0, 1);
/** @var Facture[] $linkedObjectBlock */
$total = 0;
$ilink = 0;