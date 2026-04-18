<?php

/**
 * \file        htdocs/webportal/controllers/abstractcard.controller.class.php
 * \ingroup     webportal
 * \brief       This file is an abstract controller with shared logic to display a card
 */
/**
 * Class for AbstractCardController
 */
abstract class AbstractCardController extends \Controller
{
    /**
     * @var FormCardWebPortal Form for card
     */
    public $formCard;
    /**
     * Display
     *
     * @return  void
     */
    public function display()
    {
    }
}