<?php

/* Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
 */
/**
 * \file        htdocs/public/webportal/lib/webportal.lib.php
 * \ingroup     webportal
 * \brief       Lib for public access of WebPortal
 */
/**
 * Get nav menu
 *
 * @param	array<string,array{id:string,rank:int,url:string,name:string,group:string,override?:int<0,1>,children?:array<array{id:string,rank:int,url:string,name:string,group:string,override?:int<0,1>}>}>|array<user_logout,array{id:string,rank:int,url:string,name:string}>	$Tmenu	Array of menu
 * @return  string
 */
function getNav($Tmenu)
{
}
/**
 * Get nav item
 *
 * TODO : Dropdown is actually not css implemented
 * @param	array{id:string,rank:int,url:string,name:string,group:string,override?:int<0,1>,children?:array<array{id:string,rank:int,url:string,name:string,group:string,override?:int<0,1>,active?:bool,separator?:bool}>}	$item	Item of menu
 * @param	int		$deep	Level of deep
 * @return  string
 */
function getNavItem($item, $deep = 0)
{
}
/**
 * Sort menu
 * uasort callback function to Sort menu fields
 *
 * @param	array{rank?:int} $a	PDF lines array fields configs
 * @param 	array{rank?:int} $b	PDF lines array fields configs
 * @return 	int<-1,1>           Return compare result
 *
 * 	// Sorting
 * 	uasort ( $this->cols, array( $this, 'menuSort' ) );
 *
 */
function menuSortInv($a, $b)
{
}