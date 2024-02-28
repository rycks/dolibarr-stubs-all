<?php

/* Copyright (C) 2000-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2003      Jean-Louis Bergamo   <jlb@j1b.org>
 * Copyright (C) 2004-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
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
 * or see http://www.gnu.org/
 *
 * Lots of code inspired from Dan Potter's CSMSFile class
 */
/**
 *      \file       htdocs/core/class/CSMSFile.class.php
 *      \brief      File of class to send sms
 *      \author	    Laurent Destailleur.
 */
/**
 *		Class to send SMS
 *      Usage: $smsfile = new CSMSFile($subject,$sendto,$replyto,$message,$filepath,$mimetype,$filename,$cc,$ccc,$deliveryreceipt,$msgishtml,$errors_to);
 *             $smsfile->sendfile();
 */
class CSMSFile
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $addr_from;
    public $addr_to;
    public $deferred;
    public $priority;
    public $class;
    public $message;
    public $nostop;
    /**
     *	CSMSFile
     *
     *	@param	string	$to                 Recipients SMS
     *	@param 	string	$from               Sender SMS
     *	@param 	string	$msg                Message
     *	@param 	int		$deliveryreceipt	Not used
     *	@param 	int		$deferred			Deferred or not
     *	@param 	int		$priority			Priority
     *	@param 	int		$class				Class
     */
    public function __construct($to, $from, $msg, $deliveryreceipt = 0, $deferred = 0, $priority = 3, $class = 1)
    {
    }
    /**
     * Send sms that was prepared by constructor
     *
     * @return    boolean     True if sms sent, false otherwise
     */
    public function sendfile()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write content of a SendSms request into a dump file (mode = all)
     *  Used for debugging.
     *
     *  @return	void
     */
    public function dump_sms()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write content of a SendSms result into a dump file (mode = all)
     *  Used for debugging.
     *
     *  @param	int		$result		Result of sms sending
     *  @return	void
     */
    public function dump_sms_result($result)
    {
    }
}