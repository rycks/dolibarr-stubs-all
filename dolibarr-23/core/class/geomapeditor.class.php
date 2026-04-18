<?php

/* Copyright (C) 2024       Frédéric France			<frederic.france@free.fr>
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
 * or see https://www.gnu.org/
 */
/**
 *       \file       htdocs/core/class/geomapeditor.class.php
 *       \brief      Class to manage a leaflet map width geometrics objects
 */
/**
 *      Class to manage a Leaflet map width geometrics objects
 */
class GeoMapEditor
{
    /**
     * __contruct
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * getHtml
     *
     * @param string $htmlname htmlname
     * @param string $geojson  json of geometric objects
     * @param string $centroidjson  json of geometric center of object
     * @param string $markertype type of marker, point, multipts, linestrg, polygon
     *
     * @return string
     */
    public function getHtml($htmlname, $geojson, $centroidjson, $markertype)
    {
    }
}