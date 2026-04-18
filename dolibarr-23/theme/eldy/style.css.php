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
$theme = 'eldy';
// Define image path files and other constants
//$fontlist='helvetica, verdana, arial, sans-serif';
//$fontlist='"open sans", "Helvetica Neue", Helvetica, Arial, sans-serif';
$fontlist = 'arial,tahoma,verdana,helvetica';
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
$userborderontable = \getDolGlobalInt('THEME_ELDY_USEBORDERONTABLE');
$borderwidth = 1;
// Case of option availables only if THEME_ELDY_ENABLE_PERSONALIZED is on
$colorbackbody = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_BACKBODY') ? $colorbackbody : $conf->global->THEME_ELDY_BACKBODY : (empty($user->conf->THEME_ELDY_BACKBODY) ? $colorbackbody : $user->conf->THEME_ELDY_BACKBODY);
$colorbackhmenu1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TOPMENU_BACK1') ? $colorbackhmenu1 : $conf->global->THEME_ELDY_TOPMENU_BACK1 : (empty($user->conf->THEME_ELDY_TOPMENU_BACK1) ? $colorbackhmenu1 : $user->conf->THEME_ELDY_TOPMENU_BACK1);
$colorbackvmenu1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_VERMENU_BACK1') ? $colorbackvmenu1 : $conf->global->THEME_ELDY_VERMENU_BACK1 : (empty($user->conf->THEME_ELDY_VERMENU_BACK1) ? $colorbackvmenu1 : $user->conf->THEME_ELDY_VERMENU_BACK1);
$colortopbordertitle1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TOPBORDER_TITLE1') ? $colortopbordertitle1 : $conf->global->THEME_ELDY_TOPBORDER_TITLE1 : (empty($user->conf->THEME_ELDY_TOPBORDER_TITLE1) ? $colortopbordertitle1 : $user->conf->THEME_ELDY_TOPBORDER_TITLE1);
$colorbacktitle1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_BACKTITLE1') ? $colorbacktitle1 : $conf->global->THEME_ELDY_BACKTITLE1 : (empty($user->conf->THEME_ELDY_BACKTITLE1) ? $colorbacktitle1 : $user->conf->THEME_ELDY_BACKTITLE1);
$colorbacktabcard1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_BACKTABCARD1') ? $colorbacktabcard1 : $conf->global->THEME_ELDY_BACKTABCARD1 : (empty($user->conf->THEME_ELDY_BACKTABCARD1) ? $colorbacktabcard1 : $user->conf->THEME_ELDY_BACKTABCARD1);
$colorbacktabactive = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_BACKTABACTIVE') ? $colorbacktabactive : $conf->global->THEME_ELDY_BACKTABACTIVE : (empty($user->conf->THEME_ELDY_BACKTABACTIVE) ? $colorbacktabactive : $user->conf->THEME_ELDY_BACKTABACTIVE);
$colorbacklineimpair1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_LINEIMPAIR1') ? $colorbacklineimpair1 : $conf->global->THEME_ELDY_LINEIMPAIR1 : (empty($user->conf->THEME_ELDY_LINEIMPAIR1) ? $colorbacklineimpair1 : $user->conf->THEME_ELDY_LINEIMPAIR1);
$colorbacklineimpair2 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_LINEIMPAIR2') ? $colorbacklineimpair2 : $conf->global->THEME_ELDY_LINEIMPAIR2 : (empty($user->conf->THEME_ELDY_LINEIMPAIR2) ? $colorbacklineimpair2 : $user->conf->THEME_ELDY_LINEIMPAIR2);
$colorbacklinepair1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_LINEPAIR1') ? $colorbacklinepair1 : $conf->global->THEME_ELDY_LINEPAIR1 : (empty($user->conf->THEME_ELDY_LINEPAIR1) ? $colorbacklinepair1 : $user->conf->THEME_ELDY_LINEPAIR1);
$colorbacklinepair2 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_LINEPAIR2') ? $colorbacklinepair2 : $conf->global->THEME_ELDY_LINEPAIR2 : (empty($user->conf->THEME_ELDY_LINEPAIR2) ? $colorbacklinepair2 : $user->conf->THEME_ELDY_LINEPAIR2);
$colorbacklinebreak = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_LINEBREAK') ? $colorbacklinebreak : $conf->global->THEME_ELDY_LINEBREAK : (empty($user->conf->THEME_ELDY_LINEBREAK) ? $colorbacklinebreak : $user->conf->THEME_ELDY_LINEBREAK);
$colortexttitlenotab = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TEXTTITLENOTAB') ? $colortexttitlenotab : \getDolGlobalString('THEME_ELDY_TEXTTITLENOTAB') : (empty($user->conf->THEME_ELDY_TEXTTITLENOTAB) ? $colortexttitlenotab : $user->conf->THEME_ELDY_TEXTTITLENOTAB);
$colortexttitle = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TEXTTITLE') ? $colortexttitle : \getDolGlobalString('THEME_ELDY_TEXTTITLE') : (empty($user->conf->THEME_ELDY_TEXTTITLE) ? $colortexttitle : $user->conf->THEME_ELDY_TEXTTITLE);
$colortexttitlelink = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TEXTTITLELINK') ? $colortexttitlelink : \getDolGlobalString('THEME_ELDY_TEXTTITLELINK') : (empty($user->conf->THEME_ELDY_TEXTTITLELINK) ? $colortexttitlelink : $user->conf->THEME_ELDY_TEXTTITLELINK);
$colortext = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TEXT') ? $colortext : \getDolGlobalString('THEME_ELDY_TEXT') : (empty($user->conf->THEME_ELDY_TEXT) ? $colortext : $user->conf->THEME_ELDY_TEXT);
$colortextlink = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TEXTLINK') ? $colortextlink : \getDolGlobalString('THEME_ELDY_TEXTLINK') : (empty($user->conf->THEME_ELDY_TEXTLINK) ? $colortextlink : $user->conf->THEME_ELDY_TEXTLINK);
$colortextlinkHsla = \colorHexToHsl($colortextlink, \false, \true);
$butactionbg = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_BTNACTION') ? $butactionbg : \getDolGlobalString('THEME_ELDY_BTNACTION') : (empty($user->conf->THEME_ELDY_BTNACTION) ? $butactionbg : $user->conf->THEME_ELDY_BTNACTION);
$textbutaction = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_TEXTBTNACTION') ? $textbutaction : \getDolGlobalString('THEME_ELDY_TEXTBTNACTION') : (empty($user->conf->THEME_ELDY_TEXTBTNACTION) ? $textbutaction : $user->conf->THEME_ELDY_TEXTBTNACTION);
$fontsize = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_FONT_SIZE1') ? $fontsize : \getDolGlobalString('THEME_ELDY_FONT_SIZE1') : (empty($user->conf->THEME_ELDY_FONT_SIZE1) ? $fontsize : $user->conf->THEME_ELDY_FONT_SIZE1);
$fontsizesmaller = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_FONT_SIZE2') ? $fontsize : \getDolGlobalString('THEME_ELDY_FONT_SIZE2') : (empty($user->conf->THEME_ELDY_FONT_SIZE2) ? $fontsize : $user->conf->THEME_ELDY_FONT_SIZE2);
$heightrow = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? !\getDolGlobalString('THEME_ELDY_USECOMOACTROW') ? '155%' : '300%' : (empty($user->conf->THEME_ELDY_USECOMOACTROW) ? '155%' : '300%');
// Hover color
$colorbacklinepairhover = !isset($conf->global->THEME_ELDY_USE_HOVER) || \getDolGlobalString('THEME_ELDY_USE_HOVER') === '255,255,255' ? '' : (\getDolGlobalString('THEME_ELDY_USE_HOVER') === '1' ? 'e6edf0' : \getDolGlobalString('THEME_ELDY_USE_HOVER'));
$colorbacklinepairchecked = !isset($conf->global->THEME_ELDY_USE_CHECKED) || \getDolGlobalString('THEME_ELDY_USE_CHECKED') === '255,255,255' ? '' : (\getDolGlobalString('THEME_ELDY_USE_CHECKED') === '1' ? 'e6edf0' : \getDolGlobalString('THEME_ELDY_USE_CHECKED'));
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
$minwidthtmenu = 66;
/* minimum width for one top menu entry */
$heightmenu = 50;
/* height of top menu, part with image */
$heightmenu2 = 49;
/* height of top menu, part with login  */
$disableimages = 0;
$maxwidthloginblock = 180;