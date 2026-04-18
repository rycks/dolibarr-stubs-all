<?php

/**
 *    Class to common select field
 */
class CommonSelectField extends \CommonField
{
    /**
     * @var array<string,array<string,array{label:string,parent:string}>>	Options cached
     */
    public static $options = array();
    /**
     * Get list of options
     *
     * @param   FieldInfos    										$fieldInfos     Array of properties for field to show
     * @param	string												$key			Key of field
     * @param	bool												$addEmptyValue	Add also empty value if needed
     * @param 	bool												$reload			Force reload options
     * @return  array<string,array{label:string,parent:string}>
     */
    public function getOptions($fieldInfos, $key, $addEmptyValue = \false, $reload = \false)
    {
    }
}