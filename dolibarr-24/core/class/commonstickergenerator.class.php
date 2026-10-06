<?php

/**
 *	Class to generate stick sheet with format Avery or other personalised format
 */
abstract class CommonStickerGenerator extends \CommonDocGenerator
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Code of format
     */
    public $code;
    // phpcs:disable PEAR.NamingConventions.ValidVariableName.PublicUnderscore
    // protected
    /**
     * @var string Name of the label sheet
     */
    protected $_Avery_Name = '';
    /**
     * @var string Code of the labal sheet
     */
    protected $_Avery_Code = '';
    /**
     * @var float Left margin of the label
     */
    protected $_Margin_Left = 0;
    /**
     * @var float top margin of the page before the first label
     */
    protected $_Margin_Top = 0;
    /**
     * @var float Horizontal space between 2 columns of labels
     */
    protected $_X_Space = 0;
    /**
     * @var float Vertical space between 2 rows of labels
     */
    protected $_Y_Space = 0;
    /**
     * @var int<0,max> NX Number of labels on the width of the page
     */
    protected $_X_Number = 0;
    /**
     * @var int<0,max> NY Number of labels on the height of a page
     */
    protected $_Y_Number = 0;
    /**
     * @var float Label Width
     */
    protected $_Width = 0;
    /**
     * @var float Label Height
     */
    protected $_Height = 0;
    /**
     * @var float Character Height
     */
    protected $_Char_Size = 10;
    /**
     * @var float Default Height of a line
     */
    protected $_Line_Height = 10;
    /**
     * @var 'in'|'mm' Type of metric.. Will help to calculate good values
     */
    protected $_Metric = 'mm';
    /**
     * @var 'in'|'mm' Type of metric for the doc..
     */
    protected $_Metric_Doc = 'mm';
    /**
     * @var int<0,max>
     */
    protected $_COUNTX = 1;
    /**
     * @var int<0,max>
     */
    protected $_COUNTY = 1;
    /**
     * @var int<0,max>
     */
    protected $_First = 1;
    /**
     * @var ?array{name:string,paper-size:'custom'|array{0:float,1:float},orientation:string,metric:'in'|'mm',marginLeft:float,marginTop:float,NX:int<0,max>,NY:int<0,max>,SpaceX:float,SpaceY:float,width:float,height:float,font-size:int,custom_x:float,custom_y:float}
     */
    public $Tformat;
    /**
     * @var ?array<string,array{name:string,paper-size:'custom'|array{0:float,1:float},orientation:string,metric:'in'|'mm',marginLeft:float,marginTop:float,NX:int<0,max>,NY:int<0,max>,SpaceX:float,SpaceY:float,width:float,height:float,font-size:int,custom_x:float,custom_y:float}>
     */
    public $_Avery_Labels;
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
     *  Function to build PDF on disk, then output on HTTP stream.
     *
     *  @param  Adherent|array<array{textleft:string,textheader:string,textfooter:string,textright:string,id:string,photo:string}>   $arrayofrecords     Array of record information (array('textleft'=>,'textheader'=>, ..., 'id'=>,'photo'=>)
     *  @param  Translate	$outputlangs     	Lang object for output language
     *  @param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param  string		$outputdir			Output directory for pdf file
     *  @param  string		$filename           Short file name of output file
     *  @return int<-1,1>                       1=OK, <=0=KO
     */
    public abstract function write_file($arrayofrecords, $outputlangs, $srctemplatepath, $outputdir = '', $filename = '');
    // phpcs:enable
    /**
     * Output a sticker on page at position _COUNTX, _COUNTY (_COUNTX and _COUNTY start from 0)
     *
     * @param   TCPDF       $pdf            PDF reference
     * @param   Translate  	$outputlangs    Output langs
     * @param   array<string,mixed>		$param	Associative array containing label content and optional parameters
     * @return  void
     */
    public abstract function addSticker(&$pdf, $outputlangs, $param);
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Method to modify the size of characters
     * This will also modify the space between lines
     *
     * @param    TCPDF      $pdf   PDF reference
     * @param    int        $pt    Point
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
     * @param 	int		$epaisseur			Thickness
     * @param 	int		$nbPointilles		Nb of dots
     * @return	void
     */
    protected function _Pointille(&$pdf, $x1 = 0, $y1 = 0, $x2 = 210, $y2 = 297, $epaisseur = 1, $nbPointilles = 15)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * protected Function making a cross at the 4 corners of the labels
     *
     * @param TCPDF $pdf                PDF reference
     * @param float $x1					X1
     * @param float	$y1					Y1
     * @param float	$x2					X2
     * @param float	$y2					Y2
     * @param float	$epaisseur			Thickness
     * @param int	$taille             Size
     * @return void
     *
     * @phan-suppress PhanPluginSuspiciousParamPosition
     */
    protected function _Croix(&$pdf, $x1 = 0, $y1 = 0, $x2 = 210, $y2 = 297, $epaisseur = 1, $taille = 4)
    {
    }
    /**
     * Convert units (in to mm, mm to in)
     * $src and $dest must be 'in' or 'mm'
     *
     * @param float     $value  value
     * @param 'in'|'mm' $src    from ('in' or 'mm')
     * @param 'in'|'mm' $dest   to ('in' or 'mm')
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
     * @param    array{metric:'in'|'mm',name:string,code?:string,marginLeft:float,marginTop:float,SpaceX:float,SpaceY:float,NX:int<0,max>,NY:int<0,max>,width:float,height:float,font-size:int}	$format  Format
     * @return   void
     */
    protected function _Set_Format(&$pdf, $format)
    {
    }
}