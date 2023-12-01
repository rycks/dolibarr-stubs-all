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
    public static function getType()
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
    public static function getTypeConfig()
    {
    }
    /**
     * Function who chose which export to use with the default config, and make the export into a file
     *
     * @param 	array	$TData 				Array with data
     * @param	int		$formatexportset	Id of export format
     * @return 	void
     */
    public function export(&$TData, $formatexportset)
    {
    }
    /**
     * Export format : CEGID
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportCegid($objectLines)
    {
    }
    /**
     * Export format : COGILOG
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportCogilog($objectLines)
    {
    }
    /**
     * Export format : COALA
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportCoala($objectLines)
    {
    }
    /**
     * Export format : BOB50
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportBob50($objectLines)
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
     * @param array $TData data
     * @return void
     */
    public function exportCiel(&$TData)
    {
    }
    /**
     * Export format : Quadratus (Format ASCII)
     * Format since 2015 compatible QuadraCOMPTA
     * Last review for this format : 2023/09/16 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help : https://docplayer.fr/20769649-Fichier-d-entree-ascii-dans-quadracompta.html
     * In QuadraCompta | Use menu : "Outils" > "Suivi des dossiers" > "Import ASCII(Compta)"
     *
     * @param array $TData data
     * @return void
     */
    public function exportQuadratus(&$TData)
    {
    }
    /**
     * Export format : WinFic - eWinfic - WinSis Compta
     * Last review for this format : 2022-11-01 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help : https://wiki.gestan.fr/lib/exe/fetch.php?media=wiki:v15:compta:accountancy-format_winfic-ewinfic-winsiscompta.pdf
     *
     * @param array $TData data
     *
     * @return void
     */
    public function exportWinfic(&$TData)
    {
    }
    /**
     * Export format : EBP
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportEbp($objectLines)
    {
    }
    /**
     * Export format : Agiris Isacompta
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportAgiris($objectLines)
    {
    }
    /**
     * Export format : OpenConcerto
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportOpenConcerto($objectLines)
    {
    }
    /**
     * Export format : Configurable CSV
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportConfigurable($objectLines)
    {
    }
    /**
     * Export format : FEC
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportFEC($objectLines)
    {
    }
    /**
     * Export format : FEC2
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportFEC2($objectLines)
    {
    }
    /**
     * Export format : SAGE50SWISS
     *
     * https://onlinehelp.sageschweiz.ch/default.aspx?tabid=19984
     * http://media.topal.ch/Public/Schnittstellen/TAF/Specification/Sage50-TAF-format.pdf
     *
     * @param array $objectLines data
     *
     * @return void
     */
    public function exportSAGE50SWISS($objectLines)
    {
    }
    /**
     * Export format : LD Compta version 9
     * http://www.ldsysteme.fr/fileadmin/telechargement/np/ldcompta/Documentation/IntCptW9.pdf
     *
     * @param array $objectLines data
     *
     * @return void
     */
    public function exportLDCompta($objectLines)
    {
    }
    /**
     * Export format : LD Compta version 10 & higher
     * Last review for this format : 08-15-2021 Alexandre Spangaro (aspangaro@open-dsi.fr)
     *
     * Help : http://www.ldsysteme.fr/fileadmin/telechargement/np/ldcompta/Documentation/IntCptW10.pdf
     *
     * @param array $objectLines data
     *
     * @return void
     */
    public function exportLDCompta10($objectLines)
    {
    }
    /**
     * Export format : Charlemagne
     *
     * @param array $objectLines data
     * @return void
     */
    public function exportCharlemagne($objectLines)
    {
    }
    /**
     * Export format : Gestimum V3
     *
     * @param array $objectLines data
     *
     * @return void
     */
    public function exportGestimumV3($objectLines)
    {
    }
    /**
     * Export format : Gestimum V5
     *
     * @param array $objectLines data
     *
     * @return void
     */
    public function exportGestimumV5($objectLines)
    {
    }
    /**
     * Export format : iSuite Expert
     *
     * by OpenSolus [https://opensolus.fr]
     *
     * @param array $objectLines data
     *
     * @return void
     */
    public function exportiSuiteExpert($objectLines)
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