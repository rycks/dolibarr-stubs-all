<?php

\define('NOSCANPOSTFORINJECTION', '1');
/**
 * Add management to catch fatal errors - shutdown handler
 *
 * @return	void
 */
function moduleBuilderShutdownFunction()
{
}
/**
 * Produce copyright replacement string for user
 *
 * @param	User		$user	User to produce the copyright notice for.
 * @param	Translate	$langs	Translation object to use.
 * @param	int			$now	Date for which the copyright will be generated.
 *
 * @return	string	String to be used as replacement after Copyright (C)
 */
function getLicenceHeader($user, $langs, $now)
{
}
/*
 * Actions
 */
/**
 * Post-generation validation -- logs and displays a warning if residual myobject/mymodule tokens remain.
 *
 * @param string       $destfile Path to the generated file
 * @param NamingContract $nc     Contract used for generation
 * @return void						No return value, warnings reported as event messages
 */
function modulebuilderValidateGeneratedFile(string $destfile, \NamingContract $nc) : void
{
}