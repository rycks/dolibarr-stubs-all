<?php

/* Copyright (C) 2026 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *	\file       htdocs/versionmod.inc.php
 * 	\ingroup	core
 *  \brief      File included by main files of the Unalterable Log module
 */
// The name of the module to manage the Unalterable Log.
// If you develop a different application, your can change this name.
\define('DOLCERT_NAME', 'BlockedLog');
// Blockedlog = "Log inalterables" in french.
// The version of the POS system (Immutable Log system)
// Can be: 3.0.0-beta (beta can't be certified)
// Or for stable: 3.0.0 (certification mechanism or french attestation mechanism).
// This is the constant used to build answer of function getBlockedLogVersionToShow().
\define('DOLCERT_VERSION', '3.0.0');
\define('CERTIF_LNE', '0');