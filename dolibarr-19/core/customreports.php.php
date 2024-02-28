<?php

/**
 * Fill arrayofmesures for an object
 *
 * @param 	mixed		$object			Any object
 * @param	string		$tablealias		Alias of table
 * @param	string		$labelofobject	Label of object
 * @param	array		$arrayofmesures	Array of mesures already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return 	array						Array of mesures
 */
function fillArrayOfMeasures($object, $tablealias, $labelofobject, &$arrayofmesures, $level = 0, &$count = 0, &$tablepath = '')
{
}
/**
 * Fill arrayofmesures for an object
 *
 * @param 	mixed		$object			Any object
 * @param	string		$tablealias		Alias of table ('t' for example)
 * @param	string		$labelofobject	Label of object
 * @param	array		$arrayofxaxis	Array of xaxis already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return 	array						Array of xaxis
 */
function fillArrayOfXAxis($object, $tablealias, $labelofobject, &$arrayofxaxis, $level = 0, &$count = 0, &$tablepath = '')
{
}
/**
 * Fill arrayofgrupby for an object
 *
 * @param 	mixed		$object			Any object
 * @param	string		$tablealias		Alias of table
 * @param	string		$labelofobject	Label of object
 * @param	array		$arrayofgroupby	Array of groupby already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return 	array						Array of groupby
 */
function fillArrayOfGroupBy($object, $tablealias, $labelofobject, &$arrayofgroupby, $level = 0, &$count = 0, &$tablepath = '')
{
}