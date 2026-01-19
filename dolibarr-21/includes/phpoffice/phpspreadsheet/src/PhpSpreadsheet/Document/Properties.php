<?php

namespace PhpOffice\PhpSpreadsheet\Document;

class Properties
{
    /** constants */
    const PROPERTY_TYPE_BOOLEAN = 'b';
    const PROPERTY_TYPE_INTEGER = 'i';
    const PROPERTY_TYPE_FLOAT = 'f';
    const PROPERTY_TYPE_DATE = 'd';
    const PROPERTY_TYPE_STRING = 's';
    const PROPERTY_TYPE_UNKNOWN = 'u';
    /**
     * Creator.
     *
     * @var string
     */
    private $creator = 'Unknown Creator';
    /**
     * LastModifiedBy.
     *
     * @var string
     */
    private $lastModifiedBy;
    /**
     * Created.
     *
     * @var int
     */
    private $created;
    /**
     * Modified.
     *
     * @var int
     */
    private $modified;
    /**
     * Title.
     *
     * @var string
     */
    private $title = 'Untitled Spreadsheet';
    /**
     * Description.
     *
     * @var string
     */
    private $description = '';
    /**
     * Subject.
     *
     * @var string
     */
    private $subject = '';
    /**
     * Keywords.
     *
     * @var string
     */
    private $keywords = '';
    /**
     * Category.
     *
     * @var string
     */
    private $category = '';
    /**
     * Manager.
     *
     * @var string
     */
    private $manager = '';
    /**
     * Company.
     *
     * @var string
     */
    private $company = 'Microsoft Corporation';
    /**
     * Custom Properties.
     *
     * @var string
     */
    private $customProperties = [];
    /**
     * Create a new Document Properties instance.
     */
    public function __construct()
    {
    }
    /**
     * Get Creator.
     *
     * @return string
     */
    public function getCreator()
    {
    }
    /**
     * Set Creator.
     *
     * @param string $creator
     *
     * @return $this
     */
    public function setCreator($creator)
    {
    }
    /**
     * Get Last Modified By.
     *
     * @return string
     */
    public function getLastModifiedBy()
    {
    }
    /**
     * Set Last Modified By.
     *
     * @param string $pValue
     *
     * @return $this
     */
    public function setLastModifiedBy($pValue)
    {
    }
    /**
     * Get Created.
     *
     * @return int
     */
    public function getCreated()
    {
    }
    /**
     * Set Created.
     *
     * @param int|string $time
     *
     * @return $this
     */
    public function setCreated($time)
    {
    }
    /**
     * Get Modified.
     *
     * @return int
     */
    public function getModified()
    {
    }
    /**
     * Set Modified.
     *
     * @param int|string $time
     *
     * @return $this
     */
    public function setModified($time)
    {
    }
    /**
     * Get Title.
     *
     * @return string
     */
    public function getTitle()
    {
    }
    /**
     * Set Title.
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
    }
    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription()
    {
    }
    /**
     * Set Description.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
    }
    /**
     * Get Subject.
     *
     * @return string
     */
    public function getSubject()
    {
    }
    /**
     * Set Subject.
     *
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
    }
    /**
     * Get Keywords.
     *
     * @return string
     */
    public function getKeywords()
    {
    }
    /**
     * Set Keywords.
     *
     * @param string $keywords
     *
     * @return $this
     */
    public function setKeywords($keywords)
    {
    }
    /**
     * Get Category.
     *
     * @return string
     */
    public function getCategory()
    {
    }
    /**
     * Set Category.
     *
     * @param string $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
    }
    /**
     * Get Company.
     *
     * @return string
     */
    public function getCompany()
    {
    }
    /**
     * Set Company.
     *
     * @param string $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
    }
    /**
     * Get Manager.
     *
     * @return string
     */
    public function getManager()
    {
    }
    /**
     * Set Manager.
     *
     * @param string $manager
     *
     * @return $this
     */
    public function setManager($manager)
    {
    }
    /**
     * Get a List of Custom Property Names.
     *
     * @return array of string
     */
    public function getCustomProperties()
    {
    }
    /**
     * Check if a Custom Property is defined.
     *
     * @param string $propertyName
     *
     * @return bool
     */
    public function isCustomPropertySet($propertyName)
    {
    }
    /**
     * Get a Custom Property Value.
     *
     * @param string $propertyName
     *
     * @return mixed
     */
    public function getCustomPropertyValue($propertyName)
    {
    }
    /**
     * Get a Custom Property Type.
     *
     * @param string $propertyName
     *
     * @return string
     */
    public function getCustomPropertyType($propertyName)
    {
    }
    /**
     * Set a Custom Property.
     *
     * @param string $propertyName
     * @param mixed $propertyValue
     * @param string $propertyType
     *      'i'    : Integer
     *   'f' : Floating Point
     *   's' : String
     *   'd' : Date/Time
     *   'b' : Boolean
     *
     * @return $this
     */
    public function setCustomProperty($propertyName, $propertyValue = '', $propertyType = null)
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