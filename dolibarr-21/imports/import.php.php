<?php

/** @var array<string,string> $fieldssource */
$result = $obj->import_open_file($conf->import->dir_temp . '/' . $filetoimport);
/**
 * Function to put the movable box of a source field
 *
 * @param	array<int|string,array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}>		$fieldssource	List of source fields
 * @param	int		$pos			Pos
 * @param	string	$key			Key
 * @return	void
 */
function show_elem($fieldssource, $pos, $key)
{
}
/**
 * Return not used field number
 *
 * @param 	array<int,mixed|mixed[]>	$fieldssource	Array of field source
 * @param	array<int,mixed|mixed[]>	$listofkey		Array of keys
 * @return	int
 */
function getnewkey(&$fieldssource, &$listofkey)
{
}
/**
 * Return array with element inserted in it at position $position
 *
 * @param	array<int|string,array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}>		$array			Array of field source
 * @param	int		$position		key of position to insert to
 * @param	array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}		$insertArray	Array to insert
 * @return	array<int|string,array{label?:string,example1?:string,required?:bool,imported?:bool|int<0,1>,position?:int}>
 */
function arrayInsert($array, $position, $insertArray)
{
}