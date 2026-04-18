<?php

\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREHTML', 1);
\define('NOREQUIREAJAX', '1');
\define('ISLOADEDBYSTEELSHEET', '1');
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';
$path = '';
// This value may be used in future for external module to overwrite theme
$theme = 'md';
// Define image path files and other constants
$fontlist = 'roboto,arial,tahoma,verdana,helvetica';
$img_head = '';
$img_button = \dol_buildpath($path . '/theme/' . $theme . '/img/button_bg.png', 1);
$dol_hide_topmenu = $conf->dol_hide_topmenu;
$dol_hide_leftmenu = $conf->dol_hide_leftmenu;
$dol_optimize_smallscreen = $conf->dol_optimize_smallscreen;
$dol_no_mouse_hover = $conf->dol_no_mouse_hover;
//$conf->global->THEME_ELDY_ENABLE_PERSONALIZED=0;
//$user->conf->THEME_ELDY_ENABLE_PERSONALIZED=0;
//var_dump($user->conf->THEME_ELDY_RGB);
$useboldtitle = \getDolGlobalInt('THEME_ELDY_USEBOLDTITLE');
$borderwidth = 2;
$userborderontable = \getDolGlobalInt('THEME_ELDY_USEBORDERONTABLE');
// Case of option availables only if THEME_ELDY_ENABLE_PERSONALIZED is on
$colorbackhmenu1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1) : \getDolUserString('THEME_ELDY_TOPMENU_BACK1', $colorbackhmenu1);
$colorbackvmenu1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_VERMENU_BACK1', $colorbackvmenu1) : \getDolUserString('THEME_ELDY_VERMENU_BACK1', $colorbackvmenu1);
$colortopbordertitle1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TOPBORDER_TITLE1', $colortopbordertitle1) : \getDolUserString('THEME_ELDY_TOPBORDER_TITLE1', $colortopbordertitle1);
$colorbacktitle1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_BACKTITLE1', $colorbacktitle1) : \getDolUserString('THEME_ELDY_BACKTITLE1', $colorbacktitle1);
$colorbacktabcard1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_BACKTABCARD1', $colorbacktabcard1) : \getDolUserString('THEME_ELDY_BACKTABCARD1', $colorbacktabcard1);
$colorbacktabactive = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_BACKTABACTIVE', $colorbacktabactive) : \getDolUserString('THEME_ELDY_BACKTABACTIVE', $colorbacktabactive);
$colorbacklineimpair1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_LINEIMPAIR1', $colorbacklineimpair1) : \getDolUserString('THEME_ELDY_LINEIMPAIR1', $colorbacklineimpair1);
$colorbacklineimpair2 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_LINEIMPAIR2', $colorbacklineimpair2) : \getDolUserString('THEME_ELDY_LINEIMPAIR2', $colorbacklineimpair2);
$colorbacklinepair1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_LINEPAIR1', $colorbacklinepair1) : \getDolUserString('THEME_ELDY_LINEPAIR1', $colorbacklinepair1);
$colorbacklinepair2 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_LINEPAIR2', $colorbacklinepair2) : \getDolUserString('THEME_ELDY_LINEPAIR2', $colorbacklinepair2);
$colorbacklinebreak = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_LINEBREAK', $colorbacklinebreak) : \getDolUserString('THEME_ELDY_LINEBREAK', $colorbacklinebreak);
$colorbackbody = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_BACKBODY', $colorbackbody) : \getDolUserString('THEME_ELDY_BACKBODY', $colorbackbody);
$colortexttitlenotab = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TEXTTITLENOTAB', $colortexttitlenotab) : \getDolUserString('THEME_ELDY_TEXTTITLENOTAB', $colortexttitlenotab);
$colortexttitle = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TEXTTITLE', $colortext) : \getDolUserString('THEME_ELDY_TEXTTITLE', $colortexttitle);
$colortexttitlelink = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TEXTTITLELINK', $colortexttitlelink) : \getDolUserString('THEME_ELDY_TEXTTITLELINK', $colortexttitlelink);
$colortext = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TEXT', $colortext) : \getDolUserString('THEME_ELDY_TEXT', $colortext);
$colortextlink = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TEXTLINK', $colortext) : \getDolUserString('THEME_ELDY_TEXTLINK', $colortextlink);
$colortextlinkHsla = \colorHexToHsl($colortextlink, \false, \true);
$butactionbg = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_BTNACTION', $butactionbg) : \getDolUserString('THEME_ELDY_BTNACTION', $butactionbg);
$textbutaction = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_TEXTBTNACTION', $textbutaction) : \getDolUserString('THEME_ELDY_TEXTBTNACTION', $textbutaction);
$fontsize = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_FONT_SIZE1', $fontsize) : \getDolUserString('THEME_ELDY_FONT_SIZE1', $fontsize);
$fontsizesmaller = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_FONT_SIZE2', $fontsize) : \getDolUserString('THEME_ELDY_FONT_SIZE2', $fontsize);
$heightrow = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? \getDolGlobalString('THEME_ELDY_USECOMOACTROW') ? '300%' : '155%' : (\getDolUserString('THEME_ELDY_USECOMOACTROW') ? '300%' : '155%');
// Hover color
$colorbacklinepairhover = !isset($conf->global->THEME_ELDY_USE_HOVER) || \getDolGlobalString('THEME_ELDY_USE_HOVER') === '255,255,255' ? '' : (\getDolGlobalString('THEME_ELDY_USE_HOVER') === '1' ? 'edf4fb' : \getDolGlobalString('THEME_ELDY_USE_HOVER'));
$colorbacklinepairchecked = !isset($conf->global->THEME_ELDY_USE_CHECKED) || \getDolGlobalString('THEME_ELDY_USE_CHECKED') === '255,255,255' ? '' : (\getDolGlobalString('THEME_ELDY_USE_CHECKED') === '1' ? 'edf4fb' : \getDolGlobalString('THEME_ELDY_USE_CHECKED'));
// Set text color to black or white
$colorbackhmenu1 = \implode(',', \colorStringToArray($colorbackhmenu1));
// Normalize value to 'x,y,z'
$tmppart = \explode(',', $colorbackhmenu1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
$colorbackvmenu1 = \implode(',', \colorStringToArray($colorbackvmenu1));
// Normalize value to 'x,y,z'
$tmppart = \explode(',', $colorbackvmenu1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
$colortopbordertitle1 = \implode(',', \colorStringToArray($colortopbordertitle1));
// Normalize value to 'x,y,z'
$colorbacktitle1 = \implode(',', \colorStringToArray($colorbacktitle1));
// Normalize value to 'x,y,z'
$tmppart = \explode(',', $colorbacktitle1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
$colorbacktabcard1 = \implode(',', \colorStringToArray($colorbacktabcard1));
// Normalize value to 'x,y,z'
$tmppart = \explode(',', $colorbacktabcard1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
// Format color value to match expected format (may be 'FFFFFF' or '255,255,255')
$colorbackhmenu1 = \implode(',', \colorStringToArray($colorbackhmenu1));
$colorbackvmenu1 = \implode(',', \colorStringToArray($colorbackvmenu1));
$colorbacktitle1 = \implode(',', \colorStringToArray($colorbacktitle1));
$colorbacktabcard1 = \implode(',', \colorStringToArray($colorbacktabcard1));
$colorbacktabactive = \implode(',', \colorStringToArray($colorbacktabactive));
$colorbacklineimpair1 = \implode(',', \colorStringToArray($colorbacklineimpair1));
$colorbacklineimpair2 = \implode(',', \colorStringToArray($colorbacklineimpair2));
$colorbacklinepair1 = \implode(',', \colorStringToArray($colorbacklinepair1));
$colorbacklinepair2 = \implode(',', \colorStringToArray($colorbacklinepair2));
$colorbackbody = \implode(',', \colorStringToArray($colorbackbody));
$colortexttitlenotab = \implode(',', \colorStringToArray($colortexttitlenotab));
$colortexttitle = \implode(',', \colorStringToArray($colortexttitle));
$colortext = \implode(',', \colorStringToArray($colortext));
$colortextlink = \implode(',', \colorStringToArray($colortextlink));
// @phan-suppress-next-line PhanRedefinedClassReference
$nbtopmenuentries = $menumanager->showmenu('topnb');
$nbtopmenuentriesreal = $nbtopmenuentries;
$leftmenuwidth = 254;
$minwidthtmenu = 66;
/* minimum width for one top menu entry */
$heightmenu = 48;
/* height of top menu, part with image */
$disableimages = 0;
$maxwidthloginblock = 110;
$borderradius = \getDolGlobalString('THEME_ELDY_USEBORDERONTABLE') ? \getDolGlobalInt('THEME_ELDY_BORDER_RADIUS', 6) : 0;