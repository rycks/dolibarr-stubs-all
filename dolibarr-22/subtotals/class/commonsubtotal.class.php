<?php

/**
 *
 * Trait CommonSubtotal
 *
 * Add subtotals lines
 */
trait CommonSubtotal
{
    /**
     * @var int
     * Type for subtotals module lines
     */
    public static $PRODUCT_TYPE = 9;
    /**
     * @var array<string>
     * Options for subtotals module title lines
     */
    public static $TITLE_OPTIONS = ['titleshowuponpdf', 'titleshowtotalexludingvatonpdf', 'titleforcepagebreak'];
    /**
     * @var array<string>
     * Options for subtotals module subtotal lines
     */
    public static $SUBTOTAL_OPTIONS = ['subtotalshowtotalexludingvatonpdf'];
    /**
     * Adds a subtotals line to a document.
     * This function inserts a subtotal line based on the given parameters.
     *
     * @param Translate						$langs  		Translation.
     * @param string						$desc			Description of the line.
     * @param int							$depth			Level of the line (>0 for title lines, <0 for subtotal lines)
     * @param array<string,string>|string	$options		Subtotal options for pdf view
     * @param int							$parent_line	ID of the parent line for shipments
     * @return int									ID of the added line if successful, 0 on warning, -1 on error
     *
     * @phan-suppress PhanUndeclaredMethod
     * @phan-suppress PhanUndeclaredProperty
     */
    public function addSubtotalLine($langs, $desc, $depth, $options = array(), $parent_line = 0)
    {
    }
    /**
     * Deletes a subtotal or a title line from a document.
     * If the corresponding subtotal line exists and second parameter true, it will also be deleted.
     *
     * @param Translate	$langs					Translation.
     * @param int		$id						ID of the line to delete
     * @param bool		$correspondingstline	If true, also deletes the corresponding subtotal line
     * @param User		$user					performing the deletion (used for permissions in some modules)
     * @return int								ID of deleted line if successful, -1 on error
     *
     * @phan-suppress PhanUndeclaredMethod
     * @phan-suppress PhanUndeclaredProperty
     */
    public function deleteSubtotalLine($langs, $id, $correspondingstline = \false, $user = \null)
    {
    }
    /**
     * Updates a subtotal line of a document.
     * This function updates a subtotals line based on its id and the given parameters.
     * Updating a title line updates the corresponding subtotal line except options.
     *
     * @param Translate						$langs  	Translation.
     * @param int							$lineid  	ID of the line to update.
     * @param string						$desc		Description of the line.
     * @param int							$depth		Level of the line (>0 for title lines, <0 for subtotal lines)
     * @param array<string,string>|string	$options	Subtotal options for pdf view
     * @return int									ID of the added line if successful, 0 on warning, -1 on error
     *
     * @phan-suppress PhanUndeclaredMethod
     * @phan-suppress PhanUndeclaredProperty
     */
    public function updateSubtotalLine($langs, $lineid, $desc, $depth, $options)
    {
    }
    /**
     * Updates a block of lines of a document.
     *
     * @param Translate	$langs  	Translation.
     * @param int		$linerang	Rang of the line to start from.
     * @param string	$mode		Column to change (discount or vat).
     * @param int		$value		Value of the change.
     * @return int					Return integer < 0 if KO, 1 if OK
     *
     * @phan-suppress PhanUndeclaredMethod
     * @phan-suppress PhanUndeclaredProperty
     */
    public function updateSubtotalLineBlockLines($langs, $linerang, $mode, $value)
    {
    }
    /**
     * Return the total_ht of lines that are above the current line (excluded) and that are not a subtotal line
     * until a title line of the same level is found
     *
     * @param object	$line	Line that needs the subtotal amount.
     * @return string	$total_ht
     *
     * @phan-suppress PhanUndeclaredProperty
     */
    public function getSubtotalLineAmount($line)
    {
    }
    /**
     * Return the multicurrency_total_ht of lines that are above the current line (excluded) and that are not a subtotal line
     * until a title line of the same level is found
     *
     * @param object	$line	Line that needs the subtotal amount with multicurrency mod activated.
     * @return string	$total_ht
     *
     * @phan-suppress PhanUndeclaredProperty
     */
    public function getSubtotalLineMulticurrencyAmount($line)
    {
    }
    /**
     * Retrieve the background color associated with a specific subtotal level.
     *
     * @param int|float $level The level of the subtotal for which the color is requested.
     * @return string|null The background color in hexadecimal format or null if not set.
     */
    public function getSubtotalColors($level)
    {
    }
    /**
     * Retrieve current object possible titles to choose from
     *
     * @return array<string,string> The set of titles, empty if no title line set.
     *
     * @phan-suppress PhanUndeclaredProperty
     */
    public function getPossibleTitles()
    {
    }
    /**
     * Retrieve the current object possible levels (defined in admin page)
     *
     * @param Translate $langs 		Translations.
     * @return array<int,string>	The set of possible levels, empty if not defined correctly.
     *
     * @phan-suppress PhanUndeclaredProperty
     */
    public function getPossibleLevels($langs)
    {
    }
    /**
     * Returns an array with the IDs of the line that we don't need to show to avoid empty blocks
     *
     * @return array<int>	$total_ht
     *
     * @phan-suppress PhanUndeclaredProperty
     */
    public function getDisabledShippmentSubtotalLines()
    {
    }
}
\define('SUBTOTALS_SPECIAL_CODE', 81);