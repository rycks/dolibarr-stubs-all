<?php

/* Copyright (C) ---Put here your own copyright and developer email---
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
 * \file    	emailcollector/lib/emailcollector.lib.php
 * \ingroup 	emailcollector
 * \brief   	Library files with common functions for EmailCollector
 */
/**
 * Prepare array of tabs for EmailCollector
 *
 * @param	EmailCollector	$object		EmailCollector
 * @return 	array						Array of tabs
 */
function emailcollectorPrepareHead($object)
{
}
/**
 * Get parts of a message
 *
 * @param 	object 			$structure 		Structure of message
 * @return 	object|boolean 					Parties du message|false en cas d'erreur
 */
function getParts($structure)
{
}
/**
 * Array with joined files
 *
 * @param 	object 			$part 		Part of message
 * @return 	object|boolean 				Definition of message|false en cas d'erreur
 */
function getDParameters($part)
{
}
/**
 * Get attachments of a given mail
 *
 * @param 	integer $jk 	Number of email
 * @param 	object 	$mbox 	object connection imaap
 * @return 	array 			type, filename, pos
 */
function getAttachments($jk, $mbox)
{
}
/**
 * Get content of a joined file from its position into a given email
 *
 * @param integer $jk numéro du mail
 * @param integer $fpos position de la pièce jointe
 * @param integer $type type de la pièce jointe
 * @param object $mbox object connection imaap
 * @return mixed data
 */
function getFileData($jk, $fpos, $type, $mbox)
{
}
/**
 * Save joined file into a directory with a given name
 *
 * @param 	string 		$path 		Path to file
 * @param 	string 		$filename 	Name of file
 * @param 	mixed 		$data 		contenu à sauvegarder
 * @return 	string 					emplacement du fichier
 **/
function saveAttachment($path, $filename, $data)
{
}
/**
 * Decode content of a message
 *
 * @param 	string 		$message 	Message
 * @param 	integer 	$coding 	Type of content
 * @return 	string					Decoded message
 **/
function getDecodeValue($message, $coding)
{
}