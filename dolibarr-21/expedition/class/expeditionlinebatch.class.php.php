<?php

/* Copyright (C) 2007-2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2013-2014 Cedric GROSS         <c.gross@kreiz-it.fr>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
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
 *  \file       htdocs/expedition/class/expeditionlinebatch.class.php
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
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'expeditiondet_batch';
    /**
     * @var null|int|string
     */
    public $sellby;
    /**
     * @var null|int|string
     */
    public $eatby;
    /**
     * @var ?string
     */
    public $batch;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var null|float
     * @deprecated Use $qty
     */
    public $dluo_qty;
    /**
     * @var int
     */
    public $entrepot_id;
    /**
     * @var int
     */
    public $fk_origin_stock;
    // rowid in llx_product_batch table (not useful)
    /**
     * @var int
     */
    public $fk_warehouse;
    // warehouse ID
    /**
     * @var int
     */
    public $fk_expeditiondet;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Fill object based on a product-warehouse-batch's record
     *
     * @param	int		$id_stockdluo	Rowid in product_batch table
     * @return	int      		   	 	-1 if KO, 1 if OK
     */
    public function fetchFromStock($id_stockdluo)
    {
    }
    /**
     * Create an expeditiondet_batch DB record link to an expedtiondet record
     *
     * @param	int		$id_line_expdet		rowid of expedtiondet record
     * @param	User	$f_user				User that create
     * @param	int		$notrigger			1 = disable triggers
     * @return	int							Return integer <0 if KO, Id of record (>0) if OK
     */
    public function create($id_line_expdet, $f_user = \null, $notrigger = 0)
    {
    }
    /**
     * Delete batch record attach to a shipment
     *
     * @param	int		$id_expedition	rowid of shipment
     * @return 	int						-1 if KO, 1 if OK
     */
    public function deleteFromShipment($id_expedition)
    {
    }
    /**
     * Retrieve all batch number detailed information of a shipment line
     *
     * @param	int			$id_line_expdet			id of shipment line
     * @param	int			$fk_product				If provided, load also detailed information of lot
     * @return	int<-1,-1>|ExpeditionLineBatch[]	-1 if KO, array of ExpeditionLineBatch if OK
     */
    public function fetchAll($id_line_expdet, $fk_product = 0)
    {
    }
}