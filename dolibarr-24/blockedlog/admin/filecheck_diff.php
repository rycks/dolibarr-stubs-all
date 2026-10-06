<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * Compute a line based diff between two arrays of lines, restricted to the changed
 * region (common prefix and suffix are trimmed first to keep it cheap and memory safe).
 *
 * @param	string[]	$a	Lines of the original file
 * @param	string[]	$b	Lines of the local file
 * @return	array<array{0:string,1:string}>		List of [type, line] where type is ' ' (context), '-' (removed) or '+' (added)
 */
function filecheckLineDiff($a, $b)
{
}
/**
 * Diff of the changed region. For large regions, the region is recursively split on
 * unique common lines (anchors, patience-diff style) so the expensive LCS only runs
 * on small segments. This keeps small changes detected instead of one big block.
 *
 * @param	string[]	$a	Changed lines of the original file
 * @param	string[]	$b	Changed lines of the local file
 * @return	array<array{0:string,1:string}>		List of [type, line]
 */
function filecheckMiddleDiff($a, $b)
{
}
/**
 * Find a line that appears exactly once in both arrays (a unique common "anchor"),
 * choosing the candidate closest to the middle of $a to balance the recursion.
 *
 * @param	string[]	$a	Lines
 * @param	string[]	$b	Lines
 * @return	?array{0:int,1:int}		[index in $a, index in $b] of the anchor, or null if none found
 */
function filecheckFindAnchor($a, $b)
{
}
/**
 * Diff of two small arrays of lines using a classic LCS dynamic programming matrix.
 *
 * @param	string[]	$a	Lines of the original file
 * @param	string[]	$b	Lines of the local file
 * @return	array<array{0:string,1:string}>		List of [type, line]
 */
function filecheckLcs($a, $b)
{
}
/**
 * Collapse long runs of unchanged context lines, keeping a few lines around each change.
 *
 * @param	array<array{0:string,1:string}>		$diff		Full diff as returned by filecheckLineDiff()
 * @param	int									$context	Number of context lines to keep around changes
 * @return	array<array{0:string,1:string}>		Diff with collapsed context (type '@' marks a collapsed gap)
 */
function filecheckCollapseContext($diff, $context = 3)
{
}
/**
 * Close the fragment output and stop the script.
 *
 * @return void
 */
function llxFooterFragment()
{
}