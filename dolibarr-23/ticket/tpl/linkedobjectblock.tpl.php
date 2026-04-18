<?php

$linkedObjectBlock = \dol_sort_array($linkedObjectBlock, 'datec,ref', 'desc', 0, 0, 1);
// Repeat because type lost after dol_sort_array)
/** @var Ticket[] $linkedObjectBlock */
$total = 0;
$ilink = 0;