<?php

/**
 * API class for accountancy
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 *
 */
class Accountancy extends \DolibarrApi
{
    /**
     *
     * @var string[] $FIELDS Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array();
    /**
     * @var BookKeeping $bookkeeping {@type BookKeeping}
     */
    public $bookkeeping;
    /**
     * @var AccountancyExport $accountancyexport {@type AccountancyExport}
     */
    public $accountancyexport;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Accountancy export data
     *
     * @param       string		$period					Period : 'lastmonth', 'currentmonth', 'last3months', 'last6months', 'currentyear', 'lastyear', 'fiscalyear', 'lastfiscalyear', 'actualandlastfiscalyear' or 'custom' (see above)
     * @param		string		$date_min				[=''] Start date of period if 'custom' is set in period parameter
     *													Date format is 'YYYY-MM-DD'
     * @param		string		$date_max				[=''] End date of period if 'custom' is set in period parameter
     *													Date format is 'YYYY-MM-DD'
     * @param		string		$format					[=''] by default uses '1' for 'Configurable (CSV)' for format number
     *													or '1000' for FEC
     *													or '1010' for FEC2
     *													(see AccountancyExport class)
     * @param		int			$lettering				[=0] by default don't export or 1 to export lettering data (columns 'letterring_code' and 'date_lettering' returns empty or not)
     * @param		int			$alreadyexport			[=0] by default export data only if it's not yet exported or 1 already exported (always export data even if 'date_export" is set)
     * @param		int			$notnotifiedasexport	[=0] by default notified as exported or 1 not notified as exported (when the export is done, notified or not the column 'date_export')
     *
     * @return	string
     *
     * @url		GET exportdata
     *
     * @throws	RestException	401		Insufficient rights
     * @throws	RestException	404		Accountancy export period not found
     * @throws	RestException	404		Accountancy export start or end date not defined
     * @throws	RestException	404		Accountancy export format not found
     * @throws	RestException	500		Error on accountancy export
     */
    public function exportData($period, $date_min = '', $date_max = '', $format = '', $lettering = 0, $alreadyexport = 0, $notnotifiedasexport = 0)
    {
    }
}