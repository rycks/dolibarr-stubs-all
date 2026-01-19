<?php

/* Copyright (C) 2003		Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (c) 2008-2013	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2012		Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2012       Marcos García           <marcosgdf@gmail.com>
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
 *  \file       htdocs/core/class/stats.class.php
 *  \ingroup    core
 *  \brief      Common class to manage statistics reports
 */
/**
 * 	Parent class of statistics class
 */
abstract class Stats
{
    protected $db;
    protected $lastfetchdate = array();
    // Dates of cache file read by methods
    public $cachefilesuffix = '';
    // Suffix to add to name of cache file (to avoid file name conflicts)
    /**
     * Return nb of elements by month for several years
     *
     * @param 	int		$endyear		Start year
     * @param 	int		$startyear		End year
     * @param	int		$cachedelay		Delay we accept for cache file (0=No read, no save of cache, -1=No read but save)
     * @param	int		$format			0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @param   int 	$startmonth		month of the fiscal year start min 1 max 12 ; if 1 = january
     * @return 	array					Array of values
     */
    public function getNbByMonthWithPrevYear($endyear, $startyear, $cachedelay = 0, $format = 0, $startmonth = 1)
    {
    }
    /**
     * Return amount of elements by month for several years.
     * Criterias used to build request are defined into the constructor of parent class into xxx/class/xxxstats.class.php
     * The caller of class can add more filters into sql request by adding criteris into the $stats->where property just after
     * calling constructor.
     *
     * @param	int		$endyear		Start year
     * @param	int		$startyear		End year
     * @param	int		$cachedelay		Delay we accept for cache file (0=No read, no save of cache, -1=No read but save)
     * @param	int		$format			0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @param   int 	$startmonth		month of the fiscal year start min 1 max 12 ; if 1 = january
     * @return 	array					Array of values
     */
    public function getAmountByMonthWithPrevYear($endyear, $startyear, $cachedelay = 0, $format = 0, $startmonth = 1)
    {
    }
    /**
     * Return average of entity by month for several years
     *
     * @param	int		$endyear		Start year
     * @param	int		$startyear		End year
     * @return 	array					Array of values
     */
    public function getAverageByMonthWithPrevYear($endyear, $startyear)
    {
    }
    /**
     * Return count, and sum of products
     *
     * @param	int		$year			Year
     * @param	int		$cachedelay		Delay we accept for cache file (0=No read, no save of cache, -1=No read but save)
     * @return 	array					Array of values
     */
    public function getAllByProductEntry($year, $cachedelay = 0)
    {
    }
    // Here we have low level of shared code called by XxxStats.class.php
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * 	Return nb of elements by year
     *
     *	@param	string	$sql		SQL request
     * 	@return	array
     */
    protected function _getNbByYear($sql)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * 	Return nb of elements, total amount and avg amount each year
     *
     *	@param	string	$sql	SQL request
     * 	@return	array			Array with nb, total amount, average for each year
     */
    protected function _getAllByYear($sql)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *     Renvoie le nombre de documents par mois pour une annee donnee
     *     Return number of documents per month for a given year
     *
     *     @param   int		$year       Year
     *     @param   string	$sql        SQL
     *     @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *     @return	array				Array of nb each month
     */
    protected function _getNbByMonth($year, $sql, $format = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *     Renvoie le montant totalise par mois pour une annee donnee
     *     Return the amount per month for a given year
     *
     *     @param	int		$year       Year
     *     @param   string	$sql		SQL
     *     @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *     @return	array
     */
    protected function _getAmountByMonth($year, $sql, $format = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Renvoie le montant moyen par mois pour une annee donnee
     *  Return the amount average par month for a given year
     *
     *  @param  int     $year       Year
     *  @param  string  $sql        SQL
     *  @param  int     $format     0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *  @return array
     */
    protected function _getAverageByMonth($year, $sql, $format = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Return number or total of product refs
     *
     *  @param  string  $sql        SQL
     *  @param  int     $limit      Limit
     *  @return array
     */
    protected function _getAllByProduct($sql, $limit = 10)
    {
    }
}