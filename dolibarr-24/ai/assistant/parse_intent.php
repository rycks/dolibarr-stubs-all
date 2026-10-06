<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIREHTML', 1);
\define('NOREQUIREAJAX', 1);
// TODO Enable the CSRF check
\define('NOCSRFCHECK', 1);
// Confidence thresholds
\define('HIGH_CONFIDENCE', 0.8);
\define('MEDIUM_CONFIDENCE', 0.5);
\define('LOW_CONFIDENCE', 0.3);
/**
 * Recursively unmask values in a dataset.
 *
 * This helper walks through an array structure and applies the appropriate
 * unmasking method on all string values. It ensures that any masked or
 * placeholder data is restored before being used in actual tool execution.
 *
 * Supported guard methods:
 * - unmask(string $value): string
 * - unmaskAiResponse(string $value): string
 *
 * If both methods exist, `unmask()` takes precedence.
 *
 * @param mixed $data  The input data (array, string, or scalar) to process.
 * @param PrivacyGuard|null $guard An object providing unmasking methods.
 *
 * @return mixed The data with all string values unmasked.
 */
function recursiveUnmaskValues($data, ?\PrivacyGuard $guard)
{
}
/**
 * Detects if the query uses Non-Latin Scripts.
 *
 * Supports all Dolibarr Core Non-Latin languages:
 * - CJK (Chinese, Japanese, Korean)
 * - Cyrillic (Russian, Ukrainian, Serbian, Bulgarian)
 * - Greek, Arabic, Hebrew, Thai
 *
 *
 * @param string $text The input text to be checked.
 * @return bool True if the text contains complex scripts, false otherwise.
 */
function isComplexScript(string $text)
{
}
/**
 * Detect intent categories from a user query.
 *
 * This function analyzes a natural language query and attempts to classify it
 * into one or more predefined intent categories (e.g., billing, commercial,
 * thirdparty, stock, project, reporting).
 *
 * It leverages Dolibarr translations (`$langs->trans()`) to match localized
 * keywords, and applies additional synonym matching for Latin-based queries.
 * For non-Latin scripts, it performs a simpler substring search.
 *
 * Matching strategy:
 * - Latin queries: normalized (lowercase + unaccent) and matched using regex word boundaries.
 * - Non-Latin queries: matched using case-insensitive substring search.
 *
 * Each category is detected if at least one keyword or synonym matches.
 *
 * @param string    $query The user input query to analyze.
 * @param Translate $langs The Dolibarr translation object used to resolve localized keywords.
 *
 * @return string[] Array of detected intent categories (e.g., ['billing', 'stock']).
 */
function classifyIntentUniversal(string $query, \Translate $langs)
{
}
/**
 * Filter a list of tools based on active intent categories.
 *
 * This function narrows down the available tools by matching their assigned
 * categories against the detected intent categories. Tools tagged as "global"
 * are always considered, but may be excluded when more specific categories
 * are active to avoid overly generic matches.
 *
 * Behavior:
 * - If no categories are provided, or only "global" is present, all tools are returned.
 * - Tools are included if they share at least one category with the target categories.
 * - Tools with only the "global" category are excluded when specific categories are active.
 * - If filtering results in fewer than 3 tools, the full tool list is returned as a fallback.
 *
 *
 * @param array<int,array<string,mixed>> $allTools          List of all available tools.
 * @param string[] $activeCategories  Detected intent categories (e.g., ['billing', 'stock']).
 *
 * @return array<int,array<string,mixed>> Filtered list of tools matching the active categories.
 */
function filterToolsProfessional(array $allTools, array $activeCategories)
{
}
/**
 * Compresses tool schema by removing optional parameters with defaults
 * and stripping descriptions, relying on LLM inference of variable names.
 *
 * @param array<int, array<string, mixed>> $tools Array of tool definitions.
 * @param bool $isLargeSchema True if compression is needed.
 * @return array<int, array<string, mixed>>
 */
function cleanToolSchemaForLLM(array $tools, bool $isLargeSchema = \false)
{
}
/**
 * Calculate confidence score based on multiple factors.
 *
 * This function analyzes the AI's response to determine if the intent was
 * parsed correctly and if all required arguments were provided according to
 * the tool's schema.
 *
 * @param array<string, mixed> $intentJSON  The parsed intent (Keys: 'tool', 'arguments').
 * @param array<string, array<string, mixed>> $toolsSchema Available tools schema (Key=ToolName, Value=ToolDefinition).
 * @param string               $rawResponse Raw response string from the AI provider.
 * @return float Confidence score between 0.0 and 1.0.
 */
function calculateConfidence($intentJSON, $toolsSchema, $rawResponse)
{
}
/**
 * Format arguments for display in confirmation
 *
 * @param array<string, mixed> $arguments The arguments to format (Key=ParamName, Value=Value)
 * @return string Formatted arguments string
 */
function formatArgumentsForDisplay($arguments)
{
}
/**
 * Extract action from tool name
 *
 * @param string $toolName The tool name
 * @return string The extracted action
 */
function extractActionFromTool($toolName)
{
}