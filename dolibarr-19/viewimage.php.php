<?php

/* Copyright (C) 2004-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2016 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2016 Regis Houssin        <regis.houssin@inodbox.com>
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
 *		\file       htdocs/viewimage.php
 *		\brief      Wrapper to show images into Dolibarr screens.
 *		\remarks    Call to wrapper is :
 *					DOL_URL_ROOT.'/viewimage.php?modulepart=diroffile&file=relativepathofofile&cache=0
 *					DOL_URL_ROOT.'/viewimage.php?hashp=sharekey
 */
\define('MAIN_SECURITY_FORCECSP', "default-src: 'none'");
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("DOLENTITY", $entity);
/**
 * Header empty
 *
 * @ignore
 * @return	void
 */
function llxHeader()
{
}
/**
 * Footer empty
 *
 * @ignore
 * @return	void
 */
function llxFooter()
{
}