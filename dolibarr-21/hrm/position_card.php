<?php

//dol_include_once('/hrm/position.php');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Get Parameters
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
/**
 * 		Show the card of a position
 *
 * 		@param	Position		 $object		  Position object
 * 		@return void
 */
function displayPositionCard(&$object)
{
}