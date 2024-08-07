<?php

/* Copyright (C) 2016       Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2014       Juanjo Menent       <jmenent@2byte.es>
 * Copyright (C) 2015       Florian Henry       <florian.henry@open-concept.pro>
 * Copyright (C) 2015       Raphaël Doursenaud  <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
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
 * \file    htdocs/compta/sociales/class/cchargesociales.class.php
 * \ingroup tax
 * \brief   File to manage type of social/fiscal taxes
 */
// Put here all includes required by your class file
//require_once DOL_DOCUMENT_ROOT . '/core/class/commonobject.class.php';
//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class Cchargesociales
 */
class Cchargesociales
{
    public $db;
    public $id;
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'cchargesociales';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_chargesociales';
    /**
     * @var string Label
     * @deprecated
     */
    public $libelle;
    /**
     * @var string Label
     */
    public $label;
    public $deductible;
    public $active;
    public $code;
    /**
     * @var int ID
     */
    public $fk_pays;
    /**
     * @var string module
     */
    public $module;
    public $accountancy_code;
    /**
     * @var array array of errors
     */
    public $errors = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      	User that creates
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  Id object
     * @param string $ref Ref
     *
     * @return int Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      	User that modifies
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user      	User that deletes
     * @param int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     Id of object to clone
     * @return  int                 New id of clone
     */
    /*public function createFromClone(User $user, $fromid)
    	{
    		dol_syslog(__METHOD__, LOG_DEBUG);
    
    		$error = 0;
    		$object = new Cchargesociales($this->db);
    
    		$this->db->begin();
    
    		// Load source object
    		$object->fetch($fromid);
    		// Reset object
    		$object->id = 0;
    
    		// Clear fields
    		// ...
    
    		// Create clone
    		$this->context['createfromclone'] = 'createfromclone';
    		$result = $object->create($user);
    
    		// Other options
    		if ($result < 0) {
    			$error++;
    			$this->errors = $object->errors;
    			dol_syslog(__METHOD__.' '.implode(',', $this->errors), LOG_ERR);
    		}
    
    		unset($this->context['createfromclone']);
    
    		// End
    		if (!$error) {
    			$this->db->commit();
    
    			return $object->id;
    		} else {
    			$this->db->rollback();
    
    			return -1;
    		}
    	}*/
    /**
     *  Return a link to the user card (with optionally the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option				On what the link point to
     *  @param	integer	$notooltip			1=Disable tooltip
     *  @param	int		$maxlen				Max length of visible user name
     *  @param  string  $morecss            Add more css on link
     *	@return	string						String with URL
     */
    /*public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '')
    	{
    		global $langs, $conf, $db;
    		global $dolibarr_main_authentication, $dolibarr_main_demo;
    		global $menumanager;
    
    
    		$result = '';
    		$companylink = '';
    
    		$label = '<u>'.$langs->trans("MyModule").'</u>';
    		$label .= '<div width="100%">';
    		$label .= '<b>'.$langs->trans('Ref').':</b> '.$this->ref;
    
    		$link = '<a href="'.DOL_URL_ROOT.'/tax/card.php?id='.$this->id.'"';
    		$link .= ($notooltip ? '' : ' title="'.dol_escape_htmltag($label, 1).'" class="classfortooltip'.($morecss ? ' '.$morecss : '').'"');
    		$link .= '>';
    		$linkend = '</a>';
    
    		if ($withpicto) {
    			$result .= ($link.img_object(($notooltip ? '' : $label), 'label', ($notooltip ? '' : 'class="classfortooltip"'), 0, 0, $notooltip ? 0 : 1).$linkend);
    			if ($withpicto != 2) {
    				$result .= ' ';
    			}
    		}
    		$result .= $link.$this->ref.$linkend;
    		return $result;
    	}*/
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    /*public function getLibStatut($mode = 0)
    	{
    		return $this->LibStatut($this->status, $mode);
    	}*/
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Trim object parameters
     *
     * @param string[] $parameters array of parameters to trim
     * @return void
     */
    private function trimParameters($parameters)
    {
    }
}