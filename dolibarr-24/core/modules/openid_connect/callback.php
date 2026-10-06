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
 *      \brief      OpenID Connect: Authorization Code flow callback
 *
 *      This page receives the authorization code from the OIDC provider and
 *      stores the OIDC parameters (code, state) in $_SESSION, then redirects
 *      to index.php via a same-site JS redirect (with tz detection from dst.js).
 *
 *      The same-site redirect ensures the session cookie IS sent (SameSite=Lax
 *      allows same-site navigations). The OIDC code and state are transported
 *      via $_SESSION instead of GET parameters to avoid exposing them in
 *      web server access logs.
 */
\define('NOLOGIN', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOCSRFCHECK', 1);
/**
 * @var string $dolibarr_main_url_root
 * @var string $dolibarr_main_force_https
 */
// Javascript code on logon page only to detect user tz, dst_observed, dst_first, dst_second
$arrayofjs = array('/core/js/dst.js' . (empty($conf->dol_use_jmobile) ? '' : '?version=' . \urlencode(\DOL_VERSION)));