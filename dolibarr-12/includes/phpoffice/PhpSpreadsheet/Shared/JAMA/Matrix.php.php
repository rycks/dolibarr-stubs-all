<?php

namespace PhpOffice\PhpSpreadsheet\Shared\JAMA;

/**
 * Matrix class.
 *
 * @author Paul Meagher
 * @author Michael Bommarito
 * @author Lukasz Karapuda
 * @author Bartek Matosiuk
 *
 * @version 1.8
 *
 * @see https://math.nist.gov/javanumerics/jama/
 */
class Matrix
{
    const POLYMORPHIC_ARGUMENT_EXCEPTION = 'Invalid argument pattern for polymorphic function.';
    const ARGUMENT_TYPE_EXCEPTION = 'Invalid argument type.';
    const ARGUMENT_BOUNDS_EXCEPTION = 'Invalid argument range.';
    const MATRIX_DIMENSION_EXCEPTION = 'Matrix dimensions are not equal.';
    const ARRAY_LENGTH_EXCEPTION = 'Array length must be a multiple of m.';
    const MATRIX_SPD_EXCEPTION = 'Can only perform operation on symmetric positive definite matrix.';
    /**
     * Matrix storage.
     *
     * @var array
     */
    public $A = [];
    /**
     * Matrix row dimension.
     *
     * @var int
     */
    private $m;
    /**
     * Matrix column dimension.
     *
     * @var int
     */
    private $n;
    /**
     * Polymorphic constructor.
     *
     * As PHP has no support for polymorphic constructors, we use tricks to make our own sort of polymorphism using func_num_args, func_get_arg, and gettype. In essence, we're just implementing a simple RTTI filter and calling the appropriate constructor.
     */
    public function __construct(...$args)
    {
    }
    /**
     * getArray.
     *
     * @return array Matrix array
     */
    public function getArray()
    {
    }
    /**
     * getRowDimension.
     *
     * @return int Row dimension
     */
    public function getRowDimension()
    {
    }
    /**
     * getColumnDimension.
     *
     * @return int Column dimension
     */
    public function getColumnDimension()
    {
    }
    /**
     * get.
     *
     * Get the i,j-th element of the matrix.
     *
     * @param int $i Row position
     * @param int $j Column position
     *
     * @return mixed Element (int/float/double)
     */
    public function get($i = null, $j = null)
    {
    }
    /**
     * getMatrix.
     *
     *    Get a submatrix
     *
     * @param int $i0 Initial row index
     * @param int $iF Final row index
     * @param int $j0 Initial column index
     * @param int $jF Final column index
     *
     * @return Matrix Submatrix
     */
    public function getMatrix(...$args)
    {
    }
    /**
     * checkMatrixDimensions.
     *
     *    Is matrix B the same size?
     *
     * @param Matrix $B Matrix B
     *
     * @return bool
     */
    public function checkMatrixDimensions($B = null)
    {
    }
    //    function checkMatrixDimensions()
    /**
     * set.
     *
     * Set the i,j-th element of the matrix.
     *
     * @param int $i Row position
     * @param int $j Column position
     * @param mixed $c Int/float/double value
     *
     * @return mixed Element (int/float/double)
     */
    public function set($i = null, $j = null, $c = null)
    {
    }
    //    function set()
    /**
     * identity.
     *
     * Generate an identity matrix.
     *
     * @param int $m Row dimension
     * @param int $n Column dimension
     *
     * @return Matrix Identity matrix
     */
    public function identity($m = null, $n = null)
    {
    }
    /**
     * diagonal.
     *
     *    Generate a diagonal matrix
     *
     * @param int $m Row dimension
     * @param int $n Column dimension
     * @param mixed $c Diagonal value
     *
     * @return Matrix Diagonal matrix
     */
    public function diagonal($m = null, $n = null, $c = 1)
    {
    }
    /**
     * getMatrixByRow.
     *
     *    Get a submatrix by row index/range
     *
     * @param int $i0 Initial row index
     * @param int $iF Final row index
     *
     * @return Matrix Submatrix
     */
    public function getMatrixByRow($i0 = null, $iF = null)
    {
    }
    /**
     * getMatrixByCol.
     *
     *    Get a submatrix by column index/range
     *
     * @param int $j0 Initial column index
     * @param int $jF Final column index
     *
     * @return Matrix Submatrix
     */
    public function getMatrixByCol($j0 = null, $jF = null)
    {
    }
    /**
     * transpose.
     *
     *    Tranpose matrix
     *
     * @return Matrix Transposed matrix
     */
    public function transpose()
    {
    }
    //    function transpose()
    /**
     * trace.
     *
     *    Sum of diagonal elements
     *
     * @return float Sum of diagonal elements
     */
    public function trace()
    {
    }
    /**
     * uminus.
     *
     *    Unary minus matrix -A
     *
     * @return Matrix Unary minus matrix
     */
    public function uminus()
    {
    }
    /**
     * plus.
     *
     *    A + B
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Sum
     */
    public function plus(...$args)
    {
    }
    /**
     * plusEquals.
     *
     *    A = A + B
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Sum
     */
    public function plusEquals(...$args)
    {
    }
    /**
     * minus.
     *
     *    A - B
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Sum
     */
    public function minus(...$args)
    {
    }
    /**
     * minusEquals.
     *
     *    A = A - B
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Sum
     */
    public function minusEquals(...$args)
    {
    }
    /**
     * arrayTimes.
     *
     *    Element-by-element multiplication
     *    Cij = Aij * Bij
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Matrix Cij
     */
    public function arrayTimes(...$args)
    {
    }
    /**
     * arrayTimesEquals.
     *
     *    Element-by-element multiplication
     *    Aij = Aij * Bij
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Matrix Aij
     */
    public function arrayTimesEquals(...$args)
    {
    }
    /**
     * arrayRightDivide.
     *
     *    Element-by-element right division
     *    A / B
     *
     * @param Matrix $B Matrix B
     *
     * @return Matrix Division result
     */
    public function arrayRightDivide(...$args)
    {
    }
    /**
     * arrayRightDivideEquals.
     *
     *    Element-by-element right division
     *    Aij = Aij / Bij
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Matrix Aij
     */
    public function arrayRightDivideEquals(...$args)
    {
    }
    /**
     * arrayLeftDivide.
     *
     *    Element-by-element Left division
     *    A / B
     *
     * @param Matrix $B Matrix B
     *
     * @return Matrix Division result
     */
    public function arrayLeftDivide(...$args)
    {
    }
    /**
     * arrayLeftDivideEquals.
     *
     *    Element-by-element Left division
     *    Aij = Aij / Bij
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Matrix Aij
     */
    public function arrayLeftDivideEquals(...$args)
    {
    }
    /**
     * times.
     *
     *    Matrix multiplication
     *
     * @param mixed $n Matrix/Array/Scalar
     *
     * @return Matrix Product
     */
    public function times(...$args)
    {
    }
    /**
     * power.
     *
     *    A = A ^ B
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Sum
     */
    public function power(...$args)
    {
    }
    /**
     * concat.
     *
     *    A = A & B
     *
     * @param mixed $B Matrix/Array
     *
     * @return Matrix Sum
     */
    public function concat(...$args)
    {
    }
    /**
     * Solve A*X = B.
     *
     * @param Matrix $B Right hand side
     *
     * @return Matrix ... Solution if A is square, least squares solution otherwise
     */
    public function solve($B)
    {
    }
    /**
     * Matrix inverse or pseudoinverse.
     *
     * @return Matrix ... Inverse(A) if A is square, pseudoinverse otherwise.
     */
    public function inverse()
    {
    }
    /**
     * det.
     *
     *    Calculate determinant
     *
     * @return float Determinant
     */
    public function det()
    {
    }
}