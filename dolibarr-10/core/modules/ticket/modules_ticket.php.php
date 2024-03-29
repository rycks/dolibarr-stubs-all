<?php

/* Copyright (C) 2010-2014    Regis Houssin    <regis.houssin@inodbox.com>
 * Copyright (C) 2014       Marcos García   <marcosgdf@gmail.com>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * or see http://www.gnu.org/
 */
/**
 *        \file       htdocs/core/modules/ticket/modules_ticket.php
 *      \ingroup    project
 *      \brief      File that contain parent class for projects models
 *                  and parent class for projects numbering models
 */
/**
 *  Classe mere des modeles de numerotation des references de projets
 */
abstract class ModeleNumRefTicket
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *  Return if a module can be used or not
     *
     *  @return boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *  Renvoi la description par defaut du modele de numerotation
     *
     *  @return string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *  Renvoi un exemple de numerotation
     *
     *  @return string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test si les numeros deja en vigueur dans la base ne provoquent pas de
     *  de conflits qui empechera cette numerotation de fonctionner.
     *
     *  @return boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Renvoi prochaine valeur attribuee
     *
     *    @param  Societe $objsoc  Object third party
     *    @param  Project $project Object project
     *    @return string                    Valeur
     */
    public function getNextValue($objsoc, $project)
    {
    }
    /**
     *  Renvoi version du module numerotation
     *
     *  @return string      Valeur
     */
    public function getVersion()
    {
    }
}