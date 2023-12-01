<?php

/* Copyright (C) 2008-2012  Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2012-2021  Regis Houssin       <regis.houssin@inodbox.com>
 * Copyright (C) 2012-2016  Juanjo Menent       <jmenent@2byte.es>
 * Copyright (C) 2015       Marcos García       <marcosgdf@gmail.com>
 * Copyright (C) 2016       Raphaël Doursenaud  <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2019       Frédéric France     <frederic.france@netlogic.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/files.lib.php
 *  \brief		Library for file managing functions
 */
/**
 * Make a basename working with all page code (default PHP basenamed fails with cyrillic).
 * We supose dir separator for input is '/'.
 *
 * @param	string	$pathfile	String to find basename.
 * @return	string				Basename of input
 */
function dol_basename($pathfile)
{
}
/**
 *  Scan a directory and return a list of files/directories.
 *  Content for string is UTF8 and dir separator is "/".
 *
 *  @param	string		$path        	Starting path from which to search. This is a full path.
 *  @param	string		$types        	Can be "directories", "files", or "all"
 *  @param	int			$recursive		Determines whether subdirectories are searched
 *  @param	string		$filter        	Regex filter to restrict list. This regex value must be escaped for '/' by doing preg_quote($var,'/'), since this char is used for preg_match function,
 *                                      but must not contains the start and end '/'. Filter is checked into basename only.
 *  @param	array		$excludefilter  Array of Regex for exclude filter (example: array('(\.meta|_preview.*\.png)$','^\.')). Exclude is checked both into fullpath and into basename (So '^xxx' may exclude 'xxx/dirscanned/...' and dirscanned/xxx').
 *  @param	string		$sortcriteria	Sort criteria ('','fullname','relativename','name','date','size')
 *  @param	string		$sortorder		Sort order (SORT_ASC, SORT_DESC)
 *	@param	int			$mode			0=Return array minimum keys loaded (faster), 1=Force all keys like date and size to be loaded (slower), 2=Force load of date only, 3=Force load of size only, 4=Force load of perm
 *  @param	int			$nohook			Disable all hooks
 *  @param	string		$relativename	For recursive purpose only. Must be "" at first call.
 *  @param	string		$donotfollowsymlinks	Do not follow symbolic links
 *  @return	array						Array of array('name'=>'xxx','fullname'=>'/abc/xxx','date'=>'yyy','size'=>99,'type'=>'dir|file',...)
 *  @see dol_dir_list_in_database()
 */
function dol_dir_list($path, $types = "all", $recursive = 0, $filter = "", $excludefilter = \null, $sortcriteria = "name", $sortorder = \SORT_ASC, $mode = 0, $nohook = 0, $relativename = "", $donotfollowsymlinks = 0)
{
}
/**
 *  Scan a directory and return a list of files/directories.
 *  Content for string is UTF8 and dir separator is "/".
 *
 *  @param	string		$path        	Starting path from which to search. Example: 'produit/MYPROD'
 *  @param	string		$filter        	Regex filter to restrict list. This regex value must be escaped for '/', since this char is used for preg_match function
 *  @param	array|null	$excludefilter  Array of Regex for exclude filter (example: array('(\.meta|_preview.*\.png)$','^\.'))
 *  @param	string		$sortcriteria	Sort criteria ("","fullname","name","date","size")
 *  @param	string		$sortorder		Sort order (SORT_ASC, SORT_DESC)
 *	@param	int			$mode			0=Return array minimum keys loaded (faster), 1=Force all keys like description
 *  @return	array						Array of array('name'=>'xxx','fullname'=>'/abc/xxx','type'=>'dir|file',...)
 *  @see dol_dir_list()
 */
function dol_dir_list_in_database($path, $filter = "", $excludefilter = \null, $sortcriteria = "name", $sortorder = \SORT_ASC, $mode = 0)
{
}
/**
 * Complete $filearray with data from database.
 * This will call doldir_list_indatabase to complate filearray.
 *
 * @param	array	$filearray			Array of files obtained using dol_dir_list
 * @param	string	$relativedir		Relative dir from DOL_DATA_ROOT
 * @return	void
 */
function completeFileArrayWithDatabaseInfo(&$filearray, $relativedir)
{
}
/**
 * Fast compare of 2 files identified by their properties ->name, ->date and ->size
 *
 * @param	string 	$a		File 1
 * @param 	string	$b		File 2
 * @return 	int				1, 0, 1
 */
function dol_compare_file($a, $b)
{
}
/**
 * Test if filename is a directory
 *
 * @param	string		$folder     Name of folder
 * @return	boolean     			True if it's a directory, False if not found
 */
function dol_is_dir($folder)
{
}
/**
 * Return if path is empty
 *
 * @param   string		$dir		Path of Directory
 * @return  boolean     		    True or false
 */
function dol_is_dir_empty($dir)
{
}
/**
 * Return if path is a file
 *
 * @param   string		$pathoffile		Path of file
 * @return  boolean     			    True or false
 */
function dol_is_file($pathoffile)
{
}
/**
 * Return if path is a symbolic link
 *
 * @param   string		$pathoffile		Path of file
 * @return  boolean     			    True or false
 */
function dol_is_link($pathoffile)
{
}
/**
 * Return if path is an URL
 *
 * @param   string		$url	Url
 * @return  boolean      	   	True or false
 */
function dol_is_url($url)
{
}
/**
 * 	Test if a folder is empty
 *
 * 	@param	string	$folder		Name of folder
 * 	@return boolean				True if dir is empty or non-existing, False if it contains files
 */
function dol_dir_is_emtpy($folder)
{
}
/**
 * 	Count number of lines in a file
 *
 * 	@param	string	$file		Filename
 * 	@return int					<0 if KO, Number of lines in files if OK
 *  @see dol_nboflines()
 */
function dol_count_nb_of_line($file)
{
}
/**
 * Return size of a file
 *
 * @param 	string		$pathoffile		Path of file
 * @return 	integer						File size
 * @see dol_print_size()
 */
function dol_filesize($pathoffile)
{
}
/**
 * Return time of a file
 *
 * @param 	string		$pathoffile		Path of file
 * @return 	int					Time of file
 */
function dol_filemtime($pathoffile)
{
}
/**
 * Return permissions of a file
 *
 * @param 	string		$pathoffile		Path of file
 * @return 	integer						File permissions
 */
function dol_fileperm($pathoffile)
{
}
/**
 * Make replacement of strings into a file.
 *
 * @param	string	$srcfile			       Source file (can't be a directory)
 * @param	array	$arrayreplacement	       Array with strings to replace. Example: array('valuebefore'=>'valueafter', ...)
 * @param	string	$destfile			       Destination file (can't be a directory). If empty, will be same than source file.
 * @param	int		$newmask			       Mask for new file (0 by default means $conf->global->MAIN_UMASK). Example: '0666'
 * @param	int		$indexdatabase		       1=index new file into database.
 * @param   int     $arrayreplacementisregex   1=Array of replacement is regex
 * @return	int							       <0 if error, 0 if nothing done (dest file already exists), >0 if OK
 * @see		dol_copy()
 */
function dolReplaceInFile($srcfile, $arrayreplacement, $destfile = '', $newmask = 0, $indexdatabase = 0, $arrayreplacementisregex = 0)
{
}
/**
 * Copy a file to another file.
 *
 * @param	string	$srcfile			Source file (can't be a directory)
 * @param	string	$destfile			Destination file (can't be a directory)
 * @param	int		$newmask			Mask for new file (0 by default means $conf->global->MAIN_UMASK). Example: '0666'
 * @param 	int		$overwriteifexists	Overwrite file if exists (1 by default)
 * @return	int							<0 if error, 0 if nothing done (dest file already exists and overwriteifexists=0), >0 if OK
 * @see		dol_delete_file() dolCopyDir()
 */
function dol_copy($srcfile, $destfile, $newmask = 0, $overwriteifexists = 1)
{
}
/**
 * Copy a dir to another dir. This include recursive subdirectories.
 *
 * @param	string	$srcfile			Source file (a directory)
 * @param	string	$destfile			Destination file (a directory)
 * @param	int		$newmask			Mask for new file (0 by default means $conf->global->MAIN_UMASK). Example: '0666'
 * @param 	int		$overwriteifexists	Overwrite file if exists (1 by default)
 * @param	array	$arrayreplacement	Array to use to replace filenames with another one during the copy (works only on file names, not on directory names).
 * @param	int		$excludesubdir		0=Do not exclude subdirectories, 1=Exclude subdirectories, 2=Exclude subdirectories if name is not a 2 chars (used for country codes subdirectories).
 * @return	int							<0 if error, 0 if nothing done (all files already exists and overwriteifexists=0), >0 if OK
 * @see		dol_copy()
 */
function dolCopyDir($srcfile, $destfile, $newmask, $overwriteifexists, $arrayreplacement = \null, $excludesubdir = 0)
{
}
/**
 * Move a file into another name.
 * Note:
 *  - This function differs from dol_move_uploaded_file, because it can be called in any context.
 *  - Database indexes for files are updated.
 *  - Test on antivirus is done only if param testvirus is provided and an antivirus was set.
 *
 * @param	string  $srcfile            Source file (can't be a directory. use native php @rename() to move a directory)
 * @param   string	$destfile           Destination file (can't be a directory. use native php @rename() to move a directory)
 * @param   integer	$newmask            Mask in octal string for new file (0 by default means $conf->global->MAIN_UMASK)
 * @param   int		$overwriteifexists  Overwrite file if exists (1 by default)
 * @param   int     $testvirus          Do an antivirus test. Move is canceled if a virus is found.
 * @param	int		$indexdatabase		Index new file into database.
 * @return  boolean 		            True if OK, false if KO
 * @see dol_move_uploaded_file()
 */
function dol_move($srcfile, $destfile, $newmask = 0, $overwriteifexists = 1, $testvirus = 0, $indexdatabase = 1)
{
}
/**
 *	Unescape a file submitted by upload.
 *  PHP escape char " (%22) or char ' (%27) into $FILES.
 *
 *	@param	string	$filename		Filename
 *	@return	string					Filename sanitized
 */
function dol_unescapefile($filename)
{
}
/**
 * Check virus into a file
 *
 * @param   string      $src_file       Source file to check
 * @return  array                       Array of errors or empty array if not virus found
 */
function dolCheckVirus($src_file)
{
}
/**
 *	Make control on an uploaded file from an GUI page and move it to final destination.
 * 	If there is errors (virus found, antivir in error, bad filename), file is not moved.
 *  Note:
 *  - This function can be used only into a HTML page context. Use dol_move if you are outside.
 *  - Test on antivirus is always done (if antivirus set).
 *  - Database of files is NOT updated (this is done by dol_add_file_process() that calls this function).
 *  - Extension .noexe may be added if file is executable and MAIN_DOCUMENT_IS_OUTSIDE_WEBROOT_SO_NOEXE_NOT_REQUIRED is not set.
 *
 *	@param	string	$src_file			Source full path filename ($_FILES['field']['tmp_name'])
 *	@param	string	$dest_file			Target full path filename  ($_FILES['field']['name'])
 * 	@param	int		$allowoverwrite		1=Overwrite target file if it already exists
 * 	@param	int		$disablevirusscan	1=Disable virus scan
 * 	@param	integer	$uploaderrorcode	Value of PHP upload error code ($_FILES['field']['error'])
 * 	@param	int		$nohook				Disable all hooks
 * 	@param	string	$varfiles			_FILES var name
 *  @param	string	$upload_dir			For information. Already included into $dest_file.
 *	@return int|string       			1 if OK, 2 if OK and .noexe appended, <0 or string if KO
 *  @see    dol_move()
 */
function dol_move_uploaded_file($src_file, $dest_file, $allowoverwrite, $disablevirusscan = 0, $uploaderrorcode = 0, $nohook = 0, $varfiles = 'addedfile', $upload_dir = '')
{
}
/**
 *  Remove a file or several files with a mask.
 *  This delete file physically but also database indexes.
 *
 *  @param	string	$file           File to delete or mask of files to delete
 *  @param  int		$disableglob    Disable usage of glob like * so function is an exact delete function that will return error if no file found
 *  @param  int		$nophperrors    Disable all PHP output errors
 *  @param	int		$nohook			Disable all hooks
 *  @param	object	$object			Current object in use
 *  @param	boolean	$allowdotdot	Allow to delete file path with .. inside. Never use this, it is reserved for migration purpose.
 *  @param	int		$indexdatabase	Try to remove also index entries.
 *  @param	int		$nolog			Disable log file
 *  @return boolean         		True if no error (file is deleted or if glob is used and there's nothing to delete), False if error
 *  @see dol_delete_dir()
 */
function dol_delete_file($file, $disableglob = 0, $nophperrors = 0, $nohook = 0, $object = \null, $allowdotdot = \false, $indexdatabase = 1, $nolog = 0)
{
}
/**
 *  Remove a directory (not recursive, so content must be empty).
 *  If directory is not empty, return false
 *
 *  @param	string	$dir            Directory to delete
 *  @param  int		$nophperrors    Disable all PHP output errors
 *  @return boolean         		True if success, false if error
 *  @see dol_delete_file() dolCopyDir()
 */
function dol_delete_dir($dir, $nophperrors = 0)
{
}
/**
 *  Remove a directory $dir and its subdirectories (or only files and subdirectories)
 *
 *  @param	string	$dir            Dir to delete
 *  @param  int		$count          Counter to count nb of elements found to delete
 *  @param  int		$nophperrors    Disable all PHP output errors
 *  @param	int		$onlysub		Delete only files and subdir, not main directory
 *  @param  int		$countdeleted   Counter to count nb of elements found really deleted
 *  @param	int		$indexdatabase	Try to remove also index entries.
 *  @param	int		$nolog			Disable log files (too verbose when making recursive directories)
 *  @return int             		Number of files and directory we try to remove. NB really removed is returned into var by reference $countdeleted.
 */
function dol_delete_dir_recursive($dir, $count = 0, $nophperrors = 0, $onlysub = 0, &$countdeleted = 0, $indexdatabase = 1, $nolog = 0)
{
}
/**
 *  Delete all preview files linked to object instance.
 *  Note that preview image of PDF files is generated when required, by dol_banner_tab() for example.
 *
 *  @param	object	$object		Object to clean
 *  @return	int					0 if error, 1 if OK
 *  @see dol_convert_file()
 */
function dol_delete_preview($object)
{
}
/**
 *	Create a meta file with document file into same directory.
 *	This make "grep" search possible.
 *  This feature to generate the meta file is enabled only if option MAIN_DOC_CREATE_METAFILE is set.
 *
 *	@param	CommonObject	$object		Object
 *	@return	int							0 if do nothing, >0 if we update meta file too, <0 if KO
 */
function dol_meta_create($object)
{
}
/**
 * Scan a directory and init $_SESSION to manage uploaded files with list of all found files.
 * Note: Only email module seems to use this. Other feature initialize the $_SESSION doing $formmail->clear_attached_files(); $formmail->add_attached_files()
 *
 * @param	string	$pathtoscan				Path to scan
 * @param   string  $trackid                Track id (used to prefix name of session vars to avoid conflict)
 * @return	void
 */
function dol_init_file_process($pathtoscan = '', $trackid = '')
{
}
/**
 * Get and save an upload file (for example after submitting a new file a mail form). Database index of file is also updated if donotupdatesession is set.
 * All information used are in db, conf, langs, user and _FILES.
 * Note: This function can be used only into a HTML page context.
 *
 * @param	string	$upload_dir				Directory where to store uploaded file (note: used to forge $destpath = $upload_dir + filename)
 * @param	int		$allowoverwrite			1=Allow overwrite existing file
 * @param	int		$donotupdatesession		1=Do no edit _SESSION variable but update database index. 0=Update _SESSION and not database index. -1=Do not update SESSION neither db.
 * @param	string	$varfiles				_FILES var name
 * @param	string	$savingdocmask			Mask to use to define output filename. For example 'XXXXX-__YYYYMMDD__-__file__'
 * @param	string	$link					Link to add (to add a link instead of a file)
 * @param   string  $trackid                Track id (used to prefix name of session vars to avoid conflict)
 * @param	int		$generatethumbs			1=Generate also thumbs for uploaded image files
 * @param   Object  $object                 Object used to set 'src_object_*' fields
 * @return	int                             <=0 if KO, >0 if OK
 * @see dol_remove_file_process()
 */
function dol_add_file_process($upload_dir, $allowoverwrite = 0, $donotupdatesession = 0, $varfiles = 'addedfile', $savingdocmask = '', $link = \null, $trackid = '', $generatethumbs = 1, $object = \null)
{
}
/**
 * Remove an uploaded file (for example after submitting a new file a mail form).
 * All information used are in db, conf, langs, user and _FILES.
 *
 * @param	int		$filenb					File nb to delete
 * @param	int		$donotupdatesession		-1 or 1 = Do not update _SESSION variable
 * @param   int		$donotdeletefile        1=Do not delete physically file
 * @param   string  $trackid                Track id (used to prefix name of session vars to avoid conflict)
 * @return	void
 * @see dol_add_file_process()
 */
function dol_remove_file_process($filenb, $donotupdatesession = 0, $donotdeletefile = 1, $trackid = '')
{
}
/**
 *  Add a file into database index.
 *  Called by dol_add_file_process when uploading a file and on other cases.
 *  See also commonGenerateDocument that also add/update database index when a file is generated.
 *
 *  @param      string	$dir			Directory name (full real path without ending /)
 *  @param		string	$file			File name (May end with '.noexe')
 *  @param		string	$fullpathorig	Full path of origin for file (can be '')
 *  @param		string	$mode			How file was created ('uploaded', 'generated', ...)
 *  @param		int		$setsharekey	Set also the share key
 *  @param      Object  $object         Object used to set 'src_object_*' fields
 *	@return		int						<0 if KO, 0 if nothing done, >0 if OK
 */
function addFileIntoDatabaseIndex($dir, $file, $fullpathorig = '', $mode = 'uploaded', $setsharekey = 0, $object = \null)
{
}
/**
 *  Delete files into database index using search criterias.
 *
 *  @param      string	$dir			Directory name (full real path without ending /)
 *  @param		string	$file			File name
 *  @param		string	$mode			How file was created ('uploaded', 'generated', ...)
 *	@return		int						<0 if KO, 0 if nothing done, >0 if OK
 */
function deleteFilesIntoDatabaseIndex($dir, $file, $mode = 'uploaded')
{
}
/**
 * 	Convert an image file or a PDF into another image format.
 *  This need Imagick php extension. You can use dol_imageResizeOrCrop() for a function that need GD.
 *
 *  @param	string	$fileinput  Input file name
 *  @param  string	$ext        Format of target file (It is also extension added to file if fileoutput is not provided).
 *  @param	string	$fileoutput	Output filename
 *  @param  string  $page       Page number if we convert a PDF into png
 *  @return	int					<0 if KO, 0=Nothing done, >0 if OK
 *  @see dol_imageResizeOrCrop()
 */
function dol_convert_file($fileinput, $ext = 'png', $fileoutput = '', $page = '')
{
}
/**
 * Compress a file.
 * An error string may be returned into parameters.
 *
 * @param 	string	$inputfile		Source file name
 * @param 	string	$outputfile		Target file name
 * @param 	string	$mode			'gz' or 'bz' or 'zip'
 * @param	string	$errorstring	Error string
 * @return	int						<0 if KO, >0 if OK
 */
function dol_compress_file($inputfile, $outputfile, $mode = "gz", &$errorstring = \null)
{
}
/**
 * Uncompress a file
 *
 * @param 	string 	$inputfile		File to uncompress
 * @param 	string	$outputdir		Target dir name
 * @return 	array					array('error'=>'Error code') or array() if no error
 */
function dol_uncompress($inputfile, $outputdir)
{
}
/**
 * Compress a directory and subdirectories into a package file.
 *
 * @param 	string	$inputdir		Source dir name
 * @param 	string	$outputfile		Target file name (output directory must exists and be writable)
 * @param 	string	$mode			'zip'
 * @param	string	$excludefiles   A regex pattern. For example: '/\.log$|\/temp\//'
 * @param	string	$rootdirinzip	Add a root dir level in zip file
 * @return	int						<0 if KO, >0 if OK
 */
function dol_compress_dir($inputdir, $outputfile, $mode = "zip", $excludefiles = '', $rootdirinzip = '')
{
}
/**
 * Return file(s) into a directory (by default most recent)
 *
 * @param 	string		$dir			Directory to scan
 * @param	string		$regexfilter	Regex filter to restrict list. This regex value must be escaped for '/', since this char is used for preg_match function
 * @param	array		$excludefilter  Array of Regex for exclude filter (example: array('(\.meta|_preview.*\.png)$','^\.')). This regex value must be escaped for '/', since this char is used for preg_match function
 * @param	int			$nohook			Disable all hooks
 * @param	int			$mode			0=Return array minimum keys loaded (faster), 1=Force all keys like date and size to be loaded (slower), 2=Force load of date only, 3=Force load of size only
 * @return	string						Full path to most recent file
 */
function dol_most_recent_file($dir, $regexfilter = '', $excludefilter = array('(\\.meta|_preview.*\\.png)$', '^\\.'), $nohook = \false, $mode = '')
{
}
/**
 * Security check when accessing to a document (used by document.php, viewimage.php and webservices to get documents).
 * TODO Replace code that set $accessallowed by a call to restrictedArea()
 *
 * @param	string	$modulepart			Module of document ('module', 'module_user_temp', 'module_user' or 'module_temp'). Exemple: 'medias', 'invoice', 'logs', 'tax-vat', ...
 * @param	string	$original_file		Relative path with filename, relative to modulepart.
 * @param	string	$entity				Restrict onto entity (0=no restriction)
 * @param  	User	$fuser				User object (forced)
 * @param	string	$refname			Ref of object to check permission for external users (autodetect if not provided) or for hierarchy
 * @param   string  $mode               Check permission for 'read' or 'write'
 * @return	mixed						Array with access information : 'accessallowed' & 'sqlprotectagainstexternals' & 'original_file' (as a full path name)
 * @see restrictedArea()
 */
function dol_check_secure_access_document($modulepart, $original_file, $entity, $fuser = '', $refname = '', $mode = 'read')
{
}
/**
 * Store object in file.
 *
 * @param string $directory Directory of cache
 * @param string $filename Name of filecache
 * @param mixed $object Object to store in cachefile
 * @return void
 */
function dol_filecache($directory, $filename, $object)
{
}
/**
 * Test if Refresh needed.
 *
 * @param string $directory Directory of cache
 * @param string $filename Name of filecache
 * @param int $cachetime Cachetime delay
 * @return boolean 0 no refresh 1 if refresh needed
 */
function dol_cache_refresh($directory, $filename, $cachetime)
{
}
/**
 * Read object from cachefile.
 *
 * @param string $directory Directory of cache
 * @param string $filename Name of filecache
 * @return mixed Unserialise from file
 */
function dol_readcachefile($directory, $filename)
{
}
/**
 * Function to get list of updated or modified files.
 * $file_list is used as global variable
 *
 * @param	array				$file_list	        Array for response
 * @param   SimpleXMLElement	$dir    	        SimpleXMLElement of files to test
 * @param   string   			$path   	        Path of files relative to $pathref. We start with ''. Used by recursive calls.
 * @param   string              $pathref            Path ref (DOL_DOCUMENT_ROOT)
 * @param   array               $checksumconcat     Array of checksum
 * @return  array               			        Array of filenames
 */
function getFilesUpdated(&$file_list, \SimpleXMLElement $dir, $path = '', $pathref = '', &$checksumconcat = array())
{
}