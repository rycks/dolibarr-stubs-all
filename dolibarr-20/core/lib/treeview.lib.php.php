<?php

/* Copyright (C) 2007      Patrick Raguin       <patrick.raguin@gmail.com>
 * Copyright (C) 2007-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 *  \file       htdocs/core/lib/treeview.lib.php
 *  \ingroup    core
 *  \brief      Libraries for tree views
 */
// ------------------------------- Used by ajax tree view -----------------
/**
 * Show indent and picto of a tree line. Return array with information of line.
 *
 * @param	array	$fulltree		Array of entries in correct order
 * @param 	string	$key			Key of entry into fulltree to show picto
 * @param	int		$silent			Do not output indent and picto, returns only value
 * @return	array{0:int,1:int,2:int}	array(0 or 1 if at least one of this level after, 0 or 1 if at least one of higher level after, nbofdirinsub, nbofdocinsub)
 */
function tree_showpad(&$fulltree, $key, $silent = 0)
{
}
// ------------------------------- Used by menu editor, category view, ... -----------------
/**
 *  Recursive function to output a tree. <ul id="iddivjstree"><li>...</li></ul>
 *  It is also used for the tree of categories.
 *  Note: To have this function working, check you have loaded the js and css for treeview.
 *  $arrayofjs=array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.js',
 *                   '/includes/jquery/plugins/jquerytreeview/lib/jquery.cookie.js');
 *	$arrayofcss=array('/includes/jquery/plugins/jquerytreeview/jquery.treeview.css');
 *  TODO Replace with jstree plugin instead of treeview plugin.
 *
 *  @param	array	$tab    					Array of all elements
 *  @param  array   $pere   					Array with parent ids ('rowid'=>,'mainmenu'=>,'leftmenu'=>,'fk_mainmenu'=>,'fk_leftmenu'=>)
 *  @param  int	    $rang   					Level of element
 *  @param	string	$iddivjstree				Id to use for parent ul element
 *  @param  int     $donoresetalreadyloaded     Do not reset global array $donoresetalreadyloaded used to avoid to go down on an already processed record
 *  @param  int     $showfk         			1=show fk_links to parent into label  (used by menu editor only)
 *  @param	string	$moreparam					Add more param on url of elements
 *  @return	void
 */
function tree_recur($tab, $pere, $rang, $iddivjstree = 'iddivjstree', $donoresetalreadyloaded = 0, $showfk = 0, $moreparam = '')
{
}