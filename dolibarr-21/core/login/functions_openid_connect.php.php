<?php

/**
 * Check validity of user/password/entity
 * If test is ko, reason must be filled into $_SESSION["dol_loginmesg"]
 *
 * @param	string	$usertotest		Login
 * @param	string	$passwordtotest	Password
 * @param   int		$entitytotest	Number of instance (always 1 if module multicompany not enabled)
 * @return	string|false			Login if OK, false if KO
 */
function check_user_password_openid_connect($usertotest, $passwordtotest, $entitytotest)
{
}