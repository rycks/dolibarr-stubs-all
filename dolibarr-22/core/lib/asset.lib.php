<?php

/* Copyright (C) 2018-2022	OpenDSI					<support@open-dsi.fr>
 * Copyright (C) 2022-2024	Frédéric France			<frederic.france@free.fr>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2025		Alexandre Spangaro		<alexandre@inovea-conseil.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * \file    htdocs/core/lib/asset.lib.php
 * \ingroup asset
 * \brief   Library files with common functions for Assets
 */
/**
 * Prepare admin pages header
 *
 * @return array<array{0:string,1:string,2:string}> head array with tabs
 */
function assetAdminPrepareHead()
{
}
/**
 * Prepare array of tabs for Asset
 *
 * @param	Asset	$object		Asset
 * @return 	array<array{0:string,1:string,2:string}>	Array of tabs
 */
function assetPrepareHead(\Asset $object)
{
}
/**
 * Prepare array of tabs for AssetModel
 *
 * @param	AssetModel	$object		AssetModel
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function assetModelPrepareHead($object)
{
}