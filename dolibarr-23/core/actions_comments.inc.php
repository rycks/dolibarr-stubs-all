<?php

$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$comment = new \Comment($db);
$description = \GETPOST('comment_description', 'restricthtml');