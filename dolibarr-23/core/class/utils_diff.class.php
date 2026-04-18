<?php

/* Copyright (C) 2016      Jean-François Ferry  <hello@librethic.io>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * We can compare 2 strings or 2 files (as one string or line by line)
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
     * @param	boolean	$compareCharacters  true to compare characters, and false to compare lines; this optional parameter defaults to false
     * @return	array<array{0:string,1:int<0,2>}>		Array of diff
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
     * @return	array<array{0:string,1:int<0,2>}>						Array of diff
     */
    public static function compareFiles($file1, $file2, $compareCharacters = \false)
    {
    }
    /**
     * Returns the table of longest common subsequence lengths for the specified sequences. The parameters are:
     *
     * @param	string	$sequence1 	the first sequence
     * @param	string	$sequence2 	the second sequence
     * @param	int		$start     	the starting index
     * @param	int		$end1      	the ending index for the first sequence
     * @param	int		$end2      	the ending index for the second sequence
     * @return	array<array<int>>	array of diff
     */
    private static function computeTable($sequence1, $sequence2, $start, $end1, $end2)
    {
    }
    /**
     * Returns the partial diff for the specified sequences, in reverse order.
     * The parameters are:
     *
     * @param	array<array{0:string,1:int<0,2>}>	$table     	the table returned by the computeTable function
     * @param	string	$sequence1 	the first sequence
     * @param	string	$sequence2 	the second sequence
     * @param	int		$start     	the starting index
     * @return	array<array{0:string,1:int<0,2>}>	array of diff
     */
    private static function generatePartialDiff($table, $sequence1, $sequence2, $start)
    {
    }
    /**
     * Returns a diff as a string, where unmodified lines are prefixed by '  ',
     * deletions are prefixed by '- ', and insertions are prefixed by '+ '. The
     * parameters are:
     *
     * @param	array<array{0:string,1:int<0,2>}>	$diff      	the diff array
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
     * @param	array<array{0:string,1:int<0,2>}>	$diff      	the diff array
     * @param	string	$separator 	the separator between lines; this optional parameter defaults to '<br>'
     * @return	string				HTML string
     */
    public static function toHTML($diff, $separator = '<br>')
    {
    }
    /**
     * Returns a diff as an HTML table. The parameters are:
     *
     * @param	array<array{0:string,1:int<0,2>}>	$diff        	the diff array
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
     * @param	array<array{0:string,1:int<0,2>}>	$diff        	the diff array
     * @param	string	$indentation 	indentation to add to every line of the generated HTML
     * @param	string	$separator   	the separator between lines
     * @param	int 	$index       	the current index, passed by reference
     * @param	int<0,2> 	$type       the type of line
     * @return	string					HTML string
     */
    private static function getCellContent($diff, $indentation, $separator, &$index, $type)
    {
    }
}