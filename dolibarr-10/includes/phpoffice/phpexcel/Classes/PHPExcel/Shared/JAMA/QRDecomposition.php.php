<?php

/**
 *	@package JAMA
 *
 *	For an m-by-n matrix A with m >= n, the QR decomposition is an m-by-n
 *	orthogonal matrix Q and an n-by-n upper triangular matrix R so that
 *	A = Q*R.
 *
 *	The QR decompostion always exists, even if the matrix does not have
 *	full rank, so the constructor will never fail.  The primary use of the
 *	QR decomposition is in the least squares solution of nonsquare systems
 *	of simultaneous linear equations.  This will fail if isFullRank()
 *	returns false.
 *
 *	@author  Paul Meagher
 *	@license PHP v3.0
 *	@version 1.1
 */
class PHPExcel_Shared_JAMA_QRDecomposition
{
    const MatrixRankException = "Can only perform operation on full-rank matrix.";
    /**
     *	Array for internal storage of decomposition.
     *	@var array
     */
    private $QR = array();
    /**
     *	Row dimension.
     *	@var integer
     */
    private $m;
    /**
     *	Column dimension.
     *	@var integer
     */
    private $n;
    /**
     *	Array for internal storage of diagonal of R.
     *	@var  array
     */
    private $Rdiag = array();
    /**
     *	QR Decomposition computed by Householder reflections.
     *
     *	@param matrix $A Rectangular matrix
     *	@return Structure to access R and the Householder vectors and compute Q.
     */
    public function __construct($A)
    {
    }
    //	function __construct()
    /**
     *	Is the matrix full rank?
     *
     *	@return boolean true if R, and hence A, has full rank, else false.
     */
    public function isFullRank()
    {
    }
    //	function isFullRank()
    /**
     *	Return the Householder vectors
     *
     *	@return Matrix Lower trapezoidal matrix whose columns define the reflections
     */
    public function getH()
    {
    }
    //	function getH()
    /**
     *	Return the upper triangular factor
     *
     *	@return Matrix upper triangular factor
     */
    public function getR()
    {
    }
    //	function getR()
    /**
     *	Generate and return the (economy-sized) orthogonal factor
     *
     *	@return Matrix orthogonal factor
     */
    public function getQ()
    {
    }
    //	function getQ()
    /**
     *	Least squares solution of A*X = B
     *
     *	@param Matrix $B A Matrix with as many rows as A and any number of columns.
     *	@return Matrix Matrix that minimizes the two norm of Q*R*X-B.
     */
    public function solve($B)
    {
    }
    //	function solve()
}