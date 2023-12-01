<?php

# Verify an IBAN number.  Returns true or false.
#  NOTE: Input can be printed 'IIBAN xx xx xx...' or 'IBAN xx xx xx...' or machine 'xxxxx' format.
function verify_iban($iban)
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
# Perform MOD97-10 checksum calculation ('Germanic-level effiency' version - thanks Chris!)
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
# Get the registry edition for an IBAN country
function iban_country_get_registry_edition($iban_country)
{
}
# Is the IBAN country a SEPA member?
function iban_country_is_sepa($iban_country)
{
}
# Get the list of all IBAN countries
function iban_countries()
{
}
# Given an incorrect IBAN, return an array of zero or more checksum-valid
# suggestions for what the user might have meant, based upon common
# mistranscriptions.
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