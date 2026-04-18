<?php

/**
 * Class to manage generation of HTML components
 * Only common components for WebPortal must be here.
 */
class FormWebPortal extends \Form
{
    /**
     * @var DoliDB Database
     */
    public $db;
    /**
     * @var array{nboffiles:int,extensions:array<string,int>,files:string[]} Array of file info
     */
    public $infofiles;
    // Used to return information by function getDocumentsLink
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Input for date
     *
     * @param	string		$name			Name of html input
     * @param	string|int	$value			[=''] Value of input (format : YYYY-MM-DD)
     * @param	string		$placeholder	[=''] Placeholder for input (keep empty for no label)
     * @param	string		$id				[=''] Id
     * @param	string		$morecss		[=''] Class
     * @param	string		$moreparam		[=''] Add attributes (checked, required, etc)
     * @return	string  	Html for input date
     */
    public function inputDate($name, $value = '', $placeholder = '', $id = '', $morecss = '', $moreparam = '')
    {
    }
    /**
     * Return a HTML select string, built from an array of key+value.
     * Note: Do not apply langs->trans function on returned content, content may be entity encoded twice.
     *
     * @param	string				$htmlname				Name of html select area.
     * @param	array<string,mixed>	$array					Array like array(key => value) or array(key=>array('label'=>..., 'data-...'=>..., 'disabled'=>..., 'css'=>...))
     * @param	string|string[]		$id						Preselected key or preselected keys for multiselect. Use 'ifone' to autoselect record if there is only one record.
     * @param	int|string			$show_empty				0 no empty value allowed, 1 or string to add an empty value into list (If 1: key is -1 and value is '' or '&nbsp;', If placeholder string: key is -1 and value is the string), <0 to add an empty value with key that is this value.
     * @param	int					$key_in_label			1 to show key into label with format "[key] value"
     * @param	int					$value_as_key			1 to use value as key
     * @param	string				$moreparam				Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     * @param	int					$translate				1=Translate and encode value
     * @param	int					$maxlen					Length maximum for labels
     * @param	int					$disabled				Html select box is disabled
     * @param	string				$sort					'ASC' or 'DESC' = Sort on label, '' or 'NONE' or 'POS' = Do not sort, we keep original order
     * @param	string				$morecss				Add more class to css styles
     * @param	int					$addjscombo				Add js combo
     * @param	string				$moreparamonempty		Add more param on the empty option line. Not used if show_empty not set
     * @param	int					$disablebademail		1=Check if a not valid email, 2=Check string '---', and if found into value, disable and colorize entry
     * @param	int					$nohtmlescape			No html escaping.
     * @return	string				HTML select string.
     */
    public static function selectarray($htmlname, $array, $id = '', $show_empty = 0, $key_in_label = 0, $value_as_key = 0, $moreparam = '', $translate = 0, $maxlen = 0, $disabled = 0, $sort = '', $morecss = 'minwidth75', $addjscombo = 1, $moreparamonempty = '', $disablebademail = 0, $nohtmlescape = 0)
    {
    }
    /**
     * Show a Document icon with link(s)
     * You may want to call this into a div like this:
     * print '<div class="inline-block valignmiddle">'.$formfile->getDocumentsLink($element_doc, $filename, $filedir).'</div>';
     *
     * @param string $modulepart 'propal', 'facture', 'facture_fourn', ...
     * @param string $modulesubdir Sub-directory to scan (Example: '0/1/10', 'FA/DD/MM/YY/9999'). Use '' if file is not into subdir of module.
     * @param string $filedir Full path to directory to scan
     * @param string $filter Filter filenames on this regex string (Example: '\.pdf$')
     * @param string $morecss Add more css to the download picto
     * @param int<0,1> $allfiles 0=Only generated docs, 1=All files
     * @return    string                Output string with HTML link of documents (might be empty string). This also fill the array ->infofiles
     */
    public function getDocumentsLink($modulepart, $modulesubdir, $filedir, $filter = '', $morecss = '', $allfiles = 0)
    {
    }
    /**
     * Show a Signature icon with link
     * You may want to call this into a div like this:
     * print '<div class="inline-block valignmiddle">'.$formfile->getDocumentsLink($element_doc, $filename, $filedir).'</div>';
     *
     * @param string $modulepart 'proposal', 'facture', 'facture_fourn', ...
     * @param Object $object Object linked to the document to be signed
     * @param string $morecss Add more css to the download picto
     * @return    string                Output string with HTML link of signature (might be empty string).
     */
    public function getSignatureLink($modulepart, $object, $morecss = '')
    {
    }
    /**
     * Generic method to select a component from a combo list.
     * Can use autocomplete with ajax after x key pressed or a full combo, depending on setup.
     * This is the generic method that will replace all specific existing methods.
     *
     * @param 	string 	$objectdesc 			'ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]'. For hard coded custom needs. Try to prefer method using $objectfield instead of $objectdesc.
     * @param 	string 	$htmlname 				Name of HTML select component
     * @param 	int 	$preselectedvalue 		Preselected value (ID of element)
     * @param 	string 	$showempty 				''=empty values not allowed, 'string'=value show if we allow empty values (for example 'All', ...)
     * @param 	string 	$searchkey 				Search criteria
     * @param 	string 	$placeholder 			Place holder
     * @param 	string 	$morecss 				More CSS
     * @param 	string 	$moreparams 			More params provided to ajax call
     * @param 	int 	$forcecombo 			Force to load all values and output a standard combobox (with no beautification)
     * @param 	int 	$disabled 				1=Html component is disabled
     * @param 	string 	$selected_input_value 	Value of preselected input text (for use with ajax)
     * @param	string	$objectfield			Object:Field that contains the definition (in table $fields or $extrafields). Example: 'Object:xxx' or 'Module_Object:xxx' or 'Object:options_xxx' or 'Module_Object:options_xxx'
     * @return  string	                      	Return HTML string
     * @see selectForFormsList(), select_thirdparty_list()
     */
    public function selectForForms($objectdesc, $htmlname, $preselectedvalue, $showempty = '', $searchkey = '', $placeholder = '', $morecss = '', $moreparams = '', $forcecombo = 0, $disabled = 0, $selected_input_value = '', $objectfield = '')
    {
    }
    /**
     * Return HTML string to put an input field into a page
     * Code very similar with showInputField for common object
     *
     * @param Object			$object			Common object
     * @param array{type:string,label:string,enabled:int|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$val Array of properties for field to show
     * @param string 			$key 			Key of attribute
     * @param string|mixed[]	$value 			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param string 			$moreparam 		To add more parameters on html input tag
     * @param string 			$keysuffix 		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param string 			$keyprefix 		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param string 			$morecss 		Value for css to define style/length of field. May also be a numeric.
     * @return string
     */
    public function showInputFieldForObject($object, $val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '')
    {
    }
    /**
     * Return HTML string to show a field into a page
     *
     * @param CommonObject 		$object 		Common object
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$val	Array of properties of field to show
     * @param string 			$key 			Key of attribute
     * @param string|string[] 	$value 			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value)
     * @param string 			$moreparam 		To add more parameters on html input tag
     * @param string 			$keysuffix 		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param string 			$keyprefix 		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param mixed 			$morecss 		Value for css to define size. May also be a numeric.
     * @return string
     */
    public function showOutputFieldForObject($object, $val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '')
    {
    }
    /**
     * Html for input with label
     *
     * @param	string	$type			Type of input : button, checkbox, color, email, hidden, month, number, password, radio, range, tel, text, time, url, week
     * @param	string	$name			Name
     * @param	string	$value			[=''] Value
     * @param	string	$id				[=''] Id
     * @param	string	$morecss		[=''] Class
     * @param	string	$moreparam		[=''] Add attributes (checked, required, etc)
     * @param	string	$label			[=''] Label
     * @param	string	$addInputLabel	[=''] Add label for input
     * @return	string					Html for input with label
     */
    public function inputType($type, $name, $value = '', $id = '', $morecss = '', $moreparam = '', $label = '', $addInputLabel = '')
    {
    }
    /**
     * Html for select with get options by AJAX
     *
     * @param	string					$htmlName		Name
     * @param	array<string,mixed>		$array			Array like array(key => value) or array(key=>array('label'=>..., 'data-...'=>..., 'disabled'=>..., 'css'=>...))
     * @param	string					$id				Preselected key or preselected keys for multiselect. Use 'ifone' to autoselect record if there is only one record.
     * @param	string					$ajaxUrl		Ajax page Url
     * @param	array<string,string>	$ajaxData		Additional data send to the AJAX page
     * @param	string					$morecss		[=''] Class
     * @param	string					$moreparam		[=''] Add attributes (checked, required, etc)
     * @return	string									Html for input with label
     */
    public function inputSelectAjax($htmlName, $array, $id, $ajaxUrl, $ajaxData = [], $morecss = 'minwidth75', $moreparam = '')
    {
    }
    /**
     * Html for HTML area
     *
     * @param	string	$htmlName		Html name
     * @param	string	$value			[=''] Value
     * @param	string	$morecss		[=''] Class
     * @param	string	$moreparam		[=''] Add attributes (checked, required, etc)
     * @return	string					Html for input with label
     */
    public function inputHtml($htmlName, $value, $morecss = '', $moreparam = '')
    {
    }
    /**
     * Html for HTML area
     *
     * @param	string				$htmlName		Html name
     * @param	string				$value			[=''] Value
     * @param	string				$morecss		[=''] Class
     * @param	string				$moreparam		[=''] Add attributes (checked, required, etc)
     * @param	array<string,mixed>	$options		Array like array(key => value) or array(key=>array('label'=>..., 'data-...'=>..., 'disabled'=>..., 'css'=>...))
     * @return	string								Html for input with label
     */
    public function inputText($htmlName, $value, $morecss = '', $moreparam = '', $options = array())
    {
    }
    /**
     * Html for input radio
     *
     * @param	string					$htmlName		Html name
     * @param	array<string,string>	$options		List of option
     * @param	string					$selectedValue	Selected value
     * @param	string					$morecss		[=''] Class
     * @param	string					$moreparam		[=''] Add attributes (checked, required, etc)
     * @return	string									Html for input radio
     */
    public function inputRadio($htmlName, $options, $selectedValue, $morecss = '', $moreparam = '')
    {
    }
    /**
     * Html for input stars
     *
     * @param	string		$htmlName		Html name
     * @param	int			$size			Number of stars
     * @param	int			$value			Value
     * @param	string		$morecss		[=''] Class
     * @param	string		$moreparam		[=''] Add attributes (checked, required, etc)
     * @return	string						Html for input stars
     */
    public function inputStars($htmlName, $size, $value, $morecss = '', $moreparam = '')
    {
    }
    /**
     * Html for input icon
     *
     * @param	string		$htmlName		Html name
     * @param	string		$value			Value
     * @param	string		$morecss		[=''] Class
     * @param	string		$moreparam		[=''] Add attributes (checked, required, etc)
     * @return	string						Html for input icon
     */
    public function inputIcon($htmlName, $value, $morecss = '', $moreparam = '')
    {
    }
    /**
     * Html for input geo point
     *
     * @param	string		$htmlName		Html name
     * @param	string		$value			Value
     * @param	string		$type			Type (linestrg, multipts, point, polygon)
     * @return	string						Html for input geo point
     */
    public function inputGeoPoint($htmlName, $value, $type = '')
    {
    }
    /**
     * Html for show selected multiple values
     *
     * @param	string[]	$values		Values
     * @return	string					Html for show selected multiple values
     */
    public function outputMultiValues($values)
    {
    }
    /**
     * Html for show stars
     *
     * @param	int			$size		Number of stars
     * @param	int			$value		Value
     * @return	string					Html for show stars
     */
    public function outputStars($size, $value)
    {
    }
    /**
     * Html for show icon
     *
     * @param	string		$value		Value
     * @return	string					Html for show icon
     */
    public function outputIcon($value)
    {
    }
    /**
     * Html for show geo point
     *
     * @param	string		$value		Value
     * @param	string		$type		Type (linestrg, multipts, point, polygon)
     * @return	string					Html for show geo point
     */
    public function outputGeoPoint($value, $type)
    {
    }
    /**
     * Return link of object
     *
     * @param	CommonObject	$object					Object handler
     * @param	int				$withpicto				Add picto into link
     * @param	string			$option					Where point the link ('stock', 'composition', 'category', 'supplier', '')
     * @param	int				$maxlength				Maxlength of ref
     * @param 	int				$save_lastsearch_value	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @param	int				$notooltip				No tooltip
     * @param  	string  		$morecss            	''=Add more css on link
     * @param	int				$add_label				0=Default, 1=Add label into string, >1=Add first chars into string
     * @param	string			$sep					' - '=Separator between ref and label if option 'add_label' is set
     * @return	string									String with URL
     */
    public function getNomUrl(&$object, $withpicto = 0, $option = '', $maxlength = 0, $save_lastsearch_value = -1, $notooltip = 0, $morecss = '', $add_label = 0, $sep = ' - ')
    {
    }
    /**
     * Return HTML code to output a photo
     *
     * @param string										$modulepart					Key to define module concerned ('societe', 'userphoto', 'memberphoto')
     * @param Societe|Adherent|Contact|User|CommonObject	$object						Object containing data to retrieve file name
     * @param int											$width						Width of photo
     * @param int											$height						Height of photo (auto if 0)
     * @param int<0,1>										$caneditfield				Add edit fields
     * @param string										$cssclass					CSS name to use on img for photo
     * @param string										$imagesize					'mini', 'small' or '' (original)
     * @param int<0,1>										$addlinktofullsize			Add link to fullsize image
     * @param int<0,1>										$cache						1=Accept to use image in cache
     * @param ''|'user'|'environment'						$forcecapture				'', 'user' (user-facing camera) or 'environment' ('outward-facing camera'). Force the parameter capture on HTML input file element to ask a smartphone to allow to open camera to take photo. Auto if ''.
     * @param int<0,1>										$noexternsourceoverwrite	No overwrite image with extern source (like 'gravatar' or other module)
     * @return string																	HTML code to output photo
     * @see getImagePublicURLOfObject()
     */
    public static function showphoto($modulepart, $object, $width = 100, $height = 0, $caneditfield = 0, $cssclass = 'photowithmargin', $imagesize = '', $addlinktofullsize = 1, $cache = 0, $forcecapture = '', $noexternsourceoverwrite = 0)
    {
    }
    /**
     * Return HTML code of the cell
     *
     * @param	string					$key		Field code
     * @param	string					$label		Field label
     * @param	string					$value		Field value
     * @param	array<string,mixed>		$params		More parameters:
     *                                              - 'required' : (boolean) If field required
     *                                              - 'cell_class' : (string) Additional class for the cell div
     *                                              - 'cell_attributes' : (string) Additional attributes for the cell div
     *                                              - 'label_class' : (string) Additional class for the label div
     *                                              - 'label_attributes' : (string) Additional attributes for the label div
     *                                              - 'value_class' : (string) Additional class for the value div
     *                                              - 'value_attributes' : (string) Additional attributes for the value div
     * @return	string								HTML code
     */
    public function printFieldCell($key, $label, $value, $params = array())
    {
    }
    /**
     * Convert all link of the provided html output
     *
     * @param	string		$html						Html output
     * @param	string		$additionalViewImageParams	Additional parameters for viewimage link
     * @param	string		$additionalDocumentParams	Additional parameters for document link
     * @return	string									Html output with all link converted
     */
    public static function convertAllLink($html, $additionalViewImageParams = '', $additionalDocumentParams = '')
    {
    }
    /**
     *  Retourne la liste des devises, dans la langue de l'utilisateur
     *
     * @param 	string 	$selected 		Preselected currency code
     * @param 	string 	$htmlname 		Name of HTML select list
     * @param 	int	 	$mode 			0 = Add currency symbol into label, 1 = Add 3 letter iso code, 2 = Add both symbol and code
     * @param 	string 	$useempty 		'1'=Allow empty value
     * @return  string					HTML component
     */
    public function selectCurrency($selected = '', $htmlname = 'currency_id', $mode = 0, $useempty = '')
    {
    }
}