<?php

// Options for subtotal
$sub_options = $line->extraparams["subtotal"] ?? array();
$titleshowuponpdf = !empty($sub_options['titleshowuponpdf']);
$titleshowtotalexludingvatonpdf = !empty($sub_options['titleshowtotalexludingvatonpdf']);
$titleforcepagebreak = !empty($sub_options['titleforcepagebreak']);
$subtotalshowtotalexludingvatonpdf = !empty($sub_options['subtotalshowtotalexludingvatonpdf']);
$line_options = array('titleshowuponpdf' => array('type' => array('title'), 'value' => 'on', 'checked' => $titleshowuponpdf, 'trans_key' => 'ShowUPOnPDF'), 'titleshowtotalexludingvatonpdf' => array('type' => array('title'), 'value' => 'on', 'checked' => $titleshowtotalexludingvatonpdf, 'trans_key' => 'ShowTotalExludingVATOnPDF'), 'titleforcepagebreak' => array('type' => array('title'), 'value' => 'on', 'checked' => $titleforcepagebreak, 'trans_key' => 'ForcePageBreak'), 'subtotalshowtotalexludingvatonpdf' => array('type' => array('subtotal'), 'value' => 'on', 'checked' => $subtotalshowtotalexludingvatonpdf, 'trans_key' => 'ShowTotalExludingVATOnPDF'));
// Line type
$line_type = $line->qty > 0 ? 'title' : 'subtotal';
// Base colspan if there is no module activated to display line correctly
$colspan = 4;
$situationinvoicelinewithparent = 0;
$disabled = 0;
$depth_array = $this->getPossibleLevels($langs);