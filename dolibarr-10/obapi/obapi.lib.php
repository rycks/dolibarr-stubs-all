<?php

/**
 * obapi.lib.php
 *
 * Copyright (c) 2023 Eric Seigne <eric.seigne@cap-rel.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * check user login / pass againts dolibarr users table or sellyoursaas
 *
 * @param   [type]  $email     [$email description]
 * @param   [type]  $fk_soc    [$fk_soc description]
 * @param   [type]  $pass      [$pass description]
 * @param   [type]  $mailcode  [$mailcode description]
 *
 * @return  [type]             [return description]
 */
function obapiCheckUserPassword($email, $fk_soc, $pass, $mailcode)
{
}
/**
 * fetch soc id from api key
 *
 * @param   [type]  $key  [$key description]
 *
 * @return  [type]        [return description]
 */
function obapiGetSocieteFromKey($key)
{
}
/**
 * fetch soc id from email
 *
 * @param   [type]  $email  [$email description]
 *
 * @return  [type]          [return description]
 */
function obapiGetSociete($email)
{
}
/**
 * get api key for email / soc / tmp|api
 *
 * @param   [type]  $email   [$email description]
 * @param   [type]  $fk_soc  [$fk_soc description]
 * @param   [type]  $tmp     [$tmp description]
 *
 * @return  [type]           [return description]
 */
function obapiGetKey($email, $fk_soc, $tmp)
{
}
/**
 * build a key
 *   if pre-auth step, send a code via email and build priv/pub key
 *   if second step auth, build a classical api key
 *
 * @param   [type]$email       [$email description]
 * @param   [type]$fk_soc      [$fk_soc description]
 * @param   [type]$validuntil  [$validuntil description]
 * @param   [type]$tmp         [$tmp description]
 * @param   tmp               [ description]
 *
 * @return  [type]            [return description]
 */
function obapiMakeKey($email, $fk_soc, $validuntil, $tmp = 'tmp')
{
}