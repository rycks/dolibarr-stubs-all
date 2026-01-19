<?php

/* Copyright (C) 2023       Frédéric France     <frederic.france@netlogic.fr>
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
 *       \file       htdocs/core/class/commonpeople.class.php
 *       \ingroup    core
 *       \brief      File of the superclass of object classes that support people
 */
/**
 *      Support class for thirdparties, contacts, members, users or resources
 */
trait CommonPeople
{
    /**
     * @var string Address
     */
    public $address;
    /**
     * @var string zip code
     */
    public $zip;
    /**
     * @var string town
     */
    public $town;
    /**
     * @var int		$state_id
     */
    public $state_id;
    // The state/department
    public $state_code;
    public $state;
    /**
     * @var string email
     */
    public $email;
    /**
     * @var string url
     */
    public $url;
    /**
     *	Return full name (civility+' '+name+' '+lastname)
     *
     *	@param	Translate	$langs			Language object for translation of civility (used only if option is 1)
     *	@param	int			$option			0=No option, 1=Add civility
     * 	@param	int			$nameorder		-1=Auto, 0=Lastname+Firstname, 1=Firstname+Lastname, 2=Firstname, 3=Firstname if defined else lastname, 4=Lastname, 5=Lastname if defined else firstname
     * 	@param	int			$maxlen			Maximum length
     * 	@return	string						String with full name
     */
    public function getFullName($langs, $option = 0, $nameorder = -1, $maxlen = 0)
    {
    }
    /**
     * 	Return full address for banner
     *
     * 	@param		string		$htmlkey            HTML id to make banner content unique
     *  @param      Object      $object				Object (thirdparty, thirdparty of contact for contact, null for a member)
     *	@return		string							Full address string
     */
    public function getBannerAddress($htmlkey, $object)
    {
    }
    /**
     * Set to upper or ucwords/lower if needed
     *
     * @return void
     */
    public function setUpperOrLowerCase()
    {
    }
}