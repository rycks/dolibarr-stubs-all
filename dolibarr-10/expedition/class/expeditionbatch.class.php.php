<?php

/* Copyright (C) 2007-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2013-2014 Cedric GROSS         <c.gross@kreiz-it.fr>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 *  \file       expedition/class/expeditionbatch.class.php
 *  \ingroup    productbatch
 *  \brief      This file implements CRUD method for managing shipment batch lines
 *				with batch record
 */
/**
 *	CRUD class for batch number management within shipment
 */
class ExpeditionLineBatch extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'expeditionlignebatch';
    private static $_table_element = 'expeditiondet_batch';
    //!< Name of table without prefix where object is stored
    public $sellby;
    public $eatby;
    public $batch;
    public $qty;
    public $dluo_qty;
    // deprecated, use qty
    public $entrepot_id;
    public $fk_origin_stock;
    public $fk_expeditiondet;
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Fill object based on a product-warehouse-batch's record
     *
     * @param	int		$id_stockdluo	Rowid in product_batch table
     * @return	int      		   	 -1 if KO, 1 if OK
     */
    public function fetchFromStock($id_stockdluo)
    {
    }
    /**
     * Create an expeditiondet_batch DB record link to an expedtiondet record
     *
     * @param	int		$id_line_expdet		rowid of expedtiondet record
     * @return	int							<0 if KO, Id of record (>0) if OK
     */
    public function create($id_line_expdet)
    {
    }
    /**
     * Delete batch record attach to a shipment
     *
     * @param	DoliDB	$db				Database object
     * @param	int		$id_expedition	rowid of shipment
     * @return 	int						-1 if KO, 1 if OK
     */
    public static function deletefromexp($db, $id_expedition)
    {
    }
    /**
     * Retrieve all batch number detailed information of a shipment line
     *
     * @param	DoliDB		$db					Database object
     * @param	int			$id_line_expdet		id of shipment line
     * @param	int			$fk_product			If provided, load also detailed information of lot
     * @return	int|array						-1 if KO, array of ExpeditionLineBatch if OK
     */
    public static function fetchAll($db, $id_line_expdet, $fk_product = 0)
    {
    }
}