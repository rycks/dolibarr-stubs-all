<?php

namespace PhpOffice\PhpSpreadsheet\Shared\JAMA;

/**
 *    Class to obtain eigenvalues and eigenvectors of a real matrix.
 *
 *    If A is symmetric, then A = V*D*V' where the eigenvalue matrix D
 *    is diagonal and the eigenvector matrix V is orthogonal (i.e.
 *    A = V.times(D.times(V.transpose())) and V.times(V.transpose())
 *    equals the identity matrix).
 *
 *    If A is not symmetric, then the eigenvalue matrix D is block diagonal
 *    with the real eigenvalues in 1-by-1 blocks and any complex eigenvalues,
 *    lambda + i*mu, in 2-by-2 blocks, [lambda, mu; -mu, lambda].  The
 *    columns of V represent the eigenvectors in the sense that A*V = V*D,
 *    i.e. A.times(V) equals V.times(D).  The matrix V may be badly
 *    conditioned, or even singular, so the validity of the equation
 *    A = V*D*inverse(V) depends upon V.cond().
 *
 *    @author  Paul Meagher
 *
 *    @version 1.1
 */
class EigenvalueDecomposition
{
    /**
     * Row and column dimension (square matrix).
     *
     * @var int
     */
    private $n;
    /**
     * Arrays for internal storage of eigenvalues.
     *
     * @var array
     */
    private $d = [];
    private $e = [];
    /**
     * Array for internal storage of eigenvectors.
     *
     * @var array
     */
    private $V = [];
    /**
     * Array for internal storage of nonsymmetric Hessenberg form.
     *
     * @var array
     */
    private $H = [];
    /**
     * Working storage for nonsymmetric algorithm.
     *
     * @var array
     */
    private $ort;
    /**
     * Used for complex scalar division.
     *
     * @var float
     */
    private $cdivr;
    private $cdivi;
    /**
     * Symmetric Householder reduction to tridiagonal form.
     */
    private function tred2()
    {
    }
    /**
     * Symmetric tridiagonal QL algorithm.
     *
     *    This is derived from the Algol procedures tql2, by
     *    Bowdler, Martin, Reinsch, and Wilkinson, Handbook for
     *    Auto. Comp., Vol.ii-Linear Algebra, and the corresponding
     * Fortran subroutine in EISPACK.
     */
    private function tql2()
    {
    }
    /**
     * Nonsymmetric reduction to Hessenberg form.
     *
     *    This is derived from the Algol procedures orthes and ortran,
     *    by Martin and Wilkinson, Handbook for Auto. Comp.,
     *    Vol.ii-Linear Algebra, and the corresponding
     * Fortran subroutines in EISPACK.
     */
    private function orthes()
    {
    }
    /**
     * Performs complex division.
     *
     * @param mixed $xr
     * @param mixed $xi
     * @param mixed $yr
     * @param mixed $yi
     */
    private function cdiv($xr, $xi, $yr, $yi)
    {
    }
    /**
     * Nonsymmetric reduction from Hessenberg to real Schur form.
     *
     *    Code is derived from the Algol procedure hqr2,
     *    by Martin and Wilkinson, Handbook for Auto. Comp.,
     *    Vol.ii-Linear Algebra, and the corresponding
     * Fortran subroutine in EISPACK.
     */
    private function hqr2()
    {
    }
    // end hqr2
    /**
     * Constructor: Check for symmetry, then construct the eigenvalue decomposition.
     *
     * @param mixed $Arg A Square matrix
     */
    public function __construct($Arg)
    {
    }
    /**
     * Return the eigenvector matrix.
     *
     * @return Matrix V
     */
    public function getV()
    {
    }
    /**
     * Return the real parts of the eigenvalues.
     *
     * @return array real(diag(D))
     */
    public function getRealEigenvalues()
    {
    }
    /**
     * Return the imaginary parts of the eigenvalues.
     *
     * @return array imag(diag(D))
     */
    public function getImagEigenvalues()
    {
    }
    /**
     * Return the block diagonal eigenvalue matrix.
     *
     * @return Matrix D
     */
    public function getD()
    {
    }
}