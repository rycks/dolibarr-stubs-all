<?php

/* Copyright (C) 2021 Gauthier VERDOL <gauthier.verdol@atm-consulting.fr>
 * Copyright (C) 2021 Greg Rastklan <greg.rastklan@atm-consulting.fr>
 * Copyright (C) 2021 Jean-Pascal BOUDET <jean-pascal.boudet@atm-consulting.fr>
 * Copyright (C) 2021 Grégory BLEMAND <gregory.blemand@atm-consulting.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * \file    lib/hrm_evaluation.lib.php
 * \ingroup hrm
 * \brief   Library files with common functions for Evaluation
 */
/**
 * Prepare array of tabs for Evaluation
 *
 * @param	Evaluation	$object		Evaluation
 * @return 	array<array<int,string>>	Array of tabs
 */
function evaluationPrepareHead($object)
{
}
/**
 * @return string
 */
function GetLegendSkills()
{
}
/**
 * @param  Object $obj Object needed to be represented
 * @return string
 */
function getRankOrderResults($obj)
{
}
/**
 * Grouped rows with same ref in array
 *
 * @param   Object[]		$objects	All rows retrieved from sql query
 * @return	array<string|int,Object|Object[]>|int<-1,-1>	Object by group, -1 if error (empty or bad argument)
 */
function getGroupedEval($objects)
{
}