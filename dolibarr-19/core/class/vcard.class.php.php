<?php

/**
 *	Class to buld vCard files
 */
class vCard
{
    /**
     * @var array array of properties
     */
    public $properties;
    /**
     * @var string filename
     */
    public $filename;
    /**
     * @var string encoding
     */
    public $encoding = "ENCODING=QUOTED-PRINTABLE";
    /**
     *  mise en forme du numero de telephone
     *
     *  @param	int		$number		numero de telephone
     *  @param	string	$type		Type ('cell')
     *  @return	void
     */
    public function setPhoneNumber($number, $type = "")
    {
    }
    /**
     *	mise en forme de la photo
     *  warning NON TESTE !
     *
     *  @param  string  $type			Type 'image/jpeg' or 'JPEG'
     *  @param  string  $photo			Photo
     *  @return	void
     */
    public function setPhoto($type, $photo)
    {
    }
    /**
     *	mise en forme du nom formate
     *
     *	@param	string	$name			Name
     *	@return	void
     */
    public function setFormattedName($name)
    {
    }
    /**
     *	mise en forme du nom complet
     *
     *	@param	string	$family			Family name
     *	@param	string	$first			First name
     *	@param	string	$additional		Additional (e.g. second name, nick name)
     *	@param	string	$prefix			Title prefix (e.g. "Mr.", "Ms.", "Prof.")
     *	@param	string	$suffix			Suffix (e.g. "sen." for senior, "jun." for junior)
     *	@return	void
     */
    public function setName($family = "", $first = "", $additional = "", $prefix = "", $suffix = "")
    {
    }
    /**
     *	mise en forme de l'anniversaire
     *
     *	@param	integer	  $date		Date
     *	@return	void
     */
    public function setBirthday($date)
    {
    }
    /**
     *	Address
     *
     *	@param	string	$postoffice		Postoffice
     *	@param	string	$extended		Extended
     *	@param	string	$street			Street
     *	@param	string	$city			City
     *	@param	string	$region			Region
     *	@param	string	$zip			Zip
     *	@param	string	$country		Country
     *	@param	string	$type			Type
     *  @param	string	$label			Label
     *	@return	void
     */
    public function setAddress($postoffice = "", $extended = "", $street = "", $city = "", $region = "", $zip = "", $country = "", $type = "", $label = "")
    {
    }
    /**
     *  Address (old standard)
     *
     *  @param	string	$postoffice		Postoffice
     *  @param	string	$extended		Extended
     *  @param	string	$street			Street
     *  @param	string	$city			City
     *  @param	string	$region			Region
     *  @param	string	$zip			Zip
     *  @param	string	$country		Country
     *  @param	string	$type			Type
     *  @return	void
     *  @deprecated
     */
    public function setLabel($postoffice = "", $extended = "", $street = "", $city = "", $region = "", $zip = "", $country = "", $type = "HOME")
    {
    }
    /**
     *	Add a e-mail address to this vCard
     *
     *	@param	string	$address		E-mail address
     *	@param	string	$type			(optional) The type of the e-mail (typical "PREF" or "INTERNET")
     *	@return	void
     */
    public function setEmail($address, $type = "")
    {
    }
    /**
     *	mise en forme de la note
     *
     *	@param	string	$note		Note
     *	@return	void
     */
    public function setNote($note)
    {
    }
    /**
     * 	mise en forme de la fonction
     *
     *	@param	string	$title		Title
     *	@return	void
     */
    public function setTitle($title)
    {
    }
    /**
     *  mise en forme de la societe
     *
     *  @param	string	$org		Org
     *  @return	void
     */
    public function setOrg($org)
    {
    }
    /**
     * 	mise en forme du logiciel generateur
     *
     *  @param	string	$prodid		Prodid
     *	@return	void
     */
    public function setProdId($prodid)
    {
    }
    /**
     * 	mise en forme du logiciel generateur
     *
     *  @param	string	$uid	Uid
     *	@return	void
     */
    public function setUID($uid)
    {
    }
    /**
     *  mise en forme de l'url
     *
     *	@param	string	$url		URL
     *  @param	string	$type		Type
     *	@return	void
     */
    public function setURL($url, $type = "")
    {
    }
    /**
     *  permet d'obtenir une vcard
     *
     *  @return	string
     */
    public function getVCard()
    {
    }
    /**
     *  permet d'obtenir le nom de fichier
     *
     *  @return	string		Filename
     */
    public function getFileName()
    {
    }
    /**
     * Return a VCARD string
     * See RFC https://datatracker.ietf.org/doc/html/rfc6350
     *
     * @param	Object			$object		Object (User or Contact)
     * @param	Societe|null	$company	Company. May be null
     * @param	Translate		$langs		Lang object
     * @param	string			$urlphoto	Full public URL of photo
     * @return	string						String
     */
    public function buildVCardString($object, $company, $langs, $urlphoto = '')
    {
    }
    /* Example from Microsoft Outlook 2019
    
    	BEGIN:VCARD
    	VERSION:2.1
    
    	N;LANGUAGE=de:surename;forename;secondname;Sir;jun.
    	FN:Sir surename secondname forename jun.
    	ORG:Companyname
    	TITLE:position
    	TEL;WORK;VOICE:work-phone-number
    	TEL;HOME;VOICE:private-phone-number
    	TEL;CELL;VOICE:mobile-phone-number
    	TEL;WORK;FAX:fax-phone-number
    	ADR;WORK;PREF:;;street and number;town;region;012345;Deutschland
    	LABEL;WORK;PREF;ENCODING=QUOTED-PRINTABLE:street and number=0D=0A=
    	=0D=0A=
    	012345  town  region
    	X-MS-OL-DEFAULT-POSTAL-ADDRESS:2
    	URL;WORK:www.mywebpage.de
    	EMAIL;PREF;INTERNET:test1@test1.de
    	EMAIL;INTERNET:test2@test2.de
    	EMAIL;INTERNET:test3@test3.de
    	X-MS-IMADDRESS:test@jabber.org
    	REV:20200424T104242Z
    
    	END:VCARD
    	*/
}
/* Copyright (C)           Kai Blankenhorn      <kaib@bitfolge.de>
 * Copyright (C) 2005-2017 Laurent Destailleur  <eldy@users.sourceforge.org>
 * Copyright (C) 2020		Tobias Sekan		<tobias.sekan@startmail.com>
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
 *	\file       htdocs/core/class/vcard.class.php
 *	\brief      Class to manage vCard files
 */
/**
 * Encode a string for vCard
 *
 * @param	string	$string		String to encode
 * @return	string				String encoded
 */
function encode($string)
{
}
/**
 * Taken from php documentation comments
 * No more used
 *
 * @param	string	$input		String
 * @param	int		$line_max	Max length of lines
 * @return	string				Encoded string
 */
function dol_quoted_printable_encode($input, $line_max = 76)
{
}