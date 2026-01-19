<?php

/**
 * API class for receive files
 *
 * @access protected
 * @class Documents {@requires user,external}
 */
class Documents extends \DolibarrApi
{
    /**
     * @var array   $DOCUMENT_FIELDS     Mandatory fields, checked when create and update object
     */
    static $DOCUMENT_FIELDS = array('modulepart');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Download a document.
     *
     * Note that, this API is similar to using the wrapper link "documents.php" to download a file (used for
     * internal HTML links of documents into application), but with no need to have a session cookie (the token is used instead).
     *
     * @param   string  $module_part    Name of module or area concerned by file download ('facture', ...)
     * @param   string  $original_file  Relative path with filename, relative to modulepart (for example: IN201701-999/IN201701-999.pdf)
     * @return  array                   List of documents
     *
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 200
     *
     * @url GET /download
     */
    public function index($module_part, $original_file = '')
    {
    }
    /**
     * Build a document.
     *
     * Test sample 1: { "module_part": "invoice", "original_file": "FA1701-001/FA1701-001.pdf", "doctemplate": "crabe", "langcode": "fr_FR" }.
     *
     * @param   string  $module_part    Name of module or area concerned by file download ('invoice', 'order', ...).
     * @param   string  $original_file  Relative path with filename, relative to modulepart (for example: IN201701-999/IN201701-999.pdf).
     * @param	string	$doctemplate	Set here the doc template to use for document generation (If not set, use the default template).
     * @param	string	$langcode		Language code like 'en_US', 'fr_FR', 'es_ES', ... (If not set, use the default language).
     * @return  array                   List of documents
     *
     * @throws 500
     * @throws 501
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 200
     *
     * @url PUT /builddoc
     */
    public function builddoc($module_part, $original_file = '', $doctemplate = '', $langcode = '')
    {
    }
    /**
     * Return the list of documents of a dedicated element (from its ID or Ref)
     *
     * @param   string 	$modulepart		Name of module or area concerned ('thirdparty', 'member', 'proposal', 'order', 'invoice', 'shipment', 'project',  ...)
     * @param	int		$id				ID of element
     * @param	string	$ref			Ref of element
     * @param	string	$sortfield		Sort criteria ('','fullname','relativename','name','date','size')
     * @param	string	$sortorder		Sort order ('asc' or 'desc')
     * @return	array					Array of documents with path
     *
     * @throws 200
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 500
     *
     * @url GET /
     */
    public function getDocumentsListByElement($modulepart, $id = 0, $ref = '', $sortfield = '', $sortorder = '')
    {
    }
    /**
     * Return a document.
     *
     * @param   int         $id          ID of document
     * @return  array                    Array with data of file
     *
     * @throws RestException
     */
    /*
        public function get($id) {
            return array('note'=>'xxx');
        }*/
    /**
     * Upload a file.
     *
     * Test sample 1: { "filename": "mynewfile.txt", "modulepart": "facture", "ref": "FA1701-001", "subdir": "", "filecontent": "content text", "fileencoding": "", "overwriteifexists": "0" }.
     * Test sample 2: { "filename": "mynewfile.txt", "modulepart": "medias", "ref": "", "subdir": "image/mywebsite", "filecontent": "Y29udGVudCB0ZXh0Cg==", "fileencoding": "base64", "overwriteifexists": "0" }.
     *
     * @param   string  $filename           Name of file to create ('FA1705-0123.txt')
     * @param   string  $modulepart         Name of module or area concerned by file upload ('facture', 'project', 'project_task', ...)
     * @param   string  $ref                Reference of object (This will define subdir automatically and store submited file into it)
     * @param   string  $subdir       		Subdirectory (Only if ref not provided)
     * @param   string  $filecontent        File content (string with file content. An empty file will be created if this parameter is not provided)
     * @param   string  $fileencoding       File encoding (''=no encoding, 'base64'=Base 64) {@example '' or 'base64'}
     * @param   int 	$overwriteifexists  Overwrite file if exists (1 by default)
     * @return  string
     *
     * @throws 200
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 500
     *
     * @url POST /upload
     */
    public function post($filename, $modulepart, $ref = '', $subdir = '', $filecontent = '', $fileencoding = '', $overwriteifexists = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName
    /**
     * Validate fields before create or update object
     *
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate_file($data)
    {
    }
}