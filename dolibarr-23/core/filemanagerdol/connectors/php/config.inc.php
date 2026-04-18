<?php

\define('NOTOKENRENEWAL', 1);
/**
 * @var Conf $conf
 *
 * @var string $dolibarr_main_data_root
 * @var string $dolibarr_main_url_root
 */
$uri = \preg_replace('/^http(s?):\\/\\//i', '', $dolibarr_main_url_root);
$pos = \strstr($uri, '/');
//define('DOL_URL_ROOT', $pos);
$entity = !empty($_SESSION['dol_entity']) && $_SESSION['dol_entity'] > 1 ? $_SESSION['dol_entity'] : \null;
// Path to user files relative to the document root.
$extEntity = empty($entity) ? 1 : $entity;
// After file is uploaded, sometimes it is required to change its permissions
// so that it was possible to access it at the later time.
// If possible, it is recommended to set more restrictive permissions, like 0755.
// Set to 0 to disable this feature.
// Note: not needed on Windows-based servers.
$newmask = '0644';
// See comments above.
// Used when creating folders that does not exist.
$newmask = '0755';
$dirmaskdec = \octdec($newmask);
// Set w bit required to be able to create content for recursive subdirs files
$newmask = \decoct($dirmaskdec);