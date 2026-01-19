<?php

/* Copyright (C) 2024		William Mead		<william.mead@manchenumerique.fr>
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
 *	\file       htdocs/core/class/commonsignedobject.class.php
 *	\ingroup    core
 *	\brief      File of trait for common signed business objects (contracts, interventions, ...)
 */
/**
 * Trait for common signed business objects
 * @property	DoliDB				$db
 * @property	static				$oldcopy
 * @property	int					$id
 * @property	string				$error
 * @property	string				$table_element
 * @property	array<string,mixed>	$context
 * @method		int					call_trigger(string $triggerName, User $user)
 */
trait CommonSignedObject
{
    /**
     * Status of the contract (0=NoSignature, 1=SignedBySender, 2=SignedByReceiver, 9=SignedByAll)
     * @var int
     */
    public $signed_status = 0;
    /**
     * Signed statuses dictionary. Label used as key for string localizations.
     * When min. required PHP is 8.2 this can be updated to a constant
     * @var array<string,int>
     */
    public static $SIGNED_STATUSES = ['STATUS_NO_SIGNATURE' => 0, 'STATUS_SIGNED_SENDER' => 1, 'STATUS_SIGNED_RECEIVER' => 2, 'STATUS_SIGNED_RECEIVER_ONLINE' => 3, 'STATUS_SIGNED_ALL' => 9];
    /**
     *	Returns an array of signed statuses with associated localized labels
     *
     *	@return array<string>
     */
    public function getSignedStatusLocalisedArray() : array
    {
    }
    /**
     * Set signed status & object context. Call sign action trigger.
     *
     * @param	User	$user			Object user that modify
     * @param	int		$status			New signed status to set (often a constant like self::STATUS_XXX)
     * @param	int		$notrigger		1 = Does not execute triggers, 0 = Execute triggers
     * @param	string	$triggercode	Trigger code to use
     * @return	int						0 < if KO, > 0 if OK
     */
    public function setSignedStatus(\User $user, int $status = 0, int $notrigger = 0, string $triggercode = '') : int
    {
    }
    /**
     * Set signed status & call trigger with context message
     *
     * @param	User	$user			Object user that modify
     * @param	int		$status			New signed status to set (often a constant like self::STATUS_XXX)
     * @param	int		$notrigger		1 = Does not execute triggers, 0 = Execute triggers
     * @param	string	$triggercode	Trigger code to use
     * @return	int						0 < if KO, > 0 if OK
     */
    public function setSignedStatusCommon(\User $user, int $status, int $notrigger = 0, string $triggercode = '') : int
    {
    }
    /**
     *	Returns the label for signed status
     *
     *	@param		int		$mode	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return		string			Label
     */
    public function getLibSignedStatus(int $mode = 0) : string
    {
    }
}