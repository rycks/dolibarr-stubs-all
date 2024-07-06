<?php

/**
 * Class for DocumentController
 */
class DocumentController extends \Controller
{
    /**
     * @var string Action
     */
    public $action;
    /**
     * @var	boolean	Is Attachment
     */
    public $attachment;
    /**
     * @var string Encoding
     */
    public $encoding;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string File name
     */
    public $filename;
    /**
     * @var string Full path of original file
     */
    public $fullpath_original_file;
    /**
     * @var string Full path of original file with encoded for OS
     */
    public $fullpath_original_file_osencoded;
    /**
     * @var string Module of document ('module', 'module_user_temp', 'module_user' or 'module_temp'). Example: 'medias', 'invoice', 'logs', 'tax-vat', ...
     */
    public $modulepart;
    /**
     * @var string Relative path with filename, relative to modulepart.
     */
    public $original_file;
    /**
     * @var string Mime type of file
     */
    public $type;
    /**
     * Init
     *
     * @return	void
     */
    public function init()
    {
    }
    /**
     * Check current access to controller
     *
     * @return  bool
     */
    public function checkAccess()
    {
    }
    /**
     * Action method is called before html output
     * can be used to manage security and change context
     *
     * @return  int     Return integer < 0 on error, > 0 on success
     */
    public function action()
    {
    }
    /**
     * Display
     *
     * @return  void
     */
    public function display()
    {
    }
}