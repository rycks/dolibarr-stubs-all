<?php

$code = \getDolGlobalString('MAIN_INFO_ACCOUNTANT_CODE');
$prefix = \getDolGlobalString('ACCOUNTING_EXPORT_PREFIX_SPEC');
$format = \getDolGlobalString('ACCOUNTING_EXPORT_FORMAT');
$nodateexport = \getDolGlobalInt('ACCOUNTING_EXPORT_NO_DATE_IN_FILENAME');
$siren = \getDolGlobalString('MAIN_INFO_SIREN');
$date_export = "_" . \dol_print_date(\dol_now(), '%Y%m%d%H%M%S');
$startaccountingperiod = '';
$endaccountingperiod = \dol_print_date(\dol_now(), '%Y%m%d');
$accountancyexport = new \AccountancyExport($db);
$datetouseforfilename = $search_date_end;
$tmparray = \dol_getdate($datetouseforfilename);
$fiscalmonth = \getDolGlobalInt('SOCIETE_FISCAL_MONTH_START', 1);
$endaccountingperiod = \dol_print_date(\dol_get_last_day($tmparray['year'], $tmparray['mon']), 'dayxcard');
$siren = \str_replace(" ", "", $siren);
$completefilename = $siren . "FEC" . $endaccountingperiod . ".txt";
$parameters = array(
    'type_export' => $type_export ?? '',
    'format' => $format ?? '',
    'format_code' => $accountancyexport->getFormatCode($formatexportset),
    'code' => $code ?? '',
    'prefix' => $prefix ?? '',
    'filename' => $filename ?? '',
    'period_start' => $startaccountingperiod,
    'period_end' => $endaccountingperiod ?? '',
    'siren' => $siren ?? '',
    'ndate_in_filename' => $nodateexport ?? 0,
    'now_datetime' => $date_export,
    // Value by default
    'defaultfilename' => $completefilename,
);
// Hook called by modules: setExportFilename
$reshook = $hookmanager->executeHooks('setExportFilename', $parameters, $accountancyexport, $action);