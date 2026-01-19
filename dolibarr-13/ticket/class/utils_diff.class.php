<?php

/* Copyright (C) 2016      Jean-François Ferry  <hello@librethic.io>
 *
 * A class containing a diff implementation
 *
 * Created by Stephen Morley - http://stephenmorley.org/ - and released under the
 * terms of the CC0 1.0 Universal legal code:
 *
 * http://creativecommons.org/publicdomain/zero/1.0/legalcode
 */
/**
 * A class containing functions for computing diffs and formatting the output.
 */
class Diff
{
    // define the constants
    const UNMODIFIED = 0;
    const DELETED = 1;
    const INSERTED = 2;
    /**
     * Returns the diff for two strings. The return value is an array, each of
     * whose values is an array containing two values: a line (or character, if
     * $compareCharacters is true), and one of the constants DIFF::UNMODIFIED (the
     * line or character is in both strings), DIFF::DELETED (the line or character
     * is only in the first string), and DIFF::INSERTED (the line or character is
     * only in the second string). The parameters are:
     *
     * @param	string	$string1            First string
     * @param	string	$string2            Second string
     * @param	string	$compareCharacters  true to compare characters, and false to compare lines; this optional parameter defaults to false
     * @return	array						Array of diff
     */
    public static function compare($string1, $string2, $compareCharacters = \false)
    {
    }
    /**
     * Returns the diff for two files. The parameters are:
     *
     * @param	string	$file1              Path to the first file
     * @param	string	$file2              Path to the second file
     * @param	boolean	$compareCharacters  true to compare characters, and false to compare lines; this optional parameter defaults to false
     * @return	array						Array of diff
     */
    public static function compareFiles($file1, $file2, $compareCharacters = \false)
    {
    }
    /**
     * Returns the table of longest common subsequence lengths for the specified sequences. The parameters are:
     *
     * @param	string	$sequence1 	the first sequence
     * @param	string	$sequence2 	the second sequence
     * @param	string	$start     	the starting index
     * @param	string	$end1      	the ending index for the first sequence
     * @param	string	$end2      	the ending index for the second sequence
     * @return	array				array of diff
     */
    private static function computeTable($sequence1, $sequence2, $start, $end1, $end2)
    {
    }
    /**
     * Returns the partial diff for the specificed sequences, in reverse order.
     * The parameters are:
     *
     * @param	string	$table     	the table returned by the computeTable function
     * @param	string	$sequence1 	the first sequence
     * @param	string	$sequence2 	the second sequence
     * @param	string	$start     	the starting index
     * @return	array				array of diff
     */
    private static function generatePartialDiff($table, $sequence1, $sequence2, $start)
    {
    }
    /**
     * Returns a diff as a string, where unmodified lines are prefixed by '  ',
     * deletions are prefixed by '- ', and insertions are prefixed by '+ '. The
     * parameters are:
     *
     * @param	array	$diff      	the diff array
     * @param	string	$separator 	the separator between lines; this optional parameter defaults to "\n"
     * @return	string				String
     */
    public static function toString($diff, $separator = "\n")
    {
    }
    /**
     * Returns a diff as an HTML string, where unmodified lines are contained
     * within 'span' elements, deletions are contained within 'del' elements, and
     * insertions are contained within 'ins' elements. The parameters are:
     *
     * @param	string	$diff      	the diff array
     * @param	string	$separator 	the separator between lines; this optional parameter defaults to '<br>'
     * @return	string				HTML string
     */
    public static function toHTML($diff, $separator = '<br>')
    {
    }
    /**
     * Returns a diff as an HTML table. The parameters are:
     *
     * @param	string	$diff        	the diff array
     * @param	string	$indentation 	indentation to add to every line of the generated HTML; this optional parameter defaults to ''
     * @param	string	$separator   	the separator between lines; this optional parameter defaults to '<br>'
     * @return	string					HTML string
     */
    public static function toTable($diff, $indentation = '', $separator = '<br>')
    {
    }
    /**
     * Returns the content of the cell, for use in the toTable function. The
     * parameters are:
     *
     * @param	string	$diff        	the diff array
     * @param	string	$indentation 	indentation to add to every line of the generated HTML
     * @param	string	$separator   	the separator between lines
     * @param	string	$index       	the current index, passes by reference
     * @param	string	$type        	the type of line
     * @return	string					HTML string
     */
    private static function getCellContent($diff, $indentation, $separator, &$index, $type)
    {
    }
}