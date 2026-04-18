<?php

/**
 * Copyright (C) 2013	Marcos García	<marcosgdf@gmail.com>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
 * Copyright (C) 2024		MDW					<mdeweerd@users.noreply.github.com>
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
 * Return string with full online Url to accept and sign a quote
 *
 * @param   string			$type		Type of URL ('proposal', ...)
 * @param	string			$ref		Ref of object
 * @param   CommonObject 	$obj  		object (needed to make multicompany good links)
 * @param	string			$mode		Mode
 * @return	string						Url string
 */
function showOnlineSignatureUrl($type, $ref, $obj = \null, $mode = '')
{
}
/**
 * Return string with full Url
 *
 * @param   int				$mode				0=True url, 1=Url formatted with colors
 * @param   string			$type				Type of URL ('proposal', ...)
 * @param	string			$ref				Ref of object
 * @param   int     		$localorexternal  	0=Url for browser, 1=Url for external access
 * @param   CommonObject  	$obj  				object (needed to make multicompany good links)
 * @return	string								Url string
 */
function getOnlineSignatureUrl($mode, $type, $ref = '', $localorexternal = 1, $obj = \null)
{
}