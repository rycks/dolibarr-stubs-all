<?php

/**
 * Helper compare function to sort lines by payment date first
 *
 * @param array{datep:int,datef:int}	$a	Left argument to compare
 * @param array{datep:int,datef:int}	$b	Right argument to compare
 * @return int<-1,1>  Indicates sort order between arguments
 */
function cmp_fields_date(&$a, &$b)
{
}