<?php

/* Copyright (C) 2017		Alexandre Spangaro		<aspangaro@open-dsi.fr>
 * Copyright (C) 2017		Saasprov				<saasprov@gmail.com>
 * Copyright (C) 2017       Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2017       Ferran Marcet   		<fmarcet@2byte.es>
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Page is called with payment parameters then called with action='dopayment', then called with action='charge' then redirect is done on urlok/jo
 */
/**
 *  \file       htdocs/public/stripe/newpayment.php
 *  \ingroup    Stripe
 *  \brief      Page to do payment with Stripe
 */
\define("NOLOGIN", 1);
// This means this output page does not require to be logged.
\define("NOCSRFCHECK", 1);
\define("DOLENTITY", $entity);