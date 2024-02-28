<?php

/**
 *	@package JAMA
 *
 *	For an m-by-n matrix A with m >= n, the singular value decomposition is
 *	an m-by-n orthogonal matrix U, an n-by-n diagonal matrix S, and
 *	an n-by-n orthogonal matrix V so that A = U*S*V'.
 *
 *	The singular values, sigma[$k] = S[$k][$k], are ordered so that
 *	sigma[0] >= sigma[1] >= ... >= sigma[n-1].
 *
 *	The singular value decompostion always exists, so the constructor will
 *	never fail.  The matrix condition number and the effective numerical
 *	rank can be computed from this decomposition.
 *
 *	@author  Paul Meagher
 *	@license PHP v3.0
 *	@version 1.1
 */
class SingularValueDecomposition
{
    /**
     *	Internal storage of U.
     *	@var array
     */
    private $U = array();
    /**
     *	Internal storage of V.
     *	@var array
     */
    private $V = array();
    /**
     *	Internal storage of singular values.
     *	@var array
     */
    private $s = array();
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
     *	Construct the singular value decomposition
     *
     *	Derived from LINPACK code.
     *
     *	@param $A Rectangular matrix
     *	@return Structure to access U, S and V.
     */
    public function __construct($Arg)
    {
    }
    // end constructor
    /**
     *	Return the left singular vectors
     *
     *	@access public
     *	@return U
     */
    public function getU()
    {
    }
    /**
     *	Return the right singular vectors
     *
     *	@access public
     *	@return V
     */
    public function getV()
    {
    }
    /**
     *	Return the one-dimensional array of singular values
     *
     *	@access public
     *	@return diagonal of S.
     */
    public function getSingularValues()
    {
    }
    /**
     *	Return the diagonal matrix of singular values
     *
     *	@access public
     *	@return S
     */
    public function getS()
    {
    }
    /**
     *	Two norm
     *
     *	@access public
     *	@return max(S)
     */
    public function norm2()
    {
    }
    /**
     *	Two norm condition number
     *
     *	@access public
     *	@return max(S)/min(S)
     */
    public function cond()
    {
    }
    /**
     *	Effective numerical matrix rank
     *
     *	@access public
     *	@return Number of nonnegligible singular values.
     */
    public function rank()
    {
    }
}