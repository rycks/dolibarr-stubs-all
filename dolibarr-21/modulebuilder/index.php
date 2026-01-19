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