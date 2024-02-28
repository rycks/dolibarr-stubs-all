<?php

/**
 *	@package JAMA
 *
 *	For an m-by-n matrix A with m >= n, the LU decomposition is an m-by-n
 *	unit lower triangular matrix L, an n-by-n upper triangular matrix U,
 *	and a permutation vector piv of length m so that A(piv,:) = L*U.
 *	If m < n, then L is m-by-m and U is m-by-n.
 *
 *	The LU decompostion with pivoting always exists, even if the matrix is
 *	singular, so the constructor will never fail. The primary use of the
 *	LU decomposition is in the solution of square systems of simultaneous
 *	linear equations. This will fail if isNonsingular() returns false.
 *
 *	@author Paul Meagher
 *	@author Bartosz Matosiuk
 *	@author Michael Bommarito
 *	@version 1.1
 *	@license PHP v3.0
 */
class PHPExcel_Shared_JAMA_LUDecomposition
{
    const MatrixSingularException = "Can only perform operation on singular matrix.";
    const MatrixSquareException = "Mismatched Row dimension";
    /**
     *	Decomposition storage
     *	@var array
     */
    private $LU = array();
    /**
     *	Row dimension.
     *	@var int
     */
    private $m;
    /**
     *	Column dimension.
     *	@var int
     */
    private $n;
    /**
     *	Pivot sign.
     *	@var int
     */
    private $pivsign;
    /**
     *	Internal storage of pivot vector.
     *	@var array
     */
    private $piv = array();
    /**
     *	LU Decomposition constructor.
     *
     *	@param $A Rectangular matrix
     *	@return Structure to access L, U and piv.
     */
    public function __construct($A)
    {
    }
    //	function __construct()
    /**
     *	Get lower triangular factor.
     *
     *	@return array Lower triangular factor
     */
    public function getL()
    {
    }
    //	function getL()
    /**
     *	Get upper triangular factor.
     *
     *	@return array Upper triangular factor
     */
    public function getU()
    {
    }
    //	function getU()
    /**
     *	Return pivot permutation vector.
     *
     *	@return array Pivot vector
     */
    public function getPivot()
    {
    }
    //	function getPivot()
    /**
     *	Alias for getPivot
     *
     *	@see getPivot
     */
    public function getDoublePivot()
    {
    }
    //	function getDoublePivot()
    /**
     *	Is the matrix nonsingular?
     *
     *	@return true if U, and hence A, is nonsingular.
     */
    public function isNonsingular()
    {
    }
    //	function isNonsingular()
    /**
     *	Count determinants
     *
     *	@return array d matrix deterninat
     */
    public function det()
    {
    }
    //	function det()
    /**
     *	Solve A*X = B
     *
     *	@param  $B  A Matrix with as many rows as A and any number of columns.
     *	@return  X so that L*U*X = B(piv,:)
     *	@PHPExcel_Calculation_Exception  IllegalArgumentException Matrix row dimensions must agree.
     *	@PHPExcel_Calculation_Exception  RuntimeException  Matrix is singular.
     */
    public function solve($B)
    {
    }
    //	function solve()
}