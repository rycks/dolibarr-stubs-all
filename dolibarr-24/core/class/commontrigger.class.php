<?php

/* Copyright (C) 2006-2026  Laurent Destailleur <eldy@users.sourceforge.net>
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
 * Parent class of all other business classes (invoices, contracts, proposals, orders, ...)
 *
 * @phan-forbid-undeclared-magic-properties
 */
trait CommonTrigger
{
    /**
     * @var DoliDB		Database handler (result of a new DoliDB)
     */
    public $db;
    /**
     * @var string 		Error string
     * @see             $errors
     */
    public $error;
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
    /**
     * @var string		Prefix to check for any trigger code of any business class to prevent bad value for trigger code.
     * @see CommonTrigger::call_trigger()
     *
     * We do not use a constant because PHP does not support constant in Trait and does not allow overriding a constant without using "override" key
     * that is not available on all PHP versions
     */
    public $TRIGGER_PREFIX = '';
    // to be overridden in child class implementations, i.e. 'BILL', 'TASK', 'PROPAL', etc. It is used to check that trigger code matches object name.
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Call trigger based on this instance.
     * Some context information may also be provided into array property this->context.
     * NB:  Error from trigger are stacked in interface->errors
     * NB2: If return code of triggers are < 0, action calling trigger should cancel all transaction.
     *
     * @param   string    $triggerName  Trigger's name to execute
     * @param   ?User     $user         Object user
     * @return  int                     Nb of triggers ran if no error, -Nb of triggers with errors otherwise.
     */
    public function call_trigger($triggerName, $user)
    {
    }
}