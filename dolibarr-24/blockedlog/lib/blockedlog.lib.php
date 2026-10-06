<?php

/**
 *  Define head array for tabs of blockedlog tools setup pages
 *
 *  @return	string		Version
 */
function getBlockedLogVersionToShow()
{
}
/**
 *  Define head array for tabs of blockedlog tools setup pages
 *
 *  @param	int		$withtabsetup					Add also the tab "Setup"
 *  @return	array<array{0:string,1:string,2:string}>	Array of head
 */
function blockedlogadmin_prepare_head($withtabsetup)
{
}
/**
 * Return if the KYC mandatory parameters are set
 * Must be the same fields than the one defined as mandatory into the registration form.
 *
 * @return boolean		True or false
 */
function isRegistrationDataSaved()
{
}
/**
 * Return if the KYC mandatory parameters are set AND pushed/registered centralized server
 *
 * @return boolean		True or false
 */
function isRegistrationDataSavedAndPushed()
{
}
/**
 * Return a hash unique identifier of the registration (used to identify the registration of instance without disclosing personal data)
 *
 * @param	string	$algo		Algorithm to use for hash key
 * @return 	string				Hash unique ID
 */
function getHashUniqueIdOfRegistration($algo = 'sha256')
{
}
/**
 * Return if the version is a candidate version to get the LNE certification and if the prerequisites are OK in production to be switched to LNE certified mode.
 * The difference with isALNERunningVersion() is that isALNEQualifiedVersion() just checks if it has a sense or not to activate
 * the restrictions (it is not a check to say if we are or not in a mode with restrictions activated, but if we are in a context that has a sense to activate them).
 * It can be used to show warnings or alerts to end users.
 *
 * @param   int<0,1>	$ignoredev			Set this to 1 to ignore the fact the version is an alpha or beta version (to avoid return false on such version)
 * @param   int<0,1>	$ignoremodule		Set this to 1 to not take into account if module BlockedLog is on, so function can be used during module activation.
 * @return 	string							'' if false, or a string if true
 */
function isALNEQualifiedVersion($ignoredev = 0, $ignoremodule = 0)
{
}
/**
 * Return if the application is executed with the LNE requirements on.
 * This function can be used to block some features like custom receipts, or to enable others like showing the information "Certified LNE".
 *
 * @param	int		$blockedlogtestalreadydone		Test on blockedlog used already done and we suppose it is true.
 * @param	int		$blockedlogmodulealreadydone	Test on blockedlog module already done and we suppose it is true.
 * @return 	boolean									True or false
 */
function isALNERunningVersion($blockedlogtestalreadydone = 0, $blockedlogmodulealreadydone = 0)
{
}
/**
 * Return if the blocked log was already used to block some events.
 *
 * @param   int<0,1>	$ignoresystem       Ignore system events for the test
 * @return 	boolean							True if blocked log was already used, false if not
 */
function isBlockedLogUsed($ignoresystem = 0)
{
}
/**
 *      Add legal mention
 *
 *      @param	TCPDF      			$pdf            	Object PDF
 *      @param  Translate			$outputlangs		Object lang
 *      @param  Societe				$seller         	Seller company
 *      @param  int					$default_font_size  Default font size
 *      @param  float				$posy            	Y position
 *      @param  CommonDocGenerator	$pdftemplate    	PDF template
 *      @return	int                                 	0 if nothing done, 1 if a mention was printed
 */
function pdfCertifMentionblockedLog(&$pdf, $outputlangs, $seller, $default_font_size, &$posy, $pdftemplate)
{
}
/**
 *      sumAmountsForUnalterableEvent
 *
 *      @param	BlockedLog			$block								Object BlockedLog
 *      @param	array<string,int>	$refinvoicefound					Array of ref of invoice already found (to avoid duplicates. Should be useless but just in case of)
 *      @param  array<string,array<string,float>>	$totalhtamount		Array of total per code event and module
 *      @param  array<string,array<string,float>>	$totalvatamount		Array of total per code event and module
 *      @param  array<string,array<string,float>>	$totalamount		Array of total per code event and module
 *      @param  float				$total_ht							Total HT
 *      @param  float				$total_vat							Total VAT
 *      @param  float				$total_ttc							Total TTC
 *      @return	int                                 					Return > 0
 */
function sumAmountsForUnalterableEvent($block, &$refinvoicefound, &$totalhtamount, &$totalvatamount, &$totalamount, &$total_ht, &$total_vat, &$total_ttc)
{
}
/**
 * Call remote API service to get the obfuscation key.
 * This function is only called by blockedlog->getObfuscationKey();
 *
 * @param 	string	$idprof1				Counter ID/value of ne record
 * @param 	string	$registrationnumber		Registration number
 * @param	boolean	$force					False. Use true for tests.
 * @return	string							Obfuscationkey or 'ERROR ...' if error.
 */
function callApiToGetObfuscationKey($idprof1, $registrationnumber, $force = \false)
{
}
/**
 * Call remote API service to push the last counter and signature
 *
 * @param 	int		$id						Counter ID/value of ne record
 * @param 	string	$signature				Signature of new record
 * @param	int		$datecreation			Date creation of new record
 * @param	int		$test					Add property test to 1 if it is for test
 * @param 	int		$previousid				Counter ID/value of previous record
 * @param 	string	$previoussignature		Signature of previous record
 * @param	int		$previousdatecreation	Date creation of previous record
 * @return	int								Return <0 if KO, 0 if nothing done, >0 if OK
 */
/*
function callApiToPushCounter($id, $signature, $datecreation, $test, $previousid, $previoussignature, $previousdatecreation)
{
	global $mysoc, $conf;

	if (isALNERunningVersion(1) && $mysoc->country_code == 'FR') {
		// Push last rowid + signature to remote dolibarr server
		// TODO Do it only for selected events: BILL_VALIDATE ?

		// Code here is similar to the one into printCodeForPing(), except that message code/properties/fields may differ.
		$url_for_ping = getDolGlobalString('MAIN_URL_FOR_PING', "https://ping.dolibarr.org/");

		$algo = 'sha256';
		$hash_unique_id = getHashUniqueIdOfRegistration($algo);		// The hash of the unique IDof instance

		$t = microtime(true);
		$micro = sprintf("%06d", (int) (($t - floor($t)) * 1000000));

		$data = '';
		$data .= 'hash_algo=dol_hash-'.urlencode($algo);
		$data .= '&hash_unique_id='.urlencode($hash_unique_id);
		$data .= '&action=dolibarrpushcounter';
		$data .= '&datesys='.urlencode(dol_print_date(dol_now('gmt'), 'standard', 'gmt').'.'.$micro);
		$data .= '&version='.(float) DOL_VERSION;
		$data .= '&version_full='.urlencode(DOL_VERSION);
		$data .= '&versionblockedlog='.(float) getBlockedLogVersionToShow();
		$data .= '&versionblockedlog_full='.urlencode(getBlockedLogVersionToShow());

		$data .= '&entity='.(int) $conf->entity;

		$data .= '&lastrowid='.(int) $id;
		$data .= '&lastsignature='.urlencode($signature);
		$data .= '&lastdatecreation='.urlencode(dol_print_date($datecreation, 'standard', 'gmt'));
		$data .= '&previousrowid='.(int) $previousid;
		$data .= '&previoussignature='.urlencode($previoussignature);
		$data .= '&previousdatecreation='.urlencode(dol_print_date($previousdatecreation, 'standard', 'gmt'));
		if ($test) {
			$data .= '&test=1';
		}

		$addheaders = array();
		$timeoutconnect = 1;
		$timeoutresponse = 1;

		$conf->global->BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING = 1;		// Force probability to 1

		// Probability will be between 1/10 by default and 1/1 if const BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING is set to 1. Can't be lower than 1/10.
		$BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING = min(10, getDolGlobalInt('BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING', 10));
		$random = 1;
		//$BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING = 1;	// To force track at every call
		if ($BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING > 1) {
			$random = random_int(1, (int) $BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING);
		}

		if ($random == 1) {	// 1 chance on BLOCKEDLOG_RANDOMRANGE_FOR_TRACKING
			dol_syslog("callApiToPushCounter create Record is selected to be remotely pushed for tracking", LOG_DEBUG);

			include_once DOL_DOCUMENT_ROOT.'/core/lib/geturl.lib.php';
			try {
				$tmpresult = getURLContent($url_for_ping, 'POST', $data, 1, $addheaders, array('https'), 0, -1, $timeoutconnect, $timeoutresponse, array(), '_dolibarrpushcounter');
				usleep(1000);

				// Add a warning in log in case of error
				if ($tmpresult['http_code'] != 200) {
					$logerrormessage = 'Error: '.$tmpresult['http_code'].' '.$tmpresult['content'];
					dol_syslog("callApiToPushCounter create Error when pushing track info: ".$logerrormessage, LOG_WARNING);
				}
			} catch (Exception $e) {
				dol_syslog("callApiToPushCounter create Error ".$e->getMessage(), LOG_ERR);
			}
		} else {
			dol_syslog("callApiToPushCounter create Record is NOT selected to be remotely pushed for tracking", LOG_DEBUG);
		}

		return 1;
	}

	return 0;
}
*/
/**
 * Return if user is a tax auditor.
 * Must be an external user and BLOCKEDLOG_FOR_TAX_AUDITOR must be set to 1 OR
 * BLOCKEDLOG_FOR_TAX_AUDITOR must be set to 2
 *
 * @return	int		Return > 0 if user is an external user so must be restricted to archive control feature
 */
function userIsTaxAuditor()
{
}
/**
 *   	Add some information from the blockedlog module
 *
 *   	@param	TCPDF		$pdf     		Object PDF
 *      @param	Translate	$outputlangs	Object lang for output
 * 		@param	float		$page_height	Height of page
 * 		@param	Facture		$object			Object invoice
 * 		@param	int			$w				Width for text
 * 		@param	float		$posx			Pos x
 * 		@param	float		$posy			Pos y
 *      @return	void
 */
function pdfWriteBlockedLogSignature(&$pdf, $outputlangs, $page_height, $object, &$w, &$posx, &$posy)
{
}
/**
 * Migrate an old database to add the .end flag.
 *
 * @return  int		Return -1 if KO, 1 if OK
 */
function migrate_blockedlog_add_end_file()
{
}