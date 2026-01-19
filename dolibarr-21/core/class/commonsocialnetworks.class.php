<?php

/* Copyright (C) 2012 Regis Houssin  <regis.houssin@inodbox.com>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 *       \file       htdocs/core/class/commonsocialnetworks.class.php
 *       \ingroup    core
 *       \brief      File of the superclass of object classes that support socialnetworks
 */
/**
 *      Superclass for social networks
 */
trait CommonSocialNetworks
{
    /**
     * @var array<string,string>
     */
    public $socialnetworks;
    /**
     * Show social network part if the module is enabled with hiding functionality
     *
     * @param	array<string,array{active:int<0,1>,icon:string,label:string}>	$socialnetworks		Array of social networks
     * @param	int		$colspan			Colspan
     * @return 	void
     */
    public function showSocialNetwork($socialnetworks, $colspan = 4)
    {
    }
}