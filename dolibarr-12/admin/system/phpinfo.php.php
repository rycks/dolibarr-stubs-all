<?php

/**
 * Return a table column with a indicator (okay or warning), based on the given name and list
 *
 * @param string $name		The name to check inside the given list
 * @param array  $list      A list that should contains the given name
 *
 * @return string
 */
function getTableColumn($name, array $list)
{
}
/**
 * Return a table column with a indicator (okay or warning), based on the given functions to check
 *
 * @param array $functions	A list with functions to check
 *
 * @return string
 */
function getTableColumnFunction(array $functions)
{
}
/**
 * Return a result column with a translated result text
 *
 * @param string $name			The name of the PHP extension
 * @param array $activated		A list with all activated PHP extensions. Deprecated.
 * @param array $loaded			A list with all loaded PHP extensions
 * @param array $functions		A list with all PHP functions to check
 *
 * @return string
 */
function getResultColumn($name, array $activated, array $loaded, array $functions)
{
}