<?php

/**
 *	Class to manage HTML output components for orders
 *	Before adding component here, check they are not into common part Form.class.php
 */
class FormOrder extends \Form
{
    /**
     *  Return combo list of different statuses of orders
     *
     *  @param	string	$selected   Preselected value
     *  @param	int		$short		Use short labels
     *  @param	string	$hmlname	Name of HTML select element
     *  @param	string	$morecss	More CSS
     *  @return	void
     */
    public function selectSupplierOrderStatus($selected = '', $short = 0, $hmlname = 'order_status', $morecss = '')
    {
    }
    /**
     *  Return combo list of different status of orders
     *
     *  @param	string	$selected   Preselected value
     *  @param	int		$short		Use short labels
     *  @param	string	$hmlname	Name of HTML select element
     *  @return	void
     */
    public function selectOrderStatus($selected = '', $short = 0, $hmlname = 'order_status')
    {
    }
    /**
     *	Return list of input method (mode used to receive order, like order received by email, fax, online)
     *  List found into table c_input_method.
     *
     *	@param	string	$selected		Id of preselected input method
     *  @param  string	$htmlname 		Name of HTML select list
     *  @param  int		$addempty		0=list with no empty value, 1=list with empty value
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function selectInputMethod($selected = '', $htmlname = 'source_id', $addempty = 0)
    {
    }
}