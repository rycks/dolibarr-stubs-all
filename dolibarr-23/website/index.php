<?php

/* Copyright (C) 2016-2023  Laurent Destailleur  		<eldy@users.sourceforge.net>
 * Copyright (C) 2020 	    Nicolas ZABOURI				<info@inovea-conseil.com>
 * Copyright (C) 2024-2025	MDW							<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024-2025  Frédéric France             <frederic.france@free.fr>
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
 *   	\file       htdocs/website/index.php
 *		\ingroup    website
 *		\brief      Page to website view/edit
 */
/** @phan-file-suppress PhanPluginSuspiciousParamPosition */
// We allow POST of rich content with js and style, but only for this php file and if into some given POST variable
\define('NOSCANPOSTFORINJECTION', array('PAGE_CONTENT', 'WEBSITE_CSS_INLINE', 'WEBSITE_JS_INLINE', 'WEBSITE_HTML_HEADER', 'htmlheader'));
\define('USEDOLIBARREDITOR', 1);
\define('FORCE_CKEDITOR', 1);
\define('DISABLE_JS_GRAPH', 1);