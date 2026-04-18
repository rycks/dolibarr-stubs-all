<?php

$tabparam = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$result = \dol_set_user_param($db, $conf, $user, $tabparam);