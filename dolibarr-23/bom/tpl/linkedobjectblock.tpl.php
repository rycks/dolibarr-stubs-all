<?php

$linkedObjectBlock = \dol_sort_array($linkedObjectBlock, 'date,ref', 'desc', 0, 0, 1);
// Type after dol_sort_array which looses typing
/** @var BOM[] $linkedObjectBlock */
$total = 0;
$ilink = 0;