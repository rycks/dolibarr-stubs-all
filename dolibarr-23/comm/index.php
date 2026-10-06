<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array
$hookmanager = new \HookManager($db);