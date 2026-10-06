<?php

/**
 *	This class is used to manage file upload using ajax
 */
class FileUpload
{
    /**
     * @var array{script_url:string,upload_dir:string,upload_url:string,param_name:string,delete_type:string,max_file_size:?int,min_file_size:int,accept_file_types:string,max_number_of_files:?int,max_width:?int,max_height:?int,min_width:int,min_height:int,discard_aborted_uploads:bool,image_versions:array<string,array{upload_dir:string,upload_url:string,max_width:int,max_height:int,jpeg_quality?:int}>}
     */
    public $options;
    /**
     * @var int
     */
    protected $fk_element;
    /**
     * @var string object element
     */
    protected $element;
    /**
     * Constructor.
     * This set ->$options
     *
     * @param ?array{script_url?:string,upload_dir?:string,upload_url?:string,param_name?:string,delete_type?:string,max_file_size?:?int,min_file_size?:int,accept_file_types?:string,max_number_of_files?:?int,max_width?:?int,max_height?:?int,min_width?:int,min_height?:int,discard_aborted_uploads?:bool,image_versions?:array<string,array{upload_dir?:string,upload_url?:string,max_width?:int,max_height?:int,jpeg_quality?:int}>}	$options		Options array
     * @param int		$fk_element		ID of element
     * @param string	$element		Code of element
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
     * @param 	stdClass	$file		File object (see getFileObject)
     * @return	void
     */
    protected function setFileDeleteUrl($file)
    {
    }
    /**
     * getFileObject
     *
     * @param	string		$file_name		Filename
     * @return 	?stdClass
     */
    protected function getFileObject($file_name)
    {
    }
    /**
     * getFileObjects
     *
     * @return	array<?stdClass>	Array of objects
     */
    protected function getFileObjects()
    {
    }
    /**
     *  Create thumbs of a file uploaded.
     *
     *  @param	string	$file_name			Filename
     *  @param	array{upload_dir:string}	$options 	is array('max_width', 'max_height')
     *  @return	bool
     */
    protected function createScaledImage($file_name, $options)
    {
    }
    /**
     * Make validation on an uploaded file
     *
     * @param 	string	$uploaded_file		Upload file
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
     * handleFileUpload.
     * Validate data, move the uploaded file then create the thumbs if this is an image.
     *
     * @param 	string		$uploaded_file		Upload file
     * @param 	string		$name				Name
     * @param 	int			$size				Size
     * @param 	string		$type				Type
     * @param 	string		$error				Error
     * @param	string		$index				Index
     * @return stdClass|null
     * @see dol_add_file_process()
     */
    protected function handleFileUpload($uploaded_file, $name, $size, $type, $error, $index)
    {
    }
    /**
     * Output data
     *
     * @return	void
     */
    /*public function get()
    	{
    		$file_name = isset($_REQUEST['file']) ? basename(stripslashes($_REQUEST['file'])) : null;
    		if ($file_name) {
    			$info = $this->getFileObject($file_name);
    		} else {
    			$info = $this->getFileObjects();
    		}
    
    		header('Content-type: application/json');
    		echo json_encode($info);
    	}
    	*/
    /**
     * Output data
     *
     * @return	int			0 if OK, nb of error if errors
     */
    public function post()
    {
    }
    /**
     * Delete uploaded file
     *
     * @param	string	$file	File
     * @return	int
     */
    /*
    public function delete($file)
    {
    	$file_name = $file ? basename($file) : null;
    	$file_path = $this->options['upload_dir'].dol_sanitizeFileName($file_name);
    	$success = dol_is_file($file_path) && $file_name[0] !== '.' && unlink($file_path);
    	if ($success) {
    		foreach ($this->options['image_versions'] as $version => $options) {
    			$file = $options['upload_dir'].$file_name;
    			if (dol_is_file($file)) {
    				unlink($file);
    			}
    		}
    	}
    	// Return result in json format
    	header('Content-type: application/json');
    	echo json_encode($success);
    
    	return 0;
    }
    */
}