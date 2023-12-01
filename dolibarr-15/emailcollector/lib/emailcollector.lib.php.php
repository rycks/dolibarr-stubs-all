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
 * Récupère les parties d'un message
 * @param object $structure structure du message
 * @return object|boolean parties du message|false en cas d'erreur
 */
function getParts($structure)
{
}
/**
 * Tableau définissant la pièce jointe
 * @param object $part partie du message
 * @return object|boolean définition du message|false en cas d'erreur
 */
function getDParameters($part)
{
}
/**
 * Récupère les pièces d'un mail donné
 * @param integer $jk numéro du mail
 * @param object $mbox object connection imaap
 * @return array type, filename, pos
 */
function getAttachments($jk, $mbox)
{
}
/**
 * Récupère la contenu de la pièce jointe par rapport a sa position dans un mail donné
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
 * Sauvegarde de la pièce jointe dans le dossier défini avec un nom unique
 * @param string $path chemin de sauvegarde dui fichier
 * @param string $filename nom du fichier
 * @param mixed $data contenu à sauvegarder
 * @return string emplacement du fichier
 **/
function saveAttachment($path, $filename, $data)
{
}
/**
 * Décode le contenu du message
 * @param string $message message
 * @param integer $coding type de contenu
 * @return message décodé
 **/
function getDecodeValue($message, $coding)
{
}