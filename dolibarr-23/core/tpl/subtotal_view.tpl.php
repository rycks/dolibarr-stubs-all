<?php

$line_options = $line->extraparams["subtotal"] ?? array();
$line_color = $this->getSubtotalColors($line->qty);