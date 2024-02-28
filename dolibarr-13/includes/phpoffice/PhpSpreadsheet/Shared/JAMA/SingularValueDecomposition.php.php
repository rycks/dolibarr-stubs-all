<?php

namespace PhpOffice\PhpSpreadsheet\Shared\JAMA;

/**
 *    For an m-by-n matrix A with m >= n, the singular value decomposition is
 *    an m-by-n orthogonal matrix U, an n-by-n diagonal matrix S, and
 *    an n-by-n orthogonal matrix V so that A = U*S*V'.
 *
 *    The singular values, sigma[$k] = S[$k][$k], are ordered so that
 *    sigma[0] >= sigma[1] >= ... >= sigma[n-1].
 *
 *    The singular value decompostion always exists, so the constructor will
 *    never fail.  The matrix condition number and the effective numerical
 *    rank can be computed from this decomposition.
 *
 *    @author  Paul Meagher
 *
 *    @version 1.1
 */
class SingularValueDecomposition
{
    /**
     * Internal storage of U.
     *
     * @var array
     */
    private $U = [];
    /**
     * Internal storage of V.
     *
     * @var array
     */
    private $V = [];
    /**
     * Internal storage of singular values.
     *
     * @var array
     */
    private $s = [];
    /**
     * Row dimension.
     *
     * @var int
     */
    private $m;
    /**
     * Column dimension.
     *
     * @var int
     */
    private $n;
    /**
     * Construct the singular value decomposition.
     *
     * Derived from LINPACK code.
     *
     * @param mixed $Arg Rectangular matrix
     */
    public function __construct($Arg)
    {
    }
    /**
     * Return the left singular vectors.
     *
     * @return Matrix U
     */
    public function getU()
    {
    }
    /**
     * Return the right singular vectors.
     *
     * @return Matrix V
     */
    public function getV()
    {
    }
    /**
     * Return the one-dimensional array of singular values.
     *
     * @return array diagonal of S
     */
    public function getSingularValues()
    {
    }
    /**
     * Return the diagonal matrix of singular values.
     *
     * @return Matrix S
     */
    public function getS()
    {
    }
    /**
     * Two norm.
     *
     * @return float max(S)
     */
    public function norm2()
    {
    }
    /**
     * Two norm condition number.
     *
     * @return float max(S)/min(S)
     */
    public function cond()
    {
    }
    /**
     * Effective numerical matrix rank.
     *
     * @return int Number of nonnegligible singular values
     */
    public function rank()
    {
    }
}