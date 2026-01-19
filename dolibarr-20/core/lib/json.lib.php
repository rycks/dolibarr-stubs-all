<?php

/**
 * Implement json_encode for PHP that does not support it.
 * Use json_encode and json_decode in your code !
 * Note: We can found some special chars into a json string:
 * Quotation mark (") = \", Backslash (\) = \\, Slash (/) =	\/, Backspace = \b, Form feed = \f, New line =\n, Carriage return =\r, Horizontal tab = \t
 *
 * @param	mixed	$elements		PHP Object to json encode
 * @return 	string					Json encoded string
 * @see json_encode()
 */
function dol_json_encode($elements)
{
}
/**
 * Return text according to type
 *
 * @param 	mixed	$val	Value to show
 * @return	string			Formatted value
 */
function _val($val)
{
}
/**
 * Implement json_decode for PHP that does not support it
 * Use json_encode and json_decode in your code !
 *
 * @param	string	$json		Json encoded to PHP Object or Array
 * @param	bool	$assoc		False return an object, true return an array. Try to always use it with true !
 * @return 	mixed				Object or Array or false on error
 * @see json_decode()
 */
function dol_json_decode($json, $assoc = \false)
{
}
/**
 * Return text according to type
 *
 * @param   string  $val    Value to decode
 * @return  string          Formatted value
 */
function _unval($val)
{
}
/**
 * Convert a string from one UTF-16 char to one UTF-8 char
 *
 * Normally should be handled by mb_convert_encoding, but
 * provides a slower PHP-only method for installations
 * that lack the multibyte string extension.
 *
 * @param    string  $utf16		UTF-16 character
 * @return   string  			UTF-8 character
 */
function utf162utf8($utf16)
{
}
/**
 * Convert a string from one UTF-8 char to one UTF-16 char
 *
 * Normally should be handled by mb_convert_encoding, but
 * provides a slower PHP-only method for installations
 * that lack the multibyte string extension.
 *
 * @param    string  $utf8		UTF-8 character
 * @return   string  			UTF-16 character
 */
function utf82utf16($utf8)
{
}