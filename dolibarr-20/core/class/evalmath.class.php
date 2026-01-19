<?php

/*
 * ================================================================================
 *
 * EvalMath - PHP Class to safely evaluate math expressions
 * Copyright (C) 2005 Miles Kaufmann <http://www.twmagic.com/>
 *
 * ================================================================================
 *
 * NAME
 * EvalMath - safely evaluate math expressions
 *
 * SYNOPSIS
 * include('evalmath.class.php');
 * $m = new EvalMath;
 * // basic evaluation:
 * $result = $m->evaluate('2+2');
 * // supports: order of operation; parentheses; negation; built-in functions
 * $result = $m->evaluate('-8(5/2)^2*(1-sqrt(4))-8');
 * // create your own variables
 * $m->evaluate('a = e^(ln(pi))');
 * // or functions
 * $m->evaluate('f(x,y) = x^2 + y^2 - 2x*y + 1');
 * // and then use them
 * $result = $m->evaluate('3*f(42,a)');
 *
 * DESCRIPTION
 * Use the EvalMath class when you want to evaluate mathematical expressions
 * from untrusted sources. You can define your own variables and functions,
 * which are stored in the object. Try it, it's fun!
 *
 * METHODS
 * $m->evaluate($expr)
 * Evaluates the expression and returns the result. If an error occurs,
 * prints a warning and returns false. If $expr is a function assignment,
 * returns true on success.
 *
 * $m->e($expr)
 * A synonym for $m->evaluate().
 *
 * $m->vars()
 * Returns an associative array of all user-defined variables and values.
 *
 * $m->funcs()
 * Returns an array of all user-defined functions.
 *
 * PARAMETERS
 * $m->suppress_errors
 * Set to true to turn off warnings when evaluating expressions
 *
 * $m->last_error
 * If the last evaluation failed, contains a string describing the error.
 * (Useful when suppress_errors is on).
 *
 * $m->last_error_code
 * If the last evaluation failed, 2 element array with numeric code and extra info
 *
 * AUTHOR INFORMATION
 * Copyright 2005, Miles Kaufmann.
 *
 * LICENSE
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are
 * met:
 *
 * 1 Redistributions of source code must retain the above copyright
 * notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 * notice, this list of conditions and the following disclaimer in the
 * documentation and/or other materials provided with the distribution.
 * 3. The name of the author may not be used to endorse or promote
 * products derived from this software without specific prior written
 * permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR
 * IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT,
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
 * STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
/**
 * \file core/class/evalmath.class.php
 * \ingroup core
 * \brief This file for Math evaluation
 */
/**
 * Class EvalMath
 */
class EvalMath
{
    public $suppress_errors = \false;
    public $last_error = \null;
    public $last_error_code = \null;
    public $v = array('e' => 2.71, 'pi' => 3.14159);
    // variables (and constants)
    public $f = array();
    // user-defined functions
    public $vb = array('e', 'pi');
    // constants
    public $fb = array(
        // built-in functions
        'sin',
        'sinh',
        'arcsin',
        'asin',
        'arcsinh',
        'asinh',
        'cos',
        'cosh',
        'arccos',
        'acos',
        'arccosh',
        'acosh',
        'tan',
        'tanh',
        'arctan',
        'atan',
        'arctanh',
        'atanh',
        'sqrt',
        'abs',
        'ln',
        'log',
        'intval',
        'ceil',
    );
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Evaluate
     *
     * @param string $expr 	String
     * @return boolean|int|float|NULL|mixed Result
     */
    public function e($expr)
    {
    }
    /**
     * Evaluate
     *
     * @param string $expr 	String
     * @return boolean|int|float|NULL|mixed Result
     */
    public function evaluate($expr)
    {
    }
    /**
     * Function vars
     *
     * @return array	Output
     */
    public function vars()
    {
    }
    /**
     * Function funcs
     *
     * @return array	Output
     */
    private function funcs()
    {
    }
    // ===================== HERE BE INTERNAL METHODS ====================\\
    /**
     * Convert infix to postfix notation
     *
     * @param 	string 			$expr		Expression
     * @return 	boolean|array 				Output
     */
    private function nfx($expr)
    {
    }
    /**
     * Evaluate postfix notation
     *
     * @param array $tokens      	Expression
     * @param array $vars       	Array
     * @return string|false			Output or false if error
     */
    private function pfx($tokens, $vars = array())
    {
    }
    /**
     * trigger an error, but nicely, if need be
     *
     * @param string $code		   	Code
     * @param string $msg			Msg
     * @param string|null $info		String
     * @return false
     */
    public function trigger($code, $msg, $info = \null)
    {
    }
}
/**
 * Class for internal use
 */
class EvalMathStack
{
    public $stack = array();
    public $count = 0;
    /**
     * push
     *
     * @param 	string 	$val		Val
     * @return 	void
     */
    public function push($val)
    {
    }
    /**
     * pop
     *
     * @return mixed Stack
     */
    public function pop()
    {
    }
    /**
     * last
     *
     * @param 	int 	$n		N
     * @return 	mixed 			Stack
     */
    public function last($n = 1)
    {
    }
}