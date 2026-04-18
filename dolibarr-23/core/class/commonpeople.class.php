<?php

/* Copyright (C) 2023-2025  Frédéric France     <frederic.france@free.fr>
 * Copyright (C) 2024-2025	MDW					<mdeweerd@users.noreply.github.com>
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
 * Support class for third parties, contacts, members, users or resources
 *
 *
 * Properties expected in the host class receiving this trait.
 *
 * @property int 	$id
 * @property int 	$contact_id
 * @property int 	$fk_soc
 * @property string $civility_code
 * @property DoliDB	$db
 * @property string $element
 * @property string $name
 * @property string $name_alias
 * @property string $nom
 * @property string $company
 * @property string $firstname
 * @property string $lastname
 * @property string $personal_email
 * @property array<string,string> $socialnetworks
 * @property string $fax
 * @property string $office_fax
 * @property string $office_phone
 * @property string $phone
 * @property string $phone_perso
 * @property string $phone_pro
 * @property string $phone_mobile
 * @property string $user_mobile
 * @property string $country_code
 * @property string $region
 */
trait CommonPeople
{
    /**
     * @var ?string Address
     */
    public $address;
    /**
     * @var ?string zip code
     */
    public $zip;
    /**
     * @var ?string town
     */
    public $town;
    /**
     * @var int	The state/department
     */
    public $state_id;
    /**
     * @var string
     */
    public $state_code;
    /**
     * @var ?string
     */
    public $state;
    /**
     * @var ?string email
     */
    public $email;
    /**
     * @var ?string url
     */
    public $url;
    /**
     *	Return full name (civility+' '+name+' '+lastname)
     *
     *	@param	Translate	$langs			Language object for translation of civility (used only if option is 1)
     *	@param	int<0,1>	$option			0=No option, 1=Add civility
     * 	@param	int<-1,5>	$nameorder		-1=Auto, 0=Lastname+Firstname, 1=Firstname+Lastname, 2=Firstname, 3=Firstname if defined else lastname, 4=Lastname, 5=Lastname if defined else firstname
     * 	@param	int			$maxlen			Maximum length
     * 	@return	string						String with full name
     */
    public function getFullName($langs, $option = 0, $nameorder = -1, $maxlen = 0)
    {
    }
    /**
     *    Return civility label of object
     *
     *    @return	string      			Translated name of civility
     */
    public function getCivilityLabel()
    {
    }
    /**
     * 	Return full address for banner
     *
     * 	@param		string			$htmlkey            HTML id to make banner content unique
     *  @param      CommonObject    $object				Object (thirdparty, thirdparty of contact for contact, null for a member)
     *	@return		string								Full address string
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
    // Methods used by this Trait that must be implemented in the parent class.
    // Note: this helps static type checking
    /**
     *  Return full address of contact
     *
     *  @param      int<0,1>    $withcountry        1=Add country into address string
     *  @param      string      $sep                Separator to use to build string
     *  @param      int<0,1>    $withregion         1=Add region into address string
     *  @param      string      $extralangcode      User extralanguages as value
     *  @return     string                          Full address string
     */
    public abstract function getFullAddress($withcountry = 0, $sep = "\n", $withregion = 0, $extralangcode = '');
    /**
     *  Function to get alternative languages of a data into $this->array_languages
     *  This method is NOT called by method fetch of objects but must be called separately.
     *
     *  @return int<-1,1>                   Return integer <0 if error, 0 if no values of alternative languages to find nor found, 1 if a value was found and loaded
     *  @see fetch_optionnals()
     */
    public abstract function fetchValuesForExtraLanguages();
}