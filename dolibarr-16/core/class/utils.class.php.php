<?php

/* Copyright (C) 2016	Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2021	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2022	Anthony Berton		<anthony.berton@bb2a.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * any later version.
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
 *   	\file       htdocs/core/class/utils.class.php
 *      \ingroup    core
 *		\brief      File for Utils class
 */
/**
 *		Class to manage utility methods
 */
class Utils
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $output;
    // Used by Cron method to return message
    public $result;
    // Used by Cron method to return data
    /**
     *	Constructor
     *
     *  @param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Purge files into directory of data files.
     *  CAN BE A CRON TASK
     *
     *  @param	string      $choices	   Choice of purge mode ('tempfiles', 'tempfilesold' to purge temp older than $nbsecondsold seconds, 'logfiles', or mix of this). Note 'allfiles' is possible too but very dangerous.
     *  @param  int         $nbsecondsold  Nb of seconds old to accept deletion of a directory if $choice is 'tempfilesold'
     *  @return	int						   0 if OK, < 0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function purgeFiles($choices = 'tempfilesold+logfiles', $nbsecondsold = 86400)
    {
    }
    /**
     *  Make a backup of database
     *  CAN BE A CRON TASK
     *
     *  @param	string		$compression	   'gz' or 'bz' or 'none'
     *  @param  string      $type              'mysql', 'postgresql', ...
     *  @param  int         $usedefault        1=Use default backup profile (Set this to 1 when used as cron)
     *  @param  string      $file              'auto' or filename to build
     *  @param  int         $keeplastnfiles    Keep only last n files (not used yet)
     *  @param	int		    $execmethod		   0=Use default method (that is 1 by default), 1=Use the PHP 'exec' - need size of dump in memory, but low memory method is used if GETPOST('lowmemorydump') is set, 2=Use the 'popen' method (low memory method)
     *  @param	int			$lowmemorydump	   1=Use the low memory method
     *  @return	int						       0 if OK, < 0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function dumpDatabase($compression = 'none', $type = 'auto', $usedefault = 1, $file = 'auto', $keeplastnfiles = 0, $execmethod = 0, $lowmemorydump = 0)
    {
    }
    /**
     * Execute a CLI command.
     *
     * @param 	string	$command			Command line to execute.
     * 										Warning: The command line is sanitize so can't contains any redirection char '>'. Use param $redirectionfile if you need it.
     * @param 	string	$outputfile			A path for an output file (used only when method is 2). For example: $conf->admin->dir_temp.'/out.tmp';
     * @param	int		$execmethod			0=Use default method (that is 1 by default), 1=Use the PHP 'exec', 2=Use the 'popen' method
     * @param	string	$redirectionfile	If defined, a redirection of output to this file is added.
     * @param	int		$noescapecommand	1=Do not escape command. Warning: Using this parameter need you alreay sanitized the command. if not, it will lead to security vulnerability.
     * 										This parameter is provided for backward compatibility with external modules. Always use 0 in core.
     * @param	string	$redirectionfileerr	If defined, a redirection of error is added to this file instead of to channel 1.
     * @return	array						array('result'=>...,'output'=>...,'error'=>...). result = 0 means OK.
     */
    public function executeCLI($command, $outputfile, $execmethod = 0, $redirectionfile = \null, $noescapecommand = 0, $redirectionfileerr = \null)
    {
    }
    /**
     * Generate documentation of a Module
     *
     * @param 	string	$module		Module name
     * @return	int					<0 if KO, >0 if OK
     */
    public function generateDoc($module)
    {
    }
    /**
     * This saves syslog files and compresses older ones.
     * Nb of archive to keep is defined into $conf->global->SYSLOG_FILE_SAVES
     * CAN BE A CRON TASK
     *
     * @return	int						0 if OK, < 0 if KO
     */
    public function compressSyslogs()
    {
    }
    /**	Backup the db OR just a table without mysqldump binary, with PHP only (does not require any exec permission)
     *	Author: David Walsh (http://davidwalsh.name/backup-mysql-database-php)
     *	Updated and enhanced by Stephen Larroque (lrq3000) and by the many commentators from the blog
     *	Note about foreign keys constraints: for Dolibarr, since there are a lot of constraints and when imported the tables will be inserted in the dumped order, not in constraints order, then we ABSOLUTELY need to use SET FOREIGN_KEY_CHECKS=0; when importing the sql dump.
     *	Note2: db2SQL by Howard Yeend can be an alternative, by using SHOW FIELDS FROM and SHOW KEYS FROM we could generate a more precise dump (eg: by getting the type of the field and then precisely outputting the right formatting - in quotes, numeric or null - instead of trying to guess like we are doing now).
     *
     *	@param	string	$outputfile		Output file name
     *	@param	string	$tables			Table name or '*' for all
     *	@return	int						<0 if KO, >0 if OK
     */
    public function backupTables($outputfile, $tables = '*')
    {
    }
    /**
     *  Make a send last backup of database or fil in param
     *  CAN BE A CRON TASK
     *
     *	@param 	string	$sendto              Recipients emails
     *	@param 	string  $from                Sender email
     *	@param 	string	$subject             Topic/Subject of mail
     *	@param 	string	$message             Message
     *	@param 	string	$filename		     List of files to attach (full path of filename on file system)
     * 	@param 	string	$filter			     Filter file send
     *  @return	int						     0 if OK, < 0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendBackup($sendto = '', $from = '', $subject = '', $message = '', $filename = '', $filter = '')
    {
    }
}