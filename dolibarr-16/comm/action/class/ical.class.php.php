<?php

/**
 *  Class to read/parse ICal calendars
 */
class ICal
{
    // Text in file
    public $file_text;
    public $cal;
    // Array to save iCalendar parse data
    public $event_count;
    // Number of Events
    public $todo_count;
    // Number of Todos
    public $freebusy_count;
    // Number of Freebusy
    public $last_key;
    //Help variable save last key (multiline string)
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
     *  @param  string  $file       File
     *  @return string
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
     * @param	string 	$uri	Url
     * @return	array|string
     */
    public function parse($uri)
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
     * @return 	array
     */
    public function retun_key_value($text)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Parse RRULE  return array
     *
     * @param 	string 	$value	string
     * @return 	array
     */
    public function ical_rrule($value)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return Unix time from ical date time fomrat (YYYYMMDD[T]HHMMSS[Z] or YYYYMMDD[T]HHMMSS)
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
     * @param 	string 		$key			Key
     * @param 	string 		$value			Value
     * @return 	array
     */
    public function ical_dt_date($key, $value)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return sorted eventlist as array or false if calendar is empty
     *
     * @return array|false
     */
    public function get_sort_event_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Compare two unix timestamp
     *
     * @param 	array 	$a		Operand a
     * @param 	array 	$b		Operand b
     * @return 	integer
     */
    public function ical_dtstart_compare($a, $b)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return eventlist array (not sorted eventlist array)
     *
     * @return array
     */
    public function get_event_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return freebusy array (not sort eventlist array)
     *
     * @return array
     */
    public function get_freebusy_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return to do array (not sorted todo array)
     *
     * @return array
     */
    public function get_todo_list()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return base calendar data
     *
     * @return array
     */
    public function get_calender_data()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return array with all data
     *
     * @return array
     */
    public function get_all_data()
    {
    }
}