<?php

/**
 *  Class to read/parse ICal calendars
 */
class ICal
{
    /**
     * @var string	Name of remote HTTP file to read
     */
    public $file;
    /**
     * @var string  Text in file
     */
    public $file_text;
    /**
     * @var  array<string,array<'VEVENT'|'VFREEBUSY'|'VTODO',array<int,array<string,string>>>>|array<string,array<int,array<string,array<string,int>>>>|array<string,array<int,array<string,int>>>|array<string,array<int,array<string,string>>>	Array to save iCalendar parse data
     */
    public $cal;
    /**
     * @var int Number of Events
     */
    public $event_count;
    /**
     * @var int Number of Todos
     */
    public $todo_count;
    /**
     * @var int Number of Freebusy
     */
    public $freebusy_count;
    /**
     * @var string Help variable save last key (multiline string)
     */
    public $last_key;
    /**
     * @var string error message
     */
    public $error;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Read text file, icalender text file
     *
     *  @param  string  		$file       File
     *  @return string|null					Content of remote file read or null if error
     */
    public function read_file($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns the number of calendar events
     *
     * @return int
     */
    public function get_event_count()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns the number of to do
     *
     * @return int
     */
    public function get_todo_count()
    {
    }
    /**
     * Translate Calendar
     *
     * @param	string	 	$uri			Url
     * @param	string		$usecachefile	Full path of a cache file to use a cache file
     * @param	int			$delaycache		Delay in seconds for cache (by default 3600 secondes)
     * @return  string|array<string,array<'VEVENT'|'VFREEBUSY'|'VTODO',array<int,array<string,string>>>>|array<string,array<int,array<string,array<string,int>>>>|array<string,array<int,array<string,int>>>|array<string,array<int,array<string,string>>>
     */
    public function parse($uri, $usecachefile = '', $delaycache = 3600)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add to $this->ical array one value and key.
     *
     * @param 	string 	$type		Type ('VTODO', 'VEVENT', 'VFREEBUSY', 'VCALENDAR'...)
     * @param 	string 	$key		Key	('DTSTART', ...). Note: Field is never 'DTSTART;TZID=...' because ';...' was before removed and added as another property
     * @param 	string 	$value		Value
     * @return	void
     */
    public function add_to_array($type, $key, $value)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Parse text "XXXX:value text some with : " and return array($key = "XXXX", $value="value");
     *
     * @param 	string 	$text	Text
     * @return 	array{0:string,1:string}
     */
    public function retun_key_value($text)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Parse RRULE  return array
     *
     * @param 	string 	$value	string
     * @return 	array<string,string>
     */
    public function ical_rrule($value)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return Unix time from ical date time format (YYYYMMDD[T]HHMMSS[Z] or YYYYMMDD[T]HHMMSS)
     *
     * @param 	string		$ical_date		String date
     * @return 	int
     */
    public function ical_date_to_unix($ical_date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return unix date from iCal date format
     *
     * @param 	string 		$key			Key. Example: 'DTSTART', 'DTSTART;TZID=US-Eastern'
     * @param 	string 		$value			Value. Example: '19970714T133000', '19970714T173000Z', '19970714T133000'
     * @return 	array{0:string,1:int}|array{0:string,1:array<string,int|string>}
     */
    public function ical_dt_date($key, $value)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return sorted eventlist as array or false if calendar is empty
     *
     * @return array<int,array<string,string>>|false
     */
    public function get_sort_event_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Compare two unix timestamp
     *
     * @param 	array{DTSTART:array{unixtime:string}} 	$a		Operand a
     * @param 	array{DTSTART:array{unixtime:string}}  	$b		Operand b
     * @return 	int
     */
    public function ical_dtstart_compare($a, $b)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return eventlist array (not sorted eventlist array)
     *
     * @return array<int,array<string,string>>
     */
    public function get_event_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return freebusy array (not sort eventlist array)
     *
     * @return array<int,array<string,string>>
     */
    public function get_freebusy_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return to do array (not sorted todo array)
     *
     * @return array<int,array<string,string>>
     */
    public function get_todo_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return base calendar data
     *
     * @return array<int,array<string,string>>
     */
    public function get_calender_data()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return array with all data
     *
     * @return  array<string,array<'VEVENT'|'VFREEBUSY'|'VTODO',array<int,array<string,string>>>>|array<string,array<int,array<string,array<string,int>>>>|array<string,array<int,array<string,int>>>|array<string,array<int,array<string,string>>>
     */
    public function get_all_data()
    {
    }
}