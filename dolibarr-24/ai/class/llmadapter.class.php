<?php

/* Copyright (C) 2026		Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2026		Nick Fragoulis
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY, without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 * \file    htdocs/ai/class/llmadapter.class.php
 * \ingroup ai
 * \brief   Universal adapter for multiple LLM providers
 */
class UniversalLLMAdapter
{
    /** @var string Stores the raw request for debugging */
    public $lastRequest = "";
    /** @var string Stores the raw response for debugging */
    public $lastResponse = "";
    /** @var string The type of LLM (e.g., 'openai', 'ollama') */
    private $type;
    /** @var string The API Key */
    private $key;
    /** @var string The Base URL for the API */
    private $baseUrl;
    /** @var string The model name to use */
    private $model;
    /** @var int Timeout in seconds */
    private $timeout;
    /**
     * Constructor
     *
     * @param string $type    The LLM type
     * @param string $key     API Key
     * @param string $baseUrl API Base URL
     * @param string $model   Model name
     * @param int    $timeout Timeout in seconds
     */
    public function __construct(string $type, string $key, string $baseUrl, string $model, int $timeout)
    {
    }
    /**
     * Generate a response using the configured LLM provider
     *
     * @param string $system   The system prompt/instruction
     * @param string $userMsg  The specific user query
     * @param string $mode     'json' for strict JSON (MCP), 'text' for legacy (default)
     * @return string|null     The text response from the AI or null on failure
     */
    public function generate(string $system, string $userMsg, string $mode = 'text') : ?string
    {
    }
    /**
     * Call OpenAI-compatible API
     *
     * @param string $sys System prompt
     * @param string $msg User message
     * @param string $mode 'json' or 'text'
     * @return string|null Response content or null on failure
     */
    private function callOpenAI(string $sys, string $msg, string $mode = 'text') : ?string
    {
    }
    /**
     * Call Anthropic API (Claude)
     *
     * @param string $sys System prompt
     * @param string $msg User message
     * @param string $mode Response mode (default: text)
     *
     * @return string|null Response content or null on failure
     */
    private function callAnthropic(string $sys, string $msg, string $mode = 'text')
    {
    }
    /**
     * Call Google Gemini API
     *
     * @param string $sys System prompt
     * @param string $msg User message
     * @param string $mode Response mode (default: text)
     *
     * @return string|null Response content or null on failure
     */
    private function callGoogle(string $sys, string $msg, string $mode = 'text')
    {
    }
    /**
     * Execute HTTP Request via cURL
     *
     * @param string 				$url       	Target API URL
     * @param array<string, mixed> 	$data      	Request payload (keys are strings, values vary)
     * @param array<int, string>   	$headers   	List of HTTP headers (indexed array of strings)
     * @param bool   				$isClaude  	Flag to handle Anthropic response format
     * @param bool   				$isGemini  	Flag to handle Gemini response format
     * @return string|null      				Returns the extracted text, an error message, or null
     */
    private function curl(string $url, array $data, array $headers, bool $isClaude = \false, bool $isGemini = \false) : ?string
    {
    }
}