<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOLOGIN', '1');
\define('NOIPCHECK', '1');
\define('USESUFFIXINLOG', '_cidlookup');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var Translate $langs
 */
$phone = \GETPOST('phone');
$securitykey = \GETPOST('securitykey');
$notfound = $langs->trans("Unknown");
$sql = "SELECT s.nom as name FROM " . \MAIN_DB_PREFIX . "societe as s";
$resql = $db->query($sql);
$obj = $db->fetch_object($resql);
//Greek to Latin
$greek = array('α', 'β', 'γ', 'δ', 'ε', 'ζ', 'η', 'θ', 'ι', 'κ', 'λ', 'μ', 'ν', 'ξ', 'ο', 'π', 'ρ', 'ς', 'σ', 'τ', 'υ', 'φ', 'χ', 'ψ', 'ω', 'Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω', 'ά', 'έ', 'ή', 'ί', 'ό', 'ύ', 'ώ', 'ϊ', 'ΐ', 'Ά', 'Έ', 'Ή', 'Ί', 'Ό', 'Ύ', 'Ώ', 'Ϊ');
$latin = array('a', 'b', 'g', 'd', 'e', 'z', 'h', 'th', 'i', 'k', 'l', 'm', 'n', 'ks', 'o', 'p', 'r', 's', 's', 't', 'u', 'f', 'ch', 'ps', 'w', 'A', 'B', 'G', 'D', 'E', 'Z', 'H', 'TH', 'I', 'K', 'L', 'M', 'N', 'KS', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'CH', 'PS', 'W', 'a', 'e', 'h', 'i', 'o', 'u', 'w', 'i', 'i', 'A', 'E', 'H', 'I', 'O', 'U', 'W', 'I');