<?php

/**
 * Function to build a compiled PDF
 *
 * @param	DoliDB		$db						Database handler
 * @param	Translate	$langs					Object langs
 * @param	Conf		$conf					Object conf
 * @param	string		$diroutputpdf			Dir to output file
 * @param	string		$newlangid				Lang id
 * @param 	string[]	$filter					Array with filters
 * @param 	integer		$dateafterdate			Invoice after date
 * @param 	integer 	$datebeforedate			Invoice before date
 * @param 	integer		$paymentdateafter		Payment after date (must includes hour)
 * @param 	integer		$paymentdatebefore		Payment before date (must includes hour)
 * @param	int			$usestdout				Add information onto standard output
 * @param	string		$regenerate				''=Use existing PDF files, 'nameofpdf'=Regenerate all PDF files using the template
 * @param	string		$filesuffix				Suffix to add into file name of generated PDF
 * @param	string		$paymentbankid			Only if payment on this bank account id
 * @param	int[]		$thirdpartiesid			List of thirdparties id when using filter=excludethirdpartiesid	or filter=onlythirdpartiesid
 * @param	string		$fileprefix				Prefix to add into filename of generated PDF
 * @param	int			$donotmerge				0=Default, 1=Disable the merge so do only the regeneration of PDFs.
 * @param	string		$mode					'invoice' for invoices, 'proposal' for proposal, ...
 * @return	int									Error code
 */
function rebuild_merge_pdf($db, $langs, $conf, $diroutputpdf, $newlangid, $filter, $dateafterdate, $datebeforedate, $paymentdateafter, $paymentdatebefore, $usestdout, $regenerate = '', $filesuffix = '', $paymentbankid = '', $thirdpartiesid = [], $fileprefix = 'mergedpdf', $donotmerge = 0, $mode = 'invoice')
{
}