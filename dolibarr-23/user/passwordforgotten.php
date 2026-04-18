<?php

/* Copyright (C) 2007-2011	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2008-2012	Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2008-2011	Juanjo Menent			<jmenent@2byte.es>
 * Copyright (C) 2014       Teddy Andreotti    		<125155@supinfo.com>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
 */
/**
 *       \file       htdocs/user/passwordforgotten.php
 *       \brief      Page to ask a new password
 */
\define("NOLOGIN", 1);
$action = \GETPOST('action', 'aZ09');
$mode = $dolibarr_main_authentication;
$username = \GETPOST('username', 'alphanohtml');
$passworduidhash = \GETPOST('passworduidhash', 'alpha');
$setnewpassword = \GETPOST('setnewpassword', 'aZ09');
/*
 * Actions
 */
$parameters = array('username' => $username);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$dol_url_root = \DOL_URL_ROOT;
$appli = \constant('DOL_APPLICATION_TITLE');
$applicustom = \getDolGlobalString('MAIN_APPLICATION_TITLE');
// Title
$title = $appli;
// $title is used in .tpl file
// Select templates dir
$template_dir = '';
// Show logo (search in order: small company logo, large company logo, theme logo, common logo)
$width = 0;
$rowspan = 2;
$urllogo = \DOL_URL_ROOT . '/theme/common/login_logo.png';
// Send password button enabled ?
$disabled = 'disabled';
// Security graphical code
$captcha = '';
// Execute hook getPasswordForgottenPageOptions (for table)
$parameters = array('entity' => \GETPOSTINT('entity'));
// Execute hook getPasswordForgottenPageExtraOptions (eg for js)
$parameters = array('entity' => \GETPOSTINT('entity'));
$reshook = $hookmanager->executeHooks('getPasswordForgottenPageExtraOptions', $parameters);
// Note that $action and $object may have been modified by some hooks.
$moreloginextracontent = $hookmanager->resPrint;