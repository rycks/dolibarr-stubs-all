<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
// Original file header of PEAR::Spreadsheet_Excel_Writer_Parser (used as the base for this class):
// -----------------------------------------------------------------------------------------
// *  Class for parsing Excel formulas
// *
// *  License Information:
// *
// *    Spreadsheet_Excel_Writer:  A library for generating Excel Spreadsheets
// *    Copyright (c) 2002-2003 Xavier Noguer xnoguer@rezebra.com
// *
// *    This library is free software; you can redistribute it and/or
// *    modify it under the terms of the GNU Lesser General Public
// *    License as published by the Free Software Foundation; either
// *    version 2.1 of the License, or (at your option) any later version.
// *
// *    This library is distributed in the hope that it will be useful,
// *    but WITHOUT ANY WARRANTY; without even the implied warranty of
// *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// *    Lesser General Public License for more details.
// *
// *    You should have received a copy of the GNU Lesser General Public
// *    License along with this library; if not, write to the Free Software
// *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
// */
/**
 * PHPExcel_Writer_Excel5_Parser
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5_Parser
{
    /**	Constants				*/
    // Sheet title in unquoted form
    // Invalid sheet title characters cannot occur in the sheet title:
    // 		*:/\?[]
    // Moreover, there are valid sheet title characters that cannot occur in unquoted form (there may be more?)
    // +-% '^&<>=,;#()"{}
    const REGEX_SHEET_TITLE_UNQUOTED = '[^\\*\\:\\/\\\\\\?\\[\\]\\+\\-\\% \\\'\\^\\&\\<\\>\\=\\,\\;\\#\\(\\)\\"\\{\\}]+';
    // Sheet title in quoted form (without surrounding quotes)
    // Invalid sheet title characters cannot occur in the sheet title:
    // *:/\?[]					(usual invalid sheet title characters)
    // Single quote is represented as a pair ''
    const REGEX_SHEET_TITLE_QUOTED = '(([^\\*\\:\\/\\\\\\?\\[\\]\\\'])+|(\\\'\\\')+)+';
    /**
     * The index of the character we are currently looking at
     * @var integer
     */
    public $_current_char;
    /**
     * The token we are working on.
     * @var string
     */
    public $_current_token;
    /**
     * The formula to parse
     * @var string
     */
    public $_formula;
    /**
     * The character ahead of the current char
     * @var string
     */
    public $_lookahead;
    /**
     * The parse tree to be generated
     * @var string
     */
    public $_parse_tree;
    /**
     * Array of external sheets
     * @var array
     */
    public $_ext_sheets;
    /**
     * Array of sheet references in the form of REF structures
     * @var array
     */
    public $_references;
    /**
     * The class constructor
     *
     */
    public function __construct()
    {
    }
    /**
     * Initialize the ptg and function hashes.
     *
     * @access private
     */
    function _initializeHashes()
    {
    }
    /**
     * Convert a token to the proper ptg value.
     *
     * @access private
     * @param mixed $token The token to convert.
     * @return mixed the converted token on success
     */
    function _convert($token)
    {
    }
    /**
     * Convert a number token to ptgInt or ptgNum
     *
     * @access private
     * @param mixed $num an integer or double for conversion to its ptg value
     */
    function _convertNumber($num)
    {
    }
    /**
     * Convert a string token to ptgStr
     *
     * @access private
     * @param string $string A string for conversion to its ptg value.
     * @return mixed the converted token on success
     */
    function _convertString($string)
    {
    }
    /**
     * Convert a function to a ptgFunc or ptgFuncVarV depending on the number of
     * args that it takes.
     *
     * @access private
     * @param string  $token    The name of the function for convertion to ptg value.
     * @param integer $num_args The number of arguments the function receives.
     * @return string The packed ptg for the function
     */
    function _convertFunction($token, $num_args)
    {
    }
    /**
     * Convert an Excel range such as A1:D4 to a ptgRefV.
     *
     * @access private
     * @param string	$range	An Excel range in the A1:A2
     * @param int		$class
     */
    function _convertRange2d($range, $class = 0)
    {
    }
    /**
     * Convert an Excel 3d range such as "Sheet1!A1:D4" or "Sheet1:Sheet2!A1:D4" to
     * a ptgArea3d.
     *
     * @access private
     * @param string $token An Excel range in the Sheet1!A1:A2 format.
     * @return mixed The packed ptgArea3d token on success.
     */
    function _convertRange3d($token)
    {
    }
    /**
     * Convert an Excel reference such as A1, $B2, C$3 or $D$4 to a ptgRefV.
     *
     * @access private
     * @param string $cell An Excel cell reference
     * @return string The cell in packed() format with the corresponding ptg
     */
    function _convertRef2d($cell)
    {
    }
    /**
     * Convert an Excel 3d reference such as "Sheet1!A1" or "Sheet1:Sheet2!A1" to a
     * ptgRef3d.
     *
     * @access private
     * @param string $cell An Excel cell reference
     * @return mixed The packed ptgRef3d token on success.
     */
    function _convertRef3d($cell)
    {
    }
    /**
     * Convert an error code to a ptgErr
     *
     * @access	private
     * @param	string	$errorCode	The error code for conversion to its ptg value
     * @return	string				The error code ptgErr
     */
    function _convertError($errorCode)
    {
    }
    /**
     * Convert the sheet name part of an external reference, for example "Sheet1" or
     * "Sheet1:Sheet2", to a packed structure.
     *
     * @access	private
     * @param	string	$ext_ref	The name of the external reference
     * @return	string				The reference index in packed() format
     */
    function _packExtRef($ext_ref)
    {
    }
    /**
     * Look up the REF index that corresponds to an external sheet name
     * (or range). If it doesn't exist yet add it to the workbook's references
     * array. It assumes all sheet names given must exist.
     *
     * @access private
     * @param string $ext_ref The name of the external reference
     * @return mixed The reference index in packed() format on success
     */
    function _getRefIndex($ext_ref)
    {
    }
    /**
     * Look up the index that corresponds to an external sheet name. The hash of
     * sheet names is updated by the addworksheet() method of the
     * PHPExcel_Writer_Excel5_Workbook class.
     *
     * @access	private
     * @param	string	$sheet_name		Sheet name
     * @return	integer					The sheet index, -1 if the sheet was not found
     */
    function _getSheetIndex($sheet_name)
    {
    }
    /**
     * This method is used to update the array of sheet names. It is
     * called by the addWorksheet() method of the
     * PHPExcel_Writer_Excel5_Workbook class.
     *
     * @access public
     * @see PHPExcel_Writer_Excel5_Workbook::addWorksheet()
     * @param string  $name  The name of the worksheet being added
     * @param integer $index The index of the worksheet being added
     */
    function setExtSheet($name, $index)
    {
    }
    /**
     * pack() row and column into the required 3 or 4 byte format.
     *
     * @access private
     * @param string $cell The Excel cell reference to be packed
     * @return array Array containing the row and column in packed() format
     */
    function _cellToPackedRowcol($cell)
    {
    }
    /**
     * pack() row range into the required 3 or 4 byte format.
     * Just using maximum col/rows, which is probably not the correct solution
     *
     * @access private
     * @param string $range The Excel range to be packed
     * @return array Array containing (row1,col1,row2,col2) in packed() format
     */
    function _rangeToPackedRange($range)
    {
    }
    /**
     * Convert an Excel cell reference such as A1 or $B2 or C$3 or $D$4 to a zero
     * indexed row and column number. Also returns two (0,1) values to indicate
     * whether the row or column are relative references.
     *
     * @access private
     * @param string $cell The Excel cell reference in A1 format.
     * @return array
     */
    function _cellToRowcol($cell)
    {
    }
    /**
     * Advance to the next valid token.
     *
     * @access private
     */
    function _advance()
    {
    }
    /**
     * Checks if it's a valid token.
     *
     * @access private
     * @param mixed $token The token to check.
     * @return mixed       The checked token or false on failure
     */
    function _match($token)
    {
    }
    /**
     * The parsing method. It parses a formula.
     *
     * @access public
     * @param string $formula The formula to parse, without the initial equal
     *                        sign (=).
     * @return mixed true on success
     */
    function parse($formula)
    {
    }
    /**
     * It parses a condition. It assumes the following rule:
     * Cond -> Expr [(">" | "<") Expr]
     *
     * @access private
     * @return mixed The parsed ptg'd tree on success
     */
    function _condition()
    {
    }
    /**
     * It parses a expression. It assumes the following rule:
     * Expr -> Term [("+" | "-") Term]
     *      -> "string"
     *      -> "-" Term : Negative value
     *      -> "+" Term : Positive value
     *      -> Error code
     *
     * @access private
     * @return mixed The parsed ptg'd tree on success
     */
    function _expression()
    {
    }
    /**
     * This function just introduces a ptgParen element in the tree, so that Excel
     * doesn't get confused when working with a parenthesized formula afterwards.
     *
     * @access private
     * @see _fact()
     * @return array The parsed ptg'd tree
     */
    function _parenthesizedExpression()
    {
    }
    /**
     * It parses a term. It assumes the following rule:
     * Term -> Fact [("*" | "/") Fact]
     *
     * @access private
     * @return mixed The parsed ptg'd tree on success
     */
    function _term()
    {
    }
    /**
     * It parses a factor. It assumes the following rule:
     * Fact -> ( Expr )
     *       | CellRef
     *       | CellRange
     *       | Number
     *       | Function
     *
     * @access private
     * @return mixed The parsed ptg'd tree on success
     */
    function _fact()
    {
    }
    /**
     * It parses a function call. It assumes the following rule:
     * Func -> ( Expr [,Expr]* )
     *
     * @access private
     * @return mixed The parsed ptg'd tree on success
     */
    function _func()
    {
    }
    /**
     * Creates a tree. In fact an array which may have one or two arrays (sub-trees)
     * as elements.
     *
     * @access private
     * @param mixed $value The value of this node.
     * @param mixed $left  The left array (sub-tree) or a final node.
     * @param mixed $right The right array (sub-tree) or a final node.
     * @return array A tree
     */
    function _createTree($value, $left, $right)
    {
    }
    /**
     * Builds a string containing the tree in reverse polish notation (What you
     * would use in a HP calculator stack).
     * The following tree:
     *
     *    +
     *   / \
     *  2   3
     *
     * produces: "23+"
     *
     * The following tree:
     *
     *    +
     *   / \
     *  3   *
     *     / \
     *    6   A1
     *
     * produces: "36A1*+"
     *
     * In fact all operands, functions, references, etc... are written as ptg's
     *
     * @access public
     * @param array $tree The optional tree to convert.
     * @return string The tree in reverse polish notation
     */
    function toReversePolish($tree = array())
    {
    }
}