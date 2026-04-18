<?php

namespace PHP_IBAN;

# OO wrapper for 'php-iban.php'
class IBAN
{
    function __construct($iban = '')
    {
    }
    public function Verify($iban = '', $machine_format_only = false)
    {
    }
    public function VerifyMachineFormatOnly($iban = '')
    {
    }
    public function MistranscriptionSuggestions()
    {
    }
    public function MachineFormat()
    {
    }
    public function HumanFormat()
    {
    }
    public function ObfuscatedFormat()
    {
    }
    public function Country($iban = '')
    {
    }
    public function Checksum($iban = '')
    {
    }
    public function NationalChecksum($iban = '')
    {
    }
    public function BBAN()
    {
    }
    public function VerifyChecksum()
    {
    }
    public function FindChecksum()
    {
    }
    public function SetChecksum()
    {
    }
    public function ChecksumStringReplace()
    {
    }
    public function FindNationalChecksum()
    {
    }
    public function SetNationalChecksum()
    {
    }
    public function VerifyNationalChecksum()
    {
    }
    public function Parts()
    {
    }
    public function Bank()
    {
    }
    public function Branch()
    {
    }
    public function Account()
    {
    }
    public function Countries()
    {
    }
}
# IBANCountry
class IBANCountry
{
    # constructor with code
    function __construct($code = '')
    {
    }
    public function Code()
    {
    }
    public function Name()
    {
    }
    public function DomesticExample()
    {
    }
    public function BBANExample()
    {
    }
    public function BBANFormatSWIFT()
    {
    }
    public function BBANFormatRegex()
    {
    }
    public function BBANLength()
    {
    }
    public function IBANExample()
    {
    }
    public function IBANFormatSWIFT()
    {
    }
    public function IBANFormatRegex()
    {
    }
    public function IBANLength()
    {
    }
    public function BankIDStartOffset()
    {
    }
    public function BankIDStopOffset()
    {
    }
    public function BranchIDStartOffset()
    {
    }
    public function BranchIDStopOffset()
    {
    }
    public function NationalChecksumStartOffset()
    {
    }
    public function NationalChecksumStopOffset()
    {
    }
    public function RegistryEdition()
    {
    }
    public function SWIFTOfficial()
    {
    }
    public function IsSEPA()
    {
    }
    public function IANA()
    {
    }
    public function ISO3166()
    {
    }
    public function ParentRegistrar()
    {
    }
    public function CurrencyISO4217()
    {
    }
    public function CentralBankURL()
    {
    }
    public function CentralBankName()
    {
    }
    public function Membership()
    {
    }
    public function IsEuMember()
    {
    }
}