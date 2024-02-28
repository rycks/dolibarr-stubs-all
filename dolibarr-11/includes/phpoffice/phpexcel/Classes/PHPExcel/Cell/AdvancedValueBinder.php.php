<?php

/**
 * PHPExcel_Cell_AdvancedValueBinder
 *
 * @category   PHPExcel
 * @package    PHPExcel_Cell
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Cell_AdvancedValueBinder extends \PHPExcel_Cell_DefaultValueBinder implements \PHPExcel_Cell_IValueBinder
{
    /**
     * Bind value to a cell
     *
     * @param  PHPExcel_Cell  $cell  Cell to bind value to
     * @param  mixed $value          Value to bind in cell
     * @return boolean
     */
    public function bindValue(\PHPExcel_Cell $cell, $value = \null)
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');