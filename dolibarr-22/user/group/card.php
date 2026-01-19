<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
// Define if user can read permissions
$permissiontoadd = $user->admin || $user->hasRight("user", "user", "write");
/**
 * Actions
 */
$error = 0;