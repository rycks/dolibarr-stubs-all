<?php

/**
 * PHPExcel_Reader_DefaultReadFilter
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_DefaultReadFilter implements \PHPExcel_Reader_IReadFilter
{
    /**
     * Should this cell be read?
     *
     * @param 	$column		String column index
     * @param 	$row			Row index
     * @param	$worksheetName	Optional worksheet name
     * @return	boolean
     */
    public function readCell($column, $row, $worksheetName = '')
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');