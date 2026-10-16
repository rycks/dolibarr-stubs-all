<?php

\define('NOTOKENRENEWAL', 1);
/**
 * @var Conf $conf
 * @var User $user
 *
 * @var string $dolibarr_main_data_root
 * @var string $dolibarr_main_url_root
 */
$uri = \preg_replace('/^http(s?):\\/\\//i', '', $dolibarr_main_url_root);