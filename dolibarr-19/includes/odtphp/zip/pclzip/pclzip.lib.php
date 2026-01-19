<?php

/* For futur use
define( 'PCLZIP_CB_PRE_LIST', 78005 );
define( 'PCLZIP_CB_POST_LIST', 78006 );
define( 'PCLZIP_CB_PRE_DELETE', 78007 );
define( 'PCLZIP_CB_POST_DELETE', 78008 );
*/
// --------------------------------------------------------------------------------
// Class : PclZip
// Description :
//   PclZip is the class that represent a Zip archive.
//   The public methods allow the manipulation of the archive.
// Attributes :
//   Attributes must not be accessed directly.
// Methods :
//   PclZip() : Object creator
//   create() : Creates the Zip archive
//   listContent() : List the content of the Zip archive
//   extract() : Extract the content of the archive
//   properties() : List the properties of the archive
// --------------------------------------------------------------------------------
class PclZip
{
    // ----- Filename of the zip file
    public $zipname = '';
    // ----- File descriptor of the zip file
    public $zip_fd = 0;
    // ----- Internal error handling
    public $error_code = 1;
    public $error_string = '';
    // ----- Current status of the magic_quotes_runtime
    // This value store the php configuration for magic_quotes
    // The class can then disable the magic_quotes and reset it after
    public $magic_quotes_status;
    // --------------------------------------------------------------------------------
    // Function : PclZip()
    // Description :
    //   Creates a PclZip object and set the name of the associated Zip archive
    //   filename.
    //   Note that no real action is taken, if the archive does not exist it is not
    //   created. Use create() for that.
    // --------------------------------------------------------------------------------
    public function __construct($p_zipname)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   create($p_filelist, $p_add_dir="", $p_remove_dir="")
    //   create($p_filelist, $p_option, $p_option_value, ...)
    // Description :
    //   This method supports two different synopsis. The first one is historical.
    //   This method creates a Zip Archive. The Zip file is created in the
    //   filesystem. The files and directories indicated in $p_filelist
    //   are added in the archive. See the parameters description for the
    //   supported format of $p_filelist.
    //   When a directory is in the list, the directory and its content is added
    //   in the archive.
    //   In this synopsis, the function takes an optional variable list of
    //   options. See bellow the supported options.
    // Parameters :
    //   $p_filelist : An array containing file or directory names, or
    //                 a string containing one filename or one directory name, or
    //                 a string containing a list of filenames and/or directory
    //                 names separated by spaces.
    //   $p_add_dir : A path to add before the real path of the archived file,
    //                in order to have it memorized in the archive.
    //   $p_remove_dir : A path to remove from the real path of the file to archive,
    //                   in order to have a shorter path memorized in the archive.
    //                   When $p_add_dir and $p_remove_dir are set, $p_remove_dir
    //                   is removed first, before $p_add_dir is added.
    // Options :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_OPT_COMMENT :
    //   PCLZIP_CB_PRE_ADD :
    //   PCLZIP_CB_POST_ADD :
    // Return Values :
    //   0 on failure,
    //   The list of the added files, with a status of the add action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    public function create($p_filelist)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   add($p_filelist, $p_add_dir="", $p_remove_dir="")
    //   add($p_filelist, $p_option, $p_option_value, ...)
    // Description :
    //   This method supports two synopsis. The first one is historical.
    //   This methods add the list of files in an existing archive.
    //   If a file with the same name already exists, it is added at the end of the
    //   archive, the first one is still present.
    //   If the archive does not exist, it is created.
    // Parameters :
    //   $p_filelist : An array containing file or directory names, or
    //                 a string containing one filename or one directory name, or
    //                 a string containing a list of filenames and/or directory
    //                 names separated by spaces.
    //   $p_add_dir : A path to add before the real path of the archived file,
    //                in order to have it memorized in the archive.
    //   $p_remove_dir : A path to remove from the real path of the file to archive,
    //                   in order to have a shorter path memorized in the archive.
    //                   When $p_add_dir and $p_remove_dir are set, $p_remove_dir
    //                   is removed first, before $p_add_dir is added.
    // Options :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_OPT_COMMENT :
    //   PCLZIP_OPT_ADD_COMMENT :
    //   PCLZIP_OPT_PREPEND_COMMENT :
    //   PCLZIP_CB_PRE_ADD :
    //   PCLZIP_CB_POST_ADD :
    // Return Values :
    //   0 on failure,
    //   The list of the added files, with a status of the add action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    public function add($p_filelist)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : listContent()
    // Description :
    //   This public method, gives the list of the files and directories, with their
    //   properties.
    //   The properties of each entries in the list are (used also in other functions) :
    //     filename : Name of the file. For a create or add action it is the filename
    //                given by the user. For an extract function it is the filename
    //                of the extracted file.
    //     stored_filename : Name of the file / directory stored in the archive.
    //     size : Size of the stored file.
    //     compressed_size : Size of the file's data compressed in the archive
    //                       (without the headers overhead)
    //     mtime : Last known modification date of the file (UNIX timestamp)
    //     comment : Comment associated with the file
    //     folder : true | false
    //     index : index of the file in the archive
    //     status : status of the action (depending of the action) :
    //              Values are :
    //                ok : OK !
    //                filtered : the file / dir is not extracted (filtered by user)
    //                already_a_directory : the file can not be extracted because a
    //                                      directory with the same name already exists
    //                write_protected : the file can not be extracted because a file
    //                                  with the same name already exists and is
    //                                  write protected
    //                newer_exist : the file was not extracted because a newer file exists
    //                path_creation_fail : the file is not extracted because the folder
    //                                     does not exist and can not be created
    //                write_error : the file was not extracted because there was a
    //                              error while writing the file
    //                read_error : the file was not extracted because there was a error
    //                             while reading the file
    //                invalid_header : the file was not extracted because of an archive
    //                                 format error (bad file header)
    //   Note that each time a method can continue operating when there
    //   is an action error on a file, the error is only logged in the file status.
    // Return Values :
    //   0 on an unrecoverable failure,
    //   The list of the files in the archive.
    // --------------------------------------------------------------------------------
    public function listContent()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   extract($p_path="./", $p_remove_path="")
    //   extract([$p_option, $p_option_value, ...])
    // Description :
    //   This method supports two synopsis. The first one is historical.
    //   This method extract all the files / directories from the archive to the
    //   folder indicated in $p_path.
    //   If you want to ignore the 'root' part of path of the memorized files
    //   you can indicate this in the optional $p_remove_path parameter.
    //   By default, if a newer file with the same name already exists, the
    //   file is not extracted.
    //
    //   If both PCLZIP_OPT_PATH and PCLZIP_OPT_ADD_PATH aoptions
    //   are used, the path indicated in PCLZIP_OPT_ADD_PATH is append
    //   at the end of the path value of PCLZIP_OPT_PATH.
    // Parameters :
    //   $p_path : Path where the files and directories are to be extracted
    //   $p_remove_path : First part ('root' part) of the memorized path
    //                    (if any similar) to remove while extracting.
    // Options :
    //   PCLZIP_OPT_PATH :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_CB_PRE_EXTRACT :
    //   PCLZIP_CB_POST_EXTRACT :
    // Return Values :
    //   0 or a negative value on failure,
    //   The list of the extracted files, with a status of the action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    public function extract()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   extractByIndex($p_index, $p_path="./", $p_remove_path="")
    //   extractByIndex($p_index, [$p_option, $p_option_value, ...])
    // Description :
    //   This method supports two synopsis. The first one is historical.
    //   This method is doing a partial extract of the archive.
    //   The extracted files or folders are identified by their index in the
    //   archive (from 0 to n).
    //   Note that if the index identify a folder, only the folder entry is
    //   extracted, not all the files included in the archive.
    // Parameters :
    //   $p_index : A single index (integer) or a string of indexes of files to
    //              extract. The form of the string is "0,4-6,8-12" with only numbers
    //              and '-' for range or ',' to separate ranges. No spaces or ';'
    //              are allowed.
    //   $p_path : Path where the files and directories are to be extracted
    //   $p_remove_path : First part ('root' part) of the memorized path
    //                    (if any similar) to remove while extracting.
    // Options :
    //   PCLZIP_OPT_PATH :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_OPT_EXTRACT_AS_STRING : The files are extracted as strings and
    //     not as files.
    //     The resulting content is in a new field 'content' in the file
    //     structure.
    //     This option must be used alone (any other options are ignored).
    //   PCLZIP_CB_PRE_EXTRACT :
    //   PCLZIP_CB_POST_EXTRACT :
    // Return Values :
    //   0 on failure,
    //   The list of the extracted files, with a status of the action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    //function extractByIndex($p_index, options...)
    public function extractByIndex($p_index)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   delete([$p_option, $p_option_value, ...])
    // Description :
    //   This method removes files from the archive.
    //   If no parameters are given, then all the archive is emptied.
    // Parameters :
    //   None or optional arguments.
    // Options :
    //   PCLZIP_OPT_BY_INDEX :
    //   PCLZIP_OPT_BY_NAME :
    //   PCLZIP_OPT_BY_EREG :
    //   PCLZIP_OPT_BY_PREG :
    // Return Values :
    //   0 on failure,
    //   The list of the files which are still present in the archive.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    public function delete()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : deleteByIndex()
    // Description :
    //   ***** Deprecated *****
    //   delete(PCLZIP_OPT_BY_INDEX, $p_index) should be prefered.
    // --------------------------------------------------------------------------------
    public function deleteByIndex($p_index)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : properties()
    // Description :
    //   This method gives the properties of the archive.
    //   The properties are :
    //     nb : Number of files in the archive
    //     comment : Comment associated with the archive file
    //     status : not_exist, ok
    // Parameters :
    //   None
    // Return Values :
    //   0 on failure,
    //   An array with the archive properties.
    // --------------------------------------------------------------------------------
    public function properties()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : duplicate()
    // Description :
    //   This method creates an archive by copying the content of an other one. If
    //   the archive already exist, it is replaced by the new one without any warning.
    // Parameters :
    //   $p_archive : The filename of a valid archive, or
    //                a valid PclZip object.
    // Return Values :
    //   1 on success.
    //   0 or a negative value on error (error code).
    // --------------------------------------------------------------------------------
    public function duplicate($p_archive)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : merge()
    // Description :
    //   This method merge the $p_archive_to_add archive at the end of the current
    //   one ($this).
    //   If the archive ($this) does not exist, the merge becomes a duplicate.
    //   If the $p_archive_to_add archive does not exist, the merge is a success.
    // Parameters :
    //   $p_archive_to_add : It can be directly the filename of a valid zip archive,
    //                       or a PclZip object archive.
    // Return Values :
    //   1 on success,
    //   0 or negative values on error (see below).
    // --------------------------------------------------------------------------------
    public function merge($p_archive_to_add)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : errorCode()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function errorCode()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : errorName()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function errorName($p_with_code = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : errorInfo()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function errorInfo($p_full = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // ***** UNDER THIS LINE ARE DEFINED PRIVATE INTERNAL FUNCTIONS *****
    // *****                                                        *****
    // *****       THESES FUNCTIONS MUST NOT BE USED DIRECTLY       *****
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCheckFormat()
    // Description :
    //   This method check that the archive exists and is a valid zip archive.
    //   Several level of check exists. (futur)
    // Parameters :
    //   $p_level : Level of check. Default 0.
    //              0 : Check the first bytes (magic codes) (default value))
    //              1 : 0 + Check the central directory (futur)
    //              2 : 1 + Check each file header (futur)
    // Return Values :
    //   true on success,
    //   false on error, the error code is set.
    // --------------------------------------------------------------------------------
    public function privCheckFormat($p_level = 0)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privParseOptions()
    // Description :
    //   This internal methods reads the variable list of arguments ($p_options_list,
    //   $p_size) and generate an array with the options and values ($v_result_list).
    //   $v_requested_options contains the options that can be present and those that
    //   must be present.
    //   $v_requested_options is an array, with the option value as key, and 'optional',
    //   or 'mandatory' as value.
    // Parameters :
    //   See above.
    // Return Values :
    //   1 on success.
    //   0 on failure.
    // --------------------------------------------------------------------------------
    public function privParseOptions(&$p_options_list, $p_size, &$v_result_list, $v_requested_options = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privOptionDefaultThreshold()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privOptionDefaultThreshold(&$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privFileDescrParseAtt()
    // Description :
    // Parameters :
    // Return Values :
    //   1 on success.
    //   0 on failure.
    // --------------------------------------------------------------------------------
    public function privFileDescrParseAtt(&$p_file_list, &$p_filedescr, $v_options, $v_requested_options = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privFileDescrExpand()
    // Description :
    //   This method look for each item of the list to see if its a file, a folder
    //   or a string to be added as file. For any other type of files (link, other)
    //   just ignore the item.
    //   Then prepare the information that will be stored for that file.
    //   When its a folder, expand the folder with all the files that are in that
    //   folder (recursively).
    // Parameters :
    // Return Values :
    //   1 on success.
    //   0 on failure.
    // --------------------------------------------------------------------------------
    public function privFileDescrExpand(&$p_filedescr_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCreate()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privCreate($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAdd()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privAdd($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privOpenFd()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function privOpenFd($p_mode)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCloseFd()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function privCloseFd()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddList()
    // Description :
    //   $p_add_dir and $p_remove_dir will give the ability to memorize a path which is
    //   different from the real path of the file. This is usefull if you want to have PclTar
    //   running in any directory, and memorize relative path from an other directory.
    // Parameters :
    //   $p_list : An array containing the file or directory names to add in the tar
    //   $p_result_list : list of added files with their properties (specially the status field)
    //   $p_add_dir : Path to add in the filename path archived
    //   $p_remove_dir : Path to remove in the filename path archived
    // Return Values :
    // --------------------------------------------------------------------------------
    //  function privAddList($p_list, &$p_result_list, $p_add_dir, $p_remove_dir, $p_remove_all_dir, &$p_options)
    public function privAddList($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddFileList()
    // Description :
    // Parameters :
    //   $p_filedescr_list : An array containing the file description
    //                      or directory names to add in the zip
    //   $p_result_list : list of added files with their properties (specially the status field)
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privAddFileList($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddFile()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privAddFile($p_filedescr, &$p_header, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddFileUsingTempFile()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privAddFileUsingTempFile($p_filedescr, &$p_header, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCalculateStoredFilename()
    // Description :
    //   Based on file descriptor properties and global options, this method
    //   calculate the filename that will be stored in the archive.
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privCalculateStoredFilename(&$p_filedescr, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privWriteFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privWriteFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privWriteCentralFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privWriteCentralFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privWriteCentralHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privWriteCentralHeader($p_nb_entries, $p_size, $p_offset, $p_comment)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privList()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privList(&$p_list)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privConvertHeader2FileInfo()
    // Description :
    //   This function takes the file informations from the central directory
    //   entries and extract the interesting parameters that will be given back.
    //   The resulting file infos are set in the array $p_info
    //     $p_info['filename'] : Filename with full path. Given by user (add),
    //                           extracted in the filesystem (extract).
    //     $p_info['stored_filename'] : Stored filename in the archive.
    //     $p_info['size'] = Size of the file.
    //     $p_info['compressed_size'] = Compressed size of the file.
    //     $p_info['mtime'] = Last modification date of the file.
    //     $p_info['comment'] = Comment associated with the file.
    //     $p_info['folder'] = true/false : indicates if the entry is a folder or not.
    //     $p_info['status'] = status of the action on the file.
    //     $p_info['crc'] = CRC of the file content.
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privConvertHeader2FileInfo($p_header, &$p_info)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractByRule()
    // Description :
    //   Extract a file or directory depending of rules (by index, by name, ...)
    // Parameters :
    //   $p_file_list : An array where will be placed the properties of each
    //                  extracted file
    //   $p_path : Path to add while writing the extracted files
    //   $p_remove_path : Path to remove (from the file memorized path) while writing the
    //                    extracted files. If the path does not match the file path,
    //                    the file is extracted with its memorized path.
    //                    $p_remove_path does not apply to 'list' mode.
    //                    $p_path and $p_remove_path are commulative.
    // Return Values :
    //   1 on success,0 or less on error (see error code list)
    // --------------------------------------------------------------------------------
    public function privExtractByRule(&$p_file_list, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFile()
    // Description :
    // Parameters :
    // Return Values :
    //
    // 1 : ... ?
    // PCLZIP_ERR_USER_ABORTED(2) : User ask for extraction stop in callback
    // --------------------------------------------------------------------------------
    public function privExtractFile(&$p_entry, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFileUsingTempFile()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privExtractFileUsingTempFile(&$p_entry, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFileInOutput()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privExtractFileInOutput(&$p_entry, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFileAsString()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privExtractFileAsString(&$p_entry, &$p_string, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privReadFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privReadFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privReadCentralFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privReadCentralFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCheckFileHeaders()
    // Description :
    // Parameters :
    // Return Values :
    //   1 on success,
    //   0 on error;
    // --------------------------------------------------------------------------------
    public function privCheckFileHeaders(&$p_local_header, &$p_central_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privReadEndCentralDir()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privReadEndCentralDir(&$p_central_dir)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDeleteByRule()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privDeleteByRule(&$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDirCheck()
    // Description :
    //   Check if a directory exists, if not it creates it and all the parents directory
    //   which may be useful.
    // Parameters :
    //   $p_dir : Directory path to check.
    // Return Values :
    //    1 : OK
    //   -1 : Unable to create directory
    // --------------------------------------------------------------------------------
    public function privDirCheck($p_dir, $p_is_dir = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privMerge()
    // Description :
    //   If $p_archive_to_add does not exist, the function exit with a success result.
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privMerge(&$p_archive_to_add)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDuplicate()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privDuplicate($p_archive_filename)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privErrorLog()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function privErrorLog($p_error_code = 0, $p_error_string = '')
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privErrorReset()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    public function privErrorReset()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDisableMagicQuotes()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privDisableMagicQuotes()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privSwapBackMagicQuotes()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    public function privSwapBackMagicQuotes()
    {
    }
    // --------------------------------------------------------------------------------
}
\define('PCLZIP_READ_BLOCK_SIZE', 2048);
\define('PCLZIP_SEPARATOR', ',');
\define('PCLZIP_ERROR_EXTERNAL', 0);
\define('PCLZIP_TEMPORARY_DIR', '');
\define('PCLZIP_TEMPORARY_FILE_RATIO', 0.47);
// ----- Error codes
//   -1 : Unable to open file in binary write mode
//   -2 : Unable to open file in binary read mode
//   -3 : Invalid parameters
//   -4 : File does not exist
//   -5 : Filename is too long (max. 255)
//   -6 : Not a valid zip file
//   -7 : Invalid extracted file size
//   -8 : Unable to create directory
//   -9 : Invalid archive extension
//  -10 : Invalid archive format
//  -11 : Unable to delete file (unlink)
//  -12 : Unable to rename file (rename)
//  -13 : Invalid header checksum
//  -14 : Invalid archive size
\define('PCLZIP_ERR_USER_ABORTED', 2);
\define('PCLZIP_ERR_NO_ERROR', 0);
\define('PCLZIP_ERR_WRITE_OPEN_FAIL', -1);
\define('PCLZIP_ERR_READ_OPEN_FAIL', -2);
\define('PCLZIP_ERR_INVALID_PARAMETER', -3);
\define('PCLZIP_ERR_MISSING_FILE', -4);
\define('PCLZIP_ERR_FILENAME_TOO_LONG', -5);
\define('PCLZIP_ERR_INVALID_ZIP', -6);
\define('PCLZIP_ERR_BAD_EXTRACTED_FILE', -7);
\define('PCLZIP_ERR_DIR_CREATE_FAIL', -8);
\define('PCLZIP_ERR_BAD_EXTENSION', -9);
\define('PCLZIP_ERR_BAD_FORMAT', -10);
\define('PCLZIP_ERR_DELETE_FILE_FAIL', -11);
\define('PCLZIP_ERR_RENAME_FILE_FAIL', -12);
\define('PCLZIP_ERR_BAD_CHECKSUM', -13);
\define('PCLZIP_ERR_INVALID_ARCHIVE_ZIP', -14);
\define('PCLZIP_ERR_MISSING_OPTION_VALUE', -15);
\define('PCLZIP_ERR_INVALID_OPTION_VALUE', -16);
\define('PCLZIP_ERR_ALREADY_A_DIRECTORY', -17);
\define('PCLZIP_ERR_UNSUPPORTED_COMPRESSION', -18);
\define('PCLZIP_ERR_UNSUPPORTED_ENCRYPTION', -19);
\define('PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE', -20);
\define('PCLZIP_ERR_DIRECTORY_RESTRICTION', -21);
// ----- Options values
\define('PCLZIP_OPT_PATH', 77001);
\define('PCLZIP_OPT_ADD_PATH', 77002);
\define('PCLZIP_OPT_REMOVE_PATH', 77003);
\define('PCLZIP_OPT_REMOVE_ALL_PATH', 77004);
\define('PCLZIP_OPT_SET_CHMOD', 77005);
\define('PCLZIP_OPT_EXTRACT_AS_STRING', 77006);
\define('PCLZIP_OPT_NO_COMPRESSION', 77007);
\define('PCLZIP_OPT_BY_NAME', 77008);
\define('PCLZIP_OPT_BY_INDEX', 77009);
\define('PCLZIP_OPT_BY_EREG', 77010);
\define('PCLZIP_OPT_BY_PREG', 77011);
\define('PCLZIP_OPT_COMMENT', 77012);
\define('PCLZIP_OPT_ADD_COMMENT', 77013);
\define('PCLZIP_OPT_PREPEND_COMMENT', 77014);
\define('PCLZIP_OPT_EXTRACT_IN_OUTPUT', 77015);
\define('PCLZIP_OPT_REPLACE_NEWER', 77016);
\define('PCLZIP_OPT_STOP_ON_ERROR', 77017);
// Having big trouble with crypt. Need to multiply 2 long int
// which is not correctly supported by PHP ...
//define( 'PCLZIP_OPT_CRYPT', 77018 );
\define('PCLZIP_OPT_EXTRACT_DIR_RESTRICTION', 77019);
\define('PCLZIP_OPT_TEMP_FILE_THRESHOLD', 77020);
\define('PCLZIP_OPT_ADD_TEMP_FILE_THRESHOLD', 77020);
// alias
\define('PCLZIP_OPT_TEMP_FILE_ON', 77021);
\define('PCLZIP_OPT_ADD_TEMP_FILE_ON', 77021);
// alias
\define('PCLZIP_OPT_TEMP_FILE_OFF', 77022);
\define('PCLZIP_OPT_ADD_TEMP_FILE_OFF', 77022);
// alias
// ----- File description attributes
\define('PCLZIP_ATT_FILE_NAME', 79001);
\define('PCLZIP_ATT_FILE_NEW_SHORT_NAME', 79002);
\define('PCLZIP_ATT_FILE_NEW_FULL_NAME', 79003);
\define('PCLZIP_ATT_FILE_MTIME', 79004);
\define('PCLZIP_ATT_FILE_CONTENT', 79005);
\define('PCLZIP_ATT_FILE_COMMENT', 79006);
// ----- Call backs values
\define('PCLZIP_CB_PRE_EXTRACT', 78001);
\define('PCLZIP_CB_POST_EXTRACT', 78002);
\define('PCLZIP_CB_PRE_ADD', 78003);
\define('PCLZIP_CB_POST_ADD', 78004);
// End of class
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilPathReduction()
// Description :
// Parameters :
// Return Values :
// --------------------------------------------------------------------------------
function PclZipUtilPathReduction($p_dir)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilPathInclusion()
// Description :
//   This function indicates if the path $p_path is under the $p_dir tree. Or,
//   said in an other way, if the file or sub-dir $p_path is inside the dir
//   $p_dir.
//   The function indicates also if the path is exactly the same as the dir.
//   This function supports path with duplicated '/' like '//', but does not
//   support '.' or '..' statements.
// Parameters :
// Return Values :
//   0 if $p_path is not inside directory $p_dir
//   1 if $p_path is inside directory $p_dir
//   2 if $p_path is exactly the same as $p_dir
// --------------------------------------------------------------------------------
function PclZipUtilPathInclusion($p_dir, $p_path)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilCopyBlock()
// Description :
// Parameters :
//   $p_mode : read/write compression mode
//             0 : src & dest normal
//             1 : src gzip, dest normal
//             2 : src normal, dest gzip
//             3 : src & dest gzip
// Return Values :
// --------------------------------------------------------------------------------
function PclZipUtilCopyBlock($p_src, $p_dest, $p_size, $p_mode = 0)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilRename()
// Description :
//   This function tries to do a simple rename() function. If it fails, it
//   tries to copy the $p_src file in a new $p_dest file and then unlink the
//   first one.
// Parameters :
//   $p_src : Old filename
//   $p_dest : New filename
// Return Values :
//   1 on success, 0 on failure.
// --------------------------------------------------------------------------------
function PclZipUtilRename($p_src, $p_dest)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilOptionText()
// Description :
//   Translate option value in text. Mainly for debug purpose.
// Parameters :
//   $p_option : the option value.
// Return Values :
//   The option text value.
// --------------------------------------------------------------------------------
function PclZipUtilOptionText($p_option)
{
}
// --------------------------------------------------------------------------------
// --------------------------------------------------------------------------------
// Function : PclZipUtilTranslateWinPath()
// Description :
//   Translate windows path by replacing '\' by '/' and optionally removing
//   drive letter.
// Parameters :
//   $p_path : path to translate.
//   $p_remove_disk_letter : true | false
// Return Values :
//   The path translated.
// --------------------------------------------------------------------------------
function PclZipUtilTranslateWinPath($p_path, $p_remove_disk_letter = \true)
{
}