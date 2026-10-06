<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

/**
 * PARTLY BASED ON:
 * Copyright (c) 2007 E. W. Bachtal, Inc.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * The software is provided "as is", without warranty of any kind, express or implied, including but not
 * limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. In
 * no event shall the authors or copyright holders be liable for any claim, damages or other liability,
 * whether in an action of contract, tort or otherwise, arising from, out of or in connection with the
 * software or the use or other dealings in the software.
 *
 * https://ewbi.blogs.com/develops/2007/03/excel_formula_p.html
 * https://ewbi.blogs.com/develops/2004/12/excel_formula_p.html
 */
class FormulaParser
{
    // Character constants
    const QUOTE_DOUBLE = '"';
    const QUOTE_SINGLE = '\'';
    const BRACKET_CLOSE = ']';
    const BRACKET_OPEN = '[';
    const BRACE_OPEN = '{';
    const BRACE_CLOSE = '}';
    const PAREN_OPEN = '(';
    const PAREN_CLOSE = ')';
    const SEMICOLON = ';';
    const WHITESPACE = ' ';
    const COMMA = ',';
    const ERROR_START = '#';
    const OPERATORS_SN = '+-';
    const OPERATORS_INFIX = '+-*/^&=><';
    const OPERATORS_POSTFIX = '%';
    /**
     * Formula.
     *
     * @var string
     */
    private $formula;
    /**
     * Tokens.
     *
     * @var FormulaToken[]
     */
    private $tokens = [];
    /**
     * Create a new FormulaParser.
     *
     * @param string $pFormula Formula to parse
     *
     * @throws Exception
     */
    public function __construct($pFormula = '')
    {
    }
    /**
     * Get Formula.
     *
     * @return string
     */
    public function getFormula()
    {
    }
    /**
     * Get Token.
     *
     * @param int $pId Token id
     *
     * @throws Exception
     *
     * @return string
     */
    public function getToken($pId = 0)
    {
    }
    /**
     * Get Token count.
     *
     * @return int
     */
    public function getTokenCount()
    {
    }
    /**
     * Get Tokens.
     *
     * @return FormulaToken[]
     */
    public function getTokens()
    {
    }
    /**
     * Parse to tokens.
     */
    private function parseToTokens()
    {
    }
}