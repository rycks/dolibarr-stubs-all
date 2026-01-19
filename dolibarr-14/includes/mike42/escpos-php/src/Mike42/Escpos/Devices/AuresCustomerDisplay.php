<?php

namespace Mike42\Escpos\Devices;

/**
 * A class for sending ESC/POS-like code to an Aures customer display.
 * The display has some features that printers do not, such as an ability to "clear" the screen.
 */
class AuresCustomerDisplay extends \Mike42\Escpos\Printer
{
    /**
     * Indicates that the text should wrap and type over
     * existing text on the screen, rather than scroll.
     */
    const TEXT_OVERWRITE = 1;
    /**
     * Indicates that overflowing text should cause the
     * display to scroll vertically, like a computer terminal.
     */
    const TEXT_VERTICAL_SCROLL = 2;
    /**
     * Indicates that overflowing text should cause the
     * display to scroll horizontally, like a news ticker.
     */
    const TEXT_HORIZONTAL_SCROLL = 3;
    /**
     *
     * {@inheritdoc}
     *
     * @see \Mike42\Escpos\Printer::initialize()
     */
    public function initialize()
    {
    }
    /**
     * Selects ESC/POS mode.
     *
     * This device supports other modes, which are not used.
     */
    protected function selectEscposMode()
    {
    }
    /**
     *
     * @param int $mode
     *            The text scroll mode to use. One of
     *            AuresCustomerDisplay::TEXT_OVERWRITE,
     *            AuresCustomerDisplay::TEXT_VERTICAL_SCROLL or
     *            AuresCustomerDisplay::TEXT_HORIZONTAL_SCROLL
     */
    public function selectTextScrollMode($mode = \Mike42\Escpos\Devices\AuresCustomerDisplay::TEXT_VERTICAL_SCROLL)
    {
    }
    /**
     * Clear the display.
     */
    public function clear()
    {
    }
    /**
     * Instruct the display to show the firmware version.
     */
    public function showFirmwareVersion()
    {
    }
    /**
     * Instruct the display to begin a self-test/demo sequence.
     */
    public function selfTest()
    {
    }
    /**
     * Instruct the display to show a pre-loaded logo.
     *
     * Note that this driver is not capable of uploading a
     * logo, but that the vendor supplies software
     * which has this function.
     */
    public function showLogo()
    {
    }
    /**
     *
     * {@inheritdoc}
     *
     * @see \Mike42\Escpos\Printer::text()
     */
    public function text($str = "")
    {
    }
    /**
     *
     * {@inheritdoc}
     *
     * @see \Mike42\Escpos\Printer::feed()
     */
    public function feed($lines = 1)
    {
    }
}