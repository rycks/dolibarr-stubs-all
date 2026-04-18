<?php

/* Copyright (C) 2017 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * \file    htdocs/website/lib/website.lib.php
 * \ingroup website
 * \brief   Library files with common functions for WebsiteAccount
 */
/**
 * Prepare array of tabs for Website
 *
 * @param	Website		$object		Website
 * @return 	array<array{0:string,1:string,2:string}>	Array of tabs
 */
function websiteconfigPrepareHead($object)
{
}
/**
 * Prepare array of directives for Website
 *
 * @return 	array<string,array<string,string>>					Array of directives
 */
function websiteGetContentPolicyDirectives()
{
}
/**
 * Prepare array of sources for Website
 *
 * @return 	array<string,array<string,array<string,string>>>					Array of sources
 */
function websiteGetContentPolicySources()
{
}
/**
 * Transform a Content Security Policy to an array
 *
 * @param	string		$forceCSP		Content security policy string
 * @return 	array<string,array<string|int,array<string|int,string>|string>>				Array of sources
 */
function websiteGetContentPolicyToArray($forceCSP)
{
}