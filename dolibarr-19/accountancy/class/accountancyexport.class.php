<?php

/**
 * Manage the different format accountancy export
 */
class AccountancyExport
{
    // Type of export. Used into $conf->global->ACCOUNTING_EXPORT_MODELCSV
    public static $EXPORT_TYPE_CONFIGURABLE = 1;
    // CSV
    public static $EXPORT_TYPE_AGIRIS = 10;
    public static $EXPORT_TYPE_EBP = 15;
    public static $EXPORT_TYPE_CEGID = 20;
    public static $EXPORT_TYPE_COGILOG = 25;
    public static $EXPORT_TYPE_COALA = 30;
    public static $EXPORT_TYPE_BOB50 = 35;
    public static $EXPORT_TYPE_CIEL = 40;
    public static $EXPORT_TYPE_SAGE50_SWISS = 45;
    public static $EXPORT_TYPE_CHARLEMAGNE = 50;
    public static $EXPORT_TYPE_QUADRATUS = 60;
    public static $EXPORT_TYPE_WINFIC = 70;
    public static $EXPORT_TYPE_OPENCONCERTO = 100;
    public static $EXPORT_TYPE_LDCOMPTA = 110;
    public static $EXPORT_TYPE_LDCOMPTA10 = 120;
    public static $EXPORT_TYPE_GESTIMUMV3 = 130;
    public static $EXPORT_TYPE_GESTIMUMV5 = 135;
    public static $EXPORT_TYPE_ISUITEEXPERT = 200;
    // Generic FEC after that
    public static $EXPORT_TYPE_FEC = 1000;
    public static $EXPORT_TYPE_FEC2 = 1010;
    /**
     * @var DoliDB	Database handler
     */
    public $db;
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     *
     * @var string Separator
     */
    public $separator = '';
    /**
     *
     * @var string End of line
     */
    public $end_line = '';
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Array with all export type available (key + label)
     *
     * @return array of type
     */
    public function getType()
    {
    }
    /**
     * Return string to summarize the format (Used to generated export filename)
     *
     * @param	int		$type		Format id
     * @return 	string				Format code
     */
    public static function getFormatCode($type)
    {
    }
    /**
     * Array with all export type available (key + label) and parameters for config
     *
     * @return array of type
     */
    public function getTypeConfig()
    {
    }
    /**
     * Return the MIME type of a file
     *
     * @param	int		$formatexportset	Id of export format
     * @return 	string						MIME type.
     */
    public function getMimeType($formatexportset)
    {
    }
    /**
     * Function who chose which export to use with the default config, and make the export into a file
     *
     * @param 	array	$TData 						Array with data
     * @param	int		$formatexportset			Id of export format
     * @param	int		$withAttachment				[=0] Not add files
     * 												or 1 to have attached in an archive (ex : Quadratus) - Force output mode to write in a file (output mode = 1)
     * @param	int		$downloadMode				[=0] Direct download
     * 												or 1 to download after writing files - Forced by default when use withAttachment = 1
     * 												or -1 not to download files
     * @param	int		$outputMode					[=0] Print on screen
     * 												or 1 to write in file and uses a temp directory - Forced by default when use withAttachment = 1
     * 												or 2 to write in file a default export directory (accounting/export/)
     * @return 	int		Return integer <0 if KO, >0 OK
     */
    public function export(&$TData, $formatexportset, $withAttachment = 0, $downloadMode = 0, $outputMode = 0)
    {
    }
    /**
     * Export format : CEGID
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return	void
     */
    public function exportCegid($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : COGILOG
     * Last review for this format : 2022-07-12 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return	void
     */
    public function exportCogilog($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : COALA
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportCoala($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : BOB50
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportBob50($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : CIEL (Format XIMPORT)
     * Format since 2003 compatible CIEL version > 2002 / Sage50
     * Last review for this format : 2021-09-13 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help : https://sage50c.online-help.sage.fr/aide-technique/
     * In sage software | Use menu : "Exchange" > "Importing entries..."
     *
     * If you want to force filename to "XIMPORT.TXT" for automatically import file present in a directory :
     * use constant ACCOUNTING_EXPORT_XIMPORT_FORCE_FILENAME
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportCiel($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : Quadratus (Format ASCII)
     * Format since 2015 compatible QuadraCOMPTA
     * Last review for this format : 2023/10/12 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Information on format: https://docplayer.fr/20769649-Fichier-d-entree-ascii-dans-quadracompta.html
     * Help to import in Quadra: https://wiki.dolibarr.org/index.php?title=Module_Comptabilit%C3%A9_en_Partie_Double#Import_vers_CEGID_Quadra
     * In QuadraCompta | Use menu : "Outils" > "Suivi des dossiers" > "Import ASCII(Compta)"
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @param 	array		$archiveFileList		[=array()] Archive file list : array of ['path', 'name']
     * @param 	int			$withAttachment			[=0] Not add files or 1 to have attached in an archive
     * @return	array		Archive file list : array of ['path', 'name']
     */
    public function exportQuadratus($objectLines, $exportFile = \null, $archiveFileList = array(), $withAttachment = 0)
    {
    }
    /**
     * Export format : WinFic - eWinfic - WinSis Compta
     * Last review for this format : 2022-11-01 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help : https://wiki.gestan.fr/lib/exe/fetch.php?media=wiki:v15:compta:accountancy-format_winfic-ewinfic-winsiscompta.pdf
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportWinfic($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : EBP
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportEbp($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : Agiris Isacompta
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportAgiris($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : OpenConcerto
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportOpenConcerto($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : Configurable CSV
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return	void
     */
    public function exportConfigurable($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : FEC
     * Last review for this format : 2023/10/12 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help to import in your software: https://wiki.dolibarr.org/index.php?title=Module_Comptabilit%C3%A9_en_Partie_Double#Exports_avec_fichiers_sources
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @param 	array		$archiveFileList		[=array()] Archive file list : array of ['path', 'name']
     * @param 	int			$withAttachment			[=0] Not add files or 1 to have attached in an archive
     * @return	array		Archive file list : array of ['path', 'name']
     */
    public function exportFEC($objectLines, $exportFile = \null, $archiveFileList = array(), $withAttachment = 0)
    {
    }
    /**
     * Export format : FEC2
     * Last review for this format : 2023/10/12 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help to import in your software: https://wiki.dolibarr.org/index.php?title=Module_Comptabilit%C3%A9_en_Partie_Double#Exports_avec_fichiers_sources
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @param 	array		$archiveFileList		[=array()] Archive file list : array of ['path', 'name']
     * @param 	int			$withAttachment			[=0] Not add files or 1 to have attached in an archive
     * @return	array		Archive file list : array of ['path', 'name']
     */
    public function exportFEC2($objectLines, $exportFile = \null, $archiveFileList = array(), $withAttachment = 0)
    {
    }
    /**
     * Export format : SAGE50SWISS
     *
     * https://onlinehelp.sageschweiz.ch/default.aspx?tabid=19984
     * http://media.topal.ch/Public/Schnittstellen/TAF/Specification/Sage50-TAF-format.pdf
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportSAGE50SWISS($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : LD Compta version 9
     * http://www.ldsysteme.fr/fileadmin/telechargement/np/ldcompta/Documentation/IntCptW9.pdf
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportLDCompta($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : LD Compta version 10 & higher
     * Last review for this format : 08-15-2021 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help : http://www.ldsysteme.fr/fileadmin/telechargement/np/ldcompta/Documentation/IntCptW10.pdf
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportLDCompta10($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : Charlemagne
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportCharlemagne($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : Gestimum V3
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return	void
     */
    public function exportGestimumV3($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : Gestimum V5
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportGestimumV5($objectLines, $exportFile = \null)
    {
    }
    /**
     * Export format : iSuite Expert
     *
     * by OpenSolus [https://opensolus.fr]
     *
     * @param 	array 		$objectLines 			data
     * @param 	resource	$exportFile				[=null] File resource to export or print if null
     * @return 	void
     */
    public function exportiSuiteExpert($objectLines, $exportFile = \null)
    {
    }
    /**
     * trunc
     *
     * @param string	$str 	String
     * @param integer 	$size 	Data to trunc
     * @return string
     */
    public static function trunc($str, $size)
    {
    }
    /**
     * toAnsi
     *
     * @param string	$str 		Original string to encode and optionaly truncate
     * @param integer 	$size 		Truncate string after $size characters
     * @return string 				String encoded in Windows-1251 charset
     */
    public static function toAnsi($str, $size = -1)
    {
    }
}