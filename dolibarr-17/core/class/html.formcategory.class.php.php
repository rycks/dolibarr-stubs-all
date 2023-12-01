<?php

/**
 *	Class to manage forms for categories
 */
class FormCategory extends \Form
{
    /**
     * Return a HTML filter box for a list filter view
     *
     * @param 	string		$type								The categorie type (e.g Categorie::TYPE_WAREHOUSE)
     * @param 	array		$preSelected						A list with the elements that should pre-selected
     * @param	string		$morecss							More CSS
     * @param	int			$searchCategoryProductOperator		0 or 1 to enable the checkbox to search with a or (0=not preseleted, 1=preselected)
     * @param	int			$multiselect						0 or 1
     * @param	int			$nocateg							1=Add an entry '- No Category -'
     * @param	string		$showempty							1 or 'string' to add an empty entry
     * @return 	string											A HTML filter box (Note: selected results can get with GETPOST("search_category_".$type."_list"))
     */
    public function getFilterBox($type, array $preSelected, $morecss = "minwidth300 widthcentpercentminusx", $searchCategoryProductOperator = -1, $multiselect = 1, $nocateg = 1, $showempty = '')
    {
    }
    /**
     *    Prints a select form for products categories
     *    @param    string	$selected          	Id category pre-selection
     *    @param    string	$htmlname          	Name of HTML field
     *    @param    int		$showempty         	Add an empty field
     *    @return	integer|null
     */
    public function selectProductCategory($selected = 0, $htmlname = 'product_category_id', $showempty = 0)
    {
    }
}