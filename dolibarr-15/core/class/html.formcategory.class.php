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
}