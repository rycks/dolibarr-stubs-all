<?php

/**
 * Base class for Salary PDF document models
 */
abstract class ModelePDFSalary extends \CommonDocGenerator
{
    /**
     * Return list of available salary PDF models
     *
     * @param DoliDB $db                 Database handler
     * @param int    $maxfilenamelength  Max filename length
     * @return array<string,string>
     */
    public static function listModels($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Legacy method required by Dolibarr PDF system
     * Delegates to camelCase method
     *
     * @param DoliDB $db Database handler
     * @return array<string,string> List of available PDF models
     */
    public static function liste_modeles($db)
    {
    }
    /**
     * Build the salary PDF document
     *
     * @param object    $object             Salary object
     * @param Translate $outputlangs         Language object
     * @param string    $srctemplatepath     Template path
     * @param int       $hidedetails         Hide details
     * @param int       $hidedesc            Hide description
     * @param int       $hideref             Hide reference
     * @return int
     */
    public abstract function writeFile($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
}