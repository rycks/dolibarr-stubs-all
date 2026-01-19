<?php

/**
 *	Class to generate stick sheet with format Avery or other personalised
 */
abstract class CommonStickerGenerator
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $code;
    // Code of format
    /**
     * @var int page_largeur
     */
    public $page_largeur;
    /**
     * @var int page_hauteur
     */
    public $page_hauteur;
    /**
     * @var array format
     */
    public $format;
    /**
     * @var int marge_gauche
     */
    public $marge_gauche;
    /**
     * @var int marge_droite
     */
    public $marge_droite;
    /**
     * @var int marge_haute
     */
    public $marge_haute;
    /**
     * @var int marge_basse
     */
    public $marge_basse;
    // phpcs:disable PEAR.NamingConventions.ValidVariableName.PublicUnderscore
    // protected
    // Nom du format de l'etiquette
    protected $_Avery_Name = '';
    // Marge de gauche de l'etiquette
    protected $_Margin_Left = 0;
    // marge en haut de la page avant la premiere etiquette
    protected $_Margin_Top = 0;
    // Espace horizontal entre 2 bandes d'etiquettes
    protected $_X_Space = 0;
    // Espace vertical entre 2 bandes d'etiquettes
    protected $_Y_Space = 0;
    // NX Nombre d'etiquettes sur la largeur de la page
    protected $_X_Number = 0;
    // NY Nombre d'etiquettes sur la hauteur de la page
    protected $_Y_Number = 0;
    // Largeur de chaque etiquette
    protected $_Width = 0;
    // Hauteur de chaque etiquette
    protected $_Height = 0;
    // Hauteur des caracteres
    protected $_Char_Size = 10;
    // Hauteur par defaut d'une ligne
    protected $_Line_Height = 10;
    // Type of metric.. Will help to calculate good values
    protected $_Metric = 'mm';
    // Type of metric for the doc..
    protected $_Metric_Doc = 'mm';
    protected $_COUNTX = 1;
    protected $_COUNTY = 1;
    protected $_First = 1;
    public $Tformat;
    // phpcs:enable
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build PDF on disk, then output on HTTP strem.
     *
     *  @param	array		$arrayofrecords  	Array of record informations (array('textleft'=>,'textheader'=>, ..., 'id'=>,'photo'=>)
     *  @param  Translate	$outputlangs     	Lang object for output language
     *  @param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	string		$outputdir			Output directory for pdf file
     *  @return int             				1=OK, 0=KO
     */
    public abstract function write_file($arrayofrecords, $outputlangs, $srctemplatepath, $outputdir = '');
    // phpcs:enable
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     *
     * @param   TCPDF         $pdf            PDF reference
     * @param   Translate  	$outputlangs    Output langs
     * @param   array     	$param          Associative array containing label content and optional parameters
     * @return  void
     */
    public abstract function addSticker(&$pdf, $outputlangs, $param);
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Methode qui permet de modifier la taille des caracteres
     * Cela modiera aussi l'espace entre chaque ligne
     *
     * @param    TCPDF        $pdf   PDF reference
     * @param    int        $pt    point
     * @return   void
     */
    public function Set_Char_Size(&$pdf, $pt)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * protected Print dot line
     *
     * @param	TCPDF   $pdf                PDF reference
     * @param 	int		$x1					X1
     * @param 	int		$y1					Y1
     * @param 	int		$x2					X2
     * @param 	int		$y2					Y2
     * @param 	int		$epaisseur			Epaisseur
     * @param 	int		$nbPointilles		Nb pointilles
     * @return	void
     */
    protected function _Pointille(&$pdf, $x1 = 0, $y1 = 0, $x2 = 210, $y2 = 297, $epaisseur = 1, $nbPointilles = 15)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * protected Function realisant une croix aux 4 coins des cartes
     *
     * @param TCPDF $pdf                PDF reference
     * @param int   $x1					X1
     * @param int	$y1					Y1
     * @param int	$x2					X2
     * @param int	$y2					Y2
     * @param int	$epaisseur			Epaisseur
     * @param int	$taille             Size
     * @return void
     */
    protected function _Croix(&$pdf, $x1 = 0, $y1 = 0, $x2 = 210, $y2 = 297, $epaisseur = 1, $taille = 4)
    {
    }
    /**
     * Convert units (in to mm, mm to in)
     * $src and $dest must be 'in' or 'mm'
     *
     * @param int       $value  value
     * @param string    $src    from ('in' or 'mm')
     * @param string    $dest   to ('in' or 'mm')
     * @return float    value   value after conversion
     */
    private function convertMetric($value, $src, $dest)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * protected Give the height for a char size given.
     *
     * @param  int    $pt    Point
     * @return int           Height chars
     */
    protected function _Get_Height_Chars($pt)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * protected Set format
     *
     * @param    TCPDF     $pdf     PDF reference
     * @param    string    $format  Format
     * @return   void
     */
    protected function _Set_Format(&$pdf, $format)
    {
    }
}