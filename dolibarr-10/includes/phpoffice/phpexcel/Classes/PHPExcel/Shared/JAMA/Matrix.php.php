<?php

/*
 *	Matrix class
 *
 *	@author Paul Meagher
 *	@author Michael Bommarito
 *	@author Lukasz Karapuda
 *	@author Bartek Matosiuk
 *	@version 1.8
 *	@license PHP v3.0
 *	@see http://math.nist.gov/javanumerics/jama/
 */
class PHPExcel_Shared_JAMA_Matrix
{
    const PolymorphicArgumentException = "Invalid argument pattern for polymorphic function.";
    const ArgumentTypeException = "Invalid argument type.";
    const ArgumentBoundsException = "Invalid argument range.";
    const MatrixDimensionException = "Matrix dimensions are not equal.";
    const ArrayLengthException = "Array length must be a multiple of m.";
    /**
     *	Matrix storage
     *
     *	@var array
     *	@access public
     */
    public $A = array();
    /**
     *	Matrix row dimension
     *
     *	@var int
     *	@access private
     */
    private $m;
    /**
     *	Matrix column dimension
     *
     *	@var int
     *	@access private
     */
    private $n;
    /**
     *	Polymorphic constructor
     *
     *	As PHP has no support for polymorphic constructors, we hack our own sort of polymorphism using func_num_args, func_get_arg, and gettype. In essence, we're just implementing a simple RTTI filter and calling the appropriate constructor.
     */
    public function __construct()
    {
    }
    //	function __construct()
    /**
     *	getArray
     *
     *	@return array Matrix array
     */
    public function getArray()
    {
    }
    //	function getArray()
    /**
     *	getRowDimension
     *
     *	@return int Row dimension
     */
    public function getRowDimension()
    {
    }
    //	function getRowDimension()
    /**
     *	getColumnDimension
     *
     *	@return int Column dimension
     */
    public function getColumnDimension()
    {
    }
    //	function getColumnDimension()
    /**
     *	get
     *
     *	Get the i,j-th element of the matrix.
     *	@param int $i Row position
     *	@param int $j Column position
     *	@return mixed Element (int/float/double)
     */
    public function get($i = \null, $j = \null)
    {
    }
    //	function get()
    /**
     *	getMatrix
     *
     *	Get a submatrix
     *	@param int $i0 Initial row index
     *	@param int $iF Final row index
     *	@param int $j0 Initial column index
     *	@param int $jF Final column index
     *	@return Matrix Submatrix
     */
    public function getMatrix()
    {
    }
    //	function getMatrix()
    /**
     *	checkMatrixDimensions
     *
     *	Is matrix B the same size?
     *	@param Matrix $B Matrix B
     *	@return boolean
     */
    public function checkMatrixDimensions($B = \null)
    {
    }
    //	function checkMatrixDimensions()
    /**
     *	set
     *
     *	Set the i,j-th element of the matrix.
     *	@param int $i Row position
     *	@param int $j Column position
     *	@param mixed $c Int/float/double value
     *	@return mixed Element (int/float/double)
     */
    public function set($i = \null, $j = \null, $c = \null)
    {
    }
    //	function set()
    /**
     *	identity
     *
     *	Generate an identity matrix.
     *	@param int $m Row dimension
     *	@param int $n Column dimension
     *	@return Matrix Identity matrix
     */
    public function identity($m = \null, $n = \null)
    {
    }
    //	function identity()
    /**
     *	diagonal
     *
     *	Generate a diagonal matrix
     *	@param int $m Row dimension
     *	@param int $n Column dimension
     *	@param mixed $c Diagonal value
     *	@return Matrix Diagonal matrix
     */
    public function diagonal($m = \null, $n = \null, $c = 1)
    {
    }
    //	function diagonal()
    /**
     *	getMatrixByRow
     *
     *	Get a submatrix by row index/range
     *	@param int $i0 Initial row index
     *	@param int $iF Final row index
     *	@return Matrix Submatrix
     */
    public function getMatrixByRow($i0 = \null, $iF = \null)
    {
    }
    //	function getMatrixByRow()
    /**
     *	getMatrixByCol
     *
     *	Get a submatrix by column index/range
     *	@param int $i0 Initial column index
     *	@param int $iF Final column index
     *	@return Matrix Submatrix
     */
    public function getMatrixByCol($j0 = \null, $jF = \null)
    {
    }
    //	function getMatrixByCol()
    /**
     *	transpose
     *
     *	Tranpose matrix
     *	@return Matrix Transposed matrix
     */
    public function transpose()
    {
    }
    //	function transpose()
    /**
     *	trace
     *
     *	Sum of diagonal elements
     *	@return float Sum of diagonal elements
     */
    public function trace()
    {
    }
    //	function trace()
    /**
     *	uminus
     *
     *	Unary minus matrix -A
     *	@return Matrix Unary minus matrix
     */
    public function uminus()
    {
    }
    //	function uminus()
    /**
     *	plus
     *
     *	A + B
     *	@param mixed $B Matrix/Array
     *	@return Matrix Sum
     */
    public function plus()
    {
    }
    //	function plus()
    /**
     *	plusEquals
     *
     *	A = A + B
     *	@param mixed $B Matrix/Array
     *	@return Matrix Sum
     */
    public function plusEquals()
    {
    }
    //	function plusEquals()
    /**
     *	minus
     *
     *	A - B
     *	@param mixed $B Matrix/Array
     *	@return Matrix Sum
     */
    public function minus()
    {
    }
    //	function minus()
    /**
     *	minusEquals
     *
     *	A = A - B
     *	@param mixed $B Matrix/Array
     *	@return Matrix Sum
     */
    public function minusEquals()
    {
    }
    //	function minusEquals()
    /**
     *	arrayTimes
     *
     *	Element-by-element multiplication
     *	Cij = Aij * Bij
     *	@param mixed $B Matrix/Array
     *	@return Matrix Matrix Cij
     */
    public function arrayTimes()
    {
    }
    //	function arrayTimes()
    /**
     *	arrayTimesEquals
     *
     *	Element-by-element multiplication
     *	Aij = Aij * Bij
     *	@param mixed $B Matrix/Array
     *	@return Matrix Matrix Aij
     */
    public function arrayTimesEquals()
    {
    }
    //	function arrayTimesEquals()
    /**
     *	arrayRightDivide
     *
     *	Element-by-element right division
     *	A / B
     *	@param Matrix $B Matrix B
     *	@return Matrix Division result
     */
    public function arrayRightDivide()
    {
    }
    //	function arrayRightDivide()
    /**
     *	arrayRightDivideEquals
     *
     *	Element-by-element right division
     *	Aij = Aij / Bij
     *	@param mixed $B Matrix/Array
     *	@return Matrix Matrix Aij
     */
    public function arrayRightDivideEquals()
    {
    }
    //	function arrayRightDivideEquals()
    /**
     *	arrayLeftDivide
     *
     *	Element-by-element Left division
     *	A / B
     *	@param Matrix $B Matrix B
     *	@return Matrix Division result
     */
    public function arrayLeftDivide()
    {
    }
    //	function arrayLeftDivide()
    /**
     *	arrayLeftDivideEquals
     *
     *	Element-by-element Left division
     *	Aij = Aij / Bij
     *	@param mixed $B Matrix/Array
     *	@return Matrix Matrix Aij
     */
    public function arrayLeftDivideEquals()
    {
    }
    //	function arrayLeftDivideEquals()
    /**
     *	times
     *
     *	Matrix multiplication
     *	@param mixed $n Matrix/Array/Scalar
     *	@return Matrix Product
     */
    public function times()
    {
    }
    //	function times()
    /**
     *	power
     *
     *	A = A ^ B
     *	@param mixed $B Matrix/Array
     *	@return Matrix Sum
     */
    public function power()
    {
    }
    //	function power()
    /**
     *	concat
     *
     *	A = A & B
     *	@param mixed $B Matrix/Array
     *	@return Matrix Sum
     */
    public function concat()
    {
    }
    //	function concat()
    /**
     *	Solve A*X = B.
     *
     *	@param Matrix $B Right hand side
     *	@return Matrix ... Solution if A is square, least squares solution otherwise
     */
    public function solve($B)
    {
    }
    //	function solve()
    /**
     *	Matrix inverse or pseudoinverse.
     *
     *	@return Matrix ... Inverse(A) if A is square, pseudoinverse otherwise.
     */
    public function inverse()
    {
    }
    //	function inverse()
    /**
     *	det
     *
     *	Calculate determinant
     *	@return float Determinant
     */
    public function det()
    {
    }
    //	function det()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../../');