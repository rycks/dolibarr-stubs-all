<?php

/**
 *      Class to manage building of HTML components
 */
class FormProjets extends \Form
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $errors = array();
    /**
     * @var int
     */
    public $nboftasks;
    /**
     *    Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Output a combo list with projects qualified for a third party / user
     *
     * @param int 		$socid 			Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     * @param string|Project $selected Id of preselected project or Project (or ''). Note: If you know the ref, you can also provide it into $selected_input_value to save one request in some cases.
     * @param string 	$htmlname 		Name of HTML field
     * @param int 		$maxlength 		Maximum length of label
     * @param int 		$option_only 	Return only html options lines without the select tag
     * @param int|string	$show_empty 	Add an empty line
     * @param int 		$discard_closed Discard closed projects (0=Keep, 1=hide completely, 2=Disable). Use a negative value to not show the "discarded" tooltip.
     * @param int 		$forcefocus 	Force focus on field (works with javascript only)
     * @param int 		$disabled 		Disabled
     * @param int 		$mode 			0 for HTML mode and 1 for JSON mode
     * @param string 	$filterkey 		Key to filter on ref or title
     * @param int 		$nooutput 		No print output. Return it only.
     * @param int 		$forceaddid 	Force to add project id in list, event if not qualified
     * @param string 	$morecss 		More css
     * @param string	$htmlid 		Html id to use instead of htmlname, by example id="htmlid"
     * @param string 	$morefilter 	More filters (Must be a sql sanitized string)
     * @return string                   Return html content
     */
    public function select_projects($socid = -1, $selected = '', $htmlname = 'projectid', $maxlength = 16, $option_only = 0, $show_empty = 1, $discard_closed = 0, $forcefocus = 0, $disabled = 0, $mode = 0, $filterkey = '', $nooutput = 0, $forceaddid = 0, $morecss = '', $htmlid = '', $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns an array with projects qualified for a third party
     *
     * @param int 		$socid 			Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     * @param int 		$selected 		Id project preselected
     * @param string 	$htmlname 		Name of html component
     * @param int 		$maxlength 		Maximum length of label
     * @param int 		$option_only 	Return only html options lines without the select tag
     * @param int|string	$show_empty Add an empty line
     * @param int 		$discard_closed Discard closed projects (0=Keep,1=hide completely,2=Disable)
     * @param int 		$forcefocus 	Force focus on field (works with javascript only)
     * @param int 		$disabled 		Disabled
     * @param int 		$mode 			0 for HTML mode and 1 for array return (to be used by json_encode for example)
     * @param string 	$filterkey 		Key to filter on title or ref
     * @param int 		$nooutput 		No print output. Return it only.
     * @param int 		$forceaddid 	Force to add project id in list, event if not qualified
     * @param string	$htmlid 		Html id to use instead of htmlname
     * @param string 	$morecss 		More CSS
     * @param string 	$morefilter 	More filters (Must be a sql sanitized string)
     * @return int|string|array<array{key:int,value:string,ref:string,labelx:string,label:string,disabled:bool}>         HTML string or array of option or <0 if KO
     */
    public function select_projects_list($socid = -1, $selected = 0, $htmlname = 'projectid', $maxlength = 24, $option_only = 0, $show_empty = 1, $discard_closed = 0, $forcefocus = 0, $disabled = 0, $mode = 0, $filterkey = '', $nooutput = 0, $forceaddid = 0, $htmlid = '', $morecss = 'maxwidth500', $morefilter = '')
    {
    }
    /**
     *  Output a combo list with tasks qualified for a third party
     *
     * @param int 		$socid 			Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     * @param int 		$selected 		Id task preselected
     * @param string 	$htmlname 		Name of HTML select
     * @param int 		$maxlength 		Maximum length of label
     * @param int 		$option_only 	Return only html options lines without the select tag
     * @param string 	$show_empty 	Add an empty line ('1' or string to show for empty line)
     * @param int 		$discard_closed Discard closed projects (0=Keep, 1=hide completely, 2=Disable)
     * @param int 		$forcefocus 	Force focus on field (works with javascript only)
     * @param int 		$disabled 		Disabled
     * @param string 	$morecss 		More css added to the select component
     * @param string 	$projectsListId ''=Automatic filter on project allowed. List of id=Filter on project ids.
     * @param string 	$showmore 		'all' = Show project info, 'progress' = Show task progression, ''=Show nothing more
     * @param User 		$usertofilter 	User object to use for filtering
     * @param int 		$nooutput 		1=Return string, do not send to output
     *
     * @return int|string                   Nbr of tasks if OK, <0 if KO. If nooutput=1: Return a HTML select string.
     */
    public function selectTasks($socid = -1, $selected = 0, $htmlname = 'taskid', $maxlength = 24, $option_only = 0, $show_empty = '1', $discard_closed = 0, $forcefocus = 0, $disabled = 0, $morecss = 'maxwidth500', $projectsListId = '', $showmore = 'all', $usertofilter = \null, $nooutput = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Build a HTML select list of element of same thirdparty to suggest to link them to project
     *
     * @param string $table_element Table of the element to update
     * @param int|string $socid If of thirdparty to use as filter or 'id1,id2,...'
     * @param string $morecss More CSS
     * @param int $limitonstatus Add filters to limit length of list to opened status (for example to avoid ERR_RESPONSE_HEADERS_TOO_BIG on project/element.php page). TODO To implement
     * @param string $projectkey Equivalent key  to fk_projet for actual table_element
     * @param string $placeholder Placeholder
     * @return    int|string                        The HTML select list of element or '' if nothing or -1 if KO
     */
    public function select_element($table_element, $socid = 0, $morecss = '', $limitonstatus = -2, $projectkey = "fk_projet", $placeholder = '')
    {
    }
    /**
     *    Build a HTML select list of element of same thirdparty to suggest to link them to project
     *
     * @param string $htmlname HTML name
     * @param string $preselected Preselected (int or 'all' or 'none')
     * @param int $showempty Add an empty line
     * @param int $useshortlabel Use short label
     * @param int $showallnone Add choice "All" and "None"
     * @param int $showpercent Show default probability for status
     * @param string $morecss Add more css
     * @param int $noadmininfo 0=Add admin info, 1=Disable admin info
     * @param int $addcombojs 1=Add a js combo
     * @return  int<-1,-1>|string                      The HTML select list of element or '' if nothing or -1 if KO
     */
    public function selectOpportunityStatus($htmlname, $preselected = '-1', $showempty = 1, $useshortlabel = 0, $showallnone = 0, $showpercent = 0, $morecss = '', $noadmininfo = 0, $addcombojs = 0)
    {
    }
    /**
     *  Return combo list of different statuses of orders
     *
     *  @param	string	$selected   Preselected value
     *  @param	int		$short		Use short labels
     *  @param	string	$hmlname	Name of HTML select element
     *  @return	void
     */
    public function selectProjectsStatus($selected = '', $short = 0, $hmlname = 'order_status')
    {
    }
    /**
     *  Output a combo list with invoices and lines qualified for a project
     *
     * @param int $selectedInvoiceId Id invoice preselected
     * @param int $selectedLineId Id invoice line preselected
     * @param string $htmlNameInvoice Name of HTML select for Invoice
     * @param string $htmlNameInvoiceLine Name of HTML select for Invoice Line
     * @param string $morecss More css added to the select component
     * @param array<string,int>	$filters Array of filters
     * @param int $lineOnly return only option for line
     * @return string                    HTML Select
     */
    public function selectInvoiceAndLine($selectedInvoiceId = 0, $selectedLineId = 0, $htmlNameInvoice = 'invoiceid', $htmlNameInvoiceLine = 'invoicelineid', $morecss = 'maxwidth500', $filters = array(), $lineOnly = 0)
    {
    }
    /**
     *  Output html select to select opportunity status
     *
     *  @param	string $page       		Page
     *  @param  string $selected   		Id preselected
     *  @param 	int    $percent_value		percentage of the opportunity
     *  @param	string $htmlname_status	name of HTML element for status select
     *  @param	string $htmlname_percent	name of HTML element for percent input
     *  @param  string $filter         	optional filters criteras
     *  @param  int    $nooutput       	No print output. Return it only.
     *  @return	void|string
     */
    public function formOpportunityStatus($page, $selected = '', $percent_value = 0, $htmlname_status = 'none', $htmlname_percent = 'none', $filter = '', $nooutput = 0)
    {
    }
}