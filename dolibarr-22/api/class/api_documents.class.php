<?php

/**
 * API class for receive files
 *
 * @since	6.0.0	Initial implementation
 *
 * @access protected
 * @class Documents {@requires user,external}
 */
class Documents extends \DolibarrApi
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Download a document
     *
     * Note that, this API is similar to using the wrapper link "documents.php" to download a file (used for
     * internal HTML links of documents into application), but with no need to have a session cookie (the token is used instead).
     *
     * @since	7.0.0	Initial implementation
     *
     * @param   string  $modulepart     Name of module or area concerned by file download ('facture', ...)
     * @param   string  $original_file  Relative path with filename, relative to modulepart (for example: IN201701-999/IN201701-999.pdf)
     * @return  array                   List of documents
     * @phan-return array{filename:string,content-type:string,filesize:false|int,content:string,encoding:string}
     * @phpstan-return array{filename:string,content-type:string,filesize:false|int,content:string,encoding:string}
     *
     * @url GET /download
     *
     * @throws	RestException	400		Bad value for parameter modulepart or original_file
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		File not found
     */
    public function index($modulepart, $original_file = '')
    {
    }
    /**
     * Build a document
     *
     * Test sample 1: { "modulepart": "invoice", "original_file": "FA1701-001/FA1701-001.pdf", "doctemplate": "crabe", "langcode": "fr_FR" }.
     *
     * Supported modules: invoice, order, proposal, contract, supplier invoice, shipment, mrp
     *
     * @since	7.0.0	Initial implementation, support for invoice, order and proposal documents
     * @since	18.0.0	Added support for contract and suppliers invoice documents
     * @since	19.0.0	Added support for shipment documents
     * @since	20.0.0	Added support for mrp documents
     *
     * @param   string  $modulepart		Name of module or area concerned by file download ('thirdparty', 'member', 'proposal', 'supplier_proposal', 'order', 'supplier_order', 'invoice', 'supplier_invoice', 'shipment', 'project',  ...)
     * @param   string  $original_file  Relative path with filename, relative to modulepart (for example: IN201701-999/IN201701-999.pdf).
     * @param	string	$doctemplate	Set here the doc template to use for document generation (If not set, use the default template).
     * @param	string	$langcode		Language code like 'en_US', 'fr_FR', 'es_ES', ... (If not set, use the default language).
     * @return  array                   List of documents
     * @phan-return array{filename:string,content-type:string,filesize:false|int,content:string,langcode:string,template:?string,encoding:string}
     * @phpstan-return array{filename:string,content-type:string,filesize:false|int,content:string,langcode:string,template:?string,encoding:string}
     *
     * @url PUT /builddoc
     *
     * @throws	RestException	400		Bad value for parameter modulepart or original_file
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Invoice, Order, Proposal, Contract or Shipment not found
     * @throws	RestException	500		Error generating document
     * @throws	RestException	501		File not found
     */
    public function builddoc($modulepart, $original_file = '', $doctemplate = '', $langcode = '')
    {
    }
    /**
     * List documents of an element
     *
     * Use element ID or Ref.
     * Supported modules: thirdparty, user, member, proposal, order, supplier_order, shipment, invoice, supplier_invoice, product, event, expensereport, knowledgemanagement, category, contract
     *
     * @since	7.0.0	Initial implementation
     *
     * @param   string 	$modulepart		Name of module or area concerned ('thirdparty', 'member', 'proposal', 'order', 'invoice', 'supplier_invoice', 'shipment', 'project',  ...)
     * @param	int		$id				ID of element
     * @param	string	$ref			Ref of element
     * @param	string	$sortfield		Sort criteria ('','fullname','relativename','name','date','size')
     * @param	string	$sortorder		Sort order ('asc' or 'desc')
     * @param	int		$limit			List limit
     * @param	int		$page			Page number
     * @param	string	$content_type	Filter on content-type (example 'application/pdf' or 'application/pdf,image/jpeg'))
     * @param	bool	$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return	array					Array of documents with path
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url GET /
     *
     * @throws	RestException	400		Bad value for parameter modulepart, id or ref
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Thirdparty, User, Member, Order, Invoice or Proposal not found
     * @throws	RestException	500		Error while fetching object
     * @throws	RestException	503		Error when retrieve ecm list
     */
    public function getDocumentsListByElement($modulepart, $id = 0, $ref = '', $sortfield = '', $sortorder = '', $limit = 100, $page = 0, $content_type = '', $pagination_data = \false)
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
     * Upload a document
     *
     * Test sample for invoice: { "filename": "mynewfile.txt", "modulepart": "invoice", "ref": "FA1701-001", "subdir": "", "filecontent": "content text", "fileencoding": "", "overwriteifexists": "0" }.
     * Test sample for supplier invoice: { "filename": "mynewfile.txt", "modulepart": "supplier_invoice", "ref": "FA1701-001", "subdir": "", "filecontent": "content text", "fileencoding": "", "overwriteifexists": "0" }.
     * Test sample for medias file: { "filename": "mynewfile.txt", "modulepart": "medias", "ref": "", "subdir": "image/mywebsite", "filecontent": "Y29udGVudCB0ZXh0Cg==", "fileencoding": "base64", "overwriteifexists": "0" }.
     *
     * Supported modules: invoice, order, supplier_order, task/project_task, product/service, expensereport, fichinter, member, propale, agenda, contact
     *
     * @since	6.0.0	Initial implementation
     *
     * @param   string  $filename           	Name of file to create ('FA1705-0123.txt')
     * @param   string  $modulepart         	Name of module or area concerned by file upload ('product', 'service', 'invoice', 'proposal', 'project', 'project_task', 'supplier_invoice', 'expensereport', 'member', ...)
     * @param   string  $ref                	Reference of object (This will define subdir automatically and store submitted file into it)
     * @param   string  $subdir       			Subdirectory (Only if $ref is not provided)
     * @param   string  $filecontent        	File content (string with file content. An empty file will be created if this parameter is not provided)
     * @param   string  $fileencoding       	File encoding (''=no encoding, 'base64'=Base 64)
     * @param   int 	$overwriteifexists  	Overwrite file if exists (1 by default)
     * @param   int 	$createdirifnotexists  	Create subdirectories if the doesn't exists (1 by default)
     * @param   int     $position               Position
     * @param   string  $cover                  Cover info
     * @param   array   $array_options          Array for extrafields of ECM index table
     * @param	int		$generateThumbs			1=Will generate the small and mini thumbs if applicable
     * @return  string
     *
     * @phan-param   array<string,string>   $array_options
     * @phpstan-param   array<string,string>   $array_options
     *
     * @url POST /upload
     *
     * @throws	RestException	400		Bad Request
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Object not found
     * @throws	RestException	500		Error on file operation
     */
    public function post($filename, $modulepart, $ref = '', $subdir = '', $filecontent = '', $fileencoding = '', $overwriteifexists = 0, $createdirifnotexists = 1, $position = 0, $cover = '', $array_options = [], $generateThumbs = 0)
    {
    }
    /**
     * Delete a document
     *
     * @since	11.0.0	Initial implementation
     *
     * @param   string  $modulepart     Name of module or area concerned by file download ('product', ...)
     * @param   string  $original_file  Relative path with filename, relative to modulepart (for example: PRODUCT-REF-999/IMAGE-999.jpg)
     * @return  array                   Success code
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @url DELETE /
     *
     * @throws	RestException	400  Bad value for parameter modulepart
     * @throws	RestException	400  Bad value for parameter original_file
     * @throws	RestException	403  Access denied
     * @throws	RestException	404  File not found
     * @throws	RestException	500  Error on file operation
     */
    public function delete($modulepart, $original_file)
    {
    }
}