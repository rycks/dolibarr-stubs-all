<?php

/* Copyright (C) 2001-2004	Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (C) 2004-2020	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2017	Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2011-2012	Juanjo Menent			<jmenent@2byte.es>
 * Copyright (C) 2015		Marcos García			<marcosgdf@gmail.com>
 * Copyright (C) 2021-2025  Frédéric France			<frederic.france@free.fr>
 * Copyright (C) 2024-2025	MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024-2025	Alexandre Spangaro		<alexandre@inovea-conseil.com>
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
 *	\file       htdocs/index.php
 *	\brief      Dolibarr home page
 */
\define('CSRFCHECK_WITH_TOKEN', 1);
// Keep this ?
$action = \GETPOST('action', 'aZ09');
$zone = \GETPOSTINT('areacode');
$userid = \GETPOSTINT('userid');
$boxorder = \GETPOST('boxorder', 'aZ09');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);
$appli = \constant('DOL_APPLICATION_TITLE');
$applicustom = \getDolGlobalString('MAIN_APPLICATION_TITLE');
// Title
$title = $langs->trans("HomeArea") . ' - ' . $appli;
$resultboxes = \FormOther::getBoxesArea($user, "0");
$message = '';
// Check if install lock file is present
$lockfile = \DOL_DATA_ROOT . '/install.lock';
$object = new \stdClass();
$parameters = array();
$reshook = $hookmanager->executeHooks('infoadmin', $parameters, $object, $action);
$showweather = !\getDolGlobalString('MAIN_DISABLE_METEO') || \getDolGlobalInt('MAIN_DISABLE_METEO') == 2 ? 1 : 0;
// Array that contains all WorkboardResponse classes to process them
$dashboardlines = array();
$object = new \stdClass();
$parameters = array();
$action = '';
$reshook = $hookmanager->executeHooks('addOpenElementsDashboardLine', $parameters, $object, $action);
/* Open object dashboard */
$dashboardgroup = array('action' => array('groupName' => 'Agenda', 'stats' => array('action')), 'project' => array('groupName' => 'Projects', 'globalStatsKey' => 'projects', 'stats' => array('project', 'project_task')), 'propal' => array('groupName' => 'Proposals', 'globalStatsKey' => 'proposals', 'stats' => array('propal_opened', 'propal_signed')), 'commande' => array('groupName' => 'Orders', 'globalStatsKey' => 'orders', 'stats' => array('commande_toship', 'commande_tobill', 'commande_shippedtobill')), 'facture' => array('groupName' => 'Invoices', 'globalStatsKey' => 'invoices', 'stats' => array('facture')), 'supplier_proposal' => array('lang' => 'supplier_proposal', 'groupName' => 'SupplierProposals', 'globalStatsKey' => 'askprice', 'stats' => array('supplier_proposal_opened', 'supplier_proposal_signed')), 'order_supplier' => array('groupName' => 'SuppliersOrders', 'globalStatsKey' => 'supplier_orders', 'stats' => array('order_supplier_opened', 'order_supplier_awaiting')), 'invoice_supplier' => array('groupName' => 'BillsSuppliers', 'globalStatsKey' => 'supplier_invoices', 'stats' => array('invoice_supplier')), 'contrat' => array('groupName' => 'Contracts', 'globalStatsKey' => 'Contracts', 'stats' => array('contrat_inactive', 'contrat_active')), 'ticket' => array('groupName' => 'Tickets', 'globalStatsKey' => 'ticket', 'stats' => array('ticket_opened')), 'bank_account' => array('groupName' => 'BankAccount', 'stats' => array('bank_account', 'chequereceipt', 'widthdraw_direct_debit', 'widthdraw_credit_transfer')), 'member' => array('groupName' => 'Members', 'globalStatsKey' => 'members', 'stats' => array('member_shift', 'member_expired')), 'expensereport' => array('groupName' => 'ExpenseReport', 'globalStatsKey' => 'expensereports', 'stats' => array('expensereport_toapprove', 'expensereport_topay')), 'holiday' => array('groupName' => 'Holidays', 'globalStatsKey' => 'holidays', 'stats' => array('holiday')), 'cubes' => array('groupName' => 'Mo', 'globalStatsKey' => 'mrp', 'stats' => array('mo')));
$object = new \stdClass();
$parameters = array('dashboardgroup' => $dashboardgroup);
$reshook = $hookmanager->executeHooks('addOpenElementsDashboardGroup', $parameters, $object, $action);
// Calculate total nb of late
$totallate = $totaltodo = 0;
//Remove any invalid response
//load_board can return an integer if failed, or WorkboardResponse if OK
$valid_dashboardlines = array();
$openedDashBoardSize = 'info-box-sm';
$totalLateNumber = $totallate;
$totallatePercentage = !empty($totaltodo) ? \round($totallate / $totaltodo * 100, 2) : 0;
// Fill the content to show the tasks to do as a widget box (old version). Now this is no more used. Tasks to do ar in dedicated thumbs.
$boxwork = '';
// Show dashboard
$nbworkboardempty = 0;
$isIntopOpenedDashBoard = $globalStatInTopOpenedDashBoard = array();
$openedDashBoard = '';
/*
 * Show widgets (boxes)
 */
$boxlist = '<div class="twocolumns">';
/**
 *  Show weather logo. Logo to show depends on $totallate and values for
 *  conf 'MAIN_METEO_LEVELx'
 *
 *  @param      int     $totallate      Nb of element late
 *  @param      string  $text           Text to show on logo
 *  @param      string  $options        More parameters on img tag
 *  @param      string  $morecss        More CSS
 *  @return     string                  Return img tag of weather
 */
function showWeather($totallate, $text, $options, $morecss = '')
{
}
/**
 *  get weather status for conf 'MAIN_METEO_LEVELx'
 *
 *  @param      int     $totallate      Nb of element late
 *  @return     stdClass                Return img tag of weather
 */
function getWeatherStatus($totallate)
{
}