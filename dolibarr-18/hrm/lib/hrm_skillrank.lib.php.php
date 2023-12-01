<?php

/* Copyright (C) 2021 Gauthier VERDOL <gauthier.verdol@atm-consulting.fr>
 * Copyright (C) 2021 Greg Rastklan <greg.rastklan@atm-consulting.fr>
 * Copyright (C) 2021 Jean-Pascal BOUDET <jean-pascal.boudet@atm-consulting.fr>
 * Copyright (C) 2021 Grégory BLEMAND <gregory.blemand@atm-consulting.fr>
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
 * \file    lib/hrm_skillrank.lib.php
 * \ingroup hrm
 * \brief   Library files with common functions for SkillRank
 */
/**
 * Prepare array of tabs for SkillRank
 *
 * @param	SkillRank	$object		SkillRank
 * @return 	array					Array of tabs
 */
function skillrankPrepareHead($object)
{
}
/**
 * Used to print ranks of a skill into several case, view or edit pour js necessary to select a rank
 *
 * @param int $selected_rank rank we want to preselect
 * @param int $fk_skill id of skill we display ranks
 * @param string $inputname html name of input
 * @param string $mode view or edit
 *
 * @return string string result
 */
function displayRankInfos($selected_rank, $fk_skill, $inputname = 'TNote', $mode = 'view')
{
}