<?php

/* Copyright (C) 2023-2024 	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2023-2024	Lionel Vessiller		<lvessiller@easya.solutions>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
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
 * \file		htdocs/public/webportal/logout.php
 * \ingroup		webportal
 * \brief		Page called to disconnect a user
 */
\define('WEBPORTAL_NOREQUIREUSER', 1);
\define('WEBPORTAL_NOREQUIRETRAN', 1);
\define('WEBPORTAL_NOLOGIN', 1);
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/** @var Context $context */
$context = \Context::getInstance();