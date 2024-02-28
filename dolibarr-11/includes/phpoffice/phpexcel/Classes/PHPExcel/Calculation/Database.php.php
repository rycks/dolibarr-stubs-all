<?php

/**
 * PHPExcel_Calculation_Database
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_Database
{
    /**
     * __fieldExtract
     *
     * Extracts the column ID to use for the data field.
     *
     * @access	private
     * @param	mixed[]		$database		The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	mixed		$field			Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @return	string|NULL
     *
     */
    private static function __fieldExtract($database, $field)
    {
    }
    /**
     * __filter
     *
     * Parses the selection criteria, extracts the database rows that match those criteria, and
     * returns that subset of rows.
     *
     * @access	private
     * @param	mixed[]		$database		The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	mixed[]		$criteria		The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	array of mixed
     *
     */
    private static function __filter($database, $criteria)
    {
    }
    /**
     * DAVERAGE
     *
     * Averages the values in a column of a list or database that match conditions you specify.
     *
     * Excel Function:
     *		DAVERAGE(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DAVERAGE($database, $field, $criteria)
    {
    }
    //	function DAVERAGE()
    /**
     * DCOUNT
     *
     * Counts the cells that contain numbers in a column of a list or database that match conditions
     * that you specify.
     *
     * Excel Function:
     *		DCOUNT(database,[field],criteria)
     *
     * Excel Function:
     *		DAVERAGE(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	integer
     *
     * @TODO	The field argument is optional. If field is omitted, DCOUNT counts all records in the
     *			database that match the criteria.
     *
     */
    public static function DCOUNT($database, $field, $criteria)
    {
    }
    //	function DCOUNT()
    /**
     * DCOUNTA
     *
     * Counts the nonblank cells in a column of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DCOUNTA(database,[field],criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	integer
     *
     * @TODO	The field argument is optional. If field is omitted, DCOUNTA counts all records in the
     *			database that match the criteria.
     *
     */
    public static function DCOUNTA($database, $field, $criteria)
    {
    }
    //	function DCOUNTA()
    /**
     * DGET
     *
     * Extracts a single value from a column of a list or database that matches conditions that you
     * specify.
     *
     * Excel Function:
     *		DGET(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	mixed
     *
     */
    public static function DGET($database, $field, $criteria)
    {
    }
    //	function DGET()
    /**
     * DMAX
     *
     * Returns the largest number in a column of a list or database that matches conditions you that
     * specify.
     *
     * Excel Function:
     *		DMAX(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DMAX($database, $field, $criteria)
    {
    }
    //	function DMAX()
    /**
     * DMIN
     *
     * Returns the smallest number in a column of a list or database that matches conditions you that
     * specify.
     *
     * Excel Function:
     *		DMIN(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DMIN($database, $field, $criteria)
    {
    }
    //	function DMIN()
    /**
     * DPRODUCT
     *
     * Multiplies the values in a column of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DPRODUCT(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DPRODUCT($database, $field, $criteria)
    {
    }
    //	function DPRODUCT()
    /**
     * DSTDEV
     *
     * Estimates the standard deviation of a population based on a sample by using the numbers in a
     * column of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DSTDEV(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DSTDEV($database, $field, $criteria)
    {
    }
    //	function DSTDEV()
    /**
     * DSTDEVP
     *
     * Calculates the standard deviation of a population based on the entire population by using the
     * numbers in a column of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DSTDEVP(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DSTDEVP($database, $field, $criteria)
    {
    }
    //	function DSTDEVP()
    /**
     * DSUM
     *
     * Adds the numbers in a column of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DSUM(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DSUM($database, $field, $criteria)
    {
    }
    //	function DSUM()
    /**
     * DVAR
     *
     * Estimates the variance of a population based on a sample by using the numbers in a column
     * of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DVAR(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DVAR($database, $field, $criteria)
    {
    }
    //	function DVAR()
    /**
     * DVARP
     *
     * Calculates the variance of a population based on the entire population by using the numbers
     * in a column of a list or database that match conditions that you specify.
     *
     * Excel Function:
     *		DVARP(database,field,criteria)
     *
     * @access	public
     * @category Database Functions
     * @param	mixed[]			$database	The range of cells that makes up the list or database.
     *										A database is a list of related data in which rows of related
     *										information are records, and columns of data are fields. The
     *										first row of the list contains labels for each column.
     * @param	string|integer	$field		Indicates which column is used in the function. Enter the
     *										column label enclosed between double quotation marks, such as
     *										"Age" or "Yield," or a number (without quotation marks) that
     *										represents the position of the column within the list: 1 for
     *										the first column, 2 for the second column, and so on.
     * @param	mixed[]			$criteria	The range of cells that contains the conditions you specify.
     *										You can use any range for the criteria argument, as long as it
     *										includes at least one column label and at least one cell below
     *										the column label in which you specify a condition for the
     *										column.
     * @return	float
     *
     */
    public static function DVARP($database, $field, $criteria)
    {
    }
    //	function DVARP()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');