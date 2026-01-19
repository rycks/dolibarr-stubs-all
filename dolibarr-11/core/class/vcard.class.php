<?php

/**
 *	Class to buld vCard files
 */
class vCard
{
    public $properties;
    public $filename;
    //var $encoding="UTF-8";
    public $encoding = "ISO-8859-1;ENCODING=QUOTED-PRINTABLE";
    /**
     *  mise en forme du numero de telephone
     *
     *  @param	int		$number		numero de telephone
     *  @param	string	$type		Type
     *  @return	void
     */
    public function setPhoneNumber($number, $type = "")
    {
    }
    /**
     *	mise en forme de la photo
     *  warning NON TESTE !
     *
     *  @param  string  $type			Type
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
     *	@param	string	$family			Family
     *	@param	string	$first			First
     *	@param	string	$additional		Additionnal
     *	@param	string	$prefix			Prefix
     *	@param	string	$suffix			Suffix
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
     *	mise en forme de l'adresse
     *
     *	@param	string	$postoffice		Postoffice
     *	@param	string	$extended		Extended
     *	@param	string	$street			Street
     *	@param	string	$city			City
     *	@param	string	$region			Region
     *	@param	string	$zip			Zip
     *	@param	string	$country		Country
     *	@param	string	$type			Type
     *	@return	void
     */
    public function setAddress($postoffice = "", $extended = "", $street = "", $city = "", $region = "", $zip = "", $country = "", $type = "HOME;POSTAL")
    {
    }
    /**
     *  mise en forme du label
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
     */
    public function setLabel($postoffice = "", $extended = "", $street = "", $city = "", $region = "", $zip = "", $country = "", $type = "HOME;POSTAL")
    {
    }
    /**
     *	mise en forme de l'email
     *
     *	@param	string	$address		EMail
     *	@param	string	$type			Vcard type
     *	@return	void
     */
    public function setEmail($address, $type = "internet,pref")
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
}
/* Copyright (C)           Kai Blankenhorn      <kaib@bitfolge.de>
 * Copyright (C) 2005-2017 Laurent Destailleur  <eldy@users.sourceforge.org>
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