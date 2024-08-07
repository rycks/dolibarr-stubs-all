<?php

/* Copyright (C) 2013 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2014 Marcos García			<marcosgdf@gmail.com>
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
 *	\file       htdocs/opensurvey/lib/opensurvey.lib.php
 *	\ingroup    opensurvey
 *	\brief      Functions for module
 */
/**
 * Returns an array with the tabs for the "Opensurvey poll" section
 * It loads tabs from modules looking for the entity Opensurveyso
 *
 * @param Opensurveysondage $object Current viewing poll
 * @return array Tabs for the opensurvey section
 */
function opensurvey_prepare_head(\Opensurveysondage $object)
{
}
/**
 * Show header for new member
 *
 * @param 	string		$title				Title
 * @param 	string		$head				Head array
 * @param 	int    		$disablejs			More content into html header
 * @param 	int    		$disablehead		More content into html header
 * @param 	array  		$arrayofjs			Array of complementary js files
 * @param 	array  		$arrayofcss			Array of complementary css files
 * @param	string		$numsondage			Num survey
 * @return	void
 */
function llxHeaderSurvey($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [], $numsondage = '')
{
}
/**
 * Show footer for new member
 *
 * @return	void
 */
function llxFooterSurvey()
{
}
/**
 * get_server_name
 *
 * @return	string		URL to use
 */
function get_server_name()
{
}
/**
 * Fonction vérifiant l'existance et la valeur non vide d'une clé d'un tableau
 *
 * @param   string  $name       Key to test
 * @param   array   $tableau    Array in which searching key ($_POST by default)
 * @return  bool                True if key exists and return a non empty value
 */
function issetAndNoEmpty($name, $tableau = \null)
{
}
/**
 * Fonction permettant de générer les URL pour les sondage
 *
 * @param   string    $id     L'identifiant du sondage
 * @param   bool      $admin  True pour générer une URL pour l'administration d'un sondage, False pour un URL publique
 * @return  string            L'url pour le sondage
 */
function getUrlSondage($id, $admin = \false)
{
}
/**
 * 	Generate a random id
 *
 *	@param	int		$car	Length of string to generate key
 * 	@return	string
 */
function dol_survey_random($car)
{
}
/**
 * Add a poll
 *
 * @return	void
 */
function ajouter_sondage()
{
}