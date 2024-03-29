<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

class Logical
{
    /**
     * TRUE.
     *
     * Returns the boolean TRUE.
     *
     * Excel Function:
     *        =TRUE()
     *
     * @category Logical Functions
     *
     * @return bool True
     */
    public static function true()
    {
    }
    /**
     * FALSE.
     *
     * Returns the boolean FALSE.
     *
     * Excel Function:
     *        =FALSE()
     *
     * @category Logical Functions
     *
     * @return bool False
     */
    public static function false()
    {
    }
    private static function countTrueValues(array $args)
    {
    }
    /**
     * LOGICAL_AND.
     *
     * Returns boolean TRUE if all its arguments are TRUE; returns FALSE if one or more argument is FALSE.
     *
     * Excel Function:
     *        =AND(logical1[,logical2[, ...]])
     *
     *        The arguments must evaluate to logical values such as TRUE or FALSE, or the arguments must be arrays
     *            or references that contain logical values.
     *
     *        Boolean arguments are treated as True or False as appropriate
     *        Integer or floating point arguments are treated as True, except for 0 or 0.0 which are False
     *        If any argument value is a string, or a Null, the function returns a #VALUE! error, unless the string holds
     *            the value TRUE or FALSE, in which case it is evaluated as the corresponding boolean value
     *
     * @category Logical Functions
     *
     * @param mixed ...$args Data values
     *
     * @return bool|string the logical AND of the arguments
     */
    public static function logicalAnd(...$args)
    {
    }
    /**
     * LOGICAL_OR.
     *
     * Returns boolean TRUE if any argument is TRUE; returns FALSE if all arguments are FALSE.
     *
     * Excel Function:
     *        =OR(logical1[,logical2[, ...]])
     *
     *        The arguments must evaluate to logical values such as TRUE or FALSE, or the arguments must be arrays
     *            or references that contain logical values.
     *
     *        Boolean arguments are treated as True or False as appropriate
     *        Integer or floating point arguments are treated as True, except for 0 or 0.0 which are False
     *        If any argument value is a string, or a Null, the function returns a #VALUE! error, unless the string holds
     *            the value TRUE or FALSE, in which case it is evaluated as the corresponding boolean value
     *
     * @category Logical Functions
     *
     * @param mixed $args Data values
     *
     * @return bool|string the logical OR of the arguments
     */
    public static function logicalOr(...$args)
    {
    }
    /**
     * LOGICAL_XOR.
     *
     * Returns the Exclusive Or logical operation for one or more supplied conditions.
     * i.e. the Xor function returns TRUE if an odd number of the supplied conditions evaluate to TRUE, and FALSE otherwise.
     *
     * Excel Function:
     *        =XOR(logical1[,logical2[, ...]])
     *
     *        The arguments must evaluate to logical values such as TRUE or FALSE, or the arguments must be arrays
     *            or references that contain logical values.
     *
     *        Boolean arguments are treated as True or False as appropriate
     *        Integer or floating point arguments are treated as True, except for 0 or 0.0 which are False
     *        If any argument value is a string, or a Null, the function returns a #VALUE! error, unless the string holds
     *            the value TRUE or FALSE, in which case it is evaluated as the corresponding boolean value
     *
     * @category Logical Functions
     *
     * @param mixed $args Data values
     *
     * @return bool|string the logical XOR of the arguments
     */
    public static function logicalXor(...$args)
    {
    }
    /**
     * NOT.
     *
     * Returns the boolean inverse of the argument.
     *
     * Excel Function:
     *        =NOT(logical)
     *
     *        The argument must evaluate to a logical value such as TRUE or FALSE
     *
     *        Boolean arguments are treated as True or False as appropriate
     *        Integer or floating point arguments are treated as True, except for 0 or 0.0 which are False
     *        If any argument value is a string, or a Null, the function returns a #VALUE! error, unless the string holds
     *            the value TRUE or FALSE, in which case it is evaluated as the corresponding boolean value
     *
     * @category Logical Functions
     *
     * @param mixed $logical A value or expression that can be evaluated to TRUE or FALSE
     *
     * @return bool|string the boolean inverse of the argument
     */
    public static function NOT($logical = false)
    {
    }
    /**
     * STATEMENT_IF.
     *
     * Returns one value if a condition you specify evaluates to TRUE and another value if it evaluates to FALSE.
     *
     * Excel Function:
     *        =IF(condition[,returnIfTrue[,returnIfFalse]])
     *
     *        Condition is any value or expression that can be evaluated to TRUE or FALSE.
     *            For example, A10=100 is a logical expression; if the value in cell A10 is equal to 100,
     *            the expression evaluates to TRUE. Otherwise, the expression evaluates to FALSE.
     *            This argument can use any comparison calculation operator.
     *        ReturnIfTrue is the value that is returned if condition evaluates to TRUE.
     *            For example, if this argument is the text string "Within budget" and the condition argument evaluates to TRUE,
     *            then the IF function returns the text "Within budget"
     *            If condition is TRUE and ReturnIfTrue is blank, this argument returns 0 (zero). To display the word TRUE, use
     *            the logical value TRUE for this argument.
     *            ReturnIfTrue can be another formula.
     *        ReturnIfFalse is the value that is returned if condition evaluates to FALSE.
     *            For example, if this argument is the text string "Over budget" and the condition argument evaluates to FALSE,
     *            then the IF function returns the text "Over budget".
     *            If condition is FALSE and ReturnIfFalse is omitted, then the logical value FALSE is returned.
     *            If condition is FALSE and ReturnIfFalse is blank, then the value 0 (zero) is returned.
     *            ReturnIfFalse can be another formula.
     *
     * @category Logical Functions
     *
     * @param mixed $condition Condition to evaluate
     * @param mixed $returnIfTrue Value to return when condition is true
     * @param mixed $returnIfFalse Optional value to return when condition is false
     *
     * @return mixed The value of returnIfTrue or returnIfFalse determined by condition
     */
    public static function statementIf($condition = true, $returnIfTrue = 0, $returnIfFalse = false)
    {
    }
    /**
     * IFERROR.
     *
     * Excel Function:
     *        =IFERROR(testValue,errorpart)
     *
     * @category Logical Functions
     *
     * @param mixed $testValue Value to check, is also the value returned when no error
     * @param mixed $errorpart Value to return when testValue is an error condition
     *
     * @return mixed The value of errorpart or testValue determined by error condition
     */
    public static function IFERROR($testValue = '', $errorpart = '')
    {
    }
}