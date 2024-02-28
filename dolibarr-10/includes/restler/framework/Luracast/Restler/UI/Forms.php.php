<?php

namespace Luracast\Restler\UI;

/**
 * Utility class for automatically generating forms for the given http method
 * and api url
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Forms implements \Luracast\Restler\iFilter
{
    const FORM_KEY = 'form_key';
    public static $filterFormRequestsOnly = false;
    public static $excludedPaths = array();
    public static $style;
    /**
     * @var bool should we fill up the form using given data?
     */
    public static $preFill = true;
    /**
     * @var ValidationInfo
     */
    public static $validationInfo = null;
    protected static $inputTypes = array('hidden', 'password', 'button', 'image', 'file', 'reset', 'submit', 'search', 'checkbox', 'radio', 'email', 'text', 'color', 'date', 'datetime', 'datetime-local', 'email', 'month', 'number', 'range', 'search', 'tel', 'time', 'url', 'week');
    protected static $fileUpload = false;
    private static $key = array();
    /**
     * @var ApiMethodInfo;
     */
    private static $info;
    /**
     * Get the form
     *
     * @param string $method   http method to submit the form
     * @param string $action   relative path from the web root. When set to null
     *                         it uses the current api method's path
     * @param bool   $dataOnly if you want to render the form yourself use this
     *                         option
     * @param string $prefix   used for adjusting the spacing in front of
     *                         form elements
     * @param string $indent   used for adjusting indentation
     *
     * @return array|T
     *
     * @throws \Luracast\Restler\RestException
     */
    public static function get($method = 'POST', $action = null, $dataOnly = false, $prefix = '', $indent = '    ')
    {
    }
    public static function style($name, array $metadata, $type = '')
    {
    }
    public static function fields($dataOnly = false)
    {
    }
    /**
     * @param ValidationInfo $p
     *
     * @param bool           $dataOnly
     *
     * @return array|T
     */
    public static function field(\Luracast\Restler\Data\ValidationInfo $p, $dataOnly = false)
    {
    }
    protected static function guessFieldType(\Luracast\Restler\Data\ValidationInfo $p, $type = 'type')
    {
    }
    /**
     * Get the form key
     *
     * @param string $method   http method for form key
     * @param string $action   relative path from the web root. When set to null
     *                         it uses the current api method's path
     *
     * @return string generated form key
     */
    public static function key($method = 'POST', $action = null)
    {
    }
    /**
     * Access verification method.
     *
     * API access will be denied when this method returns false
     *
     * @return boolean true when api access is allowed false otherwise
     *
     * @throws RestException 403 security violation
     */
    public function __isAllowed()
    {
    }
}