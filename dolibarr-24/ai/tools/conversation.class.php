<?php

/* Copyright (C) 2026	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2026	Nick Fragoulis
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY, without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * \file htdocs/ai/tools/conversation.php
 * \ingroup ai
 * \brief MCP Server tool for minimal interaction with the user.
 *
 * These tools control the UI flow (modals) and do not perform backend actions themselves.
 * The actual logic for handling the tool's response is implemented in the client-side JavaScript.
 */
class ToolConversation extends \McpTool
{
    /**
     * Defines the conversational tools available to the AI.
     * These tools control the interaction flow with the end-user.
     *
     * @return list<array<string, mixed>> Array of tool definitions.
     */
    public function getDefinitions() : array
    {
    }
    /**
     * Return categories this tool belongs to.
     * Used by the intent parser to filter available tools.
     *
     * @return array<string> List of categories (e.g., ['billing', 'commercial'])
     */
    public function getCategories() : array
    {
    }
    /**
     * Conversation tools are system-level infrastructure.
     * They must always be available so the assistant can communicate with the
     * user (send replies, ask clarifying questions, request confirmation for
     * destructive actions, reject out-of-scope queries) regardless of which
     * tools are enabled or disabled in the admin allow-list.
     *
     * McpHandler reads this at runtime — no tool names are hardcoded there.
     * Any future tool class that provides similar infrastructure simply overrides
     * this method to return true; no other file needs to change.
     *
     * @return bool
     */
    public function isSystem()
    {
    }
    /**
     * Executes a conversational tool.
     * Since these tools don't perform backend actions, this method simply
     * packages the provided arguments into a structured array for the MCP server
     * to send to the client.
     *
     * @param string $name The name of the tool to execute.
     * @param array<string, mixed> $args The arguments for the tool (key-value pairs).
     * @return array{tool: string, arguments: array<string, mixed>}|null A structured command array or null if the tool is not found.
     */
    public function execute(string $name, array $args) : ?array
    {
    }
}