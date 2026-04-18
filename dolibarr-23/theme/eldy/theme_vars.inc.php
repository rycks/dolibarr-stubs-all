<?php

$theme_bordercolor = array(235, 235, 224);
$theme_datacolor = array(array(137, 86, 161), array(60, 147, 183), array(250, 190, 80), array(80, 166, 90), array(190, 190, 100), array(91, 115, 247), array(140, 140, 220), array(190, 120, 120), array(115, 125, 150), array(100, 170, 20), array(150, 135, 125), array(85, 135, 150), array(150, 135, 80), array(150, 80, 150));
$theme_bgcolor = array(\hexdec('F4'), \hexdec('F4'), \hexdec('F4'));
$theme_bgcoloronglet = array(\hexdec('DE'), \hexdec('E7'), \hexdec('EC'));
// Colors
$colorbackbody = '255,255,255';
$colorbackhmenu1 = '38,60,92';
// topmenu
//$colorbackvmenu1 = '250,250,250'; // vmenu
$colorbackvmenu1 = '248,248,248';
// vmenu
$colortopbordertitle1 = '215,215,215';
// top border of title
$colorbacktitle1 = '241,241,243';
// title of tables,list
$colorbacktabcard1 = '255,255,255';
// card
$colorbacktabactive = '234,234,234';
$colorbacklineimpair1 = '255,255,255';
// line impair
$colorbacklineimpair2 = '255,255,255';
// line impair
$colorbacklinepair1 = '252,252,252';
// line pair
$colorbacklinepair2 = '252,252,252';
// line pair
$colorbacklinepairhover = '240,242,249';
// line hover
$colorbacklinepairchecked = '240,242,249';
// line checked
$colorbacklinebreak = '248,247,244';
// line break
$colortexttitlenotab = '0,135,160';
// 150,90,121 140,80,10 or 10,140,80  #875a7b  green=0,123,140, violet: 0,50,120
$colortexttitlenotab2 = '100,0,100';
// 150,90,121 140,80,10 or 10,140,80  #875a7b  green=0,123,140, violet: 0,50,120
$colortexttitle = '40, 40, 60';
$colortexttitlelink = '10, 20, 100';
$colortext = '0,0,0';
$colortextlink = '10, 20, 100';
$fontsize = '0.94em';
$fontsizesmaller = '0.75em';
$topMenuFontSize = '1.1em';
$toolTipBgColor = 'rgba(255, 255, 255, 0.96)';
$toolTipFontColor = '#333';
$butactionbg = '116, 96, 170';
$textbutaction = '255, 255, 255';
// text color
$textSuccess = '#28a745';
$colorblind_deuteranopes_textSuccess = '#37de5d';
$textWarning = '#bc9526';
// See $badgeWarning
$textDanger = '#af4705';
// See $badgeDanger
$colorblind_deuteranopes_textWarning = $textWarning;
// currently not tested with a color blind people so use default color
// Badges colors
$badgePrimary = '#007bff';
$badgeSecondary = '#aaaabb';
$badgeInfo = '#aaaabb';
$badgeSuccess = '#55a580';
$badgeWarning = '#bc9526';
// See $textWarning bc9526
$badgeDanger = '#994013';
// See $textDanger
$badgeDark = '#343a40';
$badgeLight = '#f8f9fa';
// badge color adjustment for color blind
$colorblind_deuteranopes_badgeSuccess = '#37de5d';
//! text color black
$colorblind_deuteranopes_badgeSuccess_textColor7 = '#000';
$colorblind_deuteranopes_badgeWarning = '#e4e411';
$colorblind_deuteranopes_badgeDanger = $badgeDanger;
// currently not tested with a color blind people so use default color
/* default color for status : After a quick check, somme status can have opposite function according to objects
*  So this badges status uses default value according to theme eldy status img
*  TODO: use color definition vars above for define badges color status X -> example $badgeStatusValidate, $badgeStatusClosed, $badgeStatusActive ....
*/
$badgeStatus0 = '#cbd3d3';
// draft
$badgeStatus1 = '#bc9526';
// validated
$badgeStatus1b = '#bc9526';
// validated
$badgeStatus2 = '#9c9c26';
// approved
$badgeStatus3 = '#bca52b';
$badgeStatus4 = '#25a580';
// Color ok
$badgeStatus4b = '#25a580';
// Color ok
$badgeStatus5 = '#cad2d2';
$badgeStatus6 = '#cad2d2';
$badgeStatus7 = '#25a580';
$badgeStatus8 = '#994013';
$badgeStatus9 = '#e7f0f0';
$badgeStatus10 = '#993013';
$badgeStatus11 = '#15a540';
// status color adjustment for color blind
$colorblind_deuteranopes_badgeStatus4 = $colorblind_deuteranopes_badgeStatus7 = $colorblind_deuteranopes_badgeSuccess;
//! text color black
$colorblind_deuteranopes_badgeStatus_textColor4 = $colorblind_deuteranopes_badgeStatus_textColor7 = '#000';
$colorblind_deuteranopes_badgeStatus1 = $colorblind_deuteranopes_badgeWarning;
$colorblind_deuteranopes_badgeStatus_textColor1 = '#000';