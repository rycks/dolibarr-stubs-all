<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category    PHPExcel
 * @package    PHPExcel
 * @copyright    Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_DocumentProperties
 *
 * @category    PHPExcel
 * @package        PHPExcel
 * @copyright    Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_DocumentProperties
{
    /** constants */
    const PROPERTY_TYPE_BOOLEAN = 'b';
    const PROPERTY_TYPE_INTEGER = 'i';
    const PROPERTY_TYPE_FLOAT = 'f';
    const PROPERTY_TYPE_DATE = 'd';
    const PROPERTY_TYPE_STRING = 's';
    const PROPERTY_TYPE_UNKNOWN = 'u';
    /**
     * Creator
     *
     * @var string
     */
    private $_creator = 'Unknown Creator';
    /**
     * LastModifiedBy
     *
     * @var string
     */
    private $_lastModifiedBy;
    /**
     * Created
     *
     * @var datetime
     */
    private $_created;
    /**
     * Modified
     *
     * @var datetime
     */
    private $_modified;
    /**
     * Title
     *
     * @var string
     */
    private $_title = 'Untitled Spreadsheet';
    /**
     * Description
     *
     * @var string
     */
    private $_description = '';
    /**
     * Subject
     *
     * @var string
     */
    private $_subject = '';
    /**
     * Keywords
     *
     * @var string
     */
    private $_keywords = '';
    /**
     * Category
     *
     * @var string
     */
    private $_category = '';
    /**
     * Manager
     *
     * @var string
     */
    private $_manager = '';
    /**
     * Company
     *
     * @var string
     */
    private $_company = 'Microsoft Corporation';
    /**
     * Custom Properties
     *
     * @var string
     */
    private $_customProperties = array();
    /**
     * Create a new PHPExcel_DocumentProperties
     */
    public function __construct()
    {
    }
    /**
     * Get Creator
     *
     * @return string
     */
    public function getCreator()
    {
    }
    /**
     * Set Creator
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setCreator($pValue = '')
    {
    }
    /**
     * Get Last Modified By
     *
     * @return string
     */
    public function getLastModifiedBy()
    {
    }
    /**
     * Set Last Modified By
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setLastModifiedBy($pValue = '')
    {
    }
    /**
     * Get Created
     *
     * @return datetime
     */
    public function getCreated()
    {
    }
    /**
     * Set Created
     *
     * @param datetime $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setCreated($pValue = \null)
    {
    }
    /**
     * Get Modified
     *
     * @return datetime
     */
    public function getModified()
    {
    }
    /**
     * Set Modified
     *
     * @param datetime $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setModified($pValue = \null)
    {
    }
    /**
     * Get Title
     *
     * @return string
     */
    public function getTitle()
    {
    }
    /**
     * Set Title
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setTitle($pValue = '')
    {
    }
    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
    }
    /**
     * Set Description
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setDescription($pValue = '')
    {
    }
    /**
     * Get Subject
     *
     * @return string
     */
    public function getSubject()
    {
    }
    /**
     * Set Subject
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setSubject($pValue = '')
    {
    }
    /**
     * Get Keywords
     *
     * @return string
     */
    public function getKeywords()
    {
    }
    /**
     * Set Keywords
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setKeywords($pValue = '')
    {
    }
    /**
     * Get Category
     *
     * @return string
     */
    public function getCategory()
    {
    }
    /**
     * Set Category
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setCategory($pValue = '')
    {
    }
    /**
     * Get Company
     *
     * @return string
     */
    public function getCompany()
    {
    }
    /**
     * Set Company
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setCompany($pValue = '')
    {
    }
    /**
     * Get Manager
     *
     * @return string
     */
    public function getManager()
    {
    }
    /**
     * Set Manager
     *
     * @param string $pValue
     * @return PHPExcel_DocumentProperties
     */
    public function setManager($pValue = '')
    {
    }
    /**
     * Get a List of Custom Property Names
     *
     * @return array of string
     */
    public function getCustomProperties()
    {
    }
    /**
     * Check if a Custom Property is defined
     *
     * @param string $propertyName
     * @return boolean
     */
    public function isCustomPropertySet($propertyName)
    {
    }
    /**
     * Get a Custom Property Value
     *
     * @param string $propertyName
     * @return string
     */
    public function getCustomPropertyValue($propertyName)
    {
    }
    /**
     * Get a Custom Property Type
     *
     * @param string $propertyName
     * @return string
     */
    public function getCustomPropertyType($propertyName)
    {
    }
    /**
     * Set a Custom Property
     *
     * @param string $propertyName
     * @param mixed $propertyValue
     * @param string $propertyType
     * 	 'i'    : Integer
     *   'f' : Floating Point
     *   's' : String
     *   'd' : Date/Time
     *   'b' : Boolean
     * @return PHPExcel_DocumentProperties
     */
    public function setCustomProperty($propertyName, $propertyValue = '', $propertyType = \NULL)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
    public static function convertProperty($propertyValue, $propertyType)
    {
    }
    public static function convertPropertyType($propertyType)
    {
    }
}