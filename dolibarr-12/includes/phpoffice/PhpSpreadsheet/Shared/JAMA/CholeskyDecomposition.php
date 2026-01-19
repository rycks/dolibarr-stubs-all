<?php

namespace PhpOffice\PhpSpreadsheet\Shared\JAMA;

/**
 *    Cholesky decomposition class.
 *
 *    For a symmetric, positive definite matrix A, the Cholesky decomposition
 *    is an lower triangular matrix L so that A = L*L'.
 *
 *    If the matrix is not symmetric or positive definite, the constructor
 *    returns a partial decomposition and sets an internal flag that may
 *    be queried by the isSPD() method.
 *
 *    @author Paul Meagher
 *    @author Michael Bommarito
 *
 *    @version 1.2
 */
class CholeskyDecomposition
{
    /**
     * Decomposition storage.
     *
     * @var array
     */
    private $L = [];
    /**
     * Matrix row and column dimension.
     *
     * @var int
     */
    private $m;
    /**
     * Symmetric positive definite flag.
     *
     * @var bool
     */
    private $isspd = true;
    /**
     * CholeskyDecomposition.
     *
     *    Class constructor - decomposes symmetric positive definite matrix
     *
     * @param Matrix $A Matrix square symmetric positive definite matrix
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Shared\JAMA\Matrix $A)
    {
    }
    /**
     *    Is the matrix symmetric and positive definite?
     *
     * @return bool
     */
    public function isSPD()
    {
    }
    /**
     * getL.
     *
     * Return triangular factor.
     *
     * @return Matrix Lower triangular matrix
     */
    public function getL()
    {
    }
    /**
     * Solve A*X = B.
     *
     * @param $B Row-equal matrix
     *
     * @return Matrix L * L' * X = B
     */
    public function solve(\PhpOffice\PhpSpreadsheet\Shared\JAMA\Matrix $B)
    {
    }
}