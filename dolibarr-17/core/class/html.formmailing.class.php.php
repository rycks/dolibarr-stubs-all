<?php

/**
 *  Class to offer components to list and upload files
 */
class FormMailing extends \Form
{
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * Output a select with destinaries status
     *
     * @param 	string   $selectedid     	The selected id
     * @param 	string   $htmlname       	Name of controm
     * @param 	integer  $show_empty     	Show empty option
     * @return 	string 						HTML select
     */
    public function selectDestinariesStatus($selectedid = '', $htmlname = 'dest_status', $show_empty = 0)
    {
    }
}