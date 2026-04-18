<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define("NOLOGIN", '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$module = \GETPOST('module', 'aZ09arobase');
$uploaddirname = \dol_sanitizeFileName(\GETPOST('uploaddirname', 'alpha'));
$flowFilename = \GETPOST('flowFilename', 'alpha');
$flowIdentifier = \GETPOST('flowIdentifier', 'alpha');
$flowChunkNumber = \GETPOST('flowChunkNumber', 'alpha');
$flowChunkSize = \GETPOST('flowChunkSize', 'alpha');
$flowTotalSize = \GETPOST('flowTotalSize', 'alpha');
$result = \restrictedArea($user, $module ? $module : 'unknown', 0, '', '', 'fk_soc', 'rowid', 0, 1);
$upload_dir = $conf->{$module}->dir_temp;
$result = \false;
$chunk_file = $temp_dir . '/' . $flowFilename . '.part' . $flowChunkNumber;
/**
 * Check if all the parts exist, and gather all the parts of the file together.
 *
 * @param string    $temp_dir 		the temporary directory holding all the parts of the file
 * @param string    $upload_dir 	the temporary directory to create file
 * @param string    $fileName 		the original file name
 * @param string    $chunkSize 		each chunk size (in bytes)
 * @param string    $totalSize 		original file size (in bytes)
 * @return bool     				true if Ok false else
 */
function createFileFromChunks($temp_dir, $upload_dir, $fileName, $chunkSize, $totalSize)
{
}