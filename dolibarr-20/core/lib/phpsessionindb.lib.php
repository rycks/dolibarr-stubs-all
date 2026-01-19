<?php

/* Copyright (C) 2020 Laurent Destailleur  <eldy@users.sourceforge.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/phpsessionindb.lib.php
 *  \ingroup    core
 *  \brief		Set function handlers for PHP session management in DB.
 */
// This session handler file must be included just after the call of the master.inc.php into main.inc.php
// The $conf is already defined from conf.php file.
// To use it set
// - create table ll_session from the llx_session-disabled.sql file
// - uncomment the include DOL_DOCUMENT_ROOT.'/core/lib/phpsessionindb.inc.php into main.inc.php
// - in your PHP.ini, set:  session.save_handler = user
// The session_set_save_handler() at end of this file will replace default session management.
/**
 * The session open handler called by PHP whenever a session is initialized.
 *
 * @param	string	$save_path      Value of session.save_path into php.ini
 * @param	string	$session_name	Session name (Example: 'DOLSESSID_xxxxxx')
 * @return	boolean					Always true
 */
function dolSessionOpen($save_path, $session_name)
{
}
/**
 * This function is called whenever a session_start() call is made and reads the session variables.
 *
 * @param	string		$sess_id	Session ID
 * @return	string					Returns "" when a session is not found  or (serialized)string if session exists
 */
function dolSessionRead($sess_id)
{
}
/**
 * This function is called when a session is initialized with a session_start(  ) call, when variables are registered or unregistered,
 * and when session variables are modified. Returns true on success.
 *
 * @param	string		$sess_id		Session iDecodeStream
 * @param	string		$val			Content of session
 * @return	boolean						Always true
 */
function dolSessionWrite($sess_id, $val)
{
}
/**
 * This function is executed on shutdown of the session.
 *
 * @return	boolean					Always returns true.
 */
function dolSessionClose()
{
}
/**
 * This is called whenever the session_destroy() function call is made. Returns true if the session has successfully been deleted.
 *
 * @param	string	$sess_id		Session iDecodeStream
 * @return	boolean					Always true
 */
function dolSessionDestroy($sess_id)
{
}
/**
 * This function is called on a session's start up with the probability specified in session.gc_probability.
 * Performs garbage collection by removing all sessions that haven't been updated in the last $max_lifetime seconds as set in session.gc_maxlifetime.
 *
 * @param	int		$max_lifetime		Max lifetime
 * @return	boolean						true if the DELETE query succeeded.
 */
function dolSessionGC($max_lifetime)
{
}