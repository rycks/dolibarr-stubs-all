<?php

/* Copyright (C) 2004-2005  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2015  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2005       Marc Barilley / Ocebo   <marc@ocebo.com>
 * Copyright (C) 2005-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2013-2014  Juanjo Menent           <jmenent@2byte.es>
 * Copyright (C) 2014       Marcos García           <marcosgdf@gmail.com>
 * Copyright (C) 2015-2016  Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2024-2025	MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024-2025  Frédéric France         <frederic.france@free.fr>
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
 *	\file       htdocs/install/check.php
 *	\ingroup    install
 *	\brief      Test if file conf can be modified and if does not exists, test if install process can create it
 */
\define('ALLOWED_IF_UPGRADE_UNLOCK_FOUND', 1);
/**
 * @var Conf $conf already created in inc.php
 * @var Translate $langs
 *
 * @var string $dolibarr_main_db_host
 * @var string $dolibarr_main_db_port
 * @var string $dolibarr_main_db_name
 * @var string $dolibarr_main_db_user
 * @var string $dolibarr_main_db_pass
 * @var string $dolibarr_main_db_encrypted_pass
 * @var string $conffile
 * @var string $conffiletoshow
 */
$err = 0;