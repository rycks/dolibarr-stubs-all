<?php

# Verify an IBAN number.
#  If $machine_format_only, do not tolerate unclean (eg. spaces, dashes, leading 'IBAN ' or 'IIBAN ', lower case) input.
#  (Otherwise, input can be printed 'IIBAN xx xx xx...' or 'IBAN xx xx xx...' or machine 'xxxxx' format.)
#  Returns true or false.
function verify_iban($iban, $machine_format_only = \false)
{
}
# Convert an IBAN to machine format.  To do this, we
# remove IBAN from the start, if present, and remove
# non basic roman letter / digit characters
function iban_to_machine_format($iban)
{
}
# Convert an IBAN to human format. To do this, we
# simply insert spaces right now, as per the ECBS
# (European Committee for Banking Standards)
# recommendations available at:
# http://www.europeanpaymentscouncil.eu/knowledge_bank_download.cfm?file=ECBS%20standard%20implementation%20guidelines%20SIG203V3.2.pdf
function iban_to_human_format($iban)
{
}
# Convert an IBAN to obfuscated presentation. To do this, we
# replace the checksum and all subsequent characters with an
# asterisk, except for the final four characters, and then
# return in human format, ie.
#  HU69107000246667654851100005 -> HU** **** **** **** **** **** 0005
#
# We avoid the checksum as it may be used to infer the rest
# of the IBAN in cases where the country has few valid banks
# and branches, or other information about the account such
# as bank, branch, or date issued is known (where a sequential
# issuance scheme is in use).
#
# Note that output of this function should be presented with
# other information to a user, such as the date last used or
# the date added to their account, in order to better facilitate
# unambiguous relative identification.
function iban_to_obfuscated_format($iban)
{
}
# Get the country part from an IBAN
function iban_get_country_part($iban)
{
}
# Get the checksum part from an IBAN
function iban_get_checksum_part($iban)
{
}
# Get the BBAN part from an IBAN
function iban_get_bban_part($iban)
{
}
# Check the checksum of an IBAN - code modified from Validate_Finance PEAR class
function iban_verify_checksum($iban)
{
}
# Find the correct checksum for an IBAN
#  $iban  The IBAN whose checksum should be calculated
function iban_find_checksum($iban)
{
}
# Set the correct checksum for an IBAN
#  $iban  IBAN whose checksum should be set
function iban_set_checksum($iban)
{
}
# Character substitution required for IBAN MOD97-10 checksum validation/generation
#  $s  Input string (IBAN)
function iban_checksum_string_replace($s)
{
}
# Same as below but actually returns resulting checksum
function iban_mod97_10_checksum($numeric_representation)
{
}
# Perform MOD97-10 checksum calculation ('Germanic-level efficiency' version - thanks Chris!)
function iban_mod97_10($numeric_representation)
{
}
# Get an array of all the parts from an IBAN
function iban_get_parts($iban)
{
}
# Get the Bank ID (institution code) from an IBAN
function iban_get_bank_part($iban)
{
}
# Get the Branch ID (sort code) from an IBAN
function iban_get_branch_part($iban)
{
}
# Get the (branch-local) account ID from an IBAN
function iban_get_account_part($iban)
{
}
# Get the national checksum part from an IBAN
function iban_get_nationalchecksum_part($iban)
{
}
# Get the name of an IBAN country
function iban_country_get_country_name($iban_country)
{
}
# Get the domestic example for an IBAN country
function iban_country_get_domestic_example($iban_country)
{
}
# Get the BBAN example for an IBAN country
function iban_country_get_bban_example($iban_country)
{
}
# Get the BBAN format (in SWIFT format) for an IBAN country
function iban_country_get_bban_format_swift($iban_country)
{
}
# Get the BBAN format (as a regular expression) for an IBAN country
function iban_country_get_bban_format_regex($iban_country)
{
}
# Get the BBAN length for an IBAN country
function iban_country_get_bban_length($iban_country)
{
}
# Get the IBAN example for an IBAN country
function iban_country_get_iban_example($iban_country)
{
}
# Get the IBAN format (in SWIFT format) for an IBAN country
function iban_country_get_iban_format_swift($iban_country)
{
}
# Get the IBAN format (as a regular expression) for an IBAN country
function iban_country_get_iban_format_regex($iban_country)
{
}
# Get the IBAN length for an IBAN country
function iban_country_get_iban_length($iban_country)
{
}
# Get the BBAN Bank ID start offset for an IBAN country
function iban_country_get_bankid_start_offset($iban_country)
{
}
# Get the BBAN Bank ID stop offset for an IBAN country
function iban_country_get_bankid_stop_offset($iban_country)
{
}
# Get the BBAN Branch ID start offset for an IBAN country
function iban_country_get_branchid_start_offset($iban_country)
{
}
# Get the BBAN Branch ID stop offset for an IBAN country
function iban_country_get_branchid_stop_offset($iban_country)
{
}
# Get the BBAN (national) checksum start offset for an IBAN country
#  Returns '' when (often) not present)
function iban_country_get_nationalchecksum_start_offset($iban_country)
{
}
# Get the BBAN (national) checksum stop offset for an IBAN country
#  Returns '' when (often) not present)
function iban_country_get_nationalchecksum_stop_offset($iban_country)
{
}
# Get the registry edition for an IBAN country
function iban_country_get_registry_edition($iban_country)
{
}
# Is the IBAN country one official issued by SWIFT?
function iban_country_get_country_swift_official($iban_country)
{
}
# Is the IBAN country a SEPA member?
function iban_country_is_sepa($iban_country)
{
}
# Get the IANA code of an IBAN country
function iban_country_get_iana($iban_country)
{
}
# Get the ISO3166-1 alpha-2 code of an IBAN country
function iban_country_get_iso3166($iban_country)
{
}
# Get the parent registrar IBAN country of an IBAN country
function iban_country_get_parent_registrar($iban_country)
{
}
# Get the official currency of an IBAN country as an ISO4217 alpha code
# (Note: Returns '' if there is no official currency, eg. for AA (IIBAN))
function iban_country_get_currency_iso4217($iban_country)
{
}
# Get the URL of an IBAN country's central bank
# (Note: Returns '' if there is no central bank. Also, note that
#        sometimes multiple countries share one central bank)
function iban_country_get_central_bank_url($iban_country)
{
}
# Get the name of an IBAN country's central bank
# (Note: Returns '' if there is no central bank. Also, note that
#        sometimes multiple countries share one central bank)
function iban_country_get_central_bank_name($iban_country)
{
}
# Get the list of all IBAN countries
function iban_countries()
{
}
# Get the membership of an IBAN country
# (Note: Possible Values eu_member, efta_member, other_member, non_member)
function iban_country_get_membership($iban_country)
{
}
# Get the membership of an IBAN country
# (Note: Possible Values eu_member, efta_member, other_member, non_member)
function iban_country_get_is_eu_member($iban_country)
{
}
# Given an incorrect IBAN, return an array of zero or more checksum-valid
# suggestions for what the user might have meant, based upon common
# mistranscriptions.
#  IDEAS:
#   - length correction via adding/removing leading zeros from any single component
#   - overlength correction via dropping final digit(s)
#   - national checksum algorithm checks (apply same testing methodology, abstract to separate function)
#   - length correction by removing double digits (xxyzabxybaaz = change aa to a, or xx to x)
#   - validate bank codes
#   - utilize format knowledge with regards to alphanumeric applicability in that offset in that national BBAN format
#   - turkish TL/TK thing
#   - norway NO gets dropped due to mis-identification with "No." for number (ie. if no country code try prepending NO)
function iban_mistranscription_suggestions($incorrect_iban)
{
}
function _iban_load_registry()
{
}
# Get information from the IBAN registry by example IBAN / code combination
function _iban_get_info($iban, $code)
{
}
# Get information from the IBAN registry by country / code combination
function _iban_country_get_info($country, $code)
{
}
# Load common mistranscriptions from disk.
function _iban_load_mistranscriptions()
{
}
# Find the correct national checksum for an IBAN
#  (Returns the correct national checksum as a string, or '' if unimplemented for this IBAN's country)
#  (NOTE: only works for some countries)
function iban_find_nationalchecksum($iban)
{
}
# Verify the correct national checksum for an IBAN
#  (Returns true or false, or '' if unimplemented for this IBAN's country)
#  (NOTE: only works for some countries)
function iban_verify_nationalchecksum($iban)
{
}
# Verify the correct national checksum for an IBAN
#  (Returns the (possibly) corrected IBAN, or '' if unimplemented for this IBAN's country)
#  (NOTE: only works for some countries)
function iban_set_nationalchecksum($iban)
{
}
# Internal function to overwrite the national checksum portion of an IBAN
function _iban_nationalchecksum_set($iban, $nationalchecksum)
{
}
# Currently unused but may be useful for Norway.
# ISO7064 MOD11-2
# Adapted from https://gist.github.com/andreCatita/5714353 by Andrew Catita
function _iso7064_mod112_catita($input)
{
}
# Currently unused but may be useful for Norway.
# ISO 7064:1983.MOD 11-2
# by goseaside@sina.com
function _iso7064_mod112_goseaside($vString)
{
}
# ISO7064 MOD97-10 (Bosnia, etc.)
# (Credit: Adapted from https://github.com/stvkoch/ISO7064-Mod-97-10/blob/master/ISO7064Mod97_10.php)
function _iso7064_mod97_10($str)
{
}
# Implement the national checksum for a Belgium (BE) IBAN
#  (Credit: @gaetan-be, fixed by @Olympic1)
function _iban_nationalchecksum_implementation_be($iban, $mode)
{
}
# MOD11 helper function for the Spanish (ES) IBAN national checksum implementation
#  (Credit: @dem3trio, code lifted from Spanish Wikipedia at https://es.wikipedia.org/wiki/C%C3%B3digo_cuenta_cliente)
function _iban_nationalchecksum_implementation_es_mod11_helper($numero)
{
}
# Implement the national checksum for a Spanish (ES) IBAN
#  (Credit: @dem3trio, adapted from code on Spanish Wikipedia at https://es.wikipedia.org/wiki/C%C3%B3digo_cuenta_cliente)
function _iban_nationalchecksum_implementation_es($iban, $mode)
{
}
# Helper function for the France (FR) BBAN national checksum implementation
#  (Credit: @gaetan-be)
function _iban_nationalchecksum_implementation_fr_letters2numbers_helper($bban)
{
}
# NOTE: Worryingly at least one domestic number found within CF online is
#       not passing national checksum support. Perhaps banks do not issue
#       with correct RIB (French-style national checksum) despite using
#       the legacy format? Perhaps this is a mistranscribed number?
#        http://www.radiomariacentrafrique.org/virement-bancaire.aspx
#	  ie. CF19 20001 00001 01401832401 40
#	The following two numbers work:
#        http://fondationvoixducoeur.net/fr/pour-contribuer.html
#	  ie. CF4220002002003712551080145 and CF4220001004113717538890110
#       Since in the latter case the bank is the same as the former and
#       the French structure, terminology and 2/3 correct is a fairly high
#       correlation, we are going to assume that the first error is theirs.
#
# Implement the national checksum for a Central African Republic (CF) IBAN
function _iban_nationalchecksum_implementation_cf($iban, $mode)
{
}
# Implement the national checksum for a Chad (TD) IBAN
function _iban_nationalchecksum_implementation_td($iban, $mode)
{
}
# Implement the national checksum for a Comoros (KM) IBAN
function _iban_nationalchecksum_implementation_km($iban, $mode)
{
}
# Implement the national checksum for a Congo (CG) IBAN
function _iban_nationalchecksum_implementation_cg($iban, $mode)
{
}
# Implement the national checksum for a Djibouti (DJ) IBAN
function _iban_nationalchecksum_implementation_dj($iban, $mode)
{
}
# Implement the national checksum for an Equitorial Guinea (GQ) IBAN
function _iban_nationalchecksum_implementation_gq($iban, $mode)
{
}
# Implement the national checksum for a Gabon (GA) IBAN
function _iban_nationalchecksum_implementation_ga($iban, $mode)
{
}
# Implement the national checksum for a Monaco (MC) IBAN
#  (Credit: @gaetan-be)
function _iban_nationalchecksum_implementation_mc($iban, $mode)
{
}
# Implement the national checksum for a France (FR) IBAN
#  (Credit: @gaetan-be, http://www.credit-card.be/BankAccount/ValidationRules.htm#FR_Validation and
#           https://docs.oracle.com/cd/E18727_01/doc.121/e13483/T359831T498954.htm)
function _iban_nationalchecksum_implementation_fr($iban, $mode)
{
}
# Implement the national checksum for a Norway (NO) IBAN
#  (NOTE: Built from description at https://docs.oracle.com/cd/E18727_01/doc.121/e13483/T359831T498954.htm, not well tested)
function _iban_nationalchecksum_implementation_no($iban, $mode)
{
}
# ISO/IEC 7064, MOD 11-2
# @param $input string Must contain only characters ('0123456789').
# @output A 1 character string containing '0123456789X',
#         or '' (empty string) on failure due to bad input.
# (Credit: php-iso7064 @ https://github.com/globalcitizen/php-iso7064)
function _iso7064_mod11_2($input)
{
}
# Implement the national checksum systems based on ISO7064 MOD11-2 Algorithm
function _iban_nationalchecksum_implementation_iso7064_mod11_2($iban, $mode, $drop_at_front = 0, $drop_at_end = 1)
{
}
# Implement the national checksum systems based on Damm Algorithm
function _iban_nationalchecksum_implementation_damm($iban, $mode)
{
}
# Implement the national checksum systems based on Verhoeff Algorithm
function _iban_nationalchecksum_implementation_verhoeff($iban, $mode, $strip_length_end, $strip_length_front = 0)
{
}
# ISO/IEC 7064, MOD 97-10
# @param $input string Must contain only characters ('0123456789').
# @output A 2 character string containing '0123456789',
#         or '' (empty string) on failure due to bad input.
# (Credit: php-iso7064 @ https://github.com/globalcitizen/php-iso7064)
function _iso7064_mod97_10_generated($input)
{
}
# Implement the national checksum for an Montenegro (ME) IBAN
#  (NOTE: Reverse engineered)
function _iban_nationalchecksum_implementation_me($iban, $mode)
{
}
# Implement the national checksum for an Macedonia (MK) IBAN
#  (NOTE: Reverse engineered)
function _iban_nationalchecksum_implementation_mk($iban, $mode)
{
}
# Implement the national checksum for an Netherlands (NL) IBAN
#  This applies to most banks, but not to 'INGB', therefore we
#  treat it specially here.
#  (Original code: Validate_NL PEAR class, since extended)
function _iban_nationalchecksum_implementation_nl($iban, $mode)
{
}
# Implement the national checksum for an Portugal (PT) IBAN
#  (NOTE: Reverse engineered)
function _iban_nationalchecksum_implementation_pt($iban, $mode)
{
}
# Implement the national checksum for an Serbia (RS) IBAN
#  (NOTE: Reverse engineered, including bank 'Narodna banka Srbije' (908) exception. For two
#         separately published and legitimate looking IBANs from that bank, there appears to
#         be a +97 offset on the checksum, so we simply ignore all checksums for this bank.)
function _iban_nationalchecksum_implementation_rs($iban, $mode)
{
}
# Implement the national checksum for an Slovenia (SI) IBAN
#  Note: It appears that the central bank does not use these
#        checksums, thus an exception has been added.
#  (NOTE: Reverse engineered)
function _iban_nationalchecksum_implementation_si($iban, $mode)
{
}
# Implement the national checksum for Slovak Republic (SK) IBAN
# Source of algorithm: https://www.nbs.sk/_img/Documents/_Legislativa/_Vestnik/OPAT8-09.pdf
# Account number is currently verified only, it's possible to also add validation for bank code and account number prefix
function _iban_nationalchecksum_implementation_sk($iban, $mode)
{
}
# Implement the national checksum for MOD97-10 countries
function _iban_nationalchecksum_implementation_mod97_10($iban, $mode)
{
}
# Implement the national checksum for an Timor-Lest (TL) IBAN
#  (NOTE: Reverse engineered, but works on 2 different IBAN from official sources)
function _iban_nationalchecksum_implementation_tl($iban, $mode)
{
}
# Luhn Check
# (Credit: Adapted from @gajus' https://gist.github.com/troelskn/1287893#gistcomment-857491)
function _luhn($string)
{
}
# Verhoeff checksum
# (Credit: Adapted from Semyon Velichko's code at https://en.wikibooks.org/wiki/Algorithm_Implementation/Checksums/Verhoeff_Algorithm#PHP)
function _verhoeff($input)
{
}
# Damm checksum
# (Credit: https://en.wikibooks.org/wiki/Algorithm_Implementation/Checksums/Damm_Algorithm#PHP)
function _damm($input)
{
}
# Implement the national checksum for an Italian (IT) IBAN
function _iban_nationalchecksum_implementation_it($iban, $mode)
{
}
# Implement the national checksum for a San Marino (SM) IBAN
function _iban_nationalchecksum_implementation_sm($iban, $mode)
{
}
# Italian (and San Marino's) checksum
# (Credit: Translated by Francesco Zanoni from http://community.visual-basic.it/lucianob/archive/2004/12/26/2464.aspx)
# (Source: European Commettee of Banking Standards' Register of European Account Numbers (TR201 V3.23 — FEBRUARY 2007),
#          available at URL http://www.cnb.cz/cs/platebni_styk/iban/download/TR201.pdf)
function _italian($input)
{
}
# Internal proxy function to access national checksum implementations
#  $iban = IBAN to work with (length and country must be valid, IBAN checksum and national checksum may be incorrect)
#  $mode = 'find', 'set', or 'verify'
#    - In 'find' mode, the correct national checksum for $iban is returned.
#    - In 'set' mode, a (possibly) modified version of $iban with the national checksum corrected is returned.
#    - In 'verify' mode, the checksum within $iban is compared to correctly calculated value, and true or false is returned.
#  If a national checksum algorithm does not exist or remains unimplemented for this country, or the supplied $iban or $mode is invalid, '' is returned.
#  (NOTE: We cannot collapse 'verify' mode and implement here via simple string comparison between 'find' mode output and the nationalchecksum part,
#         because some countries have systems which do not map to this approach, for example the Netherlands has no checksum part yet an algorithm exists)
function _iban_nationalchecksum_implementation($iban, $mode)
{
}