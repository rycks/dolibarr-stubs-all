<?php

/**
 *	@package JAMA
 *
 *	Error handling
 *	@author Michael Bommarito
 *	@version 01292005
 */
//Language constant
\define('JAMALANG', 'EN');
/*
I've used Babelfish and a little poor knowledge of Romance/Germanic languages for the translations here.
Feel free to correct anything that looks amiss to you.
*/
\define('PolymorphicArgumentException', -1);
\define('ArgumentTypeException', -2);
\define('ArgumentBoundsException', -3);
\define('MatrixDimensionException', -4);
\define('PrecisionLossException', -5);
\define('MatrixSPDException', -6);
\define('MatrixSingularException', -7);
\define('MatrixRankException', -8);
\define('ArrayLengthException', -9);
\define('RowLengthException', -10);
/**
 *	Custom error handler
 *	@param int $num Error number
 */
function JAMAError($errorNumber = \null)
{
}