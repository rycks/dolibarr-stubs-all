<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$confirm = \GETPOST('confirm', 'alpha');
/**
 * Verify if $haystack startswith $needle
 *
 * @param string $haystack string to test
 * @param string $needle string to find
 * @return bool false if Ko true else
 */
function startsWith($haystack, $needle)
{
}
/**
 * Fetch object with ref
 *
 * @param CommonObject $static_object static object to fetch
 * @param string $tmp_ref ref of the object to fetch
 * @return int Return integer <0 if Ko or Id of object
 */
function fetchref($static_object, $tmp_ref)
{
}