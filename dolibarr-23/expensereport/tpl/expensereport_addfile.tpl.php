<?php

$modulepart = 'expensereport';
$permission = $user->hasRight('expensereport', 'creer');
// We define var to enable the feature to add prefix of uploaded files
$savingdocmask = '';