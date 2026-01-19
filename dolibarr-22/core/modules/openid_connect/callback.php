<?php

/* Copyright (C) 2023   Maximilien Rozniecki    <mrozniecki@easya.solutions>
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
 *      \file       htdocs/core/modules/openid_connect/public/callback.php
 *      \ingroup    openid_connect
 *      \brief      OpenID Connect: Authorization Code flow authentication
 */
\define('NOLOGIN', '1');
\define('NOTOKENRENEWAL', '1');
/**
 * @var string $dolibarr_main_url_root
 * @var string $dolibarr_main_force_https
 */
// Javascript code on logon page only to detect user tz, dst_observed, dst_first, dst_second
$arrayofjs = array('/includes/jstz/jstz.min.js' . (empty($conf->dol_use_jmobile) ? '' : '?version=' . \urlencode(\DOL_VERSION)), '/core/js/dst.js' . (empty($conf->dol_use_jmobile) ? '' : '?version=' . \urlencode(\DOL_VERSION)));