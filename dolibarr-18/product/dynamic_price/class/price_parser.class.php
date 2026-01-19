<?php

/**
 * Class to parse product price expressions
 */
class PriceParser
{
    protected $db;
    // Limit of expressions per price
    public $limit = 100;
    // The error that occurred when parsing price
    public $error_parser;
    // The expression that caused the error
    public $error_expr;
    //The special char
    public $special_chr = "#";
    //The separator char
    public $separator_chr = ";";
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Returns translated error
     *
     *	@return string      Translated error
     */
    public function translatedError()
    {
    }
    /**
     *	Calculates price based on expression
     *
     *	@param	Product	$product    	The Product object to get information
     *	@param	String 	$expression     The expression to parse
     *	@param	array  	$values     	Strings to replaces
     *  @return int 					> 0 if OK, < 1 if KO
     */
    public function parseExpression($product, $expression, $values)
    {
    }
    /**
     *	Calculates product price based on product id and associated expression
     *
     *	@param	Product				$product    	The Product object to get information
     *	@param	array 				$extra_values   Any aditional values for expression
     *	@return int 						> 0 if OK, < 1 if KO
     */
    public function parseProduct($product, $extra_values = array())
    {
    }
    /**
     *	Calculates supplier product price based on product supplier price and associated expression
     *
     *	@param	ProductFournisseur	$product_supplier   The Product supplier object to get information
     *	@param	array 				$extra_values       Any aditional values for expression
     *  @return int 				> 0 if OK, < 1 if KO
     */
    public function parseProductSupplier($product_supplier, $extra_values = array())
    {
    }
    /**
     *  Tests string expression for validity
     *
     *  @param  int					$product_id    	The Product id to get information
     *  @param  string 				$expression     The expression to parse
     *  @param  array 				$extra_values   Any aditional values for expression
     *  @return int 				> 0 if OK, < 1 if KO
     */
    public function testExpression($product_id, $expression, $extra_values = array())
    {
    }
}