<?php

/**
 * Core function to output top menu auguria
 *
 * @param 	DoliDB	$db				Database handler
 * @param 	string	$atarget		Target
 * @param 	int		$type_user     	0=Menu for backoffice, 1=Menu for front office
 * @param  	array	$tabMenu        If array with menu entries already loaded, we put this array here (in most cases, it's empty)
 * @param	Menu	$menu			Object Menu to return back list of menu entries
 * @param	int		$noout			Disable output (Initialise &$menu only).
 * @param	string	$mode			'top', 'topnb', 'left', 'jmobile'
 * @return	int						0
 */
function print_auguria_menu($db, $atarget, $type_user, &$tabMenu, &$menu, $noout = 0, $mode = '')
{
}
/**
 * Output start menu array
 *
 * @return	void
 */
function print_start_menu_array_auguria()
{
}
/**
 * Output start menu entry
 *
 * @param	string	$idsel		Text
 * @param	string	$classname	String to add a css class
 * @param	int		$showmode	0 = hide, 1 = allowed or 2 = not allowed
 * @return	void
 */
function print_start_menu_entry_auguria($idsel, $classname, $showmode)
{
}
/**
 * Output menu entry
 *
 * @param	string	$text		Text
 * @param	int		$showmode	0 = hide, 1 = allowed or 2 = not allowed
 * @param	string	$url		Url
 * @param	string	$id			Id
 * @param	string	$idsel		Id sel
 * @param	string	$classname	Class name
 * @param	string	$atarget	Target
 * @return	void
 */
function print_text_menu_entry_auguria($text, $showmode, $url, $id, $idsel, $classname, $atarget)
{
}
/**
 * Output end menu entry
 *
 * @param	int		$showmode	0 = hide, 1 = allowed or 2 = not allowed
 * @return	void
 */
function print_end_menu_entry_auguria($showmode)
{
}
/**
 * Output menu array
 *
 * @return	void
 */
function print_end_menu_array_auguria()
{
}
/**
 * Core function to output left menu auguria
 *
 * @param	DoliDB		$db                 Database handler
 * @param 	array		$menu_array_before  Table of menu entries to show before entries of menu handler
 * @param   array		$menu_array_after   Table of menu entries to show after entries of menu handler
 * @param  	array		$tabMenu       		If array with menu entries already loaded, we put this array here (in most cases, it's empty)
 * @param	Menu		$menu				Object Menu to return back list of menu entries
 * @param	int			$noout				Disable output (Initialise &$menu only).
 * @param	string		$forcemainmenu		'x'=Force mainmenu to mainmenu='x'
 * @param	string		$forceleftmenu		'all'=Force leftmenu to '' (= all)
 * @param	array		$moredata			An array with more data to output
 * @return	int								Nb of entries
 */
function print_left_auguria_menu($db, $menu_array_before, $menu_array_after, &$tabMenu, &$menu, $noout = 0, $forcemainmenu = '', $forceleftmenu = '', $moredata = \null)
{
}
/**
 * Function to test if an entry is enabled or not
 *
 * @param	string		$type_user					0=We need backoffice menu, 1=We need frontoffice menu
 * @param	array		$menuentry					Array for menu entry
 * @param	array		$listofmodulesforexternal	Array with list of modules allowed to external users
 * @return	int										0=Hide, 1=Show, 2=Show gray
 */
function dol_auguria_showmenu($type_user, &$menuentry, &$listofmodulesforexternal)
{
}