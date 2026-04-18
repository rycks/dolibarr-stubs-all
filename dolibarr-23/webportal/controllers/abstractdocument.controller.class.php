<?php

/**
 * \file        htdocs/webportal/controllers/abstractdocument.controller.class.php
 * \ingroup     webportal
 * \brief       This file is an abstract controller with shared logic to display a list of documents.
 */
/**
 * Abstract Class for Document Controllers
 * Contains the shared logic to display a table of files.
 *
 * @property DoliDB $db          Inherited from Controller
 * @property int $accessRight    Inherited from Controller
 */
abstract class AbstractDocumentController extends \Controller
{
    /**
     * Renders an HTML file browser table for a given list of files and directories.
     *
     * @param   string                               $title              The main H2 title for the page.
     * @param   array<int, array<string, mixed>>     $itemList           The list of items from dol_dir_list('all').
     * @param   string                               $emptyMessage       The message to display if the list is empty.
     * @param   array<string, callable>              $linkBuilder        An array of functions to build URLs ('dir' and 'file').
     * @return  void
     */
    protected function displayDocumentTable($title, $itemList, $emptyMessage, array $linkBuilder)
    {
    }
}