<?php

/* Copyright (C) 2011-2020  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
 * Copyright (C) 2025		MDW						<mdeweerd@users.noreply.github.com>
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
 * or see https://www.gnu.org/
 *
 * $elementype must be defined.
 */
/**
 *	\file			htdocs/core/actions_extrafields.inc.php
 *  \brief			Code for actions on extrafields admin pages
 */
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var ExtraFields $extrafields
 * @var Translate $langs
 *
 * @var int $error
 * @var string $action
 * @var string $elementtype
 * @var string $value
 */
$maxsizestring = 255;
$maxsizeint = 10;
$mesg = '';
$mesgs = array();
$extrasize = \GETPOST('size', 'intcomma');
$type = \GETPOST('type', 'alphanohtml');
$param = \GETPOST('param', 'alphanohtml');
$css = \GETPOST('css', 'alphanohtml');
$cssview = \GETPOST('cssview', 'alphanohtml');
$csslist = \GETPOST('csslist', 'alphanohtml');
$confirm = \GETPOST('confirm', 'alpha');
// List of reserved words for databases
$listofreservedwords = array('ADD', 'ALL', 'ALTER', 'ANALYZE', 'AND', 'AS', 'ASENSITIVE', 'BEFORE', 'BETWEEN', 'BINARY', 'BLOB', 'BOTH', 'CALL', 'CASCADE', 'CASE', 'CHANGE', 'CHAR', 'CHARACTER', 'CHECK', 'COLLATE', 'COLUMN', 'CONDITION', 'CONSTRAINT', 'CONTINUE', 'CONVERT', 'CREATE', 'CROSS', 'CURRENT_DATE', 'CURRENT_TIME', 'CURRENT_TIMESTAMP', 'CURRENT_USER', 'CURSOR', 'DATABASE', 'DATABASES', 'DAY_HOUR', 'DAY_MICROSECOND', 'DAY_MINUTE', 'DAY_SECOND', 'DECIMAL', 'DECLARE', 'DEFAULT', 'DELAYED', 'DELETE', 'DESC', 'DESCRIBE', 'DETERMINISTIC', 'DISTINCT', 'DISTINCTROW', 'DOUBLE', 'DROP', 'DUAL', 'EACH', 'ELSE', 'ELSEIF', 'ENCLOSED', 'ESCAPED', 'EXISTS', 'EXPLAIN', 'FALSE', 'FETCH', 'FLOAT', 'FLOAT4', 'FLOAT8', 'FORCE', 'FOREIGN', 'FULLTEXT', 'GRANT', 'GROUP', 'HAVING', 'HIGH_PRIORITY', 'HOUR_MICROSECOND', 'HOUR_MINUTE', 'HOUR_SECOND', 'IGNORE', 'IGNORE_SERVER_IDS', 'INDEX', 'INFILE', 'INNER', 'INOUT', 'INSENSITIVE', 'INSERT', 'INT', 'INTEGER', 'INTERVAL', 'INTO', 'ITERATE', 'KEYS', 'KEYWORD', 'LEADING', 'LEAVE', 'LEFT', 'LIKE', 'LIMIT', 'LINES', 'LOCALTIME', 'LOCALTIMESTAMP', 'LONGBLOB', 'LONGTEXT', 'MASTER_SSL_VERIFY_SERVER_CERT', 'MATCH', 'MEDIUMBLOB', 'MEDIUMINT', 'MEDIUMTEXT', 'MIDDLEINT', 'MINUTE_MICROSECOND', 'MINUTE_SECOND', 'MODIFIES', 'NATURAL', 'NOT', 'NO_WRITE_TO_BINLOG', 'NUMERIC', 'OFFSET', 'ON', 'OPTION', 'OPTIONALLY', 'OUTER', 'OUTFILE', 'OVER', 'PARTITION', 'POSITION', 'PRECISION', 'PRIMARY', 'PROCEDURE', 'PURGE', 'RANGE', 'READS', 'READ_WRITE', 'REAL', 'REFERENCES', 'REGEXP', 'RELEASE', 'RENAME', 'REPEAT', 'REQUIRE', 'RESTRICT', 'RETURN', 'REVOKE', 'RIGHT', 'RLIKE', 'SCHEMAS', 'SECOND_MICROSECOND', 'SENSITIVE', 'SEPARATOR', 'SIGNAL', 'SMALLINT', 'SPATIAL', 'SPECIFIC', 'SQLEXCEPTION', 'SQLSTATE', 'SQLWARNING', 'SQL_BIG_RESULT', 'SQL_CALC_FOUND_ROWS', 'SQL_SMALL_RESULT', 'SSL', 'STARTING', 'STRAIGHT_JOIN', 'TABLE', 'TERMINATED', 'TINYBLOB', 'TINYINT', 'TINYTEXT', 'TRAILING', 'TRIGGER', 'UNDO', 'UNIQUE', 'UNSIGNED', 'UPDATE', 'USAGE', 'USING', 'UTC_DATE', 'UTC_TIME', 'UTC_TIMESTAMP', 'VALUES', 'VARBINARY', 'VARCHAR', 'VARYING', 'WHEN', 'WHERE', 'WHILE', 'WRITE', 'XOR', 'YEAR_MONTH', 'ZEROFILL');
$attributekey = \GETPOST('attrname', 'aZ09');