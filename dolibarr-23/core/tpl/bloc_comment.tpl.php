<?php

// Vars
$userstatic = new \User($db);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;