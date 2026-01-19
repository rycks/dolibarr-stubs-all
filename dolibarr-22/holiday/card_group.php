<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Get parameters
$action = \GETPOST('action', 'aZ09');
/**
 * send email to validator for current leave represented by (id)
 *
 * @param int	$id 				validator for current leave represented by (id)
 * @param int	$cancreate 			flag for user right
 * @param int 	$now 				date
 * @param int	$autoValidation 	boolean flag on autovalidation
 *
 * @return stdClass
 * @throws Exception
 */
function sendMail($id, $cancreate, $now, $autoValidation)
{
}