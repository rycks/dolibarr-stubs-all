<?php

/* Copyright (C) ---Put here your own copyright and developer email---
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
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
 * \file    htdocs/eventorganization/lib/eventorganization_conferenceorbooth.lib.php
 * \ingroup eventorganization
 * \brief   Library files with common functions for ConferenceOrBooth
 */
/**
 * Prepare array of tabs for ConferenceOrBooth
 *
 * @param	ConferenceOrBooth	$object		ConferenceOrBooth
 * @param	int	$with_project		Add project id to URL
 * @return 	array					Array of tabs
 */
function conferenceorboothPrepareHead($object, $with_project = 0)
{
}
/**
 * Prepare array of tabs for ConferenceOrBooth Project tab
 *
 * @param Project $object Project
 * @return array
 */
function conferenceorboothProjectPrepareHead($object)
{
}
/**
 * Prepare array of tabs for ConferenceOrBoothAttendees
 *
 * @param	ConferenceOrBoothAttendee	$object		ConferenceOrBoothAttendee
 * @return 	array<array<int,string>>				Array of tabs
 */
function conferenceorboothAttendeePrepareHead($object)
{
}