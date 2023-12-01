<?php

/**
 *	This class is used to manage file upload using ajax
 */
class FileUpload
{
    protected $options;
    protected $fk_element;
    protected $element;
    /**
     * Constructor
     *
     * @param array		$options		Options array
     * @param int		$fk_element		fk_element
     * @param string	$element		element
     */
    public function __construct($options = \null, $fk_element = \null, $element = \null)
    {
    }
    /**
     *	Return full URL
     *
     *	@return	string			URL
     */
    protected function getFullUrl()
    {
    }
    /**
     * Set delete url
     *
     * @param 	object	$file		Filename
     * @return	void
     */
    protected function setFileDeleteUrl($file)
    {
    }
    /**
     * getFileObject
     *
     * @param	string		$file_name		Filename
     * @return 	stdClass|null
     */
    protected function getFileObject($file_name)
    {
    }
    /**
     * getFileObjects
     *
     * @return	void
     */
    protected function getFileObjects()
    {
    }
    /**
     *  Create thumbs of a file uploaded. Only the "mini" thumb is generated.
     *
     *  @param	string	$file_name		Filename
     *  @param	string	$options 		is array('max_width', 'max_height')
     *  @return	boolean
     */
    protected function createScaledImage($file_name, $options)
    {
    }
    /**
     * Enter description here ...
     *
     * @param 	string	$uploaded_file		Uploade file
     * @param 	object	$file				File
     * @param 	string	$error				Error
     * @param	string	$index				Index
     * @return  boolean                     True if OK, False if KO
     */
    protected function validate($uploaded_file, $file, $error, $index)
    {
    }
    /**
     * Enter description here ...
     *
     * @param 	int		$matches		???
     * @return	string					???
     */
    protected function upcountNameCallback($matches)
    {
    }
    /**
     * Enter description here ...
     *
     * @param 	string		$name		???
     * @return	string					???
     */
    protected function upcountName($name)
    {
    }
    /**
     * trimFileName
     *
     * @param 	string $name		Filename
     * @param 	string $type		???
     * @param 	string $index		???
     * @return	string
     */
    protected function trimFileName($name, $type, $index)
    {
    }
    /**
     * handleFileUpload
     *
     * @param 	string		$uploaded_file		Uploade file
     * @param 	string		$name				Name
     * @param 	int			$size				Size
     * @param 	string		$type				Type
     * @param 	string		$error				Error
     * @param	string		$index				Index
     * @return stdClass
     */
    protected function handleFileUpload($uploaded_file, $name, $size, $type, $error, $index)
    {
    }
    /**
     * Output data
     *
     * @return	void
     */
    public function get()
    {
    }
    /**
     * Output data
     *
     * @return	void
     */
    public function post()
    {
    }
    /**
     * Delete uploaded file
     *
     * @return	string
     */
    public function delete()
    {
    }
}