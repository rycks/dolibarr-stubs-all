<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOIPCHECK', '1');
\define("DOLENTITY", $entity);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Societe $mysoc
 * @var Translate $langs
 * @var User $user
 */
$fichinterStatic = new \Fichinter($db);
// phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
/**
 * Export events from database into a cal file.
 *
 * @param string    $format         			The format of the export 'vcal', 'ical/ics' or 'rss'
 * @param string    $type           			The type of the export 'event' or 'journal'
 * @param integer   $cachedelay     			Do not rebuild file if date older than cachedelay seconds
 * @param string    $filename       			The name for the exported file.
 * @param array<string,int|string>	$filters	Array of filters.
 * @return int<-1,1>                			-1 = error on build export file, 0 = export okay
 */
function build_exportfile($format, $type, $cachedelay, $filename, $filters)
{
}