<?php

/**
 * Core function to output top menu eldy
 *
 * @param 	DoliDB	$db				Database handler
 * @param 	string	$atarget		Target (Example: '' or '_top')
 * @param 	int		$type_user     	0=Menu for backoffice, 1=Menu for front office
 * @param  	array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}> 	$tabMenu        If array with menu entries already loaded, we put this array here (in most cases, it's empty). For eldy menu, it contains menu entries loaded from database.
 * @param	Menu	$menu			Object Menu to return back list of menu entries
 * @param	int		$noout			1=Disable output (Initialise &$menu only).
 * @param	string	$mode			'top', 'topnb', 'left', 'jmobile'
 * @return	int						0
 */
function print_eldy_menu($db, $atarget, $type_user, &$tabMenu, &$menu, $noout = 0, $mode = '')
{
}
/**
 * Output start menu array
 *
 * @return	void
 */
function print_start_menu_array()
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
function print_start_menu_entry($idsel, $classname, $showmode)
{
}
/**
 * Output menu entry
 *
 * @param	string	$text			Text
 * @param	int		$showmode		0 = hide, 1 = allowed or 2 = not allowed
 * @param	string	$url			Url
 * @param	string	$id				Id
 * @param	string	$idsel			Id sel
 * @param	string	$classname		Class name
 * @param	string	$atarget		Target
 * @param	array{}|array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string} 	$menuval		All the $menuval array
 * @return	void
 */
function print_text_menu_entry($text, $showmode, $url, $id, $idsel, $classname, $atarget, $menuval = array())
{
}
/**
 * Output end menu entry
 *
 * @param	int		$showmode	0 = hide, 1 = allowed or 2 = not allowed
 * @return	void
 */
function print_end_menu_entry($showmode)
{
}
/**
 * Output menu array
 *
 * @return	void
 */
function print_end_menu_array()
{
}
/**
 * Core function to output left menu eldy
 * Fill &$menu (example with $forcemainmenu='home' $forceleftmenu='all', return left menu tree of Home)
 *
 * @param	DoliDB		$db                 Database handler
 * @param 	array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}> 	$menu_array_before  Table of menu entries to show before entries of menu handler (menu->liste filled with menu->add)
 * @param   array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}>		$menu_array_after   Table of menu entries to show after entries of menu handler (menu->liste filled with menu->add)
 * @param	array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}> 	$tabMenu       		If array with menu entries already loaded, we put this array here (in most cases, it's empty)
 * @param	Menu		$menu				Object Menu to return back list of menu entries
 * @param	int			$noout				Disable output (Initialise &$menu only).
 * @param	string		$forcemainmenu		'x'=Force mainmenu to mainmenu='x'
 * @param	string		$forceleftmenu		'all'=Force leftmenu to '' (= all). If value come being '', we change it to value in session and 'none' if not defined in session.
 * @param	array		$moredata			An array with more data to output
 * @param 	int			$type_user     		0=Menu for backoffice, 1=Menu for front office
 * @return	int								Nb of menu entries
 */
function print_left_eldy_menu($db, $menu_array_before, $menu_array_after, &$tabMenu, &$menu, $noout = 0, $forcemainmenu = '', $forceleftmenu = '', $moredata = \null, $type_user = 0)
{
}
/**
 * Get left Menu HOME
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of user
 * @return	void
 */
function get_left_menu_home($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu THIRDPARTIES
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_thridparties($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu COMMERCIAL (propal, commande, supplier_proposal, supplier_order, contrat, ficheinter)
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_commercial($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left COMPTA-FINANCIAL
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_billing($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left COMPTA-FINANCIAL (accountancy)
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_accountancy($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu BANK
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_bank($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu PRODUCTS-SERVICES
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_products($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu PRODUCTS-SERVICES MRP - GPAO
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_mrp($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu PROJECTS
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_projects($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu HRM
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_hrm($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu TOOLS
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_tools($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}
/**
 * Get left Menu MEMBERS
 *
 * @param	string		$mainmenu		Main menu
 * @param	Menu 		$newmenu		Object Menu to return back list of menu entries
 * @param	int 		$usemenuhider	Use menu hider
 * @param	string 		$leftmenu		Left menu
 * @param	int 		$type_user		Type of targeted user for menu
 * @return	void
 */
function get_left_menu_members($mainmenu, &$newmenu, $usemenuhider = 1, $leftmenu = 'none', $type_user = 0)
{
}