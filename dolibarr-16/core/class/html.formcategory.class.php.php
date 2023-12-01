<?php

/**
 *	Class to manage forms for categories
 */
class FormCategory extends \Form
{
    /**
     * Return a HTML filter box for a list filter view
     *
     * @param string	$type			The categorie type (e.g Categorie::TYPE_WAREHOUSE)
     * @param Array		$preSelected	A list with the elements that should pre-selected
     * @return string					A HTML filter box (Note: selected results can get with GETPOST("search_category_".$type."_list"))
     */
    public function getFilterBox($type, array $preSelected)
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