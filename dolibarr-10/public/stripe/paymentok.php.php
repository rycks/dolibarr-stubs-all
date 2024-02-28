<?php

/* Copyright (C) 2017	Laurent Destailleur		<eldy@users.sourceforge.net>
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
 */
/**
 *     	\file       htdocs/public/stripe/paymentok.php
 *		\ingroup    core
 *		\brief      File to show page after a successful payment
 *                  This page is called by payment system with url provided to it completed with parameter FULLTAG=xxx
 *                  More data like token are saved into session. This token can be used to get more informations.
 */
\define("NOLOGIN", 1);
// This means this output page does not require to be logged.
\define("NOCSRFCHECK", 1);
\define("DOLENTITY", $entity);