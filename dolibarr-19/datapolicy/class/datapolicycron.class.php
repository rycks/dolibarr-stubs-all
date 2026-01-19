<?php

/* Copyright (C) 2018       Nicolas ZABOURI     <info@inovea-conseil.com>
 * Copyright (C) 2018-2023  Frédéric France     <frederic.france@netlogic.fr>
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
 * \file    htdocs/datapolicy/class/datapolicycron.class.php
 * \ingroup datapolicy
 * \brief   File for cron task of module DataPolicy
 */
/**
 * Class DataPolicyCron
 */
class DataPolicyCron
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $error;
    public $output;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Function exec
     * CAN BE A CRON TASK
     *
     * @return	int									0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function cleanDataForDataPolicy()
    {
    }
}