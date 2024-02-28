<?php

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
/**
 * @class TCPDF
 * PHP class for generating PDF documents without requiring external extensions.
 * TCPDF project (http://www.tcpdf.org) has been originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
 * @package com.tecnick.tcpdf
 * @brief PHP class for generating PDF documents without requiring external extensions.
 * @version 6.2.26
 * @author Nicola Asuni - info@tecnick.com
 * @IgnoreAnnotation("protected")
 * @IgnoreAnnotation("public")
 * @IgnoreAnnotation("pre")
 */
class TCPDF
{
    // Protected properties
    /**
     * Current page number.
     * @protected
     */
    protected $page;
    /**
     * Current object number.
     * @protected
     */
    protected $n;
    /**
     * Array of object offsets.
     * @protected
     */
    protected $offsets = array();
    /**
     * Array of object IDs for each page.
     * @protected
     */
    protected $pageobjects = array();
    /**
     * Buffer holding in-memory PDF.
     * @protected
     */
    protected $buffer;
    /**
     * Array containing pages.
     * @protected
     */
    protected $pages = array();
    /**
     * Current document state.
     * @protected
     */
    protected $state;
    /**
     * Compression flag.
     * @protected
     */
    protected $compress;
    /**
     * Current page orientation (P = Portrait, L = Landscape).
     * @protected
     */
    protected $CurOrientation;
    /**
     * Page dimensions.
     * @protected
     */
    protected $pagedim = array();
    /**
     * Scale factor (number of points in user unit).
     * @protected
     */
    protected $k;
    /**
     * Width of page format in points.
     * @protected
     */
    protected $fwPt;
    /**
     * Height of page format in points.
     * @protected
     */
    protected $fhPt;
    /**
     * Current width of page in points.
     * @protected
     */
    protected $wPt;
    /**
     * Current height of page in points.
     * @protected
     */
    protected $hPt;
    /**
     * Current width of page in user unit.
     * @protected
     */
    protected $w;
    /**
     * Current height of page in user unit.
     * @protected
     */
    protected $h;
    /**
     * Left margin.
     * @protected
     */
    protected $lMargin;
    /**
     * Right margin.
     * @protected
     */
    protected $rMargin;
    /**
     * Cell left margin (used by regions).
     * @protected
     */
    protected $clMargin;
    /**
     * Cell right margin (used by regions).
     * @protected
     */
    protected $crMargin;
    /**
     * Top margin.
     * @protected
     */
    protected $tMargin;
    /**
     * Page break margin.
     * @protected
     */
    protected $bMargin;
    /**
     * Array of cell internal paddings ('T' => top, 'R' => right, 'B' => bottom, 'L' => left).
     * @since 5.9.000 (2010-10-03)
     * @protected
     */
    protected $cell_padding = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);
    /**
     * Array of cell margins ('T' => top, 'R' => right, 'B' => bottom, 'L' => left).
     * @since 5.9.000 (2010-10-04)
     * @protected
     */
    protected $cell_margin = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);
    /**
     * Current horizontal position in user unit for cell positioning.
     * @protected
     */
    protected $x;
    /**
     * Current vertical position in user unit for cell positioning.
     * @protected
     */
    protected $y;
    /**
     * Height of last cell printed.
     * @protected
     */
    protected $lasth;
    /**
     * Line width in user unit.
     * @protected
     */
    protected $LineWidth;
    /**
     * Array of standard font names.
     * @protected
     */
    protected $CoreFonts;
    /**
     * Array of used fonts.
     * @protected
     */
    protected $fonts = array();
    /**
     * Array of font files.
     * @protected
     */
    protected $FontFiles = array();
    /**
     * Array of encoding differences.
     * @protected
     */
    protected $diffs = array();
    /**
     * Array of used images.
     * @protected
     */
    protected $images = array();
    /**
     * Depth of the svg tag, to keep track if the svg tag is a subtag or the root tag.
     * @protected
     */
    protected $svg_tag_depth = 0;
    /**
     * Array of Annotations in pages.
     * @protected
     */
    protected $PageAnnots = array();
    /**
     * Array of internal links.
     * @protected
     */
    protected $links = array();
    /**
     * Current font family.
     * @protected
     */
    protected $FontFamily;
    /**
     * Current font style.
     * @protected
     */
    protected $FontStyle;
    /**
     * Current font ascent (distance between font top and baseline).
     * @protected
     * @since 2.8.000 (2007-03-29)
     */
    protected $FontAscent;
    /**
     * Current font descent (distance between font bottom and baseline).
     * @protected
     * @since 2.8.000 (2007-03-29)
     */
    protected $FontDescent;
    /**
     * Underlining flag.
     * @protected
     */
    protected $underline;
    /**
     * Overlining flag.
     * @protected
     */
    protected $overline;
    /**
     * Current font info.
     * @protected
     */
    protected $CurrentFont;
    /**
     * Current font size in points.
     * @protected
     */
    protected $FontSizePt;
    /**
     * Current font size in user unit.
     * @protected
     */
    protected $FontSize;
    /**
     * Commands for drawing color.
     * @protected
     */
    protected $DrawColor;
    /**
     * Commands for filling color.
     * @protected
     */
    protected $FillColor;
    /**
     * Commands for text color.
     * @protected
     */
    protected $TextColor;
    /**
     * Indicates whether fill and text colors are different.
     * @protected
     */
    protected $ColorFlag;
    /**
     * Automatic page breaking.
     * @protected
     */
    protected $AutoPageBreak;
    /**
     * Threshold used to trigger page breaks.
     * @protected
     */
    protected $PageBreakTrigger;
    /**
     * Flag set when processing page header.
     * @protected
     */
    protected $InHeader = \false;
    /**
     * Flag set when processing page footer.
     * @protected
     */
    protected $InFooter = \false;
    /**
     * Zoom display mode.
     * @protected
     */
    protected $ZoomMode;
    /**
     * Layout display mode.
     * @protected
     */
    protected $LayoutMode;
    /**
     * If true set the document information dictionary in Unicode.
     * @protected
     */
    protected $docinfounicode = \true;
    /**
     * Document title.
     * @protected
     */
    protected $title = '';
    /**
     * Document subject.
     * @protected
     */
    protected $subject = '';
    /**
     * Document author.
     * @protected
     */
    protected $author = '';
    /**
     * Document keywords.
     * @protected
     */
    protected $keywords = '';
    /**
     * Document creator.
     * @protected
     */
    protected $creator = '';
    /**
     * Starting page number.
     * @protected
     */
    protected $starting_page_number = 1;
    /**
     * The right-bottom (or left-bottom for RTL) corner X coordinate of last inserted image.
     * @since 2002-07-31
     * @author Nicola Asuni
     * @protected
     */
    protected $img_rb_x;
    /**
     * The right-bottom corner Y coordinate of last inserted image.
     * @since 2002-07-31
     * @author Nicola Asuni
     * @protected
     */
    protected $img_rb_y;
    /**
     * Adjusting factor to convert pixels to user units.
     * @since 2004-06-14
     * @author Nicola Asuni
     * @protected
     */
    protected $imgscale = 1;
    /**
     * Boolean flag set to true when the input text is unicode (require unicode fonts).
     * @since 2005-01-02
     * @author Nicola Asuni
     * @protected
     */
    protected $isunicode = \false;
    /**
     * PDF version.
     * @since 1.5.3
     * @protected
     */
    protected $PDFVersion = '1.7';
    /**
     * ID of the stored default header template (-1 = not set).
     * @protected
     */
    protected $header_xobjid = \false;
    /**
     * If true reset the Header Xobject template at each page
     * @protected
     */
    protected $header_xobj_autoreset = \false;
    /**
     * Minimum distance between header and top page margin.
     * @protected
     */
    protected $header_margin;
    /**
     * Minimum distance between footer and bottom page margin.
     * @protected
     */
    protected $footer_margin;
    /**
     * Original left margin value.
     * @protected
     * @since 1.53.0.TC013
     */
    protected $original_lMargin;
    /**
     * Original right margin value.
     * @protected
     * @since 1.53.0.TC013
     */
    protected $original_rMargin;
    /**
     * Default font used on page header.
     * @protected
     */
    protected $header_font;
    /**
     * Default font used on page footer.
     * @protected
     */
    protected $footer_font;
    /**
     * Language templates.
     * @protected
     */
    protected $l;
    /**
     * Barcode to print on page footer (only if set).
     * @protected
     */
    protected $barcode = \false;
    /**
     * Boolean flag to print/hide page header.
     * @protected
     */
    protected $print_header = \true;
    /**
     * Boolean flag to print/hide page footer.
     * @protected
     */
    protected $print_footer = \true;
    /**
     * Header image logo.
     * @protected
     */
    protected $header_logo = '';
    /**
     * Width of header image logo in user units.
     * @protected
     */
    protected $header_logo_width = 30;
    /**
     * Title to be printed on default page header.
     * @protected
     */
    protected $header_title = '';
    /**
     * String to pring on page header after title.
     * @protected
     */
    protected $header_string = '';
    /**
     * Color for header text (RGB array).
     * @since 5.9.174 (2012-07-25)
     * @protected
     */
    protected $header_text_color = array(0, 0, 0);
    /**
     * Color for header line (RGB array).
     * @since 5.9.174 (2012-07-25)
     * @protected
     */
    protected $header_line_color = array(0, 0, 0);
    /**
     * Color for footer text (RGB array).
     * @since 5.9.174 (2012-07-25)
     * @protected
     */
    protected $footer_text_color = array(0, 0, 0);
    /**
     * Color for footer line (RGB array).
     * @since 5.9.174 (2012-07-25)
     * @protected
     */
    protected $footer_line_color = array(0, 0, 0);
    /**
     * Text shadow data array.
     * @since 5.9.174 (2012-07-25)
     * @protected
     */
    protected $txtshadow = array('enabled' => \false, 'depth_w' => 0, 'depth_h' => 0, 'color' => \false, 'opacity' => 1, 'blend_mode' => 'Normal');
    /**
     * Default number of columns for html table.
     * @protected
     */
    protected $default_table_columns = 4;
    // variables for html parser
    /**
     * HTML PARSER: array to store current link and rendering styles.
     * @protected
     */
    protected $HREF = array();
    /**
     * List of available fonts on filesystem.
     * @protected
     */
    protected $fontlist = array();
    /**
     * Current foreground color.
     * @protected
     */
    protected $fgcolor;
    /**
     * HTML PARSER: array of boolean values, true in case of ordered list (OL), false otherwise.
     * @protected
     */
    protected $listordered = array();
    /**
     * HTML PARSER: array count list items on nested lists.
     * @protected
     */
    protected $listcount = array();
    /**
     * HTML PARSER: current list nesting level.
     * @protected
     */
    protected $listnum = 0;
    /**
     * HTML PARSER: indent amount for lists.
     * @protected
     */
    protected $listindent = 0;
    /**
     * HTML PARSER: current list indententation level.
     * @protected
     */
    protected $listindentlevel = 0;
    /**
     * Current background color.
     * @protected
     */
    protected $bgcolor;
    /**
     * Temporary font size in points.
     * @protected
     */
    protected $tempfontsize = 10;
    /**
     * Spacer string for LI tags.
     * @protected
     */
    protected $lispacer = '';
    /**
     * Default encoding.
     * @protected
     * @since 1.53.0.TC010
     */
    protected $encoding = 'UTF-8';
    /**
     * PHP internal encoding.
     * @protected
     * @since 1.53.0.TC016
     */
    protected $internal_encoding;
    /**
     * Boolean flag to indicate if the document language is Right-To-Left.
     * @protected
     * @since 2.0.000
     */
    protected $rtl = \false;
    /**
     * Boolean flag used to force RTL or LTR string direction.
     * @protected
     * @since 2.0.000
     */
    protected $tmprtl = \false;
    // --- Variables used for document encryption:
    /**
     * IBoolean flag indicating whether document is protected.
     * @protected
     * @since 2.0.000 (2008-01-02)
     */
    protected $encrypted;
    /**
     * Array containing encryption settings.
     * @protected
     * @since 5.0.005 (2010-05-11)
     */
    protected $encryptdata = array();
    /**
     * Last RC4 key encrypted (cached for optimisation).
     * @protected
     * @since 2.0.000 (2008-01-02)
     */
    protected $last_enc_key;
    /**
     * Last RC4 computed key.
     * @protected
     * @since 2.0.000 (2008-01-02)
     */
    protected $last_enc_key_c;
    /**
     * File ID (used on document trailer).
     * @protected
     * @since 5.0.005 (2010-05-12)
     */
    protected $file_id;
    // --- bookmark ---
    /**
     * Outlines for bookmark.
     * @protected
     * @since 2.1.002 (2008-02-12)
     */
    protected $outlines = array();
    /**
     * Outline root for bookmark.
     * @protected
     * @since 2.1.002 (2008-02-12)
     */
    protected $OutlineRoot;
    // --- javascript and form ---
    /**
     * Javascript code.
     * @protected
     * @since 2.1.002 (2008-02-12)
     */
    protected $javascript = '';
    /**
     * Javascript counter.
     * @protected
     * @since 2.1.002 (2008-02-12)
     */
    protected $n_js;
    /**
     * line through state
     * @protected
     * @since 2.8.000 (2008-03-19)
     */
    protected $linethrough;
    /**
     * Array with additional document-wide usage rights for the document.
     * @protected
     * @since 5.8.014 (2010-08-23)
     */
    protected $ur = array();
    /**
     * DPI (Dot Per Inch) Document Resolution (do not change).
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected $dpi = 72;
    /**
     * Array of page numbers were a new page group was started (the page numbers are the keys of the array).
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected $newpagegroup = array();
    /**
     * Array that contains the number of pages in each page group.
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected $pagegroups = array();
    /**
     * Current page group number.
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected $currpagegroup = 0;
    /**
     * Array of transparency objects and parameters.
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected $extgstates;
    /**
     * Set the default JPEG compression quality (1-100).
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected $jpeg_quality;
    /**
     * Default cell height ratio.
     * @protected
     * @since 3.0.014 (2008-05-23)
     */
    protected $cell_height_ratio = \K_CELL_HEIGHT_RATIO;
    /**
     * PDF viewer preferences.
     * @protected
     * @since 3.1.000 (2008-06-09)
     */
    protected $viewer_preferences;
    /**
     * A name object specifying how the document should be displayed when opened.
     * @protected
     * @since 3.1.000 (2008-06-09)
     */
    protected $PageMode;
    /**
     * Array for storing gradient information.
     * @protected
     * @since 3.1.000 (2008-06-09)
     */
    protected $gradients = array();
    /**
     * Array used to store positions inside the pages buffer (keys are the page numbers).
     * @protected
     * @since 3.2.000 (2008-06-26)
     */
    protected $intmrk = array();
    /**
     * Array used to store positions inside the pages buffer (keys are the page numbers).
     * @protected
     * @since 5.7.000 (2010-08-03)
     */
    protected $bordermrk = array();
    /**
     * Array used to store page positions to track empty pages (keys are the page numbers).
     * @protected
     * @since 5.8.007 (2010-08-18)
     */
    protected $emptypagemrk = array();
    /**
     * Array used to store content positions inside the pages buffer (keys are the page numbers).
     * @protected
     * @since 4.6.021 (2009-07-20)
     */
    protected $cntmrk = array();
    /**
     * Array used to store footer positions of each page.
     * @protected
     * @since 3.2.000 (2008-07-01)
     */
    protected $footerpos = array();
    /**
     * Array used to store footer length of each page.
     * @protected
     * @since 4.0.014 (2008-07-29)
     */
    protected $footerlen = array();
    /**
     * Boolean flag to indicate if a new line is created.
     * @protected
     * @since 3.2.000 (2008-07-01)
     */
    protected $newline = \true;
    /**
     * End position of the latest inserted line.
     * @protected
     * @since 3.2.000 (2008-07-01)
     */
    protected $endlinex = 0;
    /**
     * PDF string for width value of the last line.
     * @protected
     * @since 4.0.006 (2008-07-16)
     */
    protected $linestyleWidth = '';
    /**
     * PDF string for CAP value of the last line.
     * @protected
     * @since 4.0.006 (2008-07-16)
     */
    protected $linestyleCap = '0 J';
    /**
     * PDF string for join value of the last line.
     * @protected
     * @since 4.0.006 (2008-07-16)
     */
    protected $linestyleJoin = '0 j';
    /**
     * PDF string for dash value of the last line.
     * @protected
     * @since 4.0.006 (2008-07-16)
     */
    protected $linestyleDash = '[] 0 d';
    /**
     * Boolean flag to indicate if marked-content sequence is open.
     * @protected
     * @since 4.0.013 (2008-07-28)
     */
    protected $openMarkedContent = \false;
    /**
     * Count the latest inserted vertical spaces on HTML.
     * @protected
     * @since 4.0.021 (2008-08-24)
     */
    protected $htmlvspace = 0;
    /**
     * Array of Spot colors.
     * @protected
     * @since 4.0.024 (2008-09-12)
     */
    protected $spot_colors = array();
    /**
     * Symbol used for HTML unordered list items.
     * @protected
     * @since 4.0.028 (2008-09-26)
     */
    protected $lisymbol = '';
    /**
     * String used to mark the beginning and end of EPS image blocks.
     * @protected
     * @since 4.1.000 (2008-10-18)
     */
    protected $epsmarker = 'x#!#EPS#!#x';
    /**
     * Array of transformation matrix.
     * @protected
     * @since 4.2.000 (2008-10-29)
     */
    protected $transfmatrix = array();
    /**
     * Current key for transformation matrix.
     * @protected
     * @since 4.8.005 (2009-09-17)
     */
    protected $transfmatrix_key = 0;
    /**
     * Booklet mode for double-sided pages.
     * @protected
     * @since 4.2.000 (2008-10-29)
     */
    protected $booklet = \false;
    /**
     * Epsilon value used for float calculations.
     * @protected
     * @since 4.2.000 (2008-10-29)
     */
    protected $feps = 0.005;
    /**
     * Array used for custom vertical spaces for HTML tags.
     * @protected
     * @since 4.2.001 (2008-10-30)
     */
    protected $tagvspaces = array();
    /**
     * HTML PARSER: custom indent amount for lists. Negative value means disabled.
     * @protected
     * @since 4.2.007 (2008-11-12)
     */
    protected $customlistindent = -1;
    /**
     * Boolean flag to indicate if the border of the cell sides that cross the page should be removed.
     * @protected
     * @since 4.2.010 (2008-11-14)
     */
    protected $opencell = \true;
    /**
     * Array of files to embedd.
     * @protected
     * @since 4.4.000 (2008-12-07)
     */
    protected $embeddedfiles = array();
    /**
     * Boolean flag to indicate if we are inside a PRE tag.
     * @protected
     * @since 4.4.001 (2008-12-08)
     */
    protected $premode = \false;
    /**
     * Array used to store positions of graphics transformation blocks inside the page buffer.
     * keys are the page numbers
     * @protected
     * @since 4.4.002 (2008-12-09)
     */
    protected $transfmrk = array();
    /**
     * Default color for html links.
     * @protected
     * @since 4.4.003 (2008-12-09)
     */
    protected $htmlLinkColorArray = array(0, 0, 255);
    /**
     * Default font style to add to html links.
     * @protected
     * @since 4.4.003 (2008-12-09)
     */
    protected $htmlLinkFontStyle = 'U';
    /**
     * Counts the number of pages.
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected $numpages = 0;
    /**
     * Array containing page lengths in bytes.
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected $pagelen = array();
    /**
     * Counts the number of pages.
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected $numimages = 0;
    /**
     * Store the image keys.
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected $imagekeys = array();
    /**
     * Length of the buffer in bytes.
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected $bufferlen = 0;
    /**
     * Counts the number of fonts.
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected $numfonts = 0;
    /**
     * Store the font keys.
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected $fontkeys = array();
    /**
     * Store the font object IDs.
     * @protected
     * @since 4.8.001 (2009-09-09)
     */
    protected $font_obj_ids = array();
    /**
     * Store the fage status (true when opened, false when closed).
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected $pageopen = array();
    /**
     * Default monospace font.
     * @protected
     * @since 4.5.025 (2009-03-10)
     */
    protected $default_monospaced_font = 'courier';
    /**
     * Cloned copy of the current class object.
     * @protected
     * @since 4.5.029 (2009-03-19)
     */
    protected $objcopy;
    /**
     * Array used to store the lengths of cache files.
     * @protected
     * @since 4.5.029 (2009-03-19)
     */
    protected $cache_file_length = array();
    /**
     * Table header content to be repeated on each new page.
     * @protected
     * @since 4.5.030 (2009-03-20)
     */
    protected $thead = '';
    /**
     * Margins used for table header.
     * @protected
     * @since 4.5.030 (2009-03-20)
     */
    protected $theadMargins = array();
    /**
     * Boolean flag to enable document digital signature.
     * @protected
     * @since 4.6.005 (2009-04-24)
     */
    protected $sign = \false;
    /**
     * Digital signature data.
     * @protected
     * @since 4.6.005 (2009-04-24)
     */
    protected $signature_data = array();
    /**
     * Digital signature max length.
     * @protected
     * @since 4.6.005 (2009-04-24)
     */
    protected $signature_max_length = 11742;
    /**
     * Data for digital signature appearance.
     * @protected
     * @since 5.3.011 (2010-06-16)
     */
    protected $signature_appearance = array('page' => 1, 'rect' => '0 0 0 0');
    /**
     * Array of empty digital signature appearances.
     * @protected
     * @since 5.9.101 (2011-07-06)
     */
    protected $empty_signature_appearance = array();
    /**
     * Boolean flag to enable document timestamping with TSA.
     * @protected
     * @since 6.0.085 (2014-06-19)
     */
    protected $tsa_timestamp = \false;
    /**
     * Timestamping data.
     * @protected
     * @since 6.0.085 (2014-06-19)
     */
    protected $tsa_data = array();
    /**
     * Regular expression used to find blank characters (required for word-wrapping).
     * @protected
     * @since 4.6.006 (2009-04-28)
     */
    protected $re_spaces = '/[^\\S\\xa0]/';
    /**
     * Array of $re_spaces parts.
     * @protected
     * @since 5.5.011 (2010-07-09)
     */
    protected $re_space = array('p' => '[^\\S\\xa0]', 'm' => '');
    /**
     * Digital signature object ID.
     * @protected
     * @since 4.6.022 (2009-06-23)
     */
    protected $sig_obj_id = 0;
    /**
     * ID of page objects.
     * @protected
     * @since 4.7.000 (2009-08-29)
     */
    protected $page_obj_id = array();
    /**
     * List of form annotations IDs.
     * @protected
     * @since 4.8.000 (2009-09-07)
     */
    protected $form_obj_id = array();
    /**
     * Deafult Javascript field properties. Possible values are described on official Javascript for Acrobat API reference. Annotation options can be directly specified using the 'aopt' entry.
     * @protected
     * @since 4.8.000 (2009-09-07)
     */
    protected $default_form_prop = array('lineWidth' => 1, 'borderStyle' => 'solid', 'fillColor' => array(255, 255, 255), 'strokeColor' => array(128, 128, 128));
    /**
     * Javascript objects array.
     * @protected
     * @since 4.8.000 (2009-09-07)
     */
    protected $js_objects = array();
    /**
     * Current form action (used during XHTML rendering).
     * @protected
     * @since 4.8.000 (2009-09-07)
     */
    protected $form_action = '';
    /**
     * Current form encryption type (used during XHTML rendering).
     * @protected
     * @since 4.8.000 (2009-09-07)
     */
    protected $form_enctype = 'application/x-www-form-urlencoded';
    /**
     * Current method to submit forms.
     * @protected
     * @since 4.8.000 (2009-09-07)
     */
    protected $form_mode = 'post';
    /**
     * List of fonts used on form fields (fontname => fontkey).
     * @protected
     * @since 4.8.001 (2009-09-09)
     */
    protected $annotation_fonts = array();
    /**
     * List of radio buttons parent objects.
     * @protected
     * @since 4.8.001 (2009-09-09)
     */
    protected $radiobutton_groups = array();
    /**
     * List of radio group objects IDs.
     * @protected
     * @since 4.8.001 (2009-09-09)
     */
    protected $radio_groups = array();
    /**
     * Text indentation value (used for text-indent CSS attribute).
     * @protected
     * @since 4.8.006 (2009-09-23)
     */
    protected $textindent = 0;
    /**
     * Store page number when startTransaction() is called.
     * @protected
     * @since 4.8.006 (2009-09-23)
     */
    protected $start_transaction_page = 0;
    /**
     * Store Y position when startTransaction() is called.
     * @protected
     * @since 4.9.001 (2010-03-28)
     */
    protected $start_transaction_y = 0;
    /**
     * True when we are printing the thead section on a new page.
     * @protected
     * @since 4.8.027 (2010-01-25)
     */
    protected $inthead = \false;
    /**
     * Array of column measures (width, space, starting Y position).
     * @protected
     * @since 4.9.001 (2010-03-28)
     */
    protected $columns = array();
    /**
     * Number of colums.
     * @protected
     * @since 4.9.001 (2010-03-28)
     */
    protected $num_columns = 1;
    /**
     * Current column number.
     * @protected
     * @since 4.9.001 (2010-03-28)
     */
    protected $current_column = 0;
    /**
     * Starting page for columns.
     * @protected
     * @since 4.9.001 (2010-03-28)
     */
    protected $column_start_page = 0;
    /**
     * Maximum page and column selected.
     * @protected
     * @since 5.8.000 (2010-08-11)
     */
    protected $maxselcol = array('page' => 0, 'column' => 0);
    /**
     * Array of: X difference between table cell x start and starting page margin, cellspacing, cellpadding.
     * @protected
     * @since 5.8.000 (2010-08-11)
     */
    protected $colxshift = array('x' => 0, 's' => array('H' => 0, 'V' => 0), 'p' => array('L' => 0, 'T' => 0, 'R' => 0, 'B' => 0));
    /**
     * Text rendering mode: 0 = Fill text; 1 = Stroke text; 2 = Fill, then stroke text; 3 = Neither fill nor stroke text (invisible); 4 = Fill text and add to path for clipping; 5 = Stroke text and add to path for clipping; 6 = Fill, then stroke text and add to path for clipping; 7 = Add text to path for clipping.
     * @protected
     * @since 4.9.008 (2010-04-03)
     */
    protected $textrendermode = 0;
    /**
     * Text stroke width in doc units.
     * @protected
     * @since 4.9.008 (2010-04-03)
     */
    protected $textstrokewidth = 0;
    /**
     * Current stroke color.
     * @protected
     * @since 4.9.008 (2010-04-03)
     */
    protected $strokecolor;
    /**
     * Default unit of measure for document.
     * @protected
     * @since 5.0.000 (2010-04-22)
     */
    protected $pdfunit = 'mm';
    /**
     * Boolean flag true when we are on TOC (Table Of Content) page.
     * @protected
     */
    protected $tocpage = \false;
    /**
     * Boolean flag: if true convert vector images (SVG, EPS) to raster image using GD or ImageMagick library.
     * @protected
     * @since 5.0.000 (2010-04-26)
     */
    protected $rasterize_vector_images = \false;
    /**
     * Boolean flag: if true enables font subsetting by default.
     * @protected
     * @since 5.3.002 (2010-06-07)
     */
    protected $font_subsetting = \true;
    /**
     * Array of default graphic settings.
     * @protected
     * @since 5.5.008 (2010-07-02)
     */
    protected $default_graphic_vars = array();
    /**
     * Array of XObjects.
     * @protected
     * @since 5.8.014 (2010-08-23)
     */
    protected $xobjects = array();
    /**
     * Boolean value true when we are inside an XObject.
     * @protected
     * @since 5.8.017 (2010-08-24)
     */
    protected $inxobj = \false;
    /**
     * Current XObject ID.
     * @protected
     * @since 5.8.017 (2010-08-24)
     */
    protected $xobjid = '';
    /**
     * Percentage of character stretching.
     * @protected
     * @since 5.9.000 (2010-09-29)
     */
    protected $font_stretching = 100;
    /**
     * Increases or decreases the space between characters in a text by the specified amount (tracking).
     * @protected
     * @since 5.9.000 (2010-09-29)
     */
    protected $font_spacing = 0;
    /**
     * Array of no-write regions.
     * ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right)
     * @protected
     * @since 5.9.003 (2010-10-14)
     */
    protected $page_regions = array();
    /**
     * Boolean value true when page region check is active.
     * @protected
     */
    protected $check_page_regions = \true;
    /**
     * Array of PDF layers data.
     * @protected
     * @since 5.9.102 (2011-07-13)
     */
    protected $pdflayers = array();
    /**
     * A dictionary of names and corresponding destinations (Dests key on document Catalog).
     * @protected
     * @since 5.9.097 (2011-06-23)
     */
    protected $dests = array();
    /**
     * Object ID for Named Destinations
     * @protected
     * @since 5.9.097 (2011-06-23)
     */
    protected $n_dests;
    /**
     * Embedded Files Names
     * @protected
     * @since 5.9.204 (2013-01-23)
     */
    protected $efnames = array();
    /**
     * Directory used for the last SVG image.
     * @protected
     * @since 5.0.000 (2010-05-05)
     */
    protected $svgdir = '';
    /**
     *  Deafult unit of measure for SVG.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgunit = 'px';
    /**
     * Array of SVG gradients.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svggradients = array();
    /**
     * ID of last SVG gradient.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svggradientid = 0;
    /**
     * Boolean value true when in SVG defs group.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgdefsmode = \false;
    /**
     * Array of SVG defs.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgdefs = array();
    /**
     * Boolean value true when in SVG clipPath tag.
     * @protected
     * @since 5.0.000 (2010-04-26)
     */
    protected $svgclipmode = \false;
    /**
     * Array of SVG clipPath commands.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgclippaths = array();
    /**
     * Array of SVG clipPath tranformation matrix.
     * @protected
     * @since 5.8.022 (2010-08-31)
     */
    protected $svgcliptm = array();
    /**
     * ID of last SVG clipPath.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgclipid = 0;
    /**
     * SVG text.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgtext = '';
    /**
     * SVG text properties.
     * @protected
     * @since 5.8.013 (2010-08-23)
     */
    protected $svgtextmode = array();
    /**
     * Array of SVG properties.
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected $svgstyles = array(array('alignment-baseline' => 'auto', 'baseline-shift' => 'baseline', 'clip' => 'auto', 'clip-path' => 'none', 'clip-rule' => 'nonzero', 'color' => 'black', 'color-interpolation' => 'sRGB', 'color-interpolation-filters' => 'linearRGB', 'color-profile' => 'auto', 'color-rendering' => 'auto', 'cursor' => 'auto', 'direction' => 'ltr', 'display' => 'inline', 'dominant-baseline' => 'auto', 'enable-background' => 'accumulate', 'fill' => 'black', 'fill-opacity' => 1, 'fill-rule' => 'nonzero', 'filter' => 'none', 'flood-color' => 'black', 'flood-opacity' => 1, 'font' => '', 'font-family' => 'helvetica', 'font-size' => 'medium', 'font-size-adjust' => 'none', 'font-stretch' => 'normal', 'font-style' => 'normal', 'font-variant' => 'normal', 'font-weight' => 'normal', 'glyph-orientation-horizontal' => '0deg', 'glyph-orientation-vertical' => 'auto', 'image-rendering' => 'auto', 'kerning' => 'auto', 'letter-spacing' => 'normal', 'lighting-color' => 'white', 'marker' => '', 'marker-end' => 'none', 'marker-mid' => 'none', 'marker-start' => 'none', 'mask' => 'none', 'opacity' => 1, 'overflow' => 'auto', 'pointer-events' => 'visiblePainted', 'shape-rendering' => 'auto', 'stop-color' => 'black', 'stop-opacity' => 1, 'stroke' => 'none', 'stroke-dasharray' => 'none', 'stroke-dashoffset' => 0, 'stroke-linecap' => 'butt', 'stroke-linejoin' => 'miter', 'stroke-miterlimit' => 4, 'stroke-opacity' => 1, 'stroke-width' => 1, 'text-anchor' => 'start', 'text-decoration' => 'none', 'text-rendering' => 'auto', 'unicode-bidi' => 'normal', 'visibility' => 'visible', 'word-spacing' => 'normal', 'writing-mode' => 'lr-tb', 'text-color' => 'black', 'transfmatrix' => array(1, 0, 0, 1, 0, 0)));
    /**
     * If true force sRGB color profile for all document.
     * @protected
     * @since 5.9.121 (2011-09-28)
     */
    protected $force_srgb = \false;
    /**
     * If true set the document to PDF/A mode.
     * @protected
     * @since 5.9.121 (2011-09-27)
     */
    protected $pdfa_mode = \false;
    /**
     * Document creation date-time
     * @protected
     * @since 5.9.152 (2012-03-22)
     */
    protected $doc_creation_timestamp;
    /**
     * Document modification date-time
     * @protected
     * @since 5.9.152 (2012-03-22)
     */
    protected $doc_modification_timestamp;
    /**
     * Custom XMP data.
     * @protected
     * @since 5.9.128 (2011-10-06)
     */
    protected $custom_xmp = '';
    /**
     * Overprint mode array.
     * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
     * @protected
     * @since 5.9.152 (2012-03-23)
     */
    protected $overprint = array('OP' => \false, 'op' => \false, 'OPM' => 0);
    /**
     * Alpha mode array.
     * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
     * @protected
     * @since 5.9.152 (2012-03-23)
     */
    protected $alpha = array('CA' => 1, 'ca' => 1, 'BM' => '/Normal', 'AIS' => \false);
    /**
     * Define the page boundaries boxes to be set on document.
     * @protected
     * @since 5.9.152 (2012-03-23)
     */
    protected $page_boxes = array('MediaBox', 'CropBox', 'BleedBox', 'TrimBox', 'ArtBox');
    /**
     * If true print TCPDF meta link.
     * @protected
     * @since 5.9.152 (2012-03-23)
     */
    protected $tcpdflink = \true;
    /**
     * Cache array for computed GD gamma values.
     * @protected
     * @since 5.9.1632 (2012-06-05)
     */
    protected $gdgammacache = array();
    //------------------------------------------------------------
    // METHODS
    //------------------------------------------------------------
    /**
     * This is the class constructor.
     * It allows to set up the page format, the orientation and the measure unit used in all the methods (except for the font sizes).
     *
     * IMPORTANT: Please note that this method sets the mb_internal_encoding to ASCII, so if you are using the mbstring module functions with TCPDF you need to correctly set/unset the mb_internal_encoding when needed.
     *
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or Portrait (default)</li><li>L or Landscape</li><li>'' (empty string) for automatic orientation</li></ul>
     * @param $unit (string) User measure unit. Possible values are:<ul><li>pt: point</li><li>mm: millimeter (default)</li><li>cm: centimeter</li><li>in: inch</li></ul><br />A point equals 1/72 of inch, that is to say about 0.35 mm (an inch being 2.54 cm). This is a very common unit in typography; font sizes are expressed in that unit.
     * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
     * @param $unicode (boolean) TRUE means that the input text is unicode (default = true)
     * @param $encoding (string) Charset encoding (used only when converting back html entities); default is UTF-8.
     * @param $diskcache (boolean) DEPRECATED FEATURE
     * @param $pdfa (boolean) If TRUE set the document to PDF/A mode.
     * @public
     * @see getPageSizeFromFormat(), setPageFormat()
     */
    public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = \true, $encoding = 'UTF-8', $diskcache = \false, $pdfa = \false)
    {
    }
    /**
     * Default destructor.
     * @public
     * @since 1.53.0.TC016
     */
    public function __destruct()
    {
    }
    /**
     * Set the units of measure for the document.
     * @param $unit (string) User measure unit. Possible values are:<ul><li>pt: point</li><li>mm: millimeter (default)</li><li>cm: centimeter</li><li>in: inch</li></ul><br />A point equals 1/72 of inch, that is to say about 0.35 mm (an inch being 2.54 cm). This is a very common unit in typography; font sizes are expressed in that unit.
     * @public
     * @since 3.0.015 (2008-06-06)
     */
    public function setPageUnit($unit)
    {
    }
    /**
     * Change the format of the current page
     * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() documentation or an array of two numbers (width, height) or an array containing the following measures and options:<ul>
     * <li>['format'] = page format name (one of the above);</li>
     * <li>['Rotate'] : The number of degrees by which the page shall be rotated clockwise when displayed or printed. The value shall be a multiple of 90.</li>
     * <li>['PZ'] : The page's preferred zoom (magnification) factor.</li>
     * <li>['MediaBox'] : the boundaries of the physical medium on which the page shall be displayed or printed:</li>
     * <li>['MediaBox']['llx'] : lower-left x coordinate</li>
     * <li>['MediaBox']['lly'] : lower-left y coordinate</li>
     * <li>['MediaBox']['urx'] : upper-right x coordinate</li>
     * <li>['MediaBox']['ury'] : upper-right y coordinate</li>
     * <li>['CropBox'] : the visible region of default user space:</li>
     * <li>['CropBox']['llx'] : lower-left x coordinate</li>
     * <li>['CropBox']['lly'] : lower-left y coordinate</li>
     * <li>['CropBox']['urx'] : upper-right x coordinate</li>
     * <li>['CropBox']['ury'] : upper-right y coordinate</li>
     * <li>['BleedBox'] : the region to which the contents of the page shall be clipped when output in a production environment:</li>
     * <li>['BleedBox']['llx'] : lower-left x coordinate</li>
     * <li>['BleedBox']['lly'] : lower-left y coordinate</li>
     * <li>['BleedBox']['urx'] : upper-right x coordinate</li>
     * <li>['BleedBox']['ury'] : upper-right y coordinate</li>
     * <li>['TrimBox'] : the intended dimensions of the finished page after trimming:</li>
     * <li>['TrimBox']['llx'] : lower-left x coordinate</li>
     * <li>['TrimBox']['lly'] : lower-left y coordinate</li>
     * <li>['TrimBox']['urx'] : upper-right x coordinate</li>
     * <li>['TrimBox']['ury'] : upper-right y coordinate</li>
     * <li>['ArtBox'] : the extent of the page's meaningful content:</li>
     * <li>['ArtBox']['llx'] : lower-left x coordinate</li>
     * <li>['ArtBox']['lly'] : lower-left y coordinate</li>
     * <li>['ArtBox']['urx'] : upper-right x coordinate</li>
     * <li>['ArtBox']['ury'] : upper-right y coordinate</li>
     * <li>['BoxColorInfo'] :specify the colours and other visual characteristics that should be used in displaying guidelines on the screen for each of the possible page boundaries other than the MediaBox:</li>
     * <li>['BoxColorInfo'][BOXTYPE]['C'] : an array of three numbers in the range 0-255, representing the components in the DeviceRGB colour space.</li>
     * <li>['BoxColorInfo'][BOXTYPE]['W'] : the guideline width in default user units</li>
     * <li>['BoxColorInfo'][BOXTYPE]['S'] : the guideline style: S = Solid; D = Dashed</li>
     * <li>['BoxColorInfo'][BOXTYPE]['D'] : dash array defining a pattern of dashes and gaps to be used in drawing dashed guidelines</li>
     * <li>['trans'] : the style and duration of the visual transition to use when moving from another page to the given page during a presentation</li>
     * <li>['trans']['Dur'] : The page's display duration (also called its advance timing): the maximum length of time, in seconds, that the page shall be displayed during presentations before the viewer application shall automatically advance to the next page.</li>
     * <li>['trans']['S'] : transition style : Split, Blinds, Box, Wipe, Dissolve, Glitter, R, Fly, Push, Cover, Uncover, Fade</li>
     * <li>['trans']['D'] : The duration of the transition effect, in seconds.</li>
     * <li>['trans']['Dm'] : (Split and Blinds transition styles only) The dimension in which the specified transition effect shall occur: H = Horizontal, V = Vertical. Default value: H.</li>
     * <li>['trans']['M'] : (Split, Box and Fly transition styles only) The direction of motion for the specified transition effect: I = Inward from the edges of the page, O = Outward from the center of the pageDefault value: I.</li>
     * <li>['trans']['Di'] : (Wipe, Glitter, Fly, Cover, Uncover and Push transition styles only) The direction in which the specified transition effect shall moves, expressed in degrees counterclockwise starting from a left-to-right direction. If the value is a number, it shall be one of: 0 = Left to right, 90 = Bottom to top (Wipe only), 180 = Right to left (Wipe only), 270 = Top to bottom, 315 = Top-left to bottom-right (Glitter only). If the value is a name, it shall be None, which is relevant only for the Fly transition when the value of SS is not 1.0. Default value: 0.</li>
     * <li>['trans']['SS'] : (Fly transition style only) The starting or ending scale at which the changes shall be drawn. If M specifies an inward transition, the scale of the changes drawn shall progress from SS to 1.0 over the course of the transition. If M specifies an outward transition, the scale of the changes drawn shall progress from 1.0 to SS over the course of the transition. Default: 1.0.</li>
     * <li>['trans']['B'] : (Fly transition style only) If true, the area that shall be flown in is rectangular and opaque. Default: false.</li>
     * </ul>
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul>
     * <li>P or Portrait (default)</li>
     * <li>L or Landscape</li>
     * <li>'' (empty string) for automatic orientation</li>
     * </ul>
     * @protected
     * @since 3.0.015 (2008-06-06)
     * @see getPageSizeFromFormat()
     */
    protected function setPageFormat($format, $orientation = 'P')
    {
    }
    /**
     * Set page orientation.
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or Portrait (default)</li><li>L or Landscape</li><li>'' (empty string) for automatic orientation</li></ul>
     * @param $autopagebreak (boolean) Boolean indicating if auto-page-break mode should be on or off.
     * @param $bottommargin (float) bottom margin of the page.
     * @public
     * @since 3.0.015 (2008-06-06)
     */
    public function setPageOrientation($orientation, $autopagebreak = '', $bottommargin = '')
    {
    }
    /**
     * Set regular expression to detect withespaces or word separators.
     * The pattern delimiter must be the forward-slash character "/".
     * Some example patterns are:
     * <pre>
     * Non-Unicode or missing PCRE unicode support: "/[^\S\xa0]/"
     * Unicode and PCRE unicode support: "/(?!\xa0)[\s\p{Z}]/u"
     * Unicode and PCRE unicode support in Chinese mode: "/(?!\xa0)[\s\p{Z}\p{Lo}]/u"
     * if PCRE unicode support is turned ON ("\P" is the negate class of "\p"):
     *      \s     : any whitespace character
     *      \p{Z}  : any separator
     *      \p{Lo} : Unicode letter or ideograph that does not have lowercase and uppercase variants. Is used to chunk chinese words.
     *      \xa0   : Unicode Character 'NO-BREAK SPACE' (U+00A0)
     * </pre>
     * @param $re (string) regular expression (leave empty for default).
     * @public
     * @since 4.6.016 (2009-06-15)
     */
    public function setSpacesRE($re = '/[^\\S\\xa0]/')
    {
    }
    /**
     * Enable or disable Right-To-Left language mode
     * @param $enable (Boolean) if true enable Right-To-Left language mode.
     * @param $resetx (Boolean) if true reset the X position on direction change.
     * @public
     * @since 2.0.000 (2008-01-03)
     */
    public function setRTL($enable, $resetx = \true)
    {
    }
    /**
     * Return the RTL status
     * @return boolean
     * @public
     * @since 4.0.012 (2008-07-24)
     */
    public function getRTL()
    {
    }
    /**
     * Force temporary RTL language direction
     * @param $mode (mixed) can be false, 'L' for LTR or 'R' for RTL
     * @public
     * @since 2.1.000 (2008-01-09)
     */
    public function setTempRTL($mode)
    {
    }
    /**
     * Return the current temporary RTL status
     * @return boolean
     * @public
     * @since 4.8.014 (2009-11-04)
     */
    public function isRTLTextDir()
    {
    }
    /**
     * Set the last cell height.
     * @param $h (float) cell height.
     * @author Nicola Asuni
     * @public
     * @since 1.53.0.TC034
     */
    public function setLastH($h)
    {
    }
    /**
     * Return the cell height
     * @param $fontsize (int) Font size in internal units
     * @param $padding (boolean) If true add cell padding
     * @public
     */
    public function getCellHeight($fontsize, $padding = \TRUE)
    {
    }
    /**
     * Reset the last cell height.
     * @public
     * @since 5.9.000 (2010-10-03)
     */
    public function resetLastH()
    {
    }
    /**
     * Get the last cell height.
     * @return last cell height
     * @public
     * @since 4.0.017 (2008-08-05)
     */
    public function getLastH()
    {
    }
    /**
     * Set the adjusting factor to convert pixels to user units.
     * @param $scale (float) adjusting factor to convert pixels to user units.
     * @author Nicola Asuni
     * @public
     * @since 1.5.2
     */
    public function setImageScale($scale)
    {
    }
    /**
     * Returns the adjusting factor to convert pixels to user units.
     * @return float adjusting factor to convert pixels to user units.
     * @author Nicola Asuni
     * @public
     * @since 1.5.2
     */
    public function getImageScale()
    {
    }
    /**
     * Returns an array of page dimensions:
     * <ul><li>$this->pagedim[$this->page]['w'] = page width in points</li><li>$this->pagedim[$this->page]['h'] = height in points</li><li>$this->pagedim[$this->page]['wk'] = page width in user units</li><li>$this->pagedim[$this->page]['hk'] = page height in user units</li><li>$this->pagedim[$this->page]['tm'] = top margin</li><li>$this->pagedim[$this->page]['bm'] = bottom margin</li><li>$this->pagedim[$this->page]['lm'] = left margin</li><li>$this->pagedim[$this->page]['rm'] = right margin</li><li>$this->pagedim[$this->page]['pb'] = auto page break</li><li>$this->pagedim[$this->page]['or'] = page orientation</li><li>$this->pagedim[$this->page]['olm'] = original left margin</li><li>$this->pagedim[$this->page]['orm'] = original right margin</li><li>$this->pagedim[$this->page]['Rotate'] = The number of degrees by which the page shall be rotated clockwise when displayed or printed. The value shall be a multiple of 90.</li><li>$this->pagedim[$this->page]['PZ'] = The page's preferred zoom (magnification) factor.</li><li>$this->pagedim[$this->page]['trans'] : the style and duration of the visual transition to use when moving from another page to the given page during a presentation<ul><li>$this->pagedim[$this->page]['trans']['Dur'] = The page's display duration (also called its advance timing): the maximum length of time, in seconds, that the page shall be displayed during presentations before the viewer application shall automatically advance to the next page.</li><li>$this->pagedim[$this->page]['trans']['S'] = transition style : Split, Blinds, Box, Wipe, Dissolve, Glitter, R, Fly, Push, Cover, Uncover, Fade</li><li>$this->pagedim[$this->page]['trans']['D'] = The duration of the transition effect, in seconds.</li><li>$this->pagedim[$this->page]['trans']['Dm'] = (Split and Blinds transition styles only) The dimension in which the specified transition effect shall occur: H = Horizontal, V = Vertical. Default value: H.</li><li>$this->pagedim[$this->page]['trans']['M'] = (Split, Box and Fly transition styles only) The direction of motion for the specified transition effect: I = Inward from the edges of the page, O = Outward from the center of the pageDefault value: I.</li><li>$this->pagedim[$this->page]['trans']['Di'] = (Wipe, Glitter, Fly, Cover, Uncover and Push transition styles only) The direction in which the specified transition effect shall moves, expressed in degrees counterclockwise starting from a left-to-right direction. If the value is a number, it shall be one of: 0 = Left to right, 90 = Bottom to top (Wipe only), 180 = Right to left (Wipe only), 270 = Top to bottom, 315 = Top-left to bottom-right (Glitter only). If the value is a name, it shall be None, which is relevant only for the Fly transition when the value of SS is not 1.0. Default value: 0.</li><li>$this->pagedim[$this->page]['trans']['SS'] = (Fly transition style only) The starting or ending scale at which the changes shall be drawn. If M specifies an inward transition, the scale of the changes drawn shall progress from SS to 1.0 over the course of the transition. If M specifies an outward transition, the scale of the changes drawn shall progress from 1.0 to SS over the course of the transition. Default: 1.0. </li><li>$this->pagedim[$this->page]['trans']['B'] = (Fly transition style only) If true, the area that shall be flown in is rectangular and opaque. Default: false.</li></ul></li><li>$this->pagedim[$this->page]['MediaBox'] : the boundaries of the physical medium on which the page shall be displayed or printed<ul><li>$this->pagedim[$this->page]['MediaBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['MediaBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['MediaBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['MediaBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['CropBox'] : the visible region of default user space<ul><li>$this->pagedim[$this->page]['CropBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['CropBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['CropBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['CropBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['BleedBox'] : the region to which the contents of the page shall be clipped when output in a production environment<ul><li>$this->pagedim[$this->page]['BleedBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['BleedBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['BleedBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['BleedBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['TrimBox'] : the intended dimensions of the finished page after trimming<ul><li>$this->pagedim[$this->page]['TrimBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['TrimBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['TrimBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['TrimBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['ArtBox'] : the extent of the page's meaningful content<ul><li>$this->pagedim[$this->page]['ArtBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['ArtBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['ArtBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['ArtBox']['ury'] = upper-right y coordinate in points</li></ul></li></ul>
     * @param $pagenum (int) page number (empty = current page)
     * @return array of page dimensions.
     * @author Nicola Asuni
     * @public
     * @since 4.5.027 (2009-03-16)
     */
    public function getPageDimensions($pagenum = '')
    {
    }
    /**
     * Returns the page width in units.
     * @param $pagenum (int) page number (empty = current page)
     * @return int page width.
     * @author Nicola Asuni
     * @public
     * @since 1.5.2
     * @see getPageDimensions()
     */
    public function getPageWidth($pagenum = '')
    {
    }
    /**
     * Returns the page height in units.
     * @param $pagenum (int) page number (empty = current page)
     * @return int page height.
     * @author Nicola Asuni
     * @public
     * @since 1.5.2
     * @see getPageDimensions()
     */
    public function getPageHeight($pagenum = '')
    {
    }
    /**
     * Returns the page break margin.
     * @param $pagenum (int) page number (empty = current page)
     * @return int page break margin.
     * @author Nicola Asuni
     * @public
     * @since 1.5.2
     * @see getPageDimensions()
     */
    public function getBreakMargin($pagenum = '')
    {
    }
    /**
     * Returns the scale factor (number of points in user unit).
     * @return int scale factor.
     * @author Nicola Asuni
     * @public
     * @since 1.5.2
     */
    public function getScaleFactor()
    {
    }
    /**
     * Defines the left, top and right margins.
     * @param $left (float) Left margin.
     * @param $top (float) Top margin.
     * @param $right (float) Right margin. Default value is the left one.
     * @param $keepmargins (boolean) if true overwrites the default page margins
     * @public
     * @since 1.0
     * @see SetLeftMargin(), SetTopMargin(), SetRightMargin(), SetAutoPageBreak()
     */
    public function SetMargins($left, $top, $right = -1, $keepmargins = \false)
    {
    }
    /**
     * Defines the left margin. The method can be called before creating the first page. If the current abscissa gets out of page, it is brought back to the margin.
     * @param $margin (float) The margin.
     * @public
     * @since 1.4
     * @see SetTopMargin(), SetRightMargin(), SetAutoPageBreak(), SetMargins()
     */
    public function SetLeftMargin($margin)
    {
    }
    /**
     * Defines the top margin. The method can be called before creating the first page.
     * @param $margin (float) The margin.
     * @public
     * @since 1.5
     * @see SetLeftMargin(), SetRightMargin(), SetAutoPageBreak(), SetMargins()
     */
    public function SetTopMargin($margin)
    {
    }
    /**
     * Defines the right margin. The method can be called before creating the first page.
     * @param $margin (float) The margin.
     * @public
     * @since 1.5
     * @see SetLeftMargin(), SetTopMargin(), SetAutoPageBreak(), SetMargins()
     */
    public function SetRightMargin($margin)
    {
    }
    /**
     * Set the same internal Cell padding for top, right, bottom, left-
     * @param $pad (float) internal padding.
     * @public
     * @since 2.1.000 (2008-01-09)
     * @see getCellPaddings(), setCellPaddings()
     */
    public function SetCellPadding($pad)
    {
    }
    /**
     * Set the internal Cell paddings.
     * @param $left (float) left padding
     * @param $top (float) top padding
     * @param $right (float) right padding
     * @param $bottom (float) bottom padding
     * @public
     * @since 5.9.000 (2010-10-03)
     * @see getCellPaddings(), SetCellPadding()
     */
    public function setCellPaddings($left = '', $top = '', $right = '', $bottom = '')
    {
    }
    /**
     * Get the internal Cell padding array.
     * @return array of padding values
     * @public
     * @since 5.9.000 (2010-10-03)
     * @see setCellPaddings(), SetCellPadding()
     */
    public function getCellPaddings()
    {
    }
    /**
     * Set the internal Cell margins.
     * @param $left (float) left margin
     * @param $top (float) top margin
     * @param $right (float) right margin
     * @param $bottom (float) bottom margin
     * @public
     * @since 5.9.000 (2010-10-03)
     * @see getCellMargins()
     */
    public function setCellMargins($left = '', $top = '', $right = '', $bottom = '')
    {
    }
    /**
     * Get the internal Cell margin array.
     * @return array of margin values
     * @public
     * @since 5.9.000 (2010-10-03)
     * @see setCellMargins()
     */
    public function getCellMargins()
    {
    }
    /**
     * Adjust the internal Cell padding array to take account of the line width.
     * @param $brd (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @return array of adjustments
     * @public
     * @since 5.9.000 (2010-10-03)
     */
    protected function adjustCellPadding($brd = 0)
    {
    }
    /**
     * Enables or disables the automatic page breaking mode. When enabling, the second parameter is the distance from the bottom of the page that defines the triggering limit. By default, the mode is on and the margin is 2 cm.
     * @param $auto (boolean) Boolean indicating if mode should be on or off.
     * @param $margin (float) Distance from the bottom of the page.
     * @public
     * @since 1.0
     * @see Cell(), MultiCell(), AcceptPageBreak()
     */
    public function SetAutoPageBreak($auto, $margin = 0)
    {
    }
    /**
     * Return the auto-page-break mode (true or false).
     * @return boolean auto-page-break mode
     * @public
     * @since 5.9.088
     */
    public function getAutoPageBreak()
    {
    }
    /**
     * Defines the way the document is to be displayed by the viewer.
     * @param $zoom (mixed) The zoom to use. It can be one of the following string values or a number indicating the zooming factor to use. <ul><li>fullpage: displays the entire page on screen </li><li>fullwidth: uses maximum width of window</li><li>real: uses real size (equivalent to 100% zoom)</li><li>default: uses viewer default mode</li></ul>
     * @param $layout (string) The page layout. Possible values are:<ul><li>SinglePage Display one page at a time</li><li>OneColumn Display the pages in one column</li><li>TwoColumnLeft Display the pages in two columns, with odd-numbered pages on the left</li><li>TwoColumnRight Display the pages in two columns, with odd-numbered pages on the right</li><li>TwoPageLeft (PDF 1.5) Display the pages two at a time, with odd-numbered pages on the left</li><li>TwoPageRight (PDF 1.5) Display the pages two at a time, with odd-numbered pages on the right</li></ul>
     * @param $mode (string) A name object specifying how the document should be displayed when opened:<ul><li>UseNone Neither document outline nor thumbnail images visible</li><li>UseOutlines Document outline visible</li><li>UseThumbs Thumbnail images visible</li><li>FullScreen Full-screen mode, with no menu bar, window controls, or any other window visible</li><li>UseOC (PDF 1.5) Optional content group panel visible</li><li>UseAttachments (PDF 1.6) Attachments panel visible</li></ul>
     * @public
     * @since 1.2
     */
    public function SetDisplayMode($zoom, $layout = 'SinglePage', $mode = 'UseNone')
    {
    }
    /**
     * Activates or deactivates page compression. When activated, the internal representation of each page is compressed, which leads to a compression ratio of about 2 for the resulting document. Compression is on by default.
     * Note: the Zlib extension is required for this feature. If not present, compression will be turned off.
     * @param $compress (boolean) Boolean indicating if compression must be enabled.
     * @public
     * @since 1.4
     */
    public function SetCompression($compress = \true)
    {
    }
    /**
     * Set flag to force sRGB_IEC61966-2.1 black scaled ICC color profile for the whole document.
     * @param $mode (boolean) If true force sRGB output intent.
     * @public
     * @since 5.9.121 (2011-09-28)
     */
    public function setSRGBmode($mode = \false)
    {
    }
    /**
     * Turn on/off Unicode mode for document information dictionary (meta tags).
     * This has effect only when unicode mode is set to false.
     * @param $unicode (boolean) if true set the meta information in Unicode
     * @since 5.9.027 (2010-12-01)
     * @public
     */
    public function SetDocInfoUnicode($unicode = \true)
    {
    }
    /**
     * Defines the title of the document.
     * @param $title (string) The title.
     * @public
     * @since 1.2
     * @see SetAuthor(), SetCreator(), SetKeywords(), SetSubject()
     */
    public function SetTitle($title)
    {
    }
    /**
     * Defines the subject of the document.
     * @param $subject (string) The subject.
     * @public
     * @since 1.2
     * @see SetAuthor(), SetCreator(), SetKeywords(), SetTitle()
     */
    public function SetSubject($subject)
    {
    }
    /**
     * Defines the author of the document.
     * @param $author (string) The name of the author.
     * @public
     * @since 1.2
     * @see SetCreator(), SetKeywords(), SetSubject(), SetTitle()
     */
    public function SetAuthor($author)
    {
    }
    /**
     * Associates keywords with the document, generally in the form 'keyword1 keyword2 ...'.
     * @param $keywords (string) The list of keywords.
     * @public
     * @since 1.2
     * @see SetAuthor(), SetCreator(), SetSubject(), SetTitle()
     */
    public function SetKeywords($keywords)
    {
    }
    /**
     * Defines the creator of the document. This is typically the name of the application that generates the PDF.
     * @param $creator (string) The name of the creator.
     * @public
     * @since 1.2
     * @see SetAuthor(), SetKeywords(), SetSubject(), SetTitle()
     */
    public function SetCreator($creator)
    {
    }
    /**
     * Throw an exception or print an error message and die if the K_TCPDF_PARSER_THROW_EXCEPTION_ERROR constant is set to true.
     * @param $msg (string) The error message
     * @public
     * @since 1.0
     */
    public function Error($msg)
    {
    }
    /**
     * This method begins the generation of the PDF document.
     * It is not necessary to call it explicitly because AddPage() does it automatically.
     * Note: no page is created by this method
     * @public
     * @since 1.0
     * @see AddPage(), Close()
     */
    public function Open()
    {
    }
    /**
     * Terminates the PDF document.
     * It is not necessary to call this method explicitly because Output() does it automatically.
     * If the document contains no page, AddPage() is called to prevent from getting an invalid document.
     * @public
     * @since 1.0
     * @see Open(), Output()
     */
    public function Close()
    {
    }
    /**
     * Move pointer at the specified document page and update page dimensions.
     * @param $pnum (int) page number (1 ... numpages)
     * @param $resetmargins (boolean) if true reset left, right, top margins and Y position.
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see getPage(), lastpage(), getNumPages()
     */
    public function setPage($pnum, $resetmargins = \false)
    {
    }
    /**
     * Reset pointer to the last document page.
     * @param $resetmargins (boolean) if true reset left, right, top margins and Y position.
     * @public
     * @since 2.0.000 (2008-01-04)
     * @see setPage(), getPage(), getNumPages()
     */
    public function lastPage($resetmargins = \false)
    {
    }
    /**
     * Get current document page number.
     * @return int page number
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see setPage(), lastpage(), getNumPages()
     */
    public function getPage()
    {
    }
    /**
     * Get the total number of insered pages.
     * @return int number of pages
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see setPage(), getPage(), lastpage()
     */
    public function getNumPages()
    {
    }
    /**
     * Adds a new TOC (Table Of Content) page to the document.
     * @param $orientation (string) page orientation.
     * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
     * @param $keepmargins (boolean) if true overwrites the default page margins with the current margins
     * @public
     * @since 5.0.001 (2010-05-06)
     * @see AddPage(), startPage(), endPage(), endTOCPage()
     */
    public function addTOCPage($orientation = '', $format = '', $keepmargins = \false)
    {
    }
    /**
     * Terminate the current TOC (Table Of Content) page
     * @public
     * @since 5.0.001 (2010-05-06)
     * @see AddPage(), startPage(), endPage(), addTOCPage()
     */
    public function endTOCPage()
    {
    }
    /**
     * Adds a new page to the document. If a page is already present, the Footer() method is called first to output the footer (if enabled). Then the page is added, the current position set to the top-left corner according to the left and top margins (or top-right if in RTL mode), and Header() is called to display the header (if enabled).
     * The origin of the coordinate system is at the top-left corner (or top-right for RTL) and increasing ordinates go downwards.
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or PORTRAIT (default)</li><li>L or LANDSCAPE</li></ul>
     * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
     * @param $keepmargins (boolean) if true overwrites the default page margins with the current margins
     * @param $tocpage (boolean) if true set the tocpage state to true (the added page will be used to display Table Of Content).
     * @public
     * @since 1.0
     * @see startPage(), endPage(), addTOCPage(), endTOCPage(), getPageSizeFromFormat(), setPageFormat()
     */
    public function AddPage($orientation = '', $format = '', $keepmargins = \false, $tocpage = \false)
    {
    }
    /**
     * Terminate the current page
     * @param $tocpage (boolean) if true set the tocpage state to false (end the page used to display Table Of Content).
     * @public
     * @since 4.2.010 (2008-11-14)
     * @see AddPage(), startPage(), addTOCPage(), endTOCPage()
     */
    public function endPage($tocpage = \false)
    {
    }
    /**
     * Starts a new page to the document. The page must be closed using the endPage() function.
     * The origin of the coordinate system is at the top-left corner and increasing ordinates go downwards.
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or PORTRAIT (default)</li><li>L or LANDSCAPE</li></ul>
     * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
     * @param $tocpage (boolean) if true the page is designated to contain the Table-Of-Content.
     * @since 4.2.010 (2008-11-14)
     * @see AddPage(), endPage(), addTOCPage(), endTOCPage(), getPageSizeFromFormat(), setPageFormat()
     * @public
     */
    public function startPage($orientation = '', $format = '', $tocpage = \false)
    {
    }
    /**
     * Set start-writing mark on current page stream used to put borders and fills.
     * Borders and fills are always created after content and inserted on the position marked by this method.
     * This function must be called after calling Image() function for a background image.
     * Background images must be always inserted before calling Multicell() or WriteHTMLCell() or WriteHTML() functions.
     * @public
     * @since 4.0.016 (2008-07-30)
     */
    public function setPageMark()
    {
    }
    /**
     * Set start-writing mark on selected page.
     * Borders and fills are always created after content and inserted on the position marked by this method.
     * @param $page (int) page number (default is the current page)
     * @protected
     * @since 4.6.021 (2009-07-20)
     */
    protected function setContentMark($page = 0)
    {
    }
    /**
     * Set header data.
     * @param $ln (string) header image logo
     * @param $lw (string) header image logo width in mm
     * @param $ht (string) string to print as title on document header
     * @param $hs (string) string to print on document header
     * @param $tc (array) RGB array color for text.
     * @param $lc (array) RGB array color for line.
     * @public
     */
    public function setHeaderData($ln = '', $lw = 0, $ht = '', $hs = '', $tc = array(0, 0, 0), $lc = array(0, 0, 0))
    {
    }
    /**
     * Set footer data.
     * @param $tc (array) RGB array color for text.
     * @param $lc (array) RGB array color for line.
     * @public
     */
    public function setFooterData($tc = array(0, 0, 0), $lc = array(0, 0, 0))
    {
    }
    /**
     * Returns header data:
     * <ul><li>$ret['logo'] = logo image</li><li>$ret['logo_width'] = width of the image logo in user units</li><li>$ret['title'] = header title</li><li>$ret['string'] = header description string</li></ul>
     * @return array()
     * @public
     * @since 4.0.012 (2008-07-24)
     */
    public function getHeaderData()
    {
    }
    /**
     * Set header margin.
     * (minimum distance between header and top page margin)
     * @param $hm (int) distance in user units
     * @public
     */
    public function setHeaderMargin($hm = 10)
    {
    }
    /**
     * Returns header margin in user units.
     * @return float
     * @since 4.0.012 (2008-07-24)
     * @public
     */
    public function getHeaderMargin()
    {
    }
    /**
     * Set footer margin.
     * (minimum distance between footer and bottom page margin)
     * @param $fm (int) distance in user units
     * @public
     */
    public function setFooterMargin($fm = 10)
    {
    }
    /**
     * Returns footer margin in user units.
     * @return float
     * @since 4.0.012 (2008-07-24)
     * @public
     */
    public function getFooterMargin()
    {
    }
    /**
     * Set a flag to print page header.
     * @param $val (boolean) set to true to print the page header (default), false otherwise.
     * @public
     */
    public function setPrintHeader($val = \true)
    {
    }
    /**
     * Set a flag to print page footer.
     * @param $val (boolean) set to true to print the page footer (default), false otherwise.
     * @public
     */
    public function setPrintFooter($val = \true)
    {
    }
    /**
     * Return the right-bottom (or left-bottom for RTL) corner X coordinate of last inserted image
     * @return float
     * @public
     */
    public function getImageRBX()
    {
    }
    /**
     * Return the right-bottom (or left-bottom for RTL) corner Y coordinate of last inserted image
     * @return float
     * @public
     */
    public function getImageRBY()
    {
    }
    /**
     * Reset the xobject template used by Header() method.
     * @public
     */
    public function resetHeaderTemplate()
    {
    }
    /**
     * Set a flag to automatically reset the xobject template used by Header() method at each page.
     * @param $val (boolean) set to true to reset Header xobject template at each page, false otherwise.
     * @public
     */
    public function setHeaderTemplateAutoreset($val = \true)
    {
    }
    /**
     * This method is used to render the page header.
     * It is automatically called by AddPage() and could be overwritten in your own inherited class.
     * @public
     */
    public function Header()
    {
    }
    /**
     * This method is used to render the page footer.
     * It is automatically called by AddPage() and could be overwritten in your own inherited class.
     * @public
     */
    public function Footer()
    {
    }
    /**
     * This method is used to render the page header.
     * @protected
     * @since 4.0.012 (2008-07-24)
     */
    protected function setHeader()
    {
    }
    /**
     * This method is used to render the page footer.
     * @protected
     * @since 4.0.012 (2008-07-24)
     */
    protected function setFooter()
    {
    }
    /**
     * Check if we are on the page body (excluding page header and footer).
     * @return true if we are not in page header nor in page footer, false otherwise.
     * @protected
     * @since 5.9.091 (2011-06-15)
     */
    protected function inPageBody()
    {
    }
    /**
     * This method is used to render the table header on new page (if any).
     * @protected
     * @since 4.5.030 (2009-03-25)
     */
    protected function setTableHeader()
    {
    }
    /**
     * Returns the current page number.
     * @return int page number
     * @public
     * @since 1.0
     * @see getAliasNbPages()
     */
    public function PageNo()
    {
    }
    /**
     * Returns the array of spot colors.
     * @return (array) Spot colors array.
     * @public
     * @since 6.0.038 (2013-09-30)
     */
    public function getAllSpotColors()
    {
    }
    /**
     * Defines a new spot color.
     * It can be expressed in RGB components or gray scale.
     * The method can be called before the first page is created and the value is retained from page to page.
     * @param $name (string) Full name of the spot color.
     * @param $c (float) Cyan color for CMYK. Value between 0 and 100.
     * @param $m (float) Magenta color for CMYK. Value between 0 and 100.
     * @param $y (float) Yellow color for CMYK. Value between 0 and 100.
     * @param $k (float) Key (Black) color for CMYK. Value between 0 and 100.
     * @public
     * @since 4.0.024 (2008-09-12)
     * @see SetDrawSpotColor(), SetFillSpotColor(), SetTextSpotColor()
     */
    public function AddSpotColor($name, $c, $m, $y, $k)
    {
    }
    /**
     * Set the spot color for the specified type ('draw', 'fill', 'text').
     * @param $type (string) Type of object affected by this color: ('draw', 'fill', 'text').
     * @param $name (string) Name of the spot color.
     * @param $tint (float) Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
     * @return (string) PDF color command.
     * @public
     * @since 5.9.125 (2011-10-03)
     */
    public function setSpotColor($type, $name, $tint = 100)
    {
    }
    /**
     * Defines the spot color used for all drawing operations (lines, rectangles and cell borders).
     * @param $name (string) Name of the spot color.
     * @param $tint (float) Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
     * @public
     * @since 4.0.024 (2008-09-12)
     * @see AddSpotColor(), SetFillSpotColor(), SetTextSpotColor()
     */
    public function SetDrawSpotColor($name, $tint = 100)
    {
    }
    /**
     * Defines the spot color used for all filling operations (filled rectangles and cell backgrounds).
     * @param $name (string) Name of the spot color.
     * @param $tint (float) Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
     * @public
     * @since 4.0.024 (2008-09-12)
     * @see AddSpotColor(), SetDrawSpotColor(), SetTextSpotColor()
     */
    public function SetFillSpotColor($name, $tint = 100)
    {
    }
    /**
     * Defines the spot color used for text.
     * @param $name (string) Name of the spot color.
     * @param $tint (int) Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
     * @public
     * @since 4.0.024 (2008-09-12)
     * @see AddSpotColor(), SetDrawSpotColor(), SetFillSpotColor()
     */
    public function SetTextSpotColor($name, $tint = 100)
    {
    }
    /**
     * Set the color array for the specified type ('draw', 'fill', 'text').
     * It can be expressed in RGB, CMYK or GRAY SCALE components.
     * The method can be called before the first page is created and the value is retained from page to page.
     * @param $type (string) Type of object affected by this color: ('draw', 'fill', 'text').
     * @param $color (array) Array of colors (1=gray, 3=RGB, 4=CMYK or 5=spotcolor=CMYK+name values).
     * @param $ret (boolean) If true do not send the PDF command.
     * @return (string) The PDF command or empty string.
     * @public
     * @since 3.1.000 (2008-06-11)
     */
    public function setColorArray($type, $color, $ret = \false)
    {
    }
    /**
     * Defines the color used for all drawing operations (lines, rectangles and cell borders).
     * It can be expressed in RGB, CMYK or GRAY SCALE components.
     * The method can be called before the first page is created and the value is retained from page to page.
     * @param $color (array) Array of colors (1, 3 or 4 values).
     * @param $ret (boolean) If true do not send the PDF command.
     * @return string the PDF command
     * @public
     * @since 3.1.000 (2008-06-11)
     * @see SetDrawColor()
     */
    public function SetDrawColorArray($color, $ret = \false)
    {
    }
    /**
     * Defines the color used for all filling operations (filled rectangles and cell backgrounds).
     * It can be expressed in RGB, CMYK or GRAY SCALE components.
     * The method can be called before the first page is created and the value is retained from page to page.
     * @param $color (array) Array of colors (1, 3 or 4 values).
     * @param $ret (boolean) If true do not send the PDF command.
     * @public
     * @since 3.1.000 (2008-6-11)
     * @see SetFillColor()
     */
    public function SetFillColorArray($color, $ret = \false)
    {
    }
    /**
     * Defines the color used for text. It can be expressed in RGB components or gray scale.
     * The method can be called before the first page is created and the value is retained from page to page.
     * @param $color (array) Array of colors (1, 3 or 4 values).
     * @param $ret (boolean) If true do not send the PDF command.
     * @public
     * @since 3.1.000 (2008-6-11)
     * @see SetFillColor()
     */
    public function SetTextColorArray($color, $ret = \false)
    {
    }
    /**
     * Defines the color used by the specified type ('draw', 'fill', 'text').
     * @param $type (string) Type of object affected by this color: ('draw', 'fill', 'text').
     * @param $col1 (float) GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
     * @param $col2 (float) GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
     * @param $col3 (float) BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
     * @param $col4 (float) KEY (BLACK) color for CMYK (0-100).
     * @param $ret (boolean) If true do not send the command.
     * @param $name (string) spot color name (if any)
     * @return (string) The PDF command or empty string.
     * @public
     * @since 5.9.125 (2011-10-03)
     */
    public function setColor($type, $col1 = 0, $col2 = -1, $col3 = -1, $col4 = -1, $ret = \false, $name = '')
    {
    }
    /**
     * Defines the color used for all drawing operations (lines, rectangles and cell borders). It can be expressed in RGB components or gray scale. The method can be called before the first page is created and the value is retained from page to page.
     * @param $col1 (float) GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
     * @param $col2 (float) GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
     * @param $col3 (float) BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
     * @param $col4 (float) KEY (BLACK) color for CMYK (0-100).
     * @param $ret (boolean) If true do not send the command.
     * @param $name (string) spot color name (if any)
     * @return string the PDF command
     * @public
     * @since 1.3
     * @see SetDrawColorArray(), SetFillColor(), SetTextColor(), Line(), Rect(), Cell(), MultiCell()
     */
    public function SetDrawColor($col1 = 0, $col2 = -1, $col3 = -1, $col4 = -1, $ret = \false, $name = '')
    {
    }
    /**
     * Defines the color used for all filling operations (filled rectangles and cell backgrounds). It can be expressed in RGB components or gray scale. The method can be called before the first page is created and the value is retained from page to page.
     * @param $col1 (float) GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
     * @param $col2 (float) GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
     * @param $col3 (float) BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
     * @param $col4 (float) KEY (BLACK) color for CMYK (0-100).
     * @param $ret (boolean) If true do not send the command.
     * @param $name (string) Spot color name (if any).
     * @return (string) The PDF command.
     * @public
     * @since 1.3
     * @see SetFillColorArray(), SetDrawColor(), SetTextColor(), Rect(), Cell(), MultiCell()
     */
    public function SetFillColor($col1 = 0, $col2 = -1, $col3 = -1, $col4 = -1, $ret = \false, $name = '')
    {
    }
    /**
     * Defines the color used for text. It can be expressed in RGB components or gray scale. The method can be called before the first page is created and the value is retained from page to page.
     * @param $col1 (float) GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
     * @param $col2 (float) GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
     * @param $col3 (float) BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
     * @param $col4 (float) KEY (BLACK) color for CMYK (0-100).
     * @param $ret (boolean) If true do not send the command.
     * @param $name (string) Spot color name (if any).
     * @return (string) Empty string.
     * @public
     * @since 1.3
     * @see SetTextColorArray(), SetDrawColor(), SetFillColor(), Text(), Cell(), MultiCell()
     */
    public function SetTextColor($col1 = 0, $col2 = -1, $col3 = -1, $col4 = -1, $ret = \false, $name = '')
    {
    }
    /**
     * Returns the length of a string in user unit. A font must be selected.<br>
     * @param $s (string) The string whose length is to be computed
     * @param $fontname (string) Family font. It can be either a name defined by AddFont() or one of the standard families. It is also possible to pass an empty string, in that case, the current family is retained.
     * @param $fontstyle (string) Font style. Possible values are (case insensitive):<ul><li>empty string: regular</li><li>B: bold</li><li>I: italic</li><li>U: underline</li><li>D: line-through</li><li>O: overline</li></ul> or any combination. The default value is regular.
     * @param $fontsize (float) Font size in points. The default value is the current size.
     * @param $getarray (boolean) if true returns an array of characters widths, if false returns the total length.
     * @return mixed int total string length or array of characted widths
     * @author Nicola Asuni
     * @public
     * @since 1.2
     */
    public function GetStringWidth($s, $fontname = '', $fontstyle = '', $fontsize = 0, $getarray = \false)
    {
    }
    /**
     * Returns the string length of an array of chars in user unit or an array of characters widths. A font must be selected.<br>
     * @param $sa (string) The array of chars whose total length is to be computed
     * @param $fontname (string) Family font. It can be either a name defined by AddFont() or one of the standard families. It is also possible to pass an empty string, in that case, the current family is retained.
     * @param $fontstyle (string) Font style. Possible values are (case insensitive):<ul><li>empty string: regular</li><li>B: bold</li><li>I: italic</li><li>U: underline</li><li>D: line through</li><li>O: overline</li></ul> or any combination. The default value is regular.
     * @param $fontsize (float) Font size in points. The default value is the current size.
     * @param $getarray (boolean) if true returns an array of characters widths, if false returns the total length.
     * @return mixed int total string length or array of characted widths
     * @author Nicola Asuni
     * @public
     * @since 2.4.000 (2008-03-06)
     */
    public function GetArrStringWidth($sa, $fontname = '', $fontstyle = '', $fontsize = 0, $getarray = \false)
    {
    }
    /**
     * Returns the length of the char in user unit for the current font considering current stretching and spacing (tracking).
     * @param $char (int) The char code whose length is to be returned
     * @param $notlast (boolean) If false ignore the font-spacing.
     * @return float char width
     * @author Nicola Asuni
     * @public
     * @since 2.4.000 (2008-03-06)
     */
    public function GetCharWidth($char, $notlast = \true)
    {
    }
    /**
     * Returns the length of the char in user unit for the current font.
     * @param $char (int) The char code whose length is to be returned
     * @return float char width
     * @author Nicola Asuni
     * @public
     * @since 5.9.000 (2010-09-28)
     */
    public function getRawCharWidth($char)
    {
    }
    /**
     * Returns the numbero of characters in a string.
     * @param $s (string) The input string.
     * @return int number of characters
     * @public
     * @since 2.0.0001 (2008-01-07)
     */
    public function GetNumChars($s)
    {
    }
    /**
     * Fill the list of available fonts ($this->fontlist).
     * @protected
     * @since 4.0.013 (2008-07-28)
     */
    protected function getFontsList()
    {
    }
    /**
     * Imports a TrueType, Type1, core, or CID0 font and makes it available.
     * It is necessary to generate a font definition file first (read /fonts/utils/README.TXT).
     * The definition file (and the font file itself when embedding) must be present either in the current directory or in the one indicated by K_PATH_FONTS if the constant is defined. If it could not be found, the error "Could not include font definition file" is generated.
     * @param $family (string) Font family. The name can be chosen arbitrarily. If it is a standard family name, it will override the corresponding font.
     * @param $style (string) Font style. Possible values are (case insensitive):<ul><li>empty string: regular (default)</li><li>B: bold</li><li>I: italic</li><li>BI or IB: bold italic</li></ul>
     * @param $fontfile (string) The font definition file. By default, the name is built from the family and style, in lower case with no spaces.
     * @return array containing the font data, or false in case of error.
     * @param $subset (mixed) if true embedd only a subset of the font (stores only the information related to the used characters); if false embedd full font; if 'default' uses the default value set using setFontSubsetting(). This option is valid only for TrueTypeUnicode fonts. If you want to enable users to change the document, set this parameter to false. If you subset the font, the person who receives your PDF would need to have your same font in order to make changes to your PDF. The file size of the PDF would also be smaller because you are embedding only part of a font.
     * @public
     * @since 1.5
     * @see SetFont(), setFontSubsetting()
     */
    public function AddFont($family, $style = '', $fontfile = '', $subset = 'default')
    {
    }
    /**
     * Sets the font used to print character strings.
     * The font can be either a standard one or a font added via the AddFont() method. Standard fonts use Windows encoding cp1252 (Western Europe).
     * The method can be called before the first page is created and the font is retained from page to page.
     * If you just wish to change the current font size, it is simpler to call SetFontSize().
     * Note: for the standard fonts, the font metric files must be accessible. There are three possibilities for this:<ul><li>They are in the current directory (the one where the running script lies)</li><li>They are in one of the directories defined by the include_path parameter</li><li>They are in the directory defined by the K_PATH_FONTS constant</li></ul><br />
     * @param $family (string) Family font. It can be either a name defined by AddFont() or one of the standard Type1 families (case insensitive):<ul><li>times (Times-Roman)</li><li>timesb (Times-Bold)</li><li>timesi (Times-Italic)</li><li>timesbi (Times-BoldItalic)</li><li>helvetica (Helvetica)</li><li>helveticab (Helvetica-Bold)</li><li>helveticai (Helvetica-Oblique)</li><li>helveticabi (Helvetica-BoldOblique)</li><li>courier (Courier)</li><li>courierb (Courier-Bold)</li><li>courieri (Courier-Oblique)</li><li>courierbi (Courier-BoldOblique)</li><li>symbol (Symbol)</li><li>zapfdingbats (ZapfDingbats)</li></ul> It is also possible to pass an empty string. In that case, the current family is retained.
     * @param $style (string) Font style. Possible values are (case insensitive):<ul><li>empty string: regular</li><li>B: bold</li><li>I: italic</li><li>U: underline</li><li>D: line through</li><li>O: overline</li></ul> or any combination. The default value is regular. Bold and italic styles do not apply to Symbol and ZapfDingbats basic fonts or other fonts when not defined.
     * @param $size (float) Font size in points. The default value is the current size. If no size has been specified since the beginning of the document, the value taken is 12
     * @param $fontfile (string) The font definition file. By default, the name is built from the family and style, in lower case with no spaces.
     * @param $subset (mixed) if true embedd only a subset of the font (stores only the information related to the used characters); if false embedd full font; if 'default' uses the default value set using setFontSubsetting(). This option is valid only for TrueTypeUnicode fonts. If you want to enable users to change the document, set this parameter to false. If you subset the font, the person who receives your PDF would need to have your same font in order to make changes to your PDF. The file size of the PDF would also be smaller because you are embedding only part of a font.
     * @param $out (boolean) if true output the font size command, otherwise only set the font properties.
     * @author Nicola Asuni
     * @public
     * @since 1.0
     * @see AddFont(), SetFontSize()
     */
    public function SetFont($family, $style = '', $size = \null, $fontfile = '', $subset = 'default', $out = \true)
    {
    }
    /**
     * Defines the size of the current font.
     * @param $size (float) The font size in points.
     * @param $out (boolean) if true output the font size command, otherwise only set the font properties.
     * @public
     * @since 1.0
     * @see SetFont()
     */
    public function SetFontSize($size, $out = \true)
    {
    }
    /**
     * Returns the bounding box of the current font in user units.
     * @return array
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function getFontBBox()
    {
    }
    /**
     * Convert a relative font measure into absolute value.
     * @param $s (int) Font measure.
     * @return float Absolute measure.
     * @since 5.9.186 (2012-09-13)
     */
    public function getAbsFontMeasure($s)
    {
    }
    /**
     * Returns the glyph bounding box of the specified character in the current font in user units.
     * @param $char (int) Input character code.
     * @return mixed array(xMin, yMin, xMax, yMax) or FALSE if not defined.
     * @since 5.9.186 (2012-09-13)
     */
    public function getCharBBox($char)
    {
    }
    /**
     * Return the font descent value
     * @param $font (string) font name
     * @param $style (string) font style
     * @param $size (float) The size (in points)
     * @return int font descent
     * @public
     * @author Nicola Asuni
     * @since 4.9.003 (2010-03-30)
     */
    public function getFontDescent($font, $style = '', $size = 0)
    {
    }
    /**
     * Return the font ascent value.
     * @param $font (string) font name
     * @param $style (string) font style
     * @param $size (float) The size (in points)
     * @return int font ascent
     * @public
     * @author Nicola Asuni
     * @since 4.9.003 (2010-03-30)
     */
    public function getFontAscent($font, $style = '', $size = 0)
    {
    }
    /**
     * Return true in the character is present in the specified font.
     * @param $char (mixed) Character to check (integer value or string)
     * @param $font (string) Font name (family name).
     * @param $style (string) Font style.
     * @return (boolean) true if the char is defined, false otherwise.
     * @public
     * @since 5.9.153 (2012-03-28)
     */
    public function isCharDefined($char, $font = '', $style = '')
    {
    }
    /**
     * Replace missing font characters on selected font with specified substitutions.
     * @param $text (string) Text to process.
     * @param $font (string) Font name (family name).
     * @param $style (string) Font style.
     * @param $subs (array) Array of possible character substitutions. The key is the character to check (integer value) and the value is a single intege value or an array of possible substitutes.
     * @return (string) Processed text.
     * @public
     * @since 5.9.153 (2012-03-28)
     */
    public function replaceMissingChars($text, $font = '', $style = '', $subs = array())
    {
    }
    /**
     * Defines the default monospaced font.
     * @param $font (string) Font name.
     * @public
     * @since 4.5.025
     */
    public function SetDefaultMonospacedFont($font)
    {
    }
    /**
     * Creates a new internal link and returns its identifier. An internal link is a clickable area which directs to another place within the document.<br />
     * The identifier can then be passed to Cell(), Write(), Image() or Link(). The destination is defined with SetLink().
     * @public
     * @since 1.5
     * @see Cell(), Write(), Image(), Link(), SetLink()
     */
    public function AddLink()
    {
    }
    /**
     * Defines the page and position a link points to.
     * @param $link (int) The link identifier returned by AddLink()
     * @param $y (float) Ordinate of target position; -1 indicates the current position. The default value is 0 (top of page)
     * @param $page (int) Number of target page; -1 indicates the current page (default value). If you prefix a page number with the * character, then this page will not be changed when adding/deleting/moving pages.
     * @public
     * @since 1.5
     * @see AddLink()
     */
    public function SetLink($link, $y = 0, $page = -1)
    {
    }
    /**
     * Puts a link on a rectangular area of the page.
     * Text or image links are generally put via Cell(), Write() or Image(), but this method can be useful for instance to define a clickable area inside an image.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $w (float) Width of the rectangle
     * @param $h (float) Height of the rectangle
     * @param $link (mixed) URL or identifier returned by AddLink()
     * @param $spaces (int) number of spaces on the text to link
     * @public
     * @since 1.5
     * @see AddLink(), Annotation(), Cell(), Write(), Image()
     */
    public function Link($x, $y, $w, $h, $link, $spaces = 0)
    {
    }
    /**
     * Puts a markup annotation on a rectangular area of the page.
     * !!!!THE ANNOTATION SUPPORT IS NOT YET FULLY IMPLEMENTED !!!!
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $w (float) Width of the rectangle
     * @param $h (float) Height of the rectangle
     * @param $text (string) annotation text or alternate content
     * @param $opt (array) array of options (see section 8.4 of PDF reference 1.7).
     * @param $spaces (int) number of spaces on the text to link
     * @public
     * @since 4.0.018 (2008-08-06)
     */
    public function Annotation($x, $y, $w, $h, $text, $opt = array('Subtype' => 'Text'), $spaces = 0)
    {
    }
    /**
     * Embedd the attached files.
     * @since 4.4.000 (2008-12-07)
     * @protected
     * @see Annotation()
     */
    protected function _putEmbeddedFiles()
    {
    }
    /**
     * Prints a text cell at the specified position.
     * This method allows to place a string precisely on the page.
     * @param $x (float) Abscissa of the cell origin
     * @param $y (float) Ordinate of the cell origin
     * @param $txt (string) String to print
     * @param $fstroke (int) outline size in user units (false = disable)
     * @param $fclip (boolean) if true activate clipping mode (you must call StartTransform() before this function and StopTransform() to stop the clipping tranformation).
     * @param $ffill (boolean) if true fills the text
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $ln (int) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
     * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
     * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $stretch (int) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
     * @param $ignore_min_height (boolean) if true ignore automatic minimum height value.
     * @param $calign (string) cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li><li>B : cell bottom</li></ul>
     * @param $valign (string) text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
     * @param $rtloff (boolean) if true uses the page top-left corner as origin of axis for $x and $y initial position.
     * @public
     * @since 1.0
     * @see Cell(), Write(), MultiCell(), WriteHTML(), WriteHTMLCell()
     */
    public function Text($x, $y, $txt, $fstroke = \false, $fclip = \false, $ffill = \true, $border = 0, $ln = 0, $align = '', $fill = \false, $link = '', $stretch = 0, $ignore_min_height = \false, $calign = 'T', $valign = 'M', $rtloff = \false)
    {
    }
    /**
     * Whenever a page break condition is met, the method is called, and the break is issued or not depending on the returned value.
     * The default implementation returns a value according to the mode selected by SetAutoPageBreak().<br />
     * This method is called automatically and should not be called directly by the application.
     * @return boolean
     * @public
     * @since 1.4
     * @see SetAutoPageBreak()
     */
    public function AcceptPageBreak()
    {
    }
    /**
     * Add page if needed.
     * @param $h (float) Cell height. Default value: 0.
     * @param $y (mixed) starting y position, leave empty for current position.
     * @param $addpage (boolean) if true add a page, otherwise only return the true/false state
     * @return boolean true in case of page break, false otherwise.
     * @since 3.2.000 (2008-07-01)
     * @protected
     */
    protected function checkPageBreak($h = 0, $y = '', $addpage = \true)
    {
    }
    /**
     * Prints a cell (rectangular area) with optional borders, background color and character string. The upper-left corner of the cell corresponds to the current position. The text can be aligned or centered. After the call, the current position moves to the right or to the next line. It is possible to put a link on the text.<br />
     * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
     * @param $w (float) Cell width. If 0, the cell extends up to the right margin.
     * @param $h (float) Cell height. Default value: 0.
     * @param $txt (string) String to print. Default value: empty string.
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $ln (int) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
     * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
     * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $stretch (int) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
     * @param $ignore_min_height (boolean) if true ignore automatic minimum height value.
     * @param $calign (string) cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>C : center</li><li>B : cell bottom</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li></ul>
     * @param $valign (string) text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
     * @public
     * @since 1.0
     * @see SetFont(), SetDrawColor(), SetFillColor(), SetTextColor(), SetLineWidth(), AddLink(), Ln(), MultiCell(), Write(), SetAutoPageBreak()
     */
    public function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = \false, $link = '', $stretch = 0, $ignore_min_height = \false, $calign = 'T', $valign = 'M')
    {
    }
    /**
     * Returns the PDF string code to print a cell (rectangular area) with optional borders, background color and character string. The upper-left corner of the cell corresponds to the current position. The text can be aligned or centered. After the call, the current position moves to the right or to the next line. It is possible to put a link on the text.<br />
     * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
     * @param $w (float) Cell width. If 0, the cell extends up to the right margin.
     * @param $h (float) Cell height. Default value: 0.
     * @param $txt (string) String to print. Default value: empty string.
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $ln (int) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
     * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
     * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $stretch (int) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
     * @param $ignore_min_height (boolean) if true ignore automatic minimum height value.
     * @param $calign (string) cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>C : center</li><li>B : cell bottom</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li></ul>
     * @param $valign (string) text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>M : middle</li><li>B : bottom</li></ul>
     * @return string containing cell code
     * @protected
     * @since 1.0
     * @see Cell()
     */
    protected function getCellCode($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = \false, $link = '', $stretch = 0, $ignore_min_height = \false, $calign = 'T', $valign = 'M')
    {
    }
    /**
     * Replace a char if is defined on the current font.
     * @param $oldchar (int) Integer code (unicode) of the character to replace.
     * @param $newchar (int) Integer code (unicode) of the new character.
     * @return int the replaced char or the old char in case the new char i not defined
     * @protected
     * @since 5.9.167 (2012-06-22)
     */
    protected function replaceChar($oldchar, $newchar)
    {
    }
    /**
     * Returns the code to draw the cell border
     * @param $x (float) X coordinate.
     * @param $y (float) Y coordinate.
     * @param $w (float) Cell width.
     * @param $h (float) Cell height.
     * @param $brd (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @return string containing cell border code
     * @protected
     * @see SetLineStyle()
     * @since 5.7.000 (2010-08-02)
     */
    protected function getCellBorder($x, $y, $w, $h, $brd)
    {
    }
    /**
     * This method allows printing text with line breaks.
     * They can be automatic (as soon as the text reaches the right border of the cell) or explicit (via the \n character). As many cells as necessary are output, one below the other.<br />
     * Text can be aligned, centered or justified. The cell block can be framed and the background painted.
     * @param $w (float) Width of cells. If 0, they extend up to the right margin of the page.
     * @param $h (float) Cell minimum height. The cell extends automatically if needed.
     * @param $txt (string) String to print
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align</li><li>C: center</li><li>R: right align</li><li>J: justification (default value when $ishtml=false)</li></ul>
     * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
     * @param $ln (int) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right</li><li>1: to the beginning of the next line [DEFAULT]</li><li>2: below</li></ul>
     * @param $x (float) x position in user units
     * @param $y (float) y position in user units
     * @param $reseth (boolean) if true reset the last cell height (default true).
     * @param $stretch (int) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
     * @param $ishtml (boolean) INTERNAL USE ONLY -- set to true if $txt is HTML content (default = false). Never set this parameter to true, use instead writeHTMLCell() or writeHTML() methods.
     * @param $autopadding (boolean) if true, uses internal padding and automatically adjust it to account for line width.
     * @param $maxh (float) maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature. This feature works only when $ishtml=false.
     * @param $valign (string) Vertical alignment of text (requires $maxh = $h > 0). Possible values are:<ul><li>T: TOP</li><li>M: middle</li><li>B: bottom</li></ul>. This feature works only when $ishtml=false and the cell must fit in a single page.
     * @param $fitcell (boolean) if true attempt to fit all the text within the cell by reducing the font size (do not work in HTML mode). $maxh must be greater than 0 and equal to $h.
     * @return int Return the number of cells or 1 for html mode.
     * @public
     * @since 1.3
     * @see SetFont(), SetDrawColor(), SetFillColor(), SetTextColor(), SetLineWidth(), Cell(), Write(), SetAutoPageBreak()
     */
    public function MultiCell($w, $h, $txt, $border = 0, $align = 'J', $fill = \false, $ln = 1, $x = '', $y = '', $reseth = \true, $stretch = 0, $ishtml = \false, $autopadding = \true, $maxh = 0, $valign = 'T', $fitcell = \false)
    {
    }
    /**
     * This method return the estimated number of lines for print a simple text string using Multicell() method.
     * @param $txt (string) String for calculating his height
     * @param $w (float) Width of cells. If 0, they extend up to the right margin of the page.
     * @param $reseth (boolean) if true reset the last cell height (default false).
     * @param $autopadding (boolean) if true, uses internal padding and automatically adjust it to account for line width (default true).
     * @param $cellpadding (float) Internal cell padding, if empty uses default cell padding.
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @return float Return the minimal height needed for multicell method for printing the $txt param.
     * @author Alexander Escalona Fern\E1ndez, Nicola Asuni
     * @public
     * @since 4.5.011
     */
    public function getNumLines($txt, $w = 0, $reseth = \false, $autopadding = \true, $cellpadding = '', $border = 0)
    {
    }
    /**
     * This method return the estimated height needed for printing a simple text string using the Multicell() method.
     * Generally, if you want to know the exact height for a block of content you can use the following alternative technique:
     * @pre
     *  // store current object
     *  $pdf->startTransaction();
     *  // store starting values
     *  $start_y = $pdf->GetY();
     *  $start_page = $pdf->getPage();
     *  // call your printing functions with your parameters
     *  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
     *  $pdf->MultiCell($w=0, $h=0, $txt, $border=1, $align='L', $fill=false, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0);
     *  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
     *  // get the new Y
     *  $end_y = $pdf->GetY();
     *  $end_page = $pdf->getPage();
     *  // calculate height
     *  $height = 0;
     *  if ($end_page == $start_page) {
     *  	$height = $end_y - $start_y;
     *  } else {
     *  	for ($page=$start_page; $page <= $end_page; ++$page) {
     *  		$this->setPage($page);
     *  		if ($page == $start_page) {
     *  			// first page
     *  			$height = $this->h - $start_y - $this->bMargin;
     *  		} elseif ($page == $end_page) {
     *  			// last page
     *  			$height = $end_y - $this->tMargin;
     *  		} else {
     *  			$height = $this->h - $this->tMargin - $this->bMargin;
     *  		}
     *  	}
     *  }
     *  // restore previous object
     *  $pdf = $pdf->rollbackTransaction();
     *
     * @param $w (float) Width of cells. If 0, they extend up to the right margin of the page.
     * @param $txt (string) String for calculating his height
     * @param $reseth (boolean) if true reset the last cell height (default false).
     * @param $autopadding (boolean) if true, uses internal padding and automatically adjust it to account for line width (default true).
     * @param $cellpadding (float) Internal cell padding, if empty uses default cell padding.
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @return float Return the minimal height needed for multicell method for printing the $txt param.
     * @author Nicola Asuni, Alexander Escalona Fern\E1ndez
     * @public
     */
    public function getStringHeight($w, $txt, $reseth = \false, $autopadding = \true, $cellpadding = '', $border = 0)
    {
    }
    /**
     * This method prints text from the current position.<br />
     * @param $h (float) Line height
     * @param $txt (string) String to print
     * @param $link (mixed) URL or identifier returned by AddLink()
     * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
     * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
     * @param $ln (boolean) if true set cursor at the bottom of the line, otherwise set cursor at the top of the line.
     * @param $stretch (int) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
     * @param $firstline (boolean) if true prints only the first line and return the remaining string.
     * @param $firstblock (boolean) if true the string is the starting of a line.
     * @param $maxh (float) maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature.
     * @param $wadj (float) first line width will be reduced by this amount (used in HTML mode).
     * @param $margin (array) margin array of the parent container
     * @return mixed Return the number of cells or the remaining string if $firstline = true.
     * @public
     * @since 1.5
     */
    public function Write($h, $txt, $link = '', $fill = \false, $align = '', $ln = \false, $stretch = 0, $firstline = \false, $firstblock = \false, $maxh = 0, $wadj = 0, $margin = '')
    {
    }
    /**
     * Returns the remaining width between the current position and margins.
     * @return int Return the remaining width
     * @protected
     */
    protected function getRemainingWidth()
    {
    }
    /**
     * Set the block dimensions accounting for page breaks and page/column fitting
     * @param $w (float) width
     * @param $h (float) height
     * @param $x (float) X coordinate
     * @param $y (float) Y coodiante
     * @param $fitonpage (boolean) if true the block is resized to not exceed page dimensions.
     * @return array($w, $h, $x, $y)
     * @protected
     * @since 5.5.009 (2010-07-05)
     */
    protected function fitBlock($w, $h, $x, $y, $fitonpage = \false)
    {
    }
    /**
     * Puts an image in the page.
     * The upper-left corner must be given.
     * The dimensions can be specified in different ways:<ul>
     * <li>explicit width and height (expressed in user unit)</li>
     * <li>one explicit dimension, the other being calculated automatically in order to keep the original proportions</li>
     * <li>no explicit dimension, in which case the image is put at 72 dpi</li></ul>
     * Supported formats are JPEG and PNG images whitout GD library and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;
     * The format can be specified explicitly or inferred from the file extension.<br />
     * It is possible to put a link on the image.<br />
     * Remark: if an image is used several times, only one copy will be embedded in the file.<br />
     * @param $file (string) Name of the file containing the image or a '@' character followed by the image data string. To link an image without embedding it on the document, set an asterisk character before the URL (i.e.: '*http://www.example.com/image.jpg').
     * @param $x (float) Abscissa of the upper-left corner (LTR) or upper-right corner (RTL).
     * @param $y (float) Ordinate of the upper-left corner (LTR) or upper-right corner (RTL).
     * @param $w (float) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $h (float) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $type (string) Image format. Possible values are (case insensitive): JPEG and PNG (whitout GD library) and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;. If not specified, the type is inferred from the file extension.
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $align (string) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
     * @param $resize (mixed) If true resize (reduce) the image to fit $w and $h (requires GD or ImageMagick library); if false do not resize; if 2 force resize in all cases (upscaling and downscaling).
     * @param $dpi (int) dot-per-inch resolution used on resize
     * @param $palign (string) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
     * @param $ismask (boolean) true if this image is a mask, false otherwise
     * @param $imgmask (mixed) image object returned by this function or false
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $fitbox (mixed) If not false scale image dimensions proportionally to fit within the ($w, $h) box. $fitbox can be true or a 2 characters string indicating the image alignment inside the box. The first character indicate the horizontal alignment (L = left, C = center, R = right) the second character indicate the vertical algnment (T = top, M = middle, B = bottom).
     * @param $hidden (boolean) If true do not display the image.
     * @param $fitonpage (boolean) If true the image is resized to not exceed page dimensions.
     * @param $alt (boolean) If true the image will be added as alternative and not directly printed (the ID of the image will be returned).
     * @param $altimgs (array) Array of alternate images IDs. Each alternative image must be an array with two values: an integer representing the image ID (the value returned by the Image method) and a boolean value to indicate if the image is the default for printing.
     * @return image information
     * @public
     * @since 1.1
     */
    public function Image($file, $x = '', $y = '', $w = 0, $h = 0, $type = '', $link = '', $align = '', $resize = \false, $dpi = 300, $palign = '', $ismask = \false, $imgmask = \false, $border = 0, $fitbox = \false, $hidden = \false, $fitonpage = \false, $alt = \false, $altimgs = array())
    {
    }
    /**
     * Extract info from a PNG image with alpha channel using the Imagick or GD library.
     * @param $file (string) Name of the file containing the image.
     * @param $x (float) Abscissa of the upper-left corner.
     * @param $y (float) Ordinate of the upper-left corner.
     * @param $wpx (float) Original width of the image in pixels.
     * @param $hpx (float) original height of the image in pixels.
     * @param $w (float) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $h (float) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $type (string) Image format. Possible values are (case insensitive): JPEG and PNG (whitout GD library) and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;. If not specified, the type is inferred from the file extension.
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $align (string) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
     * @param $resize (boolean) If true resize (reduce) the image to fit $w and $h (requires GD library).
     * @param $dpi (int) dot-per-inch resolution used on resize
     * @param $palign (string) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
     * @param $filehash (string) File hash used to build unique file names.
     * @author Nicola Asuni
     * @protected
     * @since 4.3.007 (2008-12-04)
     * @see Image()
     */
    protected function ImagePngAlpha($file, $x, $y, $wpx, $hpx, $w, $h, $type, $link, $align, $resize, $dpi, $palign, $filehash = '')
    {
    }
    /**
     * Get the GD-corrected PNG gamma value from alpha color
     * @param $img (int) GD image Resource ID.
     * @param $c (int) alpha color
     * @protected
     * @since 4.3.007 (2008-12-04)
     */
    protected function getGDgamma($img, $c)
    {
    }
    /**
     * Performs a line break.
     * The current abscissa goes back to the left margin and the ordinate increases by the amount passed in parameter.
     * @param $h (float) The height of the break. By default, the value equals the height of the last printed cell.
     * @param $cell (boolean) if true add the current left (or right o for RTL) padding to the X coordinate
     * @public
     * @since 1.0
     * @see Cell()
     */
    public function Ln($h = '', $cell = \false)
    {
    }
    /**
     * Returns the relative X value of current position.
     * The value is relative to the left border for LTR languages and to the right border for RTL languages.
     * @return float
     * @public
     * @since 1.2
     * @see SetX(), GetY(), SetY()
     */
    public function GetX()
    {
    }
    /**
     * Returns the absolute X value of current position.
     * @return float
     * @public
     * @since 1.2
     * @see SetX(), GetY(), SetY()
     */
    public function GetAbsX()
    {
    }
    /**
     * Returns the ordinate of the current position.
     * @return float
     * @public
     * @since 1.0
     * @see SetY(), GetX(), SetX()
     */
    public function GetY()
    {
    }
    /**
     * Defines the abscissa of the current position.
     * If the passed value is negative, it is relative to the right of the page (or left if language is RTL).
     * @param $x (float) The value of the abscissa in user units.
     * @param $rtloff (boolean) if true always uses the page top-left corner as origin of axis.
     * @public
     * @since 1.2
     * @see GetX(), GetY(), SetY(), SetXY()
     */
    public function SetX($x, $rtloff = \false)
    {
    }
    /**
     * Moves the current abscissa back to the left margin and sets the ordinate.
     * If the passed value is negative, it is relative to the bottom of the page.
     * @param $y (float) The value of the ordinate in user units.
     * @param $resetx (bool) if true (default) reset the X position.
     * @param $rtloff (boolean) if true always uses the page top-left corner as origin of axis.
     * @public
     * @since 1.0
     * @see GetX(), GetY(), SetY(), SetXY()
     */
    public function SetY($y, $resetx = \true, $rtloff = \false)
    {
    }
    /**
     * Defines the abscissa and ordinate of the current position.
     * If the passed values are negative, they are relative respectively to the right and bottom of the page.
     * @param $x (float) The value of the abscissa.
     * @param $y (float) The value of the ordinate.
     * @param $rtloff (boolean) if true always uses the page top-left corner as origin of axis.
     * @public
     * @since 1.2
     * @see SetX(), SetY()
     */
    public function SetXY($x, $y, $rtloff = \false)
    {
    }
    /**
     * Set the absolute X coordinate of the current pointer.
     * @param $x (float) The value of the abscissa in user units.
     * @public
     * @since 5.9.186 (2012-09-13)
     * @see setAbsX(), setAbsY(), SetAbsXY()
     */
    public function SetAbsX($x)
    {
    }
    /**
     * Set the absolute Y coordinate of the current pointer.
     * @param $y (float) (float) The value of the ordinate in user units.
     * @public
     * @since 5.9.186 (2012-09-13)
     * @see setAbsX(), setAbsY(), SetAbsXY()
     */
    public function SetAbsY($y)
    {
    }
    /**
     * Set the absolute X and Y coordinates of the current pointer.
     * @param $x (float) The value of the abscissa in user units.
     * @param $y (float) (float) The value of the ordinate in user units.
     * @public
     * @since 5.9.186 (2012-09-13)
     * @see setAbsX(), setAbsY(), SetAbsXY()
     */
    public function SetAbsXY($x, $y)
    {
    }
    /**
     * Send the document to a given destination: string, local file or browser.
     * In the last case, the plug-in may be used (if present) or a download ("Save as" dialog box) may be forced.<br />
     * The method first calls Close() if necessary to terminate the document.
     * @param $name (string) The name of the file when saved. Note that special characters are removed and blanks characters are replaced with the underscore character.
     * @param $dest (string) Destination where to send the document. It can take one of the following values:<ul><li>I: send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.</li><li>D: send to the browser and force a file download with the name given by name.</li><li>F: save to a local server file with the name given by name.</li><li>S: return the document as a string (name is ignored).</li><li>FI: equivalent to F + I option</li><li>FD: equivalent to F + D option</li><li>E: return the document as base64 mime multi-part email attachment (RFC 2045)</li></ul>
     * @return string
     * @public
     * @since 1.0
     * @see Close()
     */
    public function Output($name = 'doc.pdf', $dest = 'I')
    {
    }
    /**
     * Unset all class variables except the following critical variables.
     * @param $destroyall (boolean) if true destroys all class variables, otherwise preserves critical variables.
     * @param $preserve_objcopy (boolean) if true preserves the objcopy variable
     * @public
     * @since 4.5.016 (2009-02-24)
     */
    public function _destroy($destroyall = \false, $preserve_objcopy = \false)
    {
    }
    /**
     * Check for locale-related bug
     * @protected
     */
    protected function _dochecks()
    {
    }
    /**
     * Return an array containing variations for the basic page number alias.
     * @param $a (string) Base alias.
     * @return array of page number aliases
     * @protected
     */
    protected function getInternalPageNumberAliases($a = '')
    {
    }
    /**
     * Return an array containing all internal page aliases.
     * @return array of page number aliases
     * @protected
     */
    protected function getAllInternalPageNumberAliases()
    {
    }
    /**
     * Replace right shift page number aliases with spaces to correct right alignment.
     * This works perfectly only when using monospaced fonts.
     * @param $page (string) Page content.
     * @param $aliases (array) Array of page aliases.
     * @param $diff (int) initial difference to add.
     * @return replaced page content.
     * @protected
     */
    protected function replaceRightShiftPageNumAliases($page, $aliases, $diff)
    {
    }
    /**
     * Set page boxes to be included on page descriptions.
     * @param $boxes (array) Array of page boxes to set on document: ('MediaBox', 'CropBox', 'BleedBox', 'TrimBox', 'ArtBox').
     * @protected
     */
    protected function setPageBoxTypes($boxes)
    {
    }
    /**
     * Output pages (and replace page number aliases).
     * @protected
     */
    protected function _putpages()
    {
    }
    /**
     * Get references to page annotations.
     * @param $n (int) page number
     * @return string
     * @protected
     * @author Nicola Asuni
     * @since 5.0.010 (2010-05-17)
     */
    protected function _getannotsrefs($n)
    {
    }
    /**
     * Output annotations objects for all pages.
     * !!! THIS METHOD IS NOT YET COMPLETED !!!
     * See section 12.5 of PDF 32000_2008 reference.
     * @protected
     * @author Nicola Asuni
     * @since 4.0.018 (2008-08-06)
     */
    protected function _putannotsobjs()
    {
    }
    /**
     * Put appearance streams XObject used to define annotation's appearance states.
     * @param $w (int) annotation width
     * @param $h (int) annotation height
     * @param $stream (string) appearance stream
     * @return int object ID
     * @protected
     * @since 4.8.001 (2009-09-09)
     */
    protected function _putAPXObject($w = 0, $h = 0, $stream = '')
    {
    }
    /**
     * Output fonts.
     * @author Nicola Asuni
     * @protected
     */
    protected function _putfonts()
    {
    }
    /**
     * Adds unicode fonts.<br>
     * Based on PDF Reference 1.3 (section 5)
     * @param $font (array) font data
     * @protected
     * @author Nicola Asuni
     * @since 1.52.0.TC005 (2005-01-05)
     */
    protected function _puttruetypeunicode($font)
    {
    }
    /**
     * Output CID-0 fonts.
     * A Type 0 CIDFont contains glyph descriptions based on the Adobe Type 1 font format
     * @param $font (array) font data
     * @protected
     * @author Andrew Whitehead, Nicola Asuni, Yukihiro Nakadaira
     * @since 3.2.000 (2008-06-23)
     */
    protected function _putcidfont0($font)
    {
    }
    /**
     * Output images.
     * @protected
     */
    protected function _putimages()
    {
    }
    /**
     * Output Form XObjects Templates.
     * @author Nicola Asuni
     * @since 5.8.017 (2010-08-24)
     * @protected
     * @see startTemplate(), endTemplate(), printTemplate()
     */
    protected function _putxobjects()
    {
    }
    /**
     * Output Spot Colors Resources.
     * @protected
     * @since 4.0.024 (2008-09-12)
     */
    protected function _putspotcolors()
    {
    }
    /**
     * Return XObjects Dictionary.
     * @return string XObjects dictionary
     * @protected
     * @since 5.8.014 (2010-08-23)
     */
    protected function _getxobjectdict()
    {
    }
    /**
     * Output Resources Dictionary.
     * @protected
     */
    protected function _putresourcedict()
    {
    }
    /**
     * Output Resources.
     * @protected
     */
    protected function _putresources()
    {
    }
    /**
     * Adds some Metadata information (Document Information Dictionary)
     * (see Chapter 14.3.3 Document Information Dictionary of PDF32000_2008.pdf Reference)
     * @return int object id
     * @protected
     */
    protected function _putinfo()
    {
    }
    /**
     * Set additional XMP data to be added on the default XMP data just before the end of "x:xmpmeta" tag.
     * IMPORTANT: This data is added as-is without controls, so you have to validate your data before using this method!
     * @param $xmp (string) Custom XMP data.
     * @since 5.9.128 (2011-10-06)
     * @public
     */
    public function setExtraXMP($xmp)
    {
    }
    /**
     * Put XMP data object and return ID.
     * @return (int) The object ID.
     * @since 5.9.121 (2011-09-28)
     * @protected
     */
    protected function _putXMP()
    {
    }
    /**
     * Output Catalog.
     * @return int object id
     * @protected
     */
    protected function _putcatalog()
    {
    }
    /**
     * Output viewer preferences.
     * @return string for viewer preferences
     * @author Nicola asuni
     * @since 3.1.000 (2008-06-09)
     * @protected
     */
    protected function _putviewerpreferences()
    {
    }
    /**
     * Output PDF File Header (7.5.2).
     * @protected
     */
    protected function _putheader()
    {
    }
    /**
     * Output end of document (EOF).
     * @protected
     */
    protected function _enddoc()
    {
    }
    /**
     * Initialize a new page.
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or PORTRAIT (default)</li><li>L or LANDSCAPE</li></ul>
     * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
     * @protected
     * @see getPageSizeFromFormat(), setPageFormat()
     */
    protected function _beginpage($orientation = '', $format = '')
    {
    }
    /**
     * Mark end of page.
     * @protected
     */
    protected function _endpage()
    {
    }
    /**
     * Begin a new object and return the object number.
     * @return int object number
     * @protected
     */
    protected function _newobj()
    {
    }
    /**
     * Return the starting object string for the selected object ID.
     * @param $objid (int) Object ID (leave empty to get a new ID).
     * @return string the starting object string
     * @protected
     * @since 5.8.009 (2010-08-20)
     */
    protected function _getobj($objid = '')
    {
    }
    /**
     * Underline text.
     * @param $x (int) X coordinate
     * @param $y (int) Y coordinate
     * @param $txt (string) text to underline
     * @protected
     */
    protected function _dounderline($x, $y, $txt)
    {
    }
    /**
     * Underline for rectangular text area.
     * @param $x (int) X coordinate
     * @param $y (int) Y coordinate
     * @param $w (int) width to underline
     * @protected
     * @since 4.8.008 (2009-09-29)
     */
    protected function _dounderlinew($x, $y, $w)
    {
    }
    /**
     * Line through text.
     * @param $x (int) X coordinate
     * @param $y (int) Y coordinate
     * @param $txt (string) text to linethrough
     * @protected
     */
    protected function _dolinethrough($x, $y, $txt)
    {
    }
    /**
     * Line through for rectangular text area.
     * @param $x (int) X coordinate
     * @param $y (int) Y coordinate
     * @param $w (int) line length (width)
     * @protected
     * @since 4.9.008 (2009-09-29)
     */
    protected function _dolinethroughw($x, $y, $w)
    {
    }
    /**
     * Overline text.
     * @param $x (int) X coordinate
     * @param $y (int) Y coordinate
     * @param $txt (string) text to overline
     * @protected
     * @since 4.9.015 (2010-04-19)
     */
    protected function _dooverline($x, $y, $txt)
    {
    }
    /**
     * Overline for rectangular text area.
     * @param $x (int) X coordinate
     * @param $y (int) Y coordinate
     * @param $w (int) width to overline
     * @protected
     * @since 4.9.015 (2010-04-19)
     */
    protected function _dooverlinew($x, $y, $w)
    {
    }
    /**
     * Format a data string for meta information
     * @param $s (string) data string to escape.
     * @param $n (int) object ID
     * @return string escaped string.
     * @protected
     */
    protected function _datastring($s, $n = 0)
    {
    }
    /**
     * Set the document creation timestamp
     * @param $time (mixed) Document creation timestamp in seconds or date-time string.
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function setDocCreationTimestamp($time)
    {
    }
    /**
     * Set the document modification timestamp
     * @param $time (mixed) Document modification timestamp in seconds or date-time string.
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function setDocModificationTimestamp($time)
    {
    }
    /**
     * Returns document creation timestamp in seconds.
     * @return (int) Creation timestamp in seconds.
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function getDocCreationTimestamp()
    {
    }
    /**
     * Returns document modification timestamp in seconds.
     * @return (int) Modfication timestamp in seconds.
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function getDocModificationTimestamp()
    {
    }
    /**
     * Returns a formatted date for meta information
     * @param $n (int) Object ID.
     * @param $timestamp (int) Timestamp to convert.
     * @return string escaped date string.
     * @protected
     * @since 4.6.028 (2009-08-25)
     */
    protected function _datestring($n = 0, $timestamp = 0)
    {
    }
    /**
     * Format a text string for meta information
     * @param $s (string) string to escape.
     * @param $n (int) object ID
     * @return string escaped string.
     * @protected
     */
    protected function _textstring($s, $n = 0)
    {
    }
    /**
     * get raw output stream.
     * @param $s (string) string to output.
     * @param $n (int) object reference for encryption mode
     * @protected
     * @author Nicola Asuni
     * @since 5.5.000 (2010-06-22)
     */
    protected function _getrawstream($s, $n = 0)
    {
    }
    /**
     * Output a string to the document.
     * @param $s (string) string to output.
     * @protected
     */
    protected function _out($s)
    {
    }
    /**
     * Set header font.
     * @param $font (array) Array describing the basic font parameters: (family, style, size).
     * @public
     * @since 1.1
     */
    public function setHeaderFont($font)
    {
    }
    /**
     * Get header font.
     * @return array() Array describing the basic font parameters: (family, style, size).
     * @public
     * @since 4.0.012 (2008-07-24)
     */
    public function getHeaderFont()
    {
    }
    /**
     * Set footer font.
     * @param $font (array) Array describing the basic font parameters: (family, style, size).
     * @public
     * @since 1.1
     */
    public function setFooterFont($font)
    {
    }
    /**
     * Get Footer font.
     * @return array() Array describing the basic font parameters: (family, style, size).
     * @public
     * @since 4.0.012 (2008-07-24)
     */
    public function getFooterFont()
    {
    }
    /**
     * Set language array.
     * @param $language (array)
     * @public
     * @since 1.1
     */
    public function setLanguageArray($language)
    {
    }
    /**
     * Returns the PDF data.
     * @public
     */
    public function getPDFData()
    {
    }
    /**
     * Output anchor link.
     * @param $url (string) link URL or internal link (i.e.: &lt;a href="#23,4.5"&gt;link to page 23 at 4.5 Y position&lt;/a&gt;)
     * @param $name (string) link name
     * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
     * @param $firstline (boolean) if true prints only the first line and return the remaining string.
     * @param $color (array) array of RGB text color
     * @param $style (string) font style (U, D, B, I)
     * @param $firstblock (boolean) if true the string is the starting of a line.
     * @return the number of cells used or the remaining text if $firstline = true;
     * @public
     */
    public function addHtmlLink($url, $name, $fill = \false, $firstline = \false, $color = '', $style = -1, $firstblock = \false)
    {
    }
    /**
     * Converts pixels to User's Units.
     * @param $px (int) pixels
     * @return float value in user's unit
     * @public
     * @see setImageScale(), getImageScale()
     */
    public function pixelsToUnits($px)
    {
    }
    /**
     * Reverse function for htmlentities.
     * Convert entities in UTF-8.
     * @param $text_to_convert (string) Text to convert.
     * @return string converted text string
     * @public
     */
    public function unhtmlentities($text_to_convert)
    {
    }
    // ENCRYPTION METHODS ----------------------------------
    /**
     * Compute encryption key depending on object number where the encrypted data is stored.
     * This is used for all strings and streams without crypt filter specifier.
     * @param $n (int) object number
     * @return int object key
     * @protected
     * @author Nicola Asuni
     * @since 2.0.000 (2008-01-02)
     */
    protected function _objectkey($n)
    {
    }
    /**
     * Encrypt the input string.
     * @param $n (int) object number
     * @param $s (string) data string to encrypt
     * @return encrypted string
     * @protected
     * @author Nicola Asuni
     * @since 5.0.005 (2010-05-11)
     */
    protected function _encrypt_data($n, $s)
    {
    }
    /**
     * Put encryption on PDF document.
     * @protected
     * @author Nicola Asuni
     * @since 2.0.000 (2008-01-02)
     */
    protected function _putencryption()
    {
    }
    /**
     * Compute U value (used for encryption)
     * @return string U value
     * @protected
     * @since 2.0.000 (2008-01-02)
     * @author Nicola Asuni
     */
    protected function _Uvalue()
    {
    }
    /**
     * Compute UE value (used for encryption)
     * @return string UE value
     * @protected
     * @since 5.9.006 (2010-10-19)
     * @author Nicola Asuni
     */
    protected function _UEvalue()
    {
    }
    /**
     * Compute O value (used for encryption)
     * @return string O value
     * @protected
     * @since 2.0.000 (2008-01-02)
     * @author Nicola Asuni
     */
    protected function _Ovalue()
    {
    }
    /**
     * Compute OE value (used for encryption)
     * @return string OE value
     * @protected
     * @since 5.9.006 (2010-10-19)
     * @author Nicola Asuni
     */
    protected function _OEvalue()
    {
    }
    /**
     * Convert password for AES-256 encryption mode
     * @param $password (string) password
     * @return string password
     * @protected
     * @since 5.9.006 (2010-10-19)
     * @author Nicola Asuni
     */
    protected function _fixAES256Password($password)
    {
    }
    /**
     * Compute encryption key
     * @protected
     * @since 2.0.000 (2008-01-02)
     * @author Nicola Asuni
     */
    protected function _generateencryptionkey()
    {
    }
    /**
     * Set document protection
     * Remark: the protection against modification is for people who have the full Acrobat product.
     * If you don't set any password, the document will open as usual. If you set a user password, the PDF viewer will ask for it before displaying the document. The master password, if different from the user one, can be used to get full access.
     * Note: protecting a document requires to encrypt it, which increases the processing time a lot. This can cause a PHP time-out in some cases, especially if the document contains images or fonts.
     * @param $permissions (Array) the set of permissions (specify the ones you want to block):<ul><li>print : Print the document;</li><li>modify : Modify the contents of the document by operations other than those controlled by 'fill-forms', 'extract' and 'assemble';</li><li>copy : Copy or otherwise extract text and graphics from the document;</li><li>annot-forms : Add or modify text annotations, fill in interactive form fields, and, if 'modify' is also set, create or modify interactive form fields (including signature fields);</li><li>fill-forms : Fill in existing interactive form fields (including signature fields), even if 'annot-forms' is not specified;</li><li>extract : Extract text and graphics (in support of accessibility to users with disabilities or for other purposes);</li><li>assemble : Assemble the document (insert, rotate, or delete pages and create bookmarks or thumbnail images), even if 'modify' is not set;</li><li>print-high : Print the document to a representation from which a faithful digital copy of the PDF content could be generated. When this is not set, printing is limited to a low-level representation of the appearance, possibly of degraded quality.</li><li>owner : (inverted logic - only for public-key) when set permits change of encryption and enables all other permissions.</li></ul>
     * @param $user_pass (String) user password. Empty by default.
     * @param $owner_pass (String) owner password. If not specified, a random value is used.
     * @param $mode (int) encryption strength: 0 = RC4 40 bit; 1 = RC4 128 bit; 2 = AES 128 bit; 3 = AES 256 bit.
     * @param $pubkeys (String) array of recipients containing public-key certificates ('c') and permissions ('p'). For example: array(array('c' => 'file://../examples/data/cert/tcpdf.crt', 'p' => array('print')))
     * @public
     * @since 2.0.000 (2008-01-02)
     * @author Nicola Asuni
     */
    public function SetProtection($permissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass = '', $owner_pass = \null, $mode = 0, $pubkeys = \null)
    {
    }
    // END OF ENCRYPTION FUNCTIONS -------------------------
    // START TRANSFORMATIONS SECTION -----------------------
    /**
     * Starts a 2D tranformation saving current graphic state.
     * This function must be called before scaling, mirroring, translation, rotation and skewing.
     * Use StartTransform() before, and StopTransform() after the transformations to restore the normal behavior.
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function StartTransform()
    {
    }
    /**
     * Stops a 2D tranformation restoring previous graphic state.
     * This function must be called after scaling, mirroring, translation, rotation and skewing.
     * Use StartTransform() before, and StopTransform() after the transformations to restore the normal behavior.
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function StopTransform()
    {
    }
    /**
     * Horizontal Scaling.
     * @param $s_x (float) scaling factor for width as percent. 0 is not allowed.
     * @param $x (int) abscissa of the scaling center. Default is current x position
     * @param $y (int) ordinate of the scaling center. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function ScaleX($s_x, $x = '', $y = '')
    {
    }
    /**
     * Vertical Scaling.
     * @param $s_y (float) scaling factor for height as percent. 0 is not allowed.
     * @param $x (int) abscissa of the scaling center. Default is current x position
     * @param $y (int) ordinate of the scaling center. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function ScaleY($s_y, $x = '', $y = '')
    {
    }
    /**
     * Vertical and horizontal proportional Scaling.
     * @param $s (float) scaling factor for width and height as percent. 0 is not allowed.
     * @param $x (int) abscissa of the scaling center. Default is current x position
     * @param $y (int) ordinate of the scaling center. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function ScaleXY($s, $x = '', $y = '')
    {
    }
    /**
     * Vertical and horizontal non-proportional Scaling.
     * @param $s_x (float) scaling factor for width as percent. 0 is not allowed.
     * @param $s_y (float) scaling factor for height as percent. 0 is not allowed.
     * @param $x (int) abscissa of the scaling center. Default is current x position
     * @param $y (int) ordinate of the scaling center. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function Scale($s_x, $s_y, $x = '', $y = '')
    {
    }
    /**
     * Horizontal Mirroring.
     * @param $x (int) abscissa of the point. Default is current x position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function MirrorH($x = '')
    {
    }
    /**
     * Verical Mirroring.
     * @param $y (int) ordinate of the point. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function MirrorV($y = '')
    {
    }
    /**
     * Point reflection mirroring.
     * @param $x (int) abscissa of the point. Default is current x position
     * @param $y (int) ordinate of the point. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function MirrorP($x = '', $y = '')
    {
    }
    /**
     * Reflection against a straight line through point (x, y) with the gradient angle (angle).
     * @param $angle (float) gradient angle of the straight line. Default is 0 (horizontal line).
     * @param $x (int) abscissa of the point. Default is current x position
     * @param $y (int) ordinate of the point. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function MirrorL($angle = 0, $x = '', $y = '')
    {
    }
    /**
     * Translate graphic object horizontally.
     * @param $t_x (int) movement to the right (or left for RTL)
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function TranslateX($t_x)
    {
    }
    /**
     * Translate graphic object vertically.
     * @param $t_y (int) movement to the bottom
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function TranslateY($t_y)
    {
    }
    /**
     * Translate graphic object horizontally and vertically.
     * @param $t_x (int) movement to the right
     * @param $t_y (int) movement to the bottom
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function Translate($t_x, $t_y)
    {
    }
    /**
     * Rotate object.
     * @param $angle (float) angle in degrees for counter-clockwise rotation
     * @param $x (int) abscissa of the rotation center. Default is current x position
     * @param $y (int) ordinate of the rotation center. Default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function Rotate($angle, $x = '', $y = '')
    {
    }
    /**
     * Skew horizontally.
     * @param $angle_x (float) angle in degrees between -90 (skew to the left) and 90 (skew to the right)
     * @param $x (int) abscissa of the skewing center. default is current x position
     * @param $y (int) ordinate of the skewing center. default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function SkewX($angle_x, $x = '', $y = '')
    {
    }
    /**
     * Skew vertically.
     * @param $angle_y (float) angle in degrees between -90 (skew to the bottom) and 90 (skew to the top)
     * @param $x (int) abscissa of the skewing center. default is current x position
     * @param $y (int) ordinate of the skewing center. default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function SkewY($angle_y, $x = '', $y = '')
    {
    }
    /**
     * Skew.
     * @param $angle_x (float) angle in degrees between -90 (skew to the left) and 90 (skew to the right)
     * @param $angle_y (float) angle in degrees between -90 (skew to the bottom) and 90 (skew to the top)
     * @param $x (int) abscissa of the skewing center. default is current x position
     * @param $y (int) ordinate of the skewing center. default is current y position
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    public function Skew($angle_x, $angle_y, $x = '', $y = '')
    {
    }
    /**
     * Apply graphic transformations.
     * @param $tm (array) transformation matrix
     * @protected
     * @since 2.1.000 (2008-01-07)
     * @see StartTransform(), StopTransform()
     */
    protected function Transform($tm)
    {
    }
    // END TRANSFORMATIONS SECTION -------------------------
    // START GRAPHIC FUNCTIONS SECTION ---------------------
    // The following section is based on the code provided by David Hernandez Sanz
    /**
     * Defines the line width. By default, the value equals 0.2 mm. The method can be called before the first page is created and the value is retained from page to page.
     * @param $width (float) The width.
     * @public
     * @since 1.0
     * @see Line(), Rect(), Cell(), MultiCell()
     */
    public function SetLineWidth($width)
    {
    }
    /**
     * Returns the current the line width.
     * @return int Line width
     * @public
     * @since 2.1.000 (2008-01-07)
     * @see Line(), SetLineWidth()
     */
    public function GetLineWidth()
    {
    }
    /**
     * Set line style.
     * @param $style (array) Line style. Array with keys among the following:
     * <ul>
     *	 <li>width (float): Width of the line in user units.</li>
     *	 <li>cap (string): Type of cap to put on the line. Possible values are:
     * butt, round, square. The difference between "square" and "butt" is that
     * "square" projects a flat end past the end of the line.</li>
     *	 <li>join (string): Type of join. Possible values are: miter, round,
     * bevel.</li>
     *	 <li>dash (mixed): Dash pattern. Is 0 (without dash) or string with
     * series of length values, which are the lengths of the on and off dashes.
     * For example: "2" represents 2 on, 2 off, 2 on, 2 off, ...; "2,1" is 2 on,
     * 1 off, 2 on, 1 off, ...</li>
     *	 <li>phase (integer): Modifier on the dash pattern which is used to shift
     * the point at which the pattern starts.</li>
     *	 <li>color (array): Draw color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName).</li>
     * </ul>
     * @param $ret (boolean) if true do not send the command.
     * @return string the PDF command
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function SetLineStyle($style, $ret = \false)
    {
    }
    /**
     * Begin a new subpath by moving the current point to coordinates (x, y), omitting any connecting line segment.
     * @param $x (float) Abscissa of point.
     * @param $y (float) Ordinate of point.
     * @protected
     * @since 2.1.000 (2008-01-08)
     */
    protected function _outPoint($x, $y)
    {
    }
    /**
     * Append a straight line segment from the current point to the point (x, y).
     * The new current point shall be (x, y).
     * @param $x (float) Abscissa of end point.
     * @param $y (float) Ordinate of end point.
     * @protected
     * @since 2.1.000 (2008-01-08)
     */
    protected function _outLine($x, $y)
    {
    }
    /**
     * Append a rectangle to the current path as a complete subpath, with lower-left corner (x, y) and dimensions widthand height in user space.
     * @param $x (float) Abscissa of upper-left corner.
     * @param $y (float) Ordinate of upper-left corner.
     * @param $w (float) Width.
     * @param $h (float) Height.
     * @param $op (string) options
     * @protected
     * @since 2.1.000 (2008-01-08)
     */
    protected function _outRect($x, $y, $w, $h, $op)
    {
    }
    /**
     * Append a cubic Bezier curve to the current path. The curve shall extend from the current point to the point (x3, y3), using (x1, y1) and (x2, y2) as the Bezier control points.
     * The new current point shall be (x3, y3).
     * @param $x1 (float) Abscissa of control point 1.
     * @param $y1 (float) Ordinate of control point 1.
     * @param $x2 (float) Abscissa of control point 2.
     * @param $y2 (float) Ordinate of control point 2.
     * @param $x3 (float) Abscissa of end point.
     * @param $y3 (float) Ordinate of end point.
     * @protected
     * @since 2.1.000 (2008-01-08)
     */
    protected function _outCurve($x1, $y1, $x2, $y2, $x3, $y3)
    {
    }
    /**
     * Append a cubic Bezier curve to the current path. The curve shall extend from the current point to the point (x3, y3), using the current point and (x2, y2) as the Bezier control points.
     * The new current point shall be (x3, y3).
     * @param $x2 (float) Abscissa of control point 2.
     * @param $y2 (float) Ordinate of control point 2.
     * @param $x3 (float) Abscissa of end point.
     * @param $y3 (float) Ordinate of end point.
     * @protected
     * @since 4.9.019 (2010-04-26)
     */
    protected function _outCurveV($x2, $y2, $x3, $y3)
    {
    }
    /**
     * Append a cubic Bezier curve to the current path. The curve shall extend from the current point to the point (x3, y3), using (x1, y1) and (x3, y3) as the Bezier control points.
     * The new current point shall be (x3, y3).
     * @param $x1 (float) Abscissa of control point 1.
     * @param $y1 (float) Ordinate of control point 1.
     * @param $x3 (float) Abscissa of end point.
     * @param $y3 (float) Ordinate of end point.
     * @protected
     * @since 2.1.000 (2008-01-08)
     */
    protected function _outCurveY($x1, $y1, $x3, $y3)
    {
    }
    /**
     * Draws a line between two points.
     * @param $x1 (float) Abscissa of first point.
     * @param $y1 (float) Ordinate of first point.
     * @param $x2 (float) Abscissa of second point.
     * @param $y2 (float) Ordinate of second point.
     * @param $style (array) Line style. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @public
     * @since 1.0
     * @see SetLineWidth(), SetDrawColor(), SetLineStyle()
     */
    public function Line($x1, $y1, $x2, $y2, $style = array())
    {
    }
    /**
     * Draws a rectangle.
     * @param $x (float) Abscissa of upper-left corner.
     * @param $y (float) Ordinate of upper-left corner.
     * @param $w (float) Width.
     * @param $h (float) Height.
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $border_style (array) Border style of rectangle. Array with keys among the following:
     * <ul>
     *	 <li>all: Line style of all borders. Array like for SetLineStyle().</li>
     *	 <li>L, T, R, B or combinations: Line style of left, top, right or bottom border. Array like for SetLineStyle().</li>
     * </ul>
     * If a key is not present or is null, the correspondent border is not drawn. Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @public
     * @since 1.0
     * @see SetLineStyle()
     */
    public function Rect($x, $y, $w, $h, $style = '', $border_style = array(), $fill_color = array())
    {
    }
    /**
     * Draws a Bezier curve.
     * The Bezier curve is a tangent to the line between the control points at
     * either end of the curve.
     * @param $x0 (float) Abscissa of start point.
     * @param $y0 (float) Ordinate of start point.
     * @param $x1 (float) Abscissa of control point 1.
     * @param $y1 (float) Ordinate of control point 1.
     * @param $x2 (float) Abscissa of control point 2.
     * @param $y2 (float) Ordinate of control point 2.
     * @param $x3 (float) Abscissa of end point.
     * @param $y3 (float) Ordinate of end point.
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of curve. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @public
     * @see SetLineStyle()
     * @since 2.1.000 (2008-01-08)
     */
    public function Curve($x0, $y0, $x1, $y1, $x2, $y2, $x3, $y3, $style = '', $line_style = array(), $fill_color = array())
    {
    }
    /**
     * Draws a poly-Bezier curve.
     * Each Bezier curve segment is a tangent to the line between the control points at
     * either end of the curve.
     * @param $x0 (float) Abscissa of start point.
     * @param $y0 (float) Ordinate of start point.
     * @param $segments (float) An array of bezier descriptions. Format: array(x1, y1, x2, y2, x3, y3).
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of curve. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @public
     * @see SetLineStyle()
     * @since 3.0008 (2008-05-12)
     */
    public function Polycurve($x0, $y0, $segments, $style = '', $line_style = array(), $fill_color = array())
    {
    }
    /**
     * Draws an ellipse.
     * An ellipse is formed from n Bezier curves.
     * @param $x0 (float) Abscissa of center point.
     * @param $y0 (float) Ordinate of center point.
     * @param $rx (float) Horizontal radius.
     * @param $ry (float) Vertical radius (if ry = 0 then is a circle, see Circle()). Default value: 0.
     * @param $angle: (float) Angle oriented (anti-clockwise). Default value: 0.
     * @param $astart: (float) Angle start of draw line. Default value: 0.
     * @param $afinish: (float) Angle finish of draw line. Default value: 360.
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of ellipse. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @param $nc (integer) Number of curves used to draw a 90 degrees portion of ellipse.
     * @author Nicola Asuni
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function Ellipse($x0, $y0, $rx, $ry = '', $angle = 0, $astart = 0, $afinish = 360, $style = '', $line_style = array(), $fill_color = array(), $nc = 2)
    {
    }
    /**
     * Append an elliptical arc to the current path.
     * An ellipse is formed from n Bezier curves.
     * @param $xc (float) Abscissa of center point.
     * @param $yc (float) Ordinate of center point.
     * @param $rx (float) Horizontal radius.
     * @param $ry (float) Vertical radius (if ry = 0 then is a circle, see Circle()). Default value: 0.
     * @param $xang: (float) Angle between the X-axis and the major axis of the ellipse. Default value: 0.
     * @param $angs: (float) Angle start of draw line. Default value: 0.
     * @param $angf: (float) Angle finish of draw line. Default value: 360.
     * @param $pie (boolean) if true do not mark the border point (used to draw pie sectors).
     * @param $nc (integer) Number of curves used to draw a 90 degrees portion of ellipse.
     * @param $startpoint (boolean) if true output a starting point.
     * @param $ccw (boolean) if true draws in counter-clockwise.
     * @param $svg (boolean) if true the angles are in svg mode (already calculated).
     * @return array bounding box coordinates (x min, y min, x max, y max)
     * @author Nicola Asuni
     * @protected
     * @since 4.9.019 (2010-04-26)
     */
    protected function _outellipticalarc($xc, $yc, $rx, $ry, $xang = 0, $angs = 0, $angf = 360, $pie = \false, $nc = 2, $startpoint = \true, $ccw = \true, $svg = \false)
    {
    }
    /**
     * Draws a circle.
     * A circle is formed from n Bezier curves.
     * @param $x0 (float) Abscissa of center point.
     * @param $y0 (float) Ordinate of center point.
     * @param $r (float) Radius.
     * @param $angstr: (float) Angle start of draw line. Default value: 0.
     * @param $angend: (float) Angle finish of draw line. Default value: 360.
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of circle. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(red, green, blue). Default value: default color (empty array).
     * @param $nc (integer) Number of curves used to draw a 90 degrees portion of circle.
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function Circle($x0, $y0, $r, $angstr = 0, $angend = 360, $style = '', $line_style = array(), $fill_color = array(), $nc = 2)
    {
    }
    /**
     * Draws a polygonal line
     * @param $p (array) Points 0 to ($np - 1). Array with values (x0, y0, x1, y1,..., x(np-1), y(np - 1))
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of polygon. Array with keys among the following:
     * <ul>
     *	 <li>all: Line style of all lines. Array like for SetLineStyle().</li>
     *	 <li>0 to ($np - 1): Line style of each line. Array like for SetLineStyle().</li>
     * </ul>
     * If a key is not present or is null, not draws the line. Default value is default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @since 4.8.003 (2009-09-15)
     * @public
     */
    public function PolyLine($p, $style = '', $line_style = array(), $fill_color = array())
    {
    }
    /**
     * Draws a polygon.
     * @param $p (array) Points 0 to ($np - 1). Array with values (x0, y0, x1, y1,..., x(np-1), y(np - 1))
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of polygon. Array with keys among the following:
     * <ul>
     *	 <li>all: Line style of all lines. Array like for SetLineStyle().</li>
     *	 <li>0 to ($np - 1): Line style of each line. Array like for SetLineStyle().</li>
     * </ul>
     * If a key is not present or is null, not draws the line. Default value is default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @param $closed (boolean) if true the polygon is closes, otherwise will remain open
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function Polygon($p, $style = '', $line_style = array(), $fill_color = array(), $closed = \true)
    {
    }
    /**
     * Draws a regular polygon.
     * @param $x0 (float) Abscissa of center point.
     * @param $y0 (float) Ordinate of center point.
     * @param $r: (float) Radius of inscribed circle.
     * @param $ns (integer) Number of sides.
     * @param $angle (float) Angle oriented (anti-clockwise). Default value: 0.
     * @param $draw_circle (boolean) Draw inscribed circle or not. Default value: false.
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of polygon sides. Array with keys among the following:
     * <ul>
     *	 <li>all: Line style of all sides. Array like for SetLineStyle().</li>
     *	 <li>0 to ($ns - 1): Line style of each side. Array like for SetLineStyle().</li>
     * </ul>
     * If a key is not present or is null, not draws the side. Default value is default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(red, green, blue). Default value: default color (empty array).
     * @param $circle_style (string) Style of rendering of inscribed circle (if draws). Possible values are:
     * <ul>
     *	 <li>D or empty string: Draw (default).</li>
     *	 <li>F: Fill.</li>
     *	 <li>DF or FD: Draw and fill.</li>
     *	 <li>CNZ: Clipping mode (using the even-odd rule to determine which regions lie inside the clipping path).</li>
     *	 <li>CEO: Clipping mode (using the nonzero winding number rule to determine which regions lie inside the clipping path).</li>
     * </ul>
     * @param $circle_outLine_style (array) Line style of inscribed circle (if draws). Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $circle_fill_color (array) Fill color of inscribed circle (if draws). Format: array(red, green, blue). Default value: default color (empty array).
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function RegularPolygon($x0, $y0, $r, $ns, $angle = 0, $draw_circle = \false, $style = '', $line_style = array(), $fill_color = array(), $circle_style = '', $circle_outLine_style = array(), $circle_fill_color = array())
    {
    }
    /**
     * Draws a star polygon
     * @param $x0 (float) Abscissa of center point.
     * @param $y0 (float) Ordinate of center point.
     * @param $r (float) Radius of inscribed circle.
     * @param $nv (integer) Number of vertices.
     * @param $ng (integer) Number of gap (if ($ng % $nv = 1) then is a regular polygon).
     * @param $angle: (float) Angle oriented (anti-clockwise). Default value: 0.
     * @param $draw_circle: (boolean) Draw inscribed circle or not. Default value is false.
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $line_style (array) Line style of polygon sides. Array with keys among the following:
     * <ul>
     *	 <li>all: Line style of all sides. Array like for
     * SetLineStyle().</li>
     *	 <li>0 to (n - 1): Line style of each side. Array like for SetLineStyle().</li>
     * </ul>
     * If a key is not present or is null, not draws the side. Default value is default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(red, green, blue). Default value: default color (empty array).
     * @param $circle_style (string) Style of rendering of inscribed circle (if draws). Possible values are:
     * <ul>
     *	 <li>D or empty string: Draw (default).</li>
     *	 <li>F: Fill.</li>
     *	 <li>DF or FD: Draw and fill.</li>
     *	 <li>CNZ: Clipping mode (using the even-odd rule to determine which regions lie inside the clipping path).</li>
     *	 <li>CEO: Clipping mode (using the nonzero winding number rule to determine which regions lie inside the clipping path).</li>
     * </ul>
     * @param $circle_outLine_style (array) Line style of inscribed circle (if draws). Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $circle_fill_color (array) Fill color of inscribed circle (if draws). Format: array(red, green, blue). Default value: default color (empty array).
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function StarPolygon($x0, $y0, $r, $nv, $ng, $angle = 0, $draw_circle = \false, $style = '', $line_style = array(), $fill_color = array(), $circle_style = '', $circle_outLine_style = array(), $circle_fill_color = array())
    {
    }
    /**
     * Draws a rounded rectangle.
     * @param $x (float) Abscissa of upper-left corner.
     * @param $y (float) Ordinate of upper-left corner.
     * @param $w (float) Width.
     * @param $h (float) Height.
     * @param $r (float) the radius of the circle used to round off the corners of the rectangle.
     * @param $round_corner (string) Draws rounded corner or not. String with a 0 (not rounded i-corner) or 1 (rounded i-corner) in i-position. Positions are, in order and begin to 0: top right, bottom right, bottom left and top left. Default value: all rounded corner ("1111").
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $border_style (array) Border style of rectangle. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @public
     * @since 2.1.000 (2008-01-08)
     */
    public function RoundedRect($x, $y, $w, $h, $r, $round_corner = '1111', $style = '', $border_style = array(), $fill_color = array())
    {
    }
    /**
     * Draws a rounded rectangle.
     * @param $x (float) Abscissa of upper-left corner.
     * @param $y (float) Ordinate of upper-left corner.
     * @param $w (float) Width.
     * @param $h (float) Height.
     * @param $rx (float) the x-axis radius of the ellipse used to round off the corners of the rectangle.
     * @param $ry (float) the y-axis radius of the ellipse used to round off the corners of the rectangle.
     * @param $round_corner (string) Draws rounded corner or not. String with a 0 (not rounded i-corner) or 1 (rounded i-corner) in i-position. Positions are, in order and begin to 0: top right, bottom right, bottom left and top left. Default value: all rounded corner ("1111").
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $border_style (array) Border style of rectangle. Array like for SetLineStyle(). Default value: default line style (empty array).
     * @param $fill_color (array) Fill color. Format: array(GREY) or array(R,G,B) or array(C,M,Y,K) or array(C,M,Y,K,SpotColorName). Default value: default color (empty array).
     * @public
     * @since 4.9.019 (2010-04-22)
     */
    public function RoundedRectXY($x, $y, $w, $h, $rx, $ry, $round_corner = '1111', $style = '', $border_style = array(), $fill_color = array())
    {
    }
    /**
     * Draws a grahic arrow.
     * @param $x0 (float) Abscissa of first point.
     * @param $y0 (float) Ordinate of first point.
     * @param $x1 (float) Abscissa of second point.
     * @param $y1 (float) Ordinate of second point.
     * @param $head_style (int) (0 = draw only arrowhead arms, 1 = draw closed arrowhead, but no fill, 2 = closed and filled arrowhead, 3 = filled arrowhead)
     * @param $arm_size (float) length of arrowhead arms
     * @param $arm_angle (int) angle between an arm and the shaft
     * @author Piotr Galecki, Nicola Asuni, Andy Meier
     * @since 4.6.018 (2009-07-10)
     */
    public function Arrow($x0, $y0, $x1, $y1, $head_style = 0, $arm_size = 5, $arm_angle = 15)
    {
    }
    // END GRAPHIC FUNCTIONS SECTION -----------------------
    /**
     * Add a Named Destination.
     * NOTE: destination names are unique, so only last entry will be saved.
     * @param $name (string) Destination name.
     * @param $y (float) Y position in user units of the destiantion on the selected page (default = -1 = current position; 0 = page start;).
     * @param $page (int|string) Target page number (leave empty for current page). If you prefix a page number with the * character, then this page will not be changed when adding/deleting/moving pages.
     * @param $x (float) X position in user units of the destiantion on the selected page (default = -1 = current position;).
     * @return (string) Stripped named destination identifier or false in case of error.
     * @public
     * @author Christian Deligant, Nicola Asuni
     * @since 5.9.097 (2011-06-23)
     */
    public function setDestination($name, $y = -1, $page = '', $x = -1)
    {
    }
    /**
     * Return the Named Destination array.
     * @return (array) Named Destination array.
     * @public
     * @author Nicola Asuni
     * @since 5.9.097 (2011-06-23)
     */
    public function getDestination()
    {
    }
    /**
     * Insert Named Destinations.
     * @protected
     * @author Johannes G\FCntert, Nicola Asuni
     * @since 5.9.098 (2011-06-23)
     */
    protected function _putdests()
    {
    }
    /**
     * Adds a bookmark - alias for Bookmark().
     * @param $txt (string) Bookmark description.
     * @param $level (int) Bookmark level (minimum value is 0).
     * @param $y (float) Y position in user units of the bookmark on the selected page (default = -1 = current position; 0 = page start;).
     * @param $page (int|string) Target page number (leave empty for current page). If you prefix a page number with the * character, then this page will not be changed when adding/deleting/moving pages.
     * @param $style (string) Font style: B = Bold, I = Italic, BI = Bold + Italic.
     * @param $color (array) RGB color array (values from 0 to 255).
     * @param $x (float) X position in user units of the bookmark on the selected page (default = -1 = current position;).
     * @param $link (mixed) URL, or numerical link ID, or named destination (# character followed by the destination name), or embedded file (* character followed by the file name).
     * @public
     */
    public function setBookmark($txt, $level = 0, $y = -1, $page = '', $style = '', $color = array(0, 0, 0), $x = -1, $link = '')
    {
    }
    /**
     * Adds a bookmark.
     * @param $txt (string) Bookmark description.
     * @param $level (int) Bookmark level (minimum value is 0).
     * @param $y (float) Y position in user units of the bookmark on the selected page (default = -1 = current position; 0 = page start;).
     * @param $page (int|string) Target page number (leave empty for current page). If you prefix a page number with the * character, then this page will not be changed when adding/deleting/moving pages.
     * @param $style (string) Font style: B = Bold, I = Italic, BI = Bold + Italic.
     * @param $color (array) RGB color array (values from 0 to 255).
     * @param $x (float) X position in user units of the bookmark on the selected page (default = -1 = current position;).
     * @param $link (mixed) URL, or numerical link ID, or named destination (# character followed by the destination name), or embedded file (* character followed by the file name).
     * @public
     * @since 2.1.002 (2008-02-12)
     */
    public function Bookmark($txt, $level = 0, $y = -1, $page = '', $style = '', $color = array(0, 0, 0), $x = -1, $link = '')
    {
    }
    /**
     * Sort bookmarks for page and key.
     * @protected
     * @since 5.9.119 (2011-09-19)
     */
    protected function sortBookmarks()
    {
    }
    /**
     * Create a bookmark PDF string.
     * @protected
     * @author Olivier Plathey, Nicola Asuni
     * @since 2.1.002 (2008-02-12)
     */
    protected function _putbookmarks()
    {
    }
    // --- JAVASCRIPT ------------------------------------------------------
    /**
     * Adds a javascript
     * @param $script (string) Javascript code
     * @public
     * @author Johannes G\FCntert, Nicola Asuni
     * @since 2.1.002 (2008-02-12)
     */
    public function IncludeJS($script)
    {
    }
    /**
     * Adds a javascript object and return object ID
     * @param $script (string) Javascript code
     * @param $onload (boolean) if true executes this object when opening the document
     * @return int internal object ID
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function addJavascriptObject($script, $onload = \false)
    {
    }
    /**
     * Create a javascript PDF string.
     * @protected
     * @author Johannes G\FCntert, Nicola Asuni
     * @since 2.1.002 (2008-02-12)
     */
    protected function _putjavascript()
    {
    }
    /**
     * Adds a javascript form field.
     * @param $type (string) field type
     * @param $name (string) field name
     * @param $x (int) horizontal position
     * @param $y (int) vertical position
     * @param $w (int) width
     * @param $h (int) height
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @protected
     * @author Denis Van Nuffelen, Nicola Asuni
     * @since 2.1.002 (2008-02-12)
     */
    protected function _addfield($type, $name, $x, $y, $w, $h, $prop)
    {
    }
    // --- FORM FIELDS -----------------------------------------------------
    /**
     * Set default properties for form fields.
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-06)
     */
    public function setFormDefaultProp($prop = array())
    {
    }
    /**
     * Return the default properties for form fields.
     * @return array $prop javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-06)
     */
    public function getFormDefaultProp()
    {
    }
    /**
     * Creates a text field
     * @param $name (string) field name
     * @param $w (float) Width of the rectangle
     * @param $h (float) Height of the rectangle
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @param $opt (array) annotation parameters. Possible values are described on official PDF32000_2008 reference.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $js (boolean) if true put the field using JavaScript (requires Acrobat Writer to be rendered).
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function TextField($name, $w, $h, $prop = array(), $opt = array(), $x = '', $y = '', $js = \false)
    {
    }
    /**
     * Creates a RadioButton field.
     * @param $name (string) Field name.
     * @param $w (int) Width of the radio button.
     * @param $prop (array) Javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @param $opt (array) Annotation parameters. Possible values are described on official PDF32000_2008 reference.
     * @param $onvalue (string) Value to be returned if selected.
     * @param $checked (boolean) Define the initial state.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $js (boolean) If true put the field using JavaScript (requires Acrobat Writer to be rendered).
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function RadioButton($name, $w, $prop = array(), $opt = array(), $onvalue = 'On', $checked = \false, $x = '', $y = '', $js = \false)
    {
    }
    /**
     * Creates a List-box field
     * @param $name (string) field name
     * @param $w (int) width
     * @param $h (int) height
     * @param $values (array) array containing the list of values.
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @param $opt (array) annotation parameters. Possible values are described on official PDF32000_2008 reference.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $js (boolean) if true put the field using JavaScript (requires Acrobat Writer to be rendered).
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function ListBox($name, $w, $h, $values, $prop = array(), $opt = array(), $x = '', $y = '', $js = \false)
    {
    }
    /**
     * Creates a Combo-box field
     * @param $name (string) field name
     * @param $w (int) width
     * @param $h (int) height
     * @param $values (array) array containing the list of values.
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @param $opt (array) annotation parameters. Possible values are described on official PDF32000_2008 reference.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $js (boolean) if true put the field using JavaScript (requires Acrobat Writer to be rendered).
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function ComboBox($name, $w, $h, $values, $prop = array(), $opt = array(), $x = '', $y = '', $js = \false)
    {
    }
    /**
     * Creates a CheckBox field
     * @param $name (string) field name
     * @param $w (int) width
     * @param $checked (boolean) define the initial state.
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @param $opt (array) annotation parameters. Possible values are described on official PDF32000_2008 reference.
     * @param $onvalue (string) value to be returned if selected.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $js (boolean) if true put the field using JavaScript (requires Acrobat Writer to be rendered).
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function CheckBox($name, $w, $checked = \false, $prop = array(), $opt = array(), $onvalue = 'Yes', $x = '', $y = '', $js = \false)
    {
    }
    /**
     * Creates a button field
     * @param $name (string) field name
     * @param $w (int) width
     * @param $h (int) height
     * @param $caption (string) caption.
     * @param $action (mixed) action triggered by pressing the button. Use a string to specify a javascript action. Use an array to specify a form action options as on section 12.7.5 of PDF32000_2008.
     * @param $prop (array) javascript field properties. Possible values are described on official Javascript for Acrobat API reference.
     * @param $opt (array) annotation parameters. Possible values are described on official PDF32000_2008 reference.
     * @param $x (float) Abscissa of the upper-left corner of the rectangle
     * @param $y (float) Ordinate of the upper-left corner of the rectangle
     * @param $js (boolean) if true put the field using JavaScript (requires Acrobat Writer to be rendered).
     * @public
     * @author Nicola Asuni
     * @since 4.8.000 (2009-09-07)
     */
    public function Button($name, $w, $h, $caption, $action, $prop = array(), $opt = array(), $x = '', $y = '', $js = \false)
    {
    }
    // --- END FORMS FIELDS ------------------------------------------------
    /**
     * Add certification signature (DocMDP or UR3)
     * You can set only one signature type
     * @protected
     * @author Nicola Asuni
     * @since 4.6.008 (2009-05-07)
     */
    protected function _putsignature()
    {
    }
    /**
    * Set User's Rights for PDF Reader
    * WARNING: This is experimental and currently do not work.
    * Check the PDF Reference 8.7.1 Transform Methods,
    * Table 8.105 Entries in the UR transform parameters dictionary
    * @param $enable (boolean) if true enable user's rights on PDF reader
    * @param $document (string) Names specifying additional document-wide usage rights for the document. The only defined value is "/FullSave", which permits a user to save the document along with modified form and/or annotation data.
    * @param $annots (string) Names specifying additional annotation-related usage rights for the document. Valid names in PDF 1.5 and later are /Create/Delete/Modify/Copy/Import/Export, which permit the user to perform the named operation on annotations.
    * @param $form (string) Names specifying additional form-field-related usage rights for the document. Valid names are: /Add/Delete/FillIn/Import/Export/SubmitStandalone/SpawnTemplate
    * @param $signature (string) Names specifying additional signature-related usage rights for the document. The only defined value is /Modify, which permits a user to apply a digital signature to an existing signature form field or clear a signed signature form field.
    * @param $ef (string) Names specifying additional usage rights for named embedded files in the document. Valid names are /Create/Delete/Modify/Import, which permit the user to perform the named operation on named embedded files
    Names specifying additional embedded-files-related usage rights for the document.
    * @param $formex (string) Names specifying additional form-field-related usage rights. The only valid name is BarcodePlaintext, which permits text form field data to be encoded as a plaintext two-dimensional barcode.
    * @public
    * @author Nicola Asuni
    * @since 2.9.000 (2008-03-26)
    */
    public function setUserRights($enable = \true, $document = '/FullSave', $annots = '/Create/Delete/Modify/Copy/Import/Export', $form = '/Add/Delete/FillIn/Import/Export/SubmitStandalone/SpawnTemplate', $signature = '/Modify', $ef = '/Create/Delete/Modify/Import', $formex = '')
    {
    }
    /**
     * Enable document signature (requires the OpenSSL Library).
     * The digital signature improve document authenticity and integrity and allows o enable extra features on Acrobat Reader.
     * To create self-signed signature: openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout tcpdf.crt -out tcpdf.crt
     * To export crt to p12: openssl pkcs12 -export -in tcpdf.crt -out tcpdf.p12
     * To convert pfx certificate to pem: openssl pkcs12 -in tcpdf.pfx -out tcpdf.crt -nodes
     * @param $signing_cert (mixed) signing certificate (string or filename prefixed with 'file://')
     * @param $private_key (mixed) private key (string or filename prefixed with 'file://')
     * @param $private_key_password (string) password
     * @param $extracerts (string) specifies the name of a file containing a bunch of extra certificates to include in the signature which can for example be used to help the recipient to verify the certificate that you used.
     * @param $cert_type (int) The access permissions granted for this document. Valid values shall be: 1 = No changes to the document shall be permitted; any change to the document shall invalidate the signature; 2 = Permitted changes shall be filling in forms, instantiating page templates, and signing; other changes shall invalidate the signature; 3 = Permitted changes shall be the same as for 2, as well as annotation creation, deletion, and modification; other changes shall invalidate the signature.
     * @param $info (array) array of option information: Name, Location, Reason, ContactInfo.
     * @param $approval (string) Enable approval signature eg. for PDF incremental update
     * @public
     * @author Nicola Asuni
     * @since 4.6.005 (2009-04-24)
     */
    public function setSignature($signing_cert = '', $private_key = '', $private_key_password = '', $extracerts = '', $cert_type = 2, $info = array(), $approval = '')
    {
    }
    /**
     * Set the digital signature appearance (a cliccable rectangle area to get signature properties)
     * @param $x (float) Abscissa of the upper-left corner.
     * @param $y (float) Ordinate of the upper-left corner.
     * @param $w (float) Width of the signature area.
     * @param $h (float) Height of the signature area.
     * @param $page (int) option page number (if < 0 the current page is used).
     * @param $name (string) Name of the signature.
     * @public
     * @author Nicola Asuni
     * @since 5.3.011 (2010-06-17)
     */
    public function setSignatureAppearance($x = 0, $y = 0, $w = 0, $h = 0, $page = -1, $name = '')
    {
    }
    /**
     * Add an empty digital signature appearance (a cliccable rectangle area to get signature properties)
     * @param $x (float) Abscissa of the upper-left corner.
     * @param $y (float) Ordinate of the upper-left corner.
     * @param $w (float) Width of the signature area.
     * @param $h (float) Height of the signature area.
     * @param $page (int) option page number (if < 0 the current page is used).
     * @param $name (string) Name of the signature.
     * @public
     * @author Nicola Asuni
     * @since 5.9.101 (2011-07-06)
     */
    public function addEmptySignatureAppearance($x = 0, $y = 0, $w = 0, $h = 0, $page = -1, $name = '')
    {
    }
    /**
     * Get the array that defines the signature appearance (page and rectangle coordinates).
     * @param $x (float) Abscissa of the upper-left corner.
     * @param $y (float) Ordinate of the upper-left corner.
     * @param $w (float) Width of the signature area.
     * @param $h (float) Height of the signature area.
     * @param $page (int) option page number (if < 0 the current page is used).
     * @param $name (string) Name of the signature.
     * @return (array) Array defining page and rectangle coordinates of signature appearance.
     * @protected
     * @author Nicola Asuni
     * @since 5.9.101 (2011-07-06)
     */
    protected function getSignatureAppearanceArray($x = 0, $y = 0, $w = 0, $h = 0, $page = -1, $name = '')
    {
    }
    /**
     * Enable document timestamping (requires the OpenSSL Library).
     * The trusted timestamping improve document security that means that no one should be able to change the document once it has been recorded.
     * Use with digital signature only!
     * @param $tsa_host (string) Time Stamping Authority (TSA) server (prefixed with 'https://')
     * @param $tsa_username (string) Specifies the username for TSA authorization (optional) OR specifies the TSA authorization PEM file (see: example_66.php, optional)
     * @param $tsa_password (string) Specifies the password for TSA authorization (optional)
     * @param $tsa_cert (string) Specifies the location of TSA certificate for authorization (optional for cURL)
     * @public
     * @author Richard Stockinger
     * @since 6.0.090 (2014-06-16)
     */
    public function setTimeStamp($tsa_host = '', $tsa_username = '', $tsa_password = '', $tsa_cert = '')
    {
    }
    /**
     * NOT YET IMPLEMENTED
     * Request TSA for a timestamp
     * @param $signature (string) Digital signature as binary string
     * @return (string) Timestamped digital signature
     * @protected
     * @author Richard Stockinger
     * @since 6.0.090 (2014-06-16)
     */
    protected function applyTSA($signature)
    {
    }
    /**
     * Create a new page group.
     * NOTE: call this function before calling AddPage()
     * @param $page (int) starting group page (leave empty for next page).
     * @public
     * @since 3.0.000 (2008-03-27)
     */
    public function startPageGroup($page = '')
    {
    }
    /**
     * Set the starting page number.
     * @param $num (int) Starting page number.
     * @since 5.9.093 (2011-06-16)
     * @public
     */
    public function setStartingPageNumber($num = 1)
    {
    }
    /**
     * Returns the string alias used right align page numbers.
     * If the current font is unicode type, the returned string wil contain an additional open curly brace.
     * @return string
     * @since 5.9.099 (2011-06-27)
     * @public
     */
    public function getAliasRightShift()
    {
    }
    /**
     * Returns the string alias used for the total number of pages.
     * If the current font is unicode type, the returned string is surrounded by additional curly braces.
     * This alias will be replaced by the total number of pages in the document.
     * @return string
     * @since 4.0.018 (2008-08-08)
     * @public
     */
    public function getAliasNbPages()
    {
    }
    /**
     * Returns the string alias used for the page number.
     * If the current font is unicode type, the returned string is surrounded by additional curly braces.
     * This alias will be replaced by the page number.
     * @return string
     * @since 4.5.000 (2009-01-02)
     * @public
     */
    public function getAliasNumPage()
    {
    }
    /**
     * Return the alias for the total number of pages in the current page group.
     * If the current font is unicode type, the returned string is surrounded by additional curly braces.
     * This alias will be replaced by the total number of pages in this group.
     * @return alias of the current page group
     * @public
     * @since 3.0.000 (2008-03-27)
     */
    public function getPageGroupAlias()
    {
    }
    /**
     * Return the alias for the page number on the current page group.
     * If the current font is unicode type, the returned string is surrounded by additional curly braces.
     * This alias will be replaced by the page number (relative to the belonging group).
     * @return alias of the current page group
     * @public
     * @since 4.5.000 (2009-01-02)
     */
    public function getPageNumGroupAlias()
    {
    }
    /**
     * Return the current page in the group.
     * @return current page in the group
     * @public
     * @since 3.0.000 (2008-03-27)
     */
    public function getGroupPageNo()
    {
    }
    /**
     * Returns the current group page number formatted as a string.
     * @public
     * @since 4.3.003 (2008-11-18)
     * @see PaneNo(), formatPageNumber()
     */
    public function getGroupPageNoFormatted()
    {
    }
    /**
     * Returns the current page number formatted as a string.
     * @public
     * @since 4.2.005 (2008-11-06)
     * @see PaneNo(), formatPageNumber()
     */
    public function PageNoFormatted()
    {
    }
    /**
     * Put pdf layers.
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected function _putocg()
    {
    }
    /**
     * Start a new pdf layer.
     * @param $name (string) Layer name (only a-z letters and numbers). Leave empty for automatic name.
     * @param $print (boolean|null) Set to TRUE to print this layer, FALSE to not print and NULL to not set this option
     * @param $view (boolean) Set to true to view this layer.
     * @param $lock (boolean) If true lock the layer
     * @public
     * @since 5.9.102 (2011-07-13)
     */
    public function startLayer($name = '', $print = \true, $view = \true, $lock = \true)
    {
    }
    /**
     * End the current PDF layer.
     * @public
     * @since 5.9.102 (2011-07-13)
     */
    public function endLayer()
    {
    }
    /**
     * Set the visibility of the successive elements.
     * This can be useful, for instance, to put a background
     * image or color that will show on screen but won't print.
     * @param $v (string) visibility mode. Legal values are: all, print, screen or view.
     * @public
     * @since 3.0.000 (2008-03-27)
     */
    public function setVisibility($v)
    {
    }
    /**
     * Add transparency parameters to the current extgstate
     * @param $parms (array) parameters
     * @return the number of extgstates
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected function addExtGState($parms)
    {
    }
    /**
     * Add an extgstate
     * @param $gs (array) extgstate
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected function setExtGState($gs)
    {
    }
    /**
     * Put extgstates for object transparency
     * @protected
     * @since 3.0.000 (2008-03-27)
     */
    protected function _putextgstates()
    {
    }
    /**
     * Set overprint mode for stroking (OP) and non-stroking (op) painting operations.
     * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
     * @param $stroking (boolean) If true apply overprint for stroking operations.
     * @param $nonstroking (boolean) If true apply overprint for painting operations other than stroking.
     * @param $mode (integer) Overprint mode: (0 = each source colour component value replaces the value previously painted for the corresponding device colorant; 1 = a tint value of 0.0 for a source colour component shall leave the corresponding component of the previously painted colour unchanged).
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function setOverprint($stroking = \true, $nonstroking = '', $mode = 0)
    {
    }
    /**
     * Get the overprint mode array (OP, op, OPM).
     * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
     * @return array.
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function getOverprint()
    {
    }
    /**
     * Set alpha for stroking (CA) and non-stroking (ca) operations.
     * @param $stroking (float) Alpha value for stroking operations: real value from 0 (transparent) to 1 (opaque).
     * @param $bm (string) blend mode, one of the following: Normal, Multiply, Screen, Overlay, Darken, Lighten, ColorDodge, ColorBurn, HardLight, SoftLight, Difference, Exclusion, Hue, Saturation, Color, Luminosity
     * @param $nonstroking (float) Alpha value for non-stroking operations: real value from 0 (transparent) to 1 (opaque).
     * @param $ais (boolean)
     * @public
     * @since 3.0.000 (2008-03-27)
     */
    public function setAlpha($stroking = 1, $bm = 'Normal', $nonstroking = '', $ais = \false)
    {
    }
    /**
     * Get the alpha mode array (CA, ca, BM, AIS).
     * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
     * @return array.
     * @public
     * @since 5.9.152 (2012-03-23)
     */
    public function getAlpha()
    {
    }
    /**
     * Set the default JPEG compression quality (1-100)
     * @param $quality (int) JPEG quality, integer between 1 and 100
     * @public
     * @since 3.0.000 (2008-03-27)
     */
    public function setJPEGQuality($quality)
    {
    }
    /**
     * Set the default number of columns in a row for HTML tables.
     * @param $cols (int) number of columns
     * @public
     * @since 3.0.014 (2008-06-04)
     */
    public function setDefaultTableColumns($cols = 4)
    {
    }
    /**
     * Set the height of the cell (line height) respect the font height.
     * @param $h (int) cell proportion respect font height (typical value = 1.25).
     * @public
     * @since 3.0.014 (2008-06-04)
     */
    public function setCellHeightRatio($h)
    {
    }
    /**
     * return the height of cell repect font height.
     * @public
     * @since 4.0.012 (2008-07-24)
     */
    public function getCellHeightRatio()
    {
    }
    /**
     * Set the PDF version (check PDF reference for valid values).
     * @param $version (string) PDF document version.
     * @public
     * @since 3.1.000 (2008-06-09)
     */
    public function setPDFVersion($version = '1.7')
    {
    }
    /**
     * Set the viewer preferences dictionary controlling the way the document is to be presented on the screen or in print.
     * (see Section 8.1 of PDF reference, "Viewer Preferences").
     * <ul><li>HideToolbar boolean (Optional) A flag specifying whether to hide the viewer application's tool bars when the document is active. Default value: false.</li><li>HideMenubar boolean (Optional) A flag specifying whether to hide the viewer application's menu bar when the document is active. Default value: false.</li><li>HideWindowUI boolean (Optional) A flag specifying whether to hide user interface elements in the document's window (such as scroll bars and navigation controls), leaving only the document's contents displayed. Default value: false.</li><li>FitWindow boolean (Optional) A flag specifying whether to resize the document's window to fit the size of the first displayed page. Default value: false.</li><li>CenterWindow boolean (Optional) A flag specifying whether to position the document's window in the center of the screen. Default value: false.</li><li>DisplayDocTitle boolean (Optional; PDF 1.4) A flag specifying whether the window's title bar should display the document title taken from the Title entry of the document information dictionary (see Section 10.2.1, "Document Information Dictionary"). If false, the title bar should instead display the name of the PDF file containing the document. Default value: false.</li><li>NonFullScreenPageMode name (Optional) The document's page mode, specifying how to display the document on exiting full-screen mode:<ul><li>UseNone Neither document outline nor thumbnail images visible</li><li>UseOutlines Document outline visible</li><li>UseThumbs Thumbnail images visible</li><li>UseOC Optional content group panel visible</li></ul>This entry is meaningful only if the value of the PageMode entry in the catalog dictionary (see Section 3.6.1, "Document Catalog") is FullScreen; it is ignored otherwise. Default value: UseNone.</li><li>ViewArea name (Optional; PDF 1.4) The name of the page boundary representing the area of a page to be displayed when viewing the document on the screen. Valid values are (see Section 10.10.1, "Page Boundaries").:<ul><li>MediaBox</li><li>CropBox (default)</li><li>BleedBox</li><li>TrimBox</li><li>ArtBox</li></ul></li><li>ViewClip name (Optional; PDF 1.4) The name of the page boundary to which the contents of a page are to be clipped when viewing the document on the screen. Valid values are (see Section 10.10.1, "Page Boundaries").:<ul><li>MediaBox</li><li>CropBox (default)</li><li>BleedBox</li><li>TrimBox</li><li>ArtBox</li></ul></li><li>PrintArea name (Optional; PDF 1.4) The name of the page boundary representing the area of a page to be rendered when printing the document. Valid values are (see Section 10.10.1, "Page Boundaries").:<ul><li>MediaBox</li><li>CropBox (default)</li><li>BleedBox</li><li>TrimBox</li><li>ArtBox</li></ul></li><li>PrintClip name (Optional; PDF 1.4) The name of the page boundary to which the contents of a page are to be clipped when printing the document. Valid values are (see Section 10.10.1, "Page Boundaries").:<ul><li>MediaBox</li><li>CropBox (default)</li><li>BleedBox</li><li>TrimBox</li><li>ArtBox</li></ul></li><li>PrintScaling name (Optional; PDF 1.6) The page scaling option to be selected when a print dialog is displayed for this document. Valid values are: <ul><li>None, which indicates that the print dialog should reflect no page scaling</li><li>AppDefault (default), which indicates that applications should use the current print scaling</li></ul></li><li>Duplex name (Optional; PDF 1.7) The paper handling option to use when printing the file from the print dialog. The following values are valid:<ul><li>Simplex - Print single-sided</li><li>DuplexFlipShortEdge - Duplex and flip on the short edge of the sheet</li><li>DuplexFlipLongEdge - Duplex and flip on the long edge of the sheet</li></ul>Default value: none</li><li>PickTrayByPDFSize boolean (Optional; PDF 1.7) A flag specifying whether the PDF page size is used to select the input paper tray. This setting influences only the preset values used to populate the print dialog presented by a PDF viewer application. If PickTrayByPDFSize is true, the check box in the print dialog associated with input paper tray is checked. Note: This setting has no effect on Mac OS systems, which do not provide the ability to pick the input tray by size.</li><li>PrintPageRange array (Optional; PDF 1.7) The page numbers used to initialize the print dialog box when the file is printed. The first page of the PDF file is denoted by 1. Each pair consists of the first and last pages in the sub-range. An odd number of integers causes this entry to be ignored. Negative numbers cause the entire array to be ignored. Default value: as defined by PDF viewer application</li><li>NumCopies integer (Optional; PDF 1.7) The number of copies to be printed when the print dialog is opened for this file. Supported values are the integers 2 through 5. Values outside this range are ignored. Default value: as defined by PDF viewer application, but typically 1</li></ul>
     * @param $preferences (array) array of options.
     * @author Nicola Asuni
     * @public
     * @since 3.1.000 (2008-06-09)
     */
    public function setViewerPreferences($preferences)
    {
    }
    /**
     * Paints color transition registration bars
     * @param $x (float) abscissa of the top left corner of the rectangle.
     * @param $y (float) ordinate of the top left corner of the rectangle.
     * @param $w (float) width of the rectangle.
     * @param $h (float) height of the rectangle.
     * @param $transition (boolean) if true prints tcolor transitions to white.
     * @param $vertical (boolean) if true prints bar vertically.
     * @param $colors (string) colors to print separated by comma. Valid values are: A,W,R,G,B,C,M,Y,K,RGB,CMYK,ALL,ALLSPOT,<SPOT_COLOR_NAME>. Where: A = grayscale black, W = grayscale white, R = RGB red, G RGB green, B RGB blue, C = CMYK cyan, M = CMYK magenta, Y = CMYK yellow, K = CMYK key/black, RGB = RGB registration color, CMYK = CMYK registration color, ALL = Spot registration color, ALLSPOT = print all defined spot colors, <SPOT_COLOR_NAME> = name of the spot color to print.
     * @author Nicola Asuni
     * @since 4.9.000 (2010-03-26)
     * @public
     */
    public function colorRegistrationBar($x, $y, $w, $h, $transition = \true, $vertical = \false, $colors = 'A,R,G,B,C,M,Y,K')
    {
    }
    /**
     * Paints crop marks.
     * @param $x (float) abscissa of the crop mark center.
     * @param $y (float) ordinate of the crop mark center.
     * @param $w (float) width of the crop mark.
     * @param $h (float) height of the crop mark.
     * @param $type (string) type of crop mark, one symbol per type separated by comma: T = TOP, F = BOTTOM, L = LEFT, R = RIGHT, TL = A = TOP-LEFT, TR = B = TOP-RIGHT, BL = C = BOTTOM-LEFT, BR = D = BOTTOM-RIGHT.
     * @param $color (array) crop mark color (default spot registration color).
     * @author Nicola Asuni
     * @since 4.9.000 (2010-03-26)
     * @public
     */
    public function cropMark($x, $y, $w, $h, $type = 'T,R,B,L', $color = array(100, 100, 100, 100, 'All'))
    {
    }
    /**
     * Paints a registration mark
     * @param $x (float) abscissa of the registration mark center.
     * @param $y (float) ordinate of the registration mark center.
     * @param $r (float) radius of the crop mark.
     * @param $double (boolean) if true print two concentric crop marks.
     * @param $cola (array) crop mark color (default spot registration color 'All').
     * @param $colb (array) second crop mark color (default spot registration color 'None').
     * @author Nicola Asuni
     * @since 4.9.000 (2010-03-26)
     * @public
     */
    public function registrationMark($x, $y, $r, $double = \false, $cola = array(100, 100, 100, 100, 'All'), $colb = array(0, 0, 0, 0, 'None'))
    {
    }
    /**
     * Paints a CMYK registration mark
     * @param $x (float) abscissa of the registration mark center.
     * @param $y (float) ordinate of the registration mark center.
     * @param $r (float) radius of the crop mark.
     * @author Nicola Asuni
     * @since 6.0.038 (2013-09-30)
     * @public
     */
    public function registrationMarkCMYK($x, $y, $r)
    {
    }
    /**
     * Paints a linear colour gradient.
     * @param $x (float) abscissa of the top left corner of the rectangle.
     * @param $y (float) ordinate of the top left corner of the rectangle.
     * @param $w (float) width of the rectangle.
     * @param $h (float) height of the rectangle.
     * @param $col1 (array) first color (Grayscale, RGB or CMYK components).
     * @param $col2 (array) second color (Grayscale, RGB or CMYK components).
     * @param $coords (array) array of the form (x1, y1, x2, y2) which defines the gradient vector (see linear_gradient_coords.jpg). The default value is from left to right (x1=0, y1=0, x2=1, y2=0).
     * @author Andreas W\FCrmser, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function LinearGradient($x, $y, $w, $h, $col1 = array(), $col2 = array(), $coords = array(0, 0, 1, 0))
    {
    }
    /**
     * Paints a radial colour gradient.
     * @param $x (float) abscissa of the top left corner of the rectangle.
     * @param $y (float) ordinate of the top left corner of the rectangle.
     * @param $w (float) width of the rectangle.
     * @param $h (float) height of the rectangle.
     * @param $col1 (array) first color (Grayscale, RGB or CMYK components).
     * @param $col2 (array) second color (Grayscale, RGB or CMYK components).
     * @param $coords (array) array of the form (fx, fy, cx, cy, r) where (fx, fy) is the starting point of the gradient with color1, (cx, cy) is the center of the circle with color2, and r is the radius of the circle (see radial_gradient_coords.jpg). (fx, fy) should be inside the circle, otherwise some areas will not be defined.
     * @author Andreas W\FCrmser, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function RadialGradient($x, $y, $w, $h, $col1 = array(), $col2 = array(), $coords = array(0.5, 0.5, 0.5, 0.5, 1))
    {
    }
    /**
     * Paints a coons patch mesh.
     * @param $x (float) abscissa of the top left corner of the rectangle.
     * @param $y (float) ordinate of the top left corner of the rectangle.
     * @param $w (float) width of the rectangle.
     * @param $h (float) height of the rectangle.
     * @param $col1 (array) first color (lower left corner) (RGB components).
     * @param $col2 (array) second color (lower right corner) (RGB components).
     * @param $col3 (array) third color (upper right corner) (RGB components).
     * @param $col4 (array) fourth color (upper left corner) (RGB components).
     * @param $coords (array) <ul><li>for one patch mesh: array(float x1, float y1, .... float x12, float y12): 12 pairs of coordinates (normally from 0 to 1) which specify the Bezier control points that define the patch. First pair is the lower left edge point, next is its right control point (control point 2). Then the other points are defined in the order: control point 1, edge point, control point 2 going counter-clockwise around the patch. Last (x12, y12) is the first edge point's left control point (control point 1).</li><li>for two or more patch meshes: array[number of patches]: arrays with the following keys for each patch: f: where to put that patch (0 = first patch, 1, 2, 3 = right, top and left of precedent patch - I didn't figure this out completely - just try and error ;-) points: 12 pairs of coordinates of the Bezier control points as above for the first patch, 8 pairs of coordinates for the following patches, ignoring the coordinates already defined by the precedent patch (I also didn't figure out the order of these - also: try and see what's happening) colors: must be 4 colors for the first patch, 2 colors for the following patches</li></ul>
     * @param $coords_min (array) minimum value used by the coordinates. If a coordinate's value is smaller than this it will be cut to coords_min. default: 0
     * @param $coords_max (array) maximum value used by the coordinates. If a coordinate's value is greater than this it will be cut to coords_max. default: 1
     * @param $antialias (boolean) A flag indicating whether to filter the shading function to prevent aliasing artifacts.
     * @author Andreas W\FCrmser, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function CoonsPatchMesh($x, $y, $w, $h, $col1 = array(), $col2 = array(), $col3 = array(), $col4 = array(), $coords = array(0.0, 0.0, 0.33, 0.0, 0.67, 0.0, 1.0, 0.0, 1.0, 0.33, 1.0, 0.67, 1.0, 1.0, 0.67, 1.0, 0.33, 1.0, 0.0, 1.0, 0.0, 0.67, 0.0, 0.33), $coords_min = 0, $coords_max = 1, $antialias = \false)
    {
    }
    /**
     * Set a rectangular clipping area.
     * @param $x (float) abscissa of the top left corner of the rectangle (or top right corner for RTL mode).
     * @param $y (float) ordinate of the top left corner of the rectangle.
     * @param $w (float) width of the rectangle.
     * @param $h (float) height of the rectangle.
     * @author Andreas W\FCrmser, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @protected
     */
    protected function Clip($x, $y, $w, $h)
    {
    }
    /**
     * Output gradient.
     * @param $type (int) type of gradient (1 Function-based shading; 2 Axial shading; 3 Radial shading; 4 Free-form Gouraud-shaded triangle mesh; 5 Lattice-form Gouraud-shaded triangle mesh; 6 Coons patch mesh; 7 Tensor-product patch mesh). (Not all types are currently supported)
     * @param $coords (array) array of coordinates.
     * @param $stops (array) array gradient color components: color = array of GRAY, RGB or CMYK color components; offset = (0 to 1) represents a location along the gradient vector; exponent = exponent of the exponential interpolation function (default = 1).
     * @param $background (array) An array of colour components appropriate to the colour space, specifying a single background colour value.
     * @param $antialias (boolean) A flag indicating whether to filter the shading function to prevent aliasing artifacts.
     * @author Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function Gradient($type, $coords, $stops, $background = array(), $antialias = \false)
    {
    }
    /**
     * Output gradient shaders.
     * @author Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @protected
     */
    function _putshaders()
    {
    }
    /**
     * Draw the sector of a circle.
     * It can be used for instance to render pie charts.
     * @param $xc (float) abscissa of the center.
     * @param $yc (float) ordinate of the center.
     * @param $r (float) radius.
     * @param $a (float) start angle (in degrees).
     * @param $b (float) end angle (in degrees).
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $cw: (float) indicates whether to go clockwise (default: true).
     * @param $o: (float) origin of angles (0 for 3 o'clock, 90 for noon, 180 for 9 o'clock, 270 for 6 o'clock). Default: 90.
     * @author Maxime Delorme, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function PieSector($xc, $yc, $r, $a, $b, $style = 'FD', $cw = \true, $o = 90)
    {
    }
    /**
     * Draw the sector of an ellipse.
     * It can be used for instance to render pie charts.
     * @param $xc (float) abscissa of the center.
     * @param $yc (float) ordinate of the center.
     * @param $rx (float) the x-axis radius.
     * @param $ry (float) the y-axis radius.
     * @param $a (float) start angle (in degrees).
     * @param $b (float) end angle (in degrees).
     * @param $style (string) Style of rendering. See the getPathPaintOperator() function for more information.
     * @param $cw: (float) indicates whether to go clockwise.
     * @param $o: (float) origin of angles (0 for 3 o'clock, 90 for noon, 180 for 9 o'clock, 270 for 6 o'clock).
     * @param $nc (integer) Number of curves used to draw a 90 degrees portion of arc.
     * @author Maxime Delorme, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function PieSectorXY($xc, $yc, $rx, $ry, $a, $b, $style = 'FD', $cw = \false, $o = 0, $nc = 2)
    {
    }
    /**
     * Embed vector-based Adobe Illustrator (AI) or AI-compatible EPS files.
     * NOTE: EPS is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
     * Only vector drawing is supported, not text or bitmap.
     * Although the script was successfully tested with various AI format versions, best results are probably achieved with files that were exported in the AI3 format (tested with Illustrator CS2, Freehand MX and Photoshop CS2).
     * @param $file (string) Name of the file containing the image or a '@' character followed by the EPS/AI data string.
     * @param $x (float) Abscissa of the upper-left corner.
     * @param $y (float) Ordinate of the upper-left corner.
     * @param $w (float) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $h (float) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $useBoundingBox (boolean) specifies whether to position the bounding box (true) or the complete canvas (false) at location (x,y). Default value is true.
     * @param $align (string) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
     * @param $palign (string) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $fitonpage (boolean) if true the image is resized to not exceed page dimensions.
     * @param $fixoutvals (boolean) if true remove values outside the bounding box.
     * @author Valentin Schmidt, Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function ImageEps($file, $x = '', $y = '', $w = 0, $h = 0, $link = '', $useBoundingBox = \true, $align = '', $palign = '', $border = 0, $fitonpage = \false, $fixoutvals = \false)
    {
    }
    /**
     * Set document barcode.
     * @param $bc (string) barcode
     * @public
     */
    public function setBarcode($bc = '')
    {
    }
    /**
     * Get current barcode.
     * @return string
     * @public
     * @since 4.0.012 (2008-07-24)
     */
    public function getBarcode()
    {
    }
    /**
     * Print a Linear Barcode.
     * @param $code (string) code to print
     * @param $type (string) type of barcode (see tcpdf_barcodes_1d.php for supported formats).
     * @param $x (int) x position in user units (empty string = current x position)
     * @param $y (int) y position in user units (empty string = current y position)
     * @param $w (int) width in user units (empty string = remaining page width)
     * @param $h (int) height in user units (empty string = remaining page height)
     * @param $xres (float) width of the smallest bar in user units (empty string = default value = 0.4mm)
     * @param $style (array) array of options:<ul>
     * <li>boolean $style['border'] if true prints a border</li>
     * <li>int $style['padding'] padding to leave around the barcode in user units (set to 'auto' for automatic padding)</li>
     * <li>int $style['hpadding'] horizontal padding in user units (set to 'auto' for automatic padding)</li>
     * <li>int $style['vpadding'] vertical padding in user units (set to 'auto' for automatic padding)</li>
     * <li>array $style['fgcolor'] color array for bars and text</li>
     * <li>mixed $style['bgcolor'] color array for background (set to false for transparent)</li>
     * <li>boolean $style['text'] if true prints text below the barcode</li>
     * <li>string $style['label'] override default label</li>
     * <li>string $style['font'] font name for text</li><li>int $style['fontsize'] font size for text</li>
     * <li>int $style['stretchtext']: 0 = disabled; 1 = horizontal scaling only if necessary; 2 = forced horizontal scaling; 3 = character spacing only if necessary; 4 = forced character spacing.</li>
     * <li>string $style['position'] horizontal position of the containing barcode cell on the page: L = left margin; C = center; R = right margin.</li>
     * <li>string $style['align'] horizontal position of the barcode on the containing rectangle: L = left; C = center; R = right.</li>
     * <li>string $style['stretch'] if true stretch the barcode to best fit the available width, otherwise uses $xres resolution for a single bar.</li>
     * <li>string $style['fitwidth'] if true reduce the width to fit the barcode width + padding. When this option is enabled the 'stretch' option is automatically disabled.</li>
     * <li>string $style['cellfitalign'] this option works only when 'fitwidth' is true and 'position' is unset or empty. Set the horizontal position of the containing barcode cell inside the specified rectangle: L = left; C = center; R = right.</li></ul>
     * @param $align (string) Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
     * @author Nicola Asuni
     * @since 3.1.000 (2008-06-09)
     * @public
     */
    public function write1DBarcode($code, $type, $x = '', $y = '', $w = '', $h = '', $xres = '', $style = array(), $align = '')
    {
    }
    /**
     * Print 2D Barcode.
     * @param $code (string) code to print
     * @param $type (string) type of barcode (see tcpdf_barcodes_2d.php for supported formats).
     * @param $x (int) x position in user units
     * @param $y (int) y position in user units
     * @param $w (int) width in user units
     * @param $h (int) height in user units
     * @param $style (array) array of options:<ul>
     * <li>boolean $style['border'] if true prints a border around the barcode</li>
     * <li>int $style['padding'] padding to leave around the barcode in barcode units (set to 'auto' for automatic padding)</li>
     * <li>int $style['hpadding'] horizontal padding in barcode units (set to 'auto' for automatic padding)</li>
     * <li>int $style['vpadding'] vertical padding in barcode units (set to 'auto' for automatic padding)</li>
     * <li>int $style['module_width'] width of a single module in points</li>
     * <li>int $style['module_height'] height of a single module in points</li>
     * <li>array $style['fgcolor'] color array for bars and text</li>
     * <li>mixed $style['bgcolor'] color array for background or false for transparent</li>
     * <li>string $style['position'] barcode position on the page: L = left margin; C = center; R = right margin; S = stretch</li><li>$style['module_width'] width of a single module in points</li>
     * <li>$style['module_height'] height of a single module in points</li></ul>
     * @param $align (string) Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
     * @param $distort (boolean) if true distort the barcode to fit width and height, otherwise preserve aspect ratio
     * @author Nicola Asuni
     * @since 4.5.037 (2009-04-07)
     * @public
     */
    public function write2DBarcode($code, $type, $x = '', $y = '', $w = '', $h = '', $style = array(), $align = '', $distort = \false)
    {
    }
    /**
    * Returns an array containing current margins:
    * <ul>
    			<li>$ret['left'] = left margin</li>
    			<li>$ret['right'] = right margin</li>
    			<li>$ret['top'] = top margin</li>
    			<li>$ret['bottom'] = bottom margin</li>
    			<li>$ret['header'] = header margin</li>
    			<li>$ret['footer'] = footer margin</li>
    			<li>$ret['cell'] = cell padding array</li>
    			<li>$ret['padding_left'] = cell left padding</li>
    			<li>$ret['padding_top'] = cell top padding</li>
    			<li>$ret['padding_right'] = cell right padding</li>
    			<li>$ret['padding_bottom'] = cell bottom padding</li>
    * </ul>
    * @return array containing all margins measures
    * @public
    * @since 3.2.000 (2008-06-23)
    */
    public function getMargins()
    {
    }
    /**
    * Returns an array containing original margins:
    * <ul>
    			<li>$ret['left'] = left margin</li>
    			<li>$ret['right'] = right margin</li>
    * </ul>
    * @return array containing all margins measures
    * @public
    * @since 4.0.012 (2008-07-24)
    */
    public function getOriginalMargins()
    {
    }
    /**
     * Returns the current font size.
     * @return current font size
     * @public
     * @since 3.2.000 (2008-06-23)
     */
    public function getFontSize()
    {
    }
    /**
     * Returns the current font size in points unit.
     * @return current font size in points unit
     * @public
     * @since 3.2.000 (2008-06-23)
     */
    public function getFontSizePt()
    {
    }
    /**
     * Returns the current font family name.
     * @return string current font family name
     * @public
     * @since 4.3.008 (2008-12-05)
     */
    public function getFontFamily()
    {
    }
    /**
     * Returns the current font style.
     * @return string current font style
     * @public
     * @since 4.3.008 (2008-12-05)
     */
    public function getFontStyle()
    {
    }
    /**
     * Cleanup HTML code (requires HTML Tidy library).
     * @param $html (string) htmlcode to fix
     * @param $default_css (string) CSS commands to add
     * @param $tagvs (array) parameters for setHtmlVSpace method
     * @param $tidy_options (array) options for tidy_parse_string function
     * @return string XHTML code cleaned up
     * @author Nicola Asuni
     * @public
     * @since 5.9.017 (2010-11-16)
     * @see setHtmlVSpace()
     */
    public function fixHTMLCode($html, $default_css = '', $tagvs = '', $tidy_options = '')
    {
    }
    /**
     * Returns the border width from CSS property
     * @param $width (string) border width
     * @return int with in user units
     * @protected
     * @since 5.7.000 (2010-08-02)
     */
    protected function getCSSBorderWidth($width)
    {
    }
    /**
     * Returns the border dash style from CSS property
     * @param $style (string) border style to convert
     * @return int sash style (return -1 in case of none or hidden border)
     * @protected
     * @since 5.7.000 (2010-08-02)
     */
    protected function getCSSBorderDashStyle($style)
    {
    }
    /**
     * Returns the border style array from CSS border properties
     * @param $cssborder (string) border properties
     * @return array containing border properties
     * @protected
     * @since 5.7.000 (2010-08-02)
     */
    protected function getCSSBorderStyle($cssborder)
    {
    }
    /**
     * Get the internal Cell padding from CSS attribute.
     * @param $csspadding (string) padding properties
     * @param $width (float) width of the containing element
     * @return array of cell paddings
     * @public
     * @since 5.9.000 (2010-10-04)
     */
    public function getCSSPadding($csspadding, $width = 0)
    {
    }
    /**
     * Get the internal Cell margin from CSS attribute.
     * @param $cssmargin (string) margin properties
     * @param $width (float) width of the containing element
     * @return array of cell margins
     * @public
     * @since 5.9.000 (2010-10-04)
     */
    public function getCSSMargin($cssmargin, $width = 0)
    {
    }
    /**
     * Get the border-spacing from CSS attribute.
     * @param $cssbspace (string) border-spacing CSS properties
     * @param $width (float) width of the containing element
     * @return array of border spacings
     * @public
     * @since 5.9.010 (2010-10-27)
     */
    public function getCSSBorderMargin($cssbspace, $width = 0)
    {
    }
    /**
     * Returns the letter-spacing value from CSS value
     * @param $spacing (string) letter-spacing value
     * @param $parent (float) font spacing (tracking) value of the parent element
     * @return float quantity to increases or decreases the space between characters in a text.
     * @protected
     * @since 5.9.000 (2010-10-02)
     */
    protected function getCSSFontSpacing($spacing, $parent = 0)
    {
    }
    /**
     * Returns the percentage of font stretching from CSS value
     * @param $stretch (string) stretch mode
     * @param $parent (float) stretch value of the parent element
     * @return float font stretching percentage
     * @protected
     * @since 5.9.000 (2010-10-02)
     */
    protected function getCSSFontStretching($stretch, $parent = 100)
    {
    }
    /**
     * Convert HTML string containing font size value to points
     * @param $val (string) String containing font size value and unit.
     * @param $refsize (float) Reference font size in points.
     * @param $parent_size (float) Parent font size in points.
     * @param $defaultunit (string) Default unit (can be one of the following: %, em, ex, px, in, mm, pc, pt).
     * @return float value in points
     * @public
     */
    public function getHTMLFontUnits($val, $refsize = 12, $parent_size = 12, $defaultunit = 'pt')
    {
    }
    /**
     * Returns the HTML DOM array.
     * @param $html (string) html code
     * @return array
     * @protected
     * @since 3.2.000 (2008-06-20)
     */
    protected function getHtmlDomArray($html)
    {
    }
    /**
     * Returns the string used to find spaces
     * @return string
     * @protected
     * @author Nicola Asuni
     * @since 4.8.024 (2010-01-15)
     */
    protected function getSpaceString()
    {
    }
    /**
     * Return an hash code used to ensure that the serialized data has been generated by this TCPDF instance.
     * @param $data (string) serialized data
     * @return string
     * @public static
     */
    protected function getHashForTCPDFtagParams($data)
    {
    }
    /**
     * Serialize an array of parameters to be used with TCPDF tag in HTML code.
     * @param $data (array) parameters array
     * @return string containing serialized data
     * @public static
     */
    public function serializeTCPDFtagParameters($data)
    {
    }
    /**
     * Unserialize parameters to be used with TCPDF tag in HTML code.
     * @param $data (string) serialized data
     * @return array containing unserialized data
     * @protected static
     */
    protected function unserializeTCPDFtagParameters($data)
    {
    }
    /**
    * Prints a cell (rectangular area) with optional borders, background color and html text string.
    * The upper-left corner of the cell corresponds to the current position. After the call, the current position moves to the right or to the next line.<br />
    * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
    * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
    * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
    * NOTE: all the HTML attributes must be enclosed in double-quote.
    * @param $w (float) Cell width. If 0, the cell extends up to the right margin.
    * @param $h (float) Cell minimum height. The cell extends automatically if needed.
    * @param $x (float) upper-left corner X coordinate
    * @param $y (float) upper-left corner Y coordinate
    * @param $html (string) html text to print. Default value: empty string.
    * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
    * @param $ln (int) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL language)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>
    Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
    * @param $fill (boolean) Indicates if the cell background must be painted (true) or transparent (false).
    * @param $reseth (boolean) if true reset the last cell height (default true).
    * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
    * @param $autopadding (boolean) if true, uses internal padding and automatically adjust it to account for line width.
    * @see Multicell(), writeHTML()
    * @public
    */
    public function writeHTMLCell($w, $h, $x, $y, $html = '', $border = 0, $ln = 0, $fill = \false, $reseth = \true, $align = '', $autopadding = \true)
    {
    }
    /**
     * Allows to preserve some HTML formatting (limited support).<br />
     * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
     * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
     * NOTE: all the HTML attributes must be enclosed in double-quote.
     * @param $html (string) text to display
     * @param $ln (boolean) if true add a new line after text (default = true)
     * @param $fill (boolean) Indicates if the background must be painted (true) or transparent (false).
     * @param $reseth (boolean) if true reset the last cell height (default false).
     * @param $cell (boolean) if true add the current left (or right for RTL) padding to each Write (default false).
     * @param $align (string) Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
     * @public
     */
    public function writeHTML($html, $ln = \true, $fill = \false, $reseth = \false, $cell = \false, $align = '')
    {
    }
    /**
     * Process opening tags.
     * @param $dom (array) html dom array
     * @param $key (int) current element id
     * @param $cell (boolean) if true add the default left (or right if RTL) padding to each new line (default false).
     * @return $dom array
     * @protected
     */
    protected function openHTMLTagHandler($dom, $key, $cell)
    {
    }
    /**
     * Process closing tags.
     * @param $dom (array) html dom array
     * @param $key (int) current element id
     * @param $cell (boolean) if true add the default left (or right if RTL) padding to each new line (default false).
     * @param $maxbottomliney (int) maximum y value of current line
     * @return $dom array
     * @protected
     */
    protected function closeHTMLTagHandler($dom, $key, $cell, $maxbottomliney = 0)
    {
    }
    /**
     * Add vertical spaces if needed.
     * @param $hbz (string) Distance between current y and line bottom.
     * @param $hb (string) The height of the break.
     * @param $cell (boolean) if true add the default left (or right if RTL) padding to each new line (default false).
     * @param $firsttag (boolean) set to true when the tag is the first.
     * @param $lasttag (boolean) set to true when the tag is the last.
     * @protected
     */
    protected function addHTMLVertSpace($hbz = 0, $hb = 0, $cell = \false, $firsttag = \false, $lasttag = \false)
    {
    }
    /**
     * Return the starting coordinates to draw an html border
     * @return array containing top-left border coordinates
     * @protected
     * @since 5.7.000 (2010-08-03)
     */
    protected function getBorderStartPosition()
    {
    }
    /**
     * Draw an HTML block border and fill
     * @param $tag (array) array of tag properties.
     * @param $xmax (int) end X coordinate for border.
     * @protected
     * @since 5.7.000 (2010-08-03)
     */
    protected function drawHTMLTagBorder($tag, $xmax)
    {
    }
    /**
     * Set the default bullet to be used as LI bullet symbol
     * @param $symbol (string) character or string to be used (legal values are: '' = automatic, '!' = auto bullet, '#' = auto numbering, 'disc', 'disc', 'circle', 'square', '1', 'decimal', 'decimal-leading-zero', 'i', 'lower-roman', 'I', 'upper-roman', 'a', 'lower-alpha', 'lower-latin', 'A', 'upper-alpha', 'upper-latin', 'lower-greek', 'img|type|width|height|image.ext')
     * @public
     * @since 4.0.028 (2008-09-26)
     */
    public function setLIsymbol($symbol = '!')
    {
    }
    /**
     * Set the booklet mode for double-sided pages.
     * @param $booklet (boolean) true set the booklet mode on, false otherwise.
     * @param $inner (float) Inner page margin.
     * @param $outer (float) Outer page margin.
     * @public
     * @since 4.2.000 (2008-10-29)
     */
    public function SetBooklet($booklet = \true, $inner = -1, $outer = -1)
    {
    }
    /**
     * Swap the left and right margins.
     * @param $reverse (boolean) if true swap left and right margins.
     * @protected
     * @since 4.2.000 (2008-10-29)
     */
    protected function swapMargins($reverse = \true)
    {
    }
    /**
     * Set the vertical spaces for HTML tags.
     * The array must have the following structure (example):
     * $tagvs = array('h1' => array(0 => array('h' => '', 'n' => 2), 1 => array('h' => 1.3, 'n' => 1)));
     * The first array level contains the tag names,
     * the second level contains 0 for opening tags or 1 for closing tags,
     * the third level contains the vertical space unit (h) and the number spaces to add (n).
     * If the h parameter is not specified, default values are used.
     * @param $tagvs (array) array of tags and relative vertical spaces.
     * @public
     * @since 4.2.001 (2008-10-30)
     */
    public function setHtmlVSpace($tagvs)
    {
    }
    /**
     * Set custom width for list indentation.
     * @param $width (float) width of the indentation. Use negative value to disable it.
     * @public
     * @since 4.2.007 (2008-11-12)
     */
    public function setListIndentWidth($width)
    {
    }
    /**
     * Set the top/bottom cell sides to be open or closed when the cell cross the page.
     * @param $isopen (boolean) if true keeps the top/bottom border open for the cell sides that cross the page.
     * @public
     * @since 4.2.010 (2008-11-14)
     */
    public function setOpenCell($isopen)
    {
    }
    /**
     * Set the color and font style for HTML links.
     * @param $color (array) RGB array of colors
     * @param $fontstyle (string) additional font styles to add
     * @public
     * @since 4.4.003 (2008-12-09)
     */
    public function setHtmlLinksStyle($color = array(0, 0, 255), $fontstyle = 'U')
    {
    }
    /**
     * Convert HTML string containing value and unit of measure to user's units or points.
     * @param $htmlval (string) String containing values and unit.
     * @param $refsize (string) Reference value in points.
     * @param $defaultunit (string) Default unit (can be one of the following: %, em, ex, px, in, mm, pc, pt).
     * @param $points (boolean) If true returns points, otherwise returns value in user's units.
     * @return float value in user's unit or point if $points=true
     * @public
     * @since 4.4.004 (2008-12-10)
     */
    public function getHTMLUnitToUnits($htmlval, $refsize = 1, $defaultunit = 'px', $points = \false)
    {
    }
    /**
     * Output an HTML list bullet or ordered item symbol
     * @param $listdepth (int) list nesting level
     * @param $listtype (string) type of list
     * @param $size (float) current font size
     * @protected
     * @since 4.4.004 (2008-12-10)
     */
    protected function putHtmlListBullet($listdepth, $listtype = '', $size = 10)
    {
    }
    /**
     * Returns current graphic variables as array.
     * @return array of graphic variables
     * @protected
     * @since 4.2.010 (2008-11-14)
     */
    protected function getGraphicVars()
    {
    }
    /**
     * Set graphic variables.
     * @param $gvars (array) array of graphic variablesto restore
     * @param $extended (boolean) if true restore extended graphic variables
     * @protected
     * @since 4.2.010 (2008-11-14)
     */
    protected function setGraphicVars($gvars, $extended = \false)
    {
    }
    /**
     * Outputs the "save graphics state" operator 'q'
     * @protected
     */
    protected function _outSaveGraphicsState()
    {
    }
    /**
     * Outputs the "restore graphics state" operator 'Q'
     * @protected
     */
    protected function _outRestoreGraphicsState()
    {
    }
    /**
     * Set buffer content (always append data).
     * @param $data (string) data
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected function setBuffer($data)
    {
    }
    /**
     * Replace the buffer content
     * @param $data (string) data
     * @protected
     * @since 5.5.000 (2010-06-22)
     */
    protected function replaceBuffer($data)
    {
    }
    /**
     * Get buffer content.
     * @return string buffer content
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected function getBuffer()
    {
    }
    /**
     * Set page buffer content.
     * @param $page (int) page number
     * @param $data (string) page data
     * @param $append (boolean) if true append data, false replace.
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected function setPageBuffer($page, $data, $append = \false)
    {
    }
    /**
     * Get page buffer content.
     * @param $page (int) page number
     * @return string page buffer content or false in case of error
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected function getPageBuffer($page)
    {
    }
    /**
     * Set image buffer content.
     * @param $image (string) image key
     * @param $data (array) image data
     * @return int image index number
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected function setImageBuffer($image, $data)
    {
    }
    /**
     * Set image buffer content for a specified sub-key.
     * @param $image (string) image key
     * @param $key (string) image sub-key
     * @param $data (array) image data
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected function setImageSubBuffer($image, $key, $data)
    {
    }
    /**
     * Get image buffer content.
     * @param $image (string) image key
     * @return string image buffer content or false in case of error
     * @protected
     * @since 4.5.000 (2008-12-31)
     */
    protected function getImageBuffer($image)
    {
    }
    /**
     * Set font buffer content.
     * @param $font (string) font key
     * @param $data (array) font data
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected function setFontBuffer($font, $data)
    {
    }
    /**
     * Set font buffer content.
     * @param $font (string) font key
     * @param $key (string) font sub-key
     * @param $data (array) font data
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected function setFontSubBuffer($font, $key, $data)
    {
    }
    /**
     * Get font buffer content.
     * @param $font (string) font key
     * @return string font buffer content or false in case of error
     * @protected
     * @since 4.5.000 (2009-01-02)
     */
    protected function getFontBuffer($font)
    {
    }
    /**
     * Move a page to a previous position.
     * @param $frompage (int) number of the source page
     * @param $topage (int) number of the destination page (must be less than $frompage)
     * @return true in case of success, false in case of error.
     * @public
     * @since 4.5.000 (2009-01-02)
     */
    public function movePage($frompage, $topage)
    {
    }
    /**
     * Remove the specified page.
     * @param $page (int) page to remove
     * @return true in case of success, false in case of error.
     * @public
     * @since 4.6.004 (2009-04-23)
     */
    public function deletePage($page)
    {
    }
    /**
     * Clone the specified page to a new page.
     * @param $page (int) number of page to copy (0 = current page)
     * @return true in case of success, false in case of error.
     * @public
     * @since 4.9.015 (2010-04-20)
     */
    public function copyPage($page = 0)
    {
    }
    /**
     * Output a Table of Content Index (TOC).
     * This method must be called after all Bookmarks were set.
     * Before calling this method you have to open the page using the addTOCPage() method.
     * After calling this method you have to call endTOCPage() to close the TOC page.
     * You can override this method to achieve different styles.
     * @param $page (int) page number where this TOC should be inserted (leave empty for current page).
     * @param $numbersfont (string) set the font for page numbers (please use monospaced font for better alignment).
     * @param $filler (string) string used to fill the space between text and page number.
     * @param $toc_name (string) name to use for TOC bookmark.
     * @param $style (string) Font style for title: B = Bold, I = Italic, BI = Bold + Italic.
     * @param $color (array) RGB color array for bookmark title (values from 0 to 255).
     * @public
     * @author Nicola Asuni
     * @since 4.5.000 (2009-01-02)
     * @see addTOCPage(), endTOCPage(), addHTMLTOC()
     */
    public function addTOC($page = '', $numbersfont = '', $filler = '.', $toc_name = 'TOC', $style = '', $color = array(0, 0, 0))
    {
    }
    /**
     * Output a Table Of Content Index (TOC) using HTML templates.
     * This method must be called after all Bookmarks were set.
     * Before calling this method you have to open the page using the addTOCPage() method.
     * After calling this method you have to call endTOCPage() to close the TOC page.
     * @param $page (int) page number where this TOC should be inserted (leave empty for current page).
     * @param $toc_name (string) name to use for TOC bookmark.
     * @param $templates (array) array of html templates. Use: "#TOC_DESCRIPTION#" for bookmark title, "#TOC_PAGE_NUMBER#" for page number.
     * @param $correct_align (boolean) if true correct the number alignment (numbers must be in monospaced font like courier and right aligned on LTR, or left aligned on RTL)
     * @param $style (string) Font style for title: B = Bold, I = Italic, BI = Bold + Italic.
     * @param $color (array) RGB color array for title (values from 0 to 255).
     * @public
     * @author Nicola Asuni
     * @since 5.0.001 (2010-05-06)
     * @see addTOCPage(), endTOCPage(), addTOC()
     */
    public function addHTMLTOC($page = '', $toc_name = 'TOC', $templates = array(), $correct_align = \true, $style = '', $color = array(0, 0, 0))
    {
    }
    /**
     * Stores a copy of the current TCPDF object used for undo operation.
     * @public
     * @since 4.5.029 (2009-03-19)
     */
    public function startTransaction()
    {
    }
    /**
     * Delete the copy of the current TCPDF object used for undo operation.
     * @public
     * @since 4.5.029 (2009-03-19)
     */
    public function commitTransaction()
    {
    }
    /**
     * This method allows to undo the latest transaction by returning the latest saved TCPDF object with startTransaction().
     * @param $self (boolean) if true restores current class object to previous state without the need of reassignment via the returned value.
     * @return TCPDF object.
     * @public
     * @since 4.5.029 (2009-03-19)
     */
    public function rollbackTransaction($self = \false)
    {
    }
    // --- MULTI COLUMNS METHODS -----------------------
    /**
     * Set multiple columns of the same size
     * @param $numcols (int) number of columns (set to zero to disable columns mode)
     * @param $width (int) column width
     * @param $y (int) column starting Y position (leave empty for current Y position)
     * @public
     * @since 4.9.001 (2010-03-28)
     */
    public function setEqualColumns($numcols = 0, $width = 0, $y = '')
    {
    }
    /**
     * Remove columns and reset page margins.
     * @public
     * @since 5.9.072 (2011-04-26)
     */
    public function resetColumns()
    {
    }
    /**
     * Set columns array.
     * Each column is represented by an array of arrays with the following keys: (w = width, s = space between columns, y = column top position).
     * @param $columns (array)
     * @public
     * @since 4.9.001 (2010-03-28)
     */
    public function setColumnsArray($columns)
    {
    }
    /**
     * Set position at a given column
     * @param $col (int) column number (from 0 to getNumberOfColumns()-1); empty string = current column.
     * @public
     * @since 4.9.001 (2010-03-28)
     */
    public function selectColumn($col = '')
    {
    }
    /**
     * Return the current column number
     * @return int current column number
     * @public
     * @since 5.5.011 (2010-07-08)
     */
    public function getColumn()
    {
    }
    /**
     * Return the current number of columns.
     * @return int number of columns
     * @public
     * @since 5.8.018 (2010-08-25)
     */
    public function getNumberOfColumns()
    {
    }
    /**
     * Set Text rendering mode.
     * @param $stroke (int) outline size in user units (0 = disable).
     * @param $fill (boolean) if true fills the text (default).
     * @param $clip (boolean) if true activate clipping mode
     * @public
     * @since 4.9.008 (2009-04-02)
     */
    public function setTextRenderingMode($stroke = 0, $fill = \true, $clip = \false)
    {
    }
    /**
     * Set parameters for drop shadow effect for text.
     * @param $params (array) Array of parameters: enabled (boolean) set to true to enable shadow; depth_w (float) shadow width in user units; depth_h (float) shadow height in user units; color (array) shadow color or false to use the stroke color; opacity (float) Alpha value: real value from 0 (transparent) to 1 (opaque); blend_mode (string) blend mode, one of the following: Normal, Multiply, Screen, Overlay, Darken, Lighten, ColorDodge, ColorBurn, HardLight, SoftLight, Difference, Exclusion, Hue, Saturation, Color, Luminosity.
     * @since 5.9.174 (2012-07-25)
     * @public
     */
    public function setTextShadow($params = array('enabled' => \false, 'depth_w' => 0, 'depth_h' => 0, 'color' => \false, 'opacity' => 1, 'blend_mode' => 'Normal'))
    {
    }
    /**
     * Return the text shadow parameters array.
     * @return Array of parameters.
     * @since 5.9.174 (2012-07-25)
     * @public
     */
    public function getTextShadow()
    {
    }
    /**
     * Returns an array of chars containing soft hyphens.
     * @param $word (array) array of chars
     * @param $patterns (array) Array of hypenation patterns.
     * @param $dictionary (array) Array of words to be returned without applying the hyphenation algorithm.
     * @param $leftmin (int) Minimum number of character to leave on the left of the word without applying the hyphens.
     * @param $rightmin (int) Minimum number of character to leave on the right of the word without applying the hyphens.
     * @param $charmin (int) Minimum word length to apply the hyphenation algorithm.
     * @param $charmax (int) Maximum length of broken piece of word.
     * @return array text with soft hyphens
     * @author Nicola Asuni
     * @since 4.9.012 (2010-04-12)
     * @protected
     */
    protected function hyphenateWord($word, $patterns, $dictionary = array(), $leftmin = 1, $rightmin = 2, $charmin = 1, $charmax = 8)
    {
    }
    /**
     * Returns text with soft hyphens.
     * @param $text (string) text to process
     * @param $patterns (mixed) Array of hypenation patterns or a TEX file containing hypenation patterns. TEX patterns can be downloaded from http://www.ctan.org/tex-archive/language/hyph-utf8/tex/generic/hyph-utf8/patterns/
     * @param $dictionary (array) Array of words to be returned without applying the hyphenation algorithm.
     * @param $leftmin (int) Minimum number of character to leave on the left of the word without applying the hyphens.
     * @param $rightmin (int) Minimum number of character to leave on the right of the word without applying the hyphens.
     * @param $charmin (int) Minimum word length to apply the hyphenation algorithm.
     * @param $charmax (int) Maximum length of broken piece of word.
     * @return array text with soft hyphens
     * @author Nicola Asuni
     * @since 4.9.012 (2010-04-12)
     * @public
     */
    public function hyphenateText($text, $patterns, $dictionary = array(), $leftmin = 1, $rightmin = 2, $charmin = 1, $charmax = 8)
    {
    }
    /**
     * Enable/disable rasterization of vector images using ImageMagick library.
     * @param $mode (boolean) if true enable rasterization, false otherwise.
     * @public
     * @since 5.0.000 (2010-04-27)
     */
    public function setRasterizeVectorImages($mode)
    {
    }
    /**
     * Enable or disable default option for font subsetting.
     * @param $enable (boolean) if true enable font subsetting by default.
     * @author Nicola Asuni
     * @public
     * @since 5.3.002 (2010-06-07)
     */
    public function setFontSubsetting($enable = \true)
    {
    }
    /**
     * Return the default option for font subsetting.
     * @return boolean default font subsetting state.
     * @author Nicola Asuni
     * @public
     * @since 5.3.002 (2010-06-07)
     */
    public function getFontSubsetting()
    {
    }
    /**
     * Left trim the input string
     * @param $str (string) string to trim
     * @param $replace (string) string that replace spaces.
     * @return left trimmed string
     * @author Nicola Asuni
     * @public
     * @since 5.8.000 (2010-08-11)
     */
    public function stringLeftTrim($str, $replace = '')
    {
    }
    /**
     * Right trim the input string
     * @param $str (string) string to trim
     * @param $replace (string) string that replace spaces.
     * @return right trimmed string
     * @author Nicola Asuni
     * @public
     * @since 5.8.000 (2010-08-11)
     */
    public function stringRightTrim($str, $replace = '')
    {
    }
    /**
     * Trim the input string
     * @param $str (string) string to trim
     * @param $replace (string) string that replace spaces.
     * @return trimmed string
     * @author Nicola Asuni
     * @public
     * @since 5.8.000 (2010-08-11)
     */
    public function stringTrim($str, $replace = '')
    {
    }
    /**
     * Return true if the current font is unicode type.
     * @return true for unicode font, false otherwise.
     * @author Nicola Asuni
     * @public
     * @since 5.8.002 (2010-08-14)
     */
    public function isUnicodeFont()
    {
    }
    /**
     * Return normalized font name
     * @param $fontfamily (string) property string containing font family names
     * @return string normalized font name
     * @author Nicola Asuni
     * @public
     * @since 5.8.004 (2010-08-17)
     */
    public function getFontFamilyName($fontfamily)
    {
    }
    /**
     * Start a new XObject Template.
     * An XObject Template is a PDF block that is a self-contained description of any sequence of graphics objects (including path objects, text objects, and sampled images).
     * An XObject Template may be painted multiple times, either on several pages or at several locations on the same page and produces the same results each time, subject only to the graphics state at the time it is invoked.
     * Note: X,Y coordinates will be reset to 0,0.
     * @param $w (int) Template width in user units (empty string or zero = page width less margins).
     * @param $h (int) Template height in user units (empty string or zero = page height less margins).
     * @param $group (mixed) Set transparency group. Can be a boolean value or an array specifying optional parameters: 'CS' (solour space name), 'I' (boolean flag to indicate isolated group) and 'K' (boolean flag to indicate knockout group).
     * @return int the XObject Template ID in case of success or false in case of error.
     * @author Nicola Asuni
     * @public
     * @since 5.8.017 (2010-08-24)
     * @see endTemplate(), printTemplate()
     */
    public function startTemplate($w = 0, $h = 0, $group = \false)
    {
    }
    /**
     * End the current XObject Template started with startTemplate() and restore the previous graphic state.
     * An XObject Template is a PDF block that is a self-contained description of any sequence of graphics objects (including path objects, text objects, and sampled images).
     * An XObject Template may be painted multiple times, either on several pages or at several locations on the same page and produces the same results each time, subject only to the graphics state at the time it is invoked.
     * @return int the XObject Template ID in case of success or false in case of error.
     * @author Nicola Asuni
     * @public
     * @since 5.8.017 (2010-08-24)
     * @see startTemplate(), printTemplate()
     */
    public function endTemplate()
    {
    }
    /**
     * Print an XObject Template.
     * You can print an XObject Template inside the currently opened Template.
     * An XObject Template is a PDF block that is a self-contained description of any sequence of graphics objects (including path objects, text objects, and sampled images).
     * An XObject Template may be painted multiple times, either on several pages or at several locations on the same page and produces the same results each time, subject only to the graphics state at the time it is invoked.
     * @param $id (string) The ID of XObject Template to print.
     * @param $x (int) X position in user units (empty string = current x position)
     * @param $y (int) Y position in user units (empty string = current y position)
     * @param $w (int) Width in user units (zero = remaining page width)
     * @param $h (int) Height in user units (zero = remaining page height)
     * @param $align (string) Indicates the alignment of the pointer next to template insertion relative to template height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
     * @param $palign (string) Allows to center or align the template on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
     * @param $fitonpage (boolean) If true the template is resized to not exceed page dimensions.
     * @author Nicola Asuni
     * @public
     * @since 5.8.017 (2010-08-24)
     * @see startTemplate(), endTemplate()
     */
    public function printTemplate($id, $x = '', $y = '', $w = 0, $h = 0, $align = '', $palign = '', $fitonpage = \false)
    {
    }
    /**
     * Set the percentage of character stretching.
     * @param $perc (int) percentage of stretching (100 = no stretching)
     * @author Nicola Asuni
     * @public
     * @since 5.9.000 (2010-09-29)
     */
    public function setFontStretching($perc = 100)
    {
    }
    /**
     * Get the percentage of character stretching.
     * @return float stretching value
     * @author Nicola Asuni
     * @public
     * @since 5.9.000 (2010-09-29)
     */
    public function getFontStretching()
    {
    }
    /**
     * Set the amount to increase or decrease the space between characters in a text.
     * @param $spacing (float) amount to increase or decrease the space between characters in a text (0 = default spacing)
     * @author Nicola Asuni
     * @public
     * @since 5.9.000 (2010-09-29)
     */
    public function setFontSpacing($spacing = 0)
    {
    }
    /**
     * Get the amount to increase or decrease the space between characters in a text.
     * @return int font spacing (tracking) value
     * @author Nicola Asuni
     * @public
     * @since 5.9.000 (2010-09-29)
     */
    public function getFontSpacing()
    {
    }
    /**
     * Return an array of no-write page regions
     * @return array of no-write page regions
     * @author Nicola Asuni
     * @public
     * @since 5.9.003 (2010-10-13)
     * @see setPageRegions(), addPageRegion()
     */
    public function getPageRegions()
    {
    }
    /**
     * Set no-write regions on page.
     * A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code.
     * A region is always aligned on the left or right side of the page ad is defined using a vertical segment.
     * You can set multiple regions for the same page.
     * @param $regions (array) array of no-write regions. For each region you can define an array as follow: ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right). Omit this parameter to remove all regions.
     * @author Nicola Asuni
     * @public
     * @since 5.9.003 (2010-10-13)
     * @see addPageRegion(), getPageRegions()
     */
    public function setPageRegions($regions = array())
    {
    }
    /**
     * Add a single no-write region on selected page.
     * A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code.
     * A region is always aligned on the left or right side of the page ad is defined using a vertical segment.
     * You can set multiple regions for the same page.
     * @param $region (array) array of a single no-write region array: ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right).
     * @author Nicola Asuni
     * @public
     * @since 5.9.003 (2010-10-13)
     * @see setPageRegions(), getPageRegions()
     */
    public function addPageRegion($region)
    {
    }
    /**
     * Remove a single no-write region.
     * @param $key (int) region key
     * @author Nicola Asuni
     * @public
     * @since 5.9.003 (2010-10-13)
     * @see setPageRegions(), getPageRegions()
     */
    public function removePageRegion($key)
    {
    }
    /**
     * Check page for no-write regions and adapt current coordinates and page margins if necessary.
     * A no-write region is a portion of the page with a rectangular or trapezium shape that will not be covered when writing text or html code.
     * A region is always aligned on the left or right side of the page ad is defined using a vertical segment.
     * @param $h (float) height of the text/image/object to print in user units
     * @param $x (float) current X coordinate in user units
     * @param $y (float) current Y coordinate in user units
     * @return array($x, $y)
     * @author Nicola Asuni
     * @protected
     * @since 5.9.003 (2010-10-13)
     */
    protected function checkPageRegions($h, $x, $y)
    {
    }
    // --- SVG METHODS ---------------------------------------------------------
    /**
     * Embedd a Scalable Vector Graphics (SVG) image.
     * NOTE: SVG standard is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
     * @param $file (string) Name of the SVG file or a '@' character followed by the SVG data string.
     * @param $x (float) Abscissa of the upper-left corner.
     * @param $y (float) Ordinate of the upper-left corner.
     * @param $w (float) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $h (float) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
     * @param $link (mixed) URL or identifier returned by AddLink().
     * @param $align (string) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul> If the alignment is an empty string, then the pointer will be restored on the starting SVG position.
     * @param $palign (string) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
     * @param $border (mixed) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
     * @param $fitonpage (boolean) if true the image is resized to not exceed page dimensions.
     * @author Nicola Asuni
     * @since 5.0.000 (2010-05-02)
     * @public
     */
    public function ImageSVG($file, $x = '', $y = '', $w = 0, $h = 0, $link = '', $align = '', $palign = '', $border = 0, $fitonpage = \false)
    {
    }
    /**
     * Convert SVG transformation matrix to PDF.
     * @param $tm (array) original SVG transformation matrix
     * @return array transformation matrix
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected function convertSVGtMatrix($tm)
    {
    }
    /**
     * Apply SVG graphic transformation matrix.
     * @param $tm (array) original SVG transformation matrix
     * @protected
     * @since 5.0.000 (2010-05-02)
     */
    protected function SVGTransform($tm)
    {
    }
    /**
     * Apply the requested SVG styles (*** TO BE COMPLETED ***)
     * @param $svgstyle (array) array of SVG styles to apply
     * @param $prevsvgstyle (array) array of previous SVG style
     * @param $x (int) X origin of the bounding box
     * @param $y (int) Y origin of the bounding box
     * @param $w (int) width of the bounding box
     * @param $h (int) height of the bounding box
     * @param $clip_function (string) clip function
     * @param $clip_params (array) array of parameters for clipping function
     * @return object style
     * @author Nicola Asuni
     * @since 5.0.000 (2010-05-02)
     * @protected
     */
    protected function setSVGStyles($svgstyle, $prevsvgstyle, $x = 0, $y = 0, $w = 1, $h = 1, $clip_function = '', $clip_params = array())
    {
    }
    /**
     * Draws an SVG path
     * @param $d (string) attribute d of the path SVG element
     * @param $style (string) Style of rendering. Possible values are:
     * <ul>
     *	 <li>D or empty string: Draw (default).</li>
     *	 <li>F: Fill.</li>
     *	 <li>F*: Fill using the even-odd rule to determine which regions lie inside the clipping path.</li>
     *	 <li>DF or FD: Draw and fill.</li>
     *	 <li>DF* or FD*: Draw and fill using the even-odd rule to determine which regions lie inside the clipping path.</li>
     *	 <li>CNZ: Clipping mode (using the even-odd rule to determine which regions lie inside the clipping path).</li>
     *	 <li>CEO: Clipping mode (using the nonzero winding number rule to determine which regions lie inside the clipping path).</li>
     * </ul>
     * @return array of container box measures (x, y, w, h)
     * @author Nicola Asuni
     * @since 5.0.000 (2010-05-02)
     * @protected
     */
    protected function SVGPath($d, $style = '')
    {
    }
    /**
     * Return the tag name without the namespace
     * @param $name (string) Tag name
     * @protected
     */
    protected function removeTagNamespace($name)
    {
    }
    /**
     * Sets the opening SVG element handler function for the XML parser. (*** TO BE COMPLETED ***)
     * @param $parser (resource) The first parameter, parser, is a reference to the XML parser calling the handler.
     * @param $name (string) The second parameter, name, contains the name of the element for which this handler is called. If case-folding is in effect for this parser, the element name will be in uppercase letters.
     * @param $attribs (array) The third parameter, attribs, contains an associative array with the element's attributes (if any). The keys of this array are the attribute names, the values are the attribute values. Attribute names are case-folded on the same criteria as element names. Attribute values are not case-folded. The original order of the attributes can be retrieved by walking through attribs the normal way, using each(). The first key in the array was the first attribute, and so on.
     * @param $ctm (array) tranformation matrix for clipping mode (starting transformation matrix).
     * @author Nicola Asuni
     * @since 5.0.000 (2010-05-02)
     * @protected
     */
    protected function startSVGElementHandler($parser, $name, $attribs, $ctm = array())
    {
    }
    /**
     * Sets the closing SVG element handler function for the XML parser.
     * @param $parser (resource) The first parameter, parser, is a reference to the XML parser calling the handler.
     * @param $name (string) The second parameter, name, contains the name of the element for which this handler is called. If case-folding is in effect for this parser, the element name will be in uppercase letters.
     * @author Nicola Asuni
     * @since 5.0.000 (2010-05-02)
     * @protected
     */
    protected function endSVGElementHandler($parser, $name)
    {
    }
    /**
     * Sets the character data handler function for the XML parser.
     * @param $parser (resource) The first parameter, parser, is a reference to the XML parser calling the handler.
     * @param $data (string) The second parameter, data, contains the character data as a string.
     * @author Nicola Asuni
     * @since 5.0.000 (2010-05-02)
     * @protected
     */
    protected function segSVGContentHandler($parser, $data)
    {
    }
    // --- END SVG METHODS -----------------------------------------------------
}