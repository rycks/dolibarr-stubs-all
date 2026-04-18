<?php

/* Copyright (C) 2016-2023  Laurent Destailleur  		<eldy@users.sourceforge.net>
 * Copyright (C) 2020 	    Nicolas ZABOURI				<info@inovea-conseil.com>
 * Copyright (C) 2024-2025	MDW							<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024-2025  Frédéric France             <frederic.france@free.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *   	\file       htdocs/website/index.php
 *		\ingroup    website
 *		\brief      Page to website view/edit
 */
/** @phan-file-suppress PhanPluginSuspiciousParamPosition */
// We allow POST of rich content with js and style, but only for this php file and if into some given POST variable
\define('NOSCANPOSTFORINJECTION', array('PAGE_CONTENT', 'WEBSITE_CSS_INLINE', 'WEBSITE_JS_INLINE', 'WEBSITE_HTML_HEADER', 'htmlheader'));
\define('USEDOLIBARREDITOR', 1);
\define('FORCE_CKEDITOR', 1);
\define('DISABLE_JS_GRAPH', 1);
// Force hide of left menu.
$error = 0;
$virtualurl = '';
$dataroot = '';
$websiteid = \GETPOSTINT('websiteid');
$websitekey = \GETPOST('website', 'alpha');
$page = \GETPOST('page', 'alpha');
$pageid = \GETPOSTINT('pageid');
$pageref = \GETPOST('pageref', 'alphanohtml');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'websitelist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$dol_hide_topmenu = \GETPOSTINT('dol_hide_topmenu');
$dol_hide_leftmenu = \GETPOSTINT('dol_hide_leftmenu');
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
$type_container = \GETPOST('WEBSITE_TYPE_CONTAINER', 'alpha');
$section_dir = \GETPOST('section_dir', 'alpha');
$file_manager = \GETPOST('file_manager', 'alpha');
$replacesite = \GETPOST('replacesite', 'alpha');
$mode = \GETPOST('mode', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = (string) \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Website($db);
$objectpage = new \WebsitePage($db);
$listofwebsites = $object->fetchAll('ASC', 'position');
$website = $object;
$res = $objectpage->fetch($pageid, $object->id > 0 ? $object->id : \null, $pageref);
$pageid = $object->fk_default_home;
$pathofwebsite = $dolibarr_main_data_root . ($conf->entity > 1 ? '/' . $conf->entity : '') . '/website/' . $websitekey;
$filehtmlheader = $pathofwebsite . '/htmlheader.html';
$filecss = $pathofwebsite . '/styles.css.php';
$filejs = $pathofwebsite . '/javascript.js.php';
$filerobot = $pathofwebsite . '/robots.txt';
$filehtaccess = $pathofwebsite . '/.htaccess';
$filetpl = $pathofwebsite . '/page' . $pageid . '.tpl.php';
$fileindex = $pathofwebsite . '/index.php';
$filewrapper = $pathofwebsite . '/wrapper.php';
$filemanifestjson = $pathofwebsite . '/manifest.json.php';
$filereadme = $pathofwebsite . '/README.md';
$filelicense = $pathofwebsite . '/LICENSE';
$filemaster = $pathofwebsite . '/master.inc.php';
$forceCSP = \getDolGlobalString("WEBSITE_" . $object->id . "_SECURITY_FORCECSP");
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
$permtouploadfile = $user->hasRight('website', 'write');
$diroutput = $conf->medias->multidir_output[$conf->entity];
$relativepath = $section_dir;
$upload_dir = \preg_replace('/\\/$/', '', $diroutput) . '/' . \preg_replace('/^\\//', '', $relativepath);
$htmlheadercontentdefault = '';
$manifestjsoncontentdefault = '';
$listofpages = array();
$algo = '';
$searchkey = \GETPOST('searchstring', 'restricthtmlallowunvalid');
$langcode = '';
$containertype = '';
$otherfilters = array();
// Test on permission not required
$containertype = \GETPOST('optioncontainertype', 'aZ09') != '-1' ? \GETPOST('optioncontainertype', 'aZ09') : '';
$langcode = \GETPOST('optionlanguage', 'aZ09');
$listofpages = \getPagesFromSearchCriterias($containertype, $algo, $searchkey, 1000, $sortfield, $sortorder, $langcode, $otherfilters, -1);
$usercanedit = $user->hasRight('website', 'write');
$permissiontoadd = $user->hasRight('website', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles
$permissiontodelete = $user->hasRight('website', 'delete');
$pageid = $object->fk_default_home;
$action = 'preview';
$mode = '';
$savbacktopage = $backtopage;
$backtopage = $_SERVER["PHP_SELF"] . '?file_manager=1&website=' . \urlencode($websitekey) . '&pageid=' . \urlencode((string) $pageid) . (\GETPOST('section_dir', 'alpha') ? '&section_dir=' . \urlencode(\GETPOST('section_dir', 'alpha')) : '');
// This manage 'sendit', 'confirm_deletefile', 'renamefile' action when submitting new file.
$backtopage = $savbacktopage;
$dirthemes = array('/doctemplates/websites');
$dirthemes = \array_unique($dirthemes);
// Delete template files and dir
$mode = 'importsite';
$action = 'importsite';
$error = 0;
$nbupdate = 0;
$categoryid = \GETPOSTINT('setcategory');
// Now we reload list
$listofpages = \getPagesFromSearchCriterias($containertype, $algo, $searchkey, 1000, $sortfield, $sortorder, $langcode, $otherfilters, -1);
$error = 0;
$nbupdate = 0;
$categoryid = \GETPOSTINT('setcategory');
// Now we reload list
$listofpages = \getPagesFromSearchCriterias($containertype, $algo, $searchkey, 1000, $sortfield, $sortorder, $langcode, $otherfilters, -1);
$replacestring = \GETPOST('replacestring', 'restricthtmlallowunvalid');
// or 'none', must be same then $searchstring
$dolibarrdataroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DATA_ROOT);
$allowimportsite = \true;
$tmpobject = \null;
$pageid = 0;
$error = 0;
$res = $object->fetch(\GETPOSTINT('id'));
$website = $object;
$error = 0;
$res = $object->fetch(0, $websitekey);
$website = $object;
$res = $objectpage->fetch($pageid, (string) $object->id);
$objectclass = 'WebsitePage';
$directivecsp = \GETPOST("select_identifier_WEBSITE_SECURITY_FORCECSP");
$sourcecsp = \GETPOST("select_source_WEBSITE_SECURITY_FORCECSP");
$sourcedatacsp = \GETPOST("input_data_WEBSITE_SECURITY_FORCECSP");
$forceCSPArr = \websiteGetContentPolicyToArray($forceCSP);
$directivesarray = \websiteGetContentPolicyDirectives();
$sourcesarray = \websiteGetContentPolicySources();
$res1 = $res2 = $res3 = $res4 = 0;
$securityrp = \GETPOST('WEBSITE_' . $object->id . '_SECURITY_FORCERP', 'alpha');
$securitysts = \GETPOST('WEBSITE_' . $object->id . '_SECURITY_FORCESTS', 'alpha');
$securitypp = \GETPOST('WEBSITE_' . $object->id . '_SECURITY_FORCEPP', 'alpha');
$securitysp = \GETPOST('WEBSITE_' . $object->id . '_SECURITY_FORCECSP', 'alpha');
$securitycspro = \GETPOST('WEBSITE_' . $object->id . '_SECURITY_FORCECSPRO', 'alpha');
$res1 = \dolibarr_set_const($db, 'WEBSITE_' . $object->id . '_SECURITY_FORCERP', $securityrp, 'chaine', 0, '', $conf->entity);
$res2 = \dolibarr_set_const($db, 'WEBSITE_' . $object->id . '_SECURITY_FORCESTS', $securitysts, 'chaine', 0, '', $conf->entity);
$res3 = \dolibarr_set_const($db, 'WEBSITE_' . $object->id . '_SECURITY_FORCEPP', $securitypp, 'chaine', 0, '', $conf->entity);
$res4 = \dolibarr_set_const($db, 'WEBSITE_' . $object->id . '_SECURITY_FORCECSP', $securitysp, 'chaine', 0, '', $conf->entity);
$res5 = \dolibarr_set_const($db, 'WEBSITE_' . $object->id . '_SECURITY_FORCECSPRO', $securitycspro, 'chaine', 0, '', $conf->entity);
$website = $object;
$res = $object->update($user);
$result = $object->fetch(0, $websitekey);
$website = $object;
$res = $objectpage->fetch($pageid, (string) $object->id);
$newaliasnames = '';
$website = $object;
$res = 0;
$sql = "UPDATE " . \MAIN_DB_PREFIX . "website_page SET fk_page = NULL";
//$sql .= " AND fk_page = ".((int) $objectpage->id);
$resql = $db->query($sql);
$action = 'editmeta';
$fileofzip = $object->exportWebSite();
// Check symlink documents/website/mywebsite/medias to point to documents/medias and restore it if ko.
// Recreate also dir of website if not found.
$pathtomedias = \DOL_DATA_ROOT . '/medias';
$pathtomediasinwebsite = $pathofwebsite . '/medias';
$result = $object->rebuildWebSiteFiles();
$dolibarrdataroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DATA_ROOT);
$allowimportsite = \true;
$domainname = '0.0.0.0:8080';
$tempdir = $conf->website->dir_output . '/' . $websitekey . '/';
$domtree = new \DOMDocument('1.0', 'UTF-8');
$root = $domtree->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'urlset');
$addrsswrapper = 0;
$xmlname = 'sitemap.xml';
$sql = "SELECT wp.rowid, wp.type_container , wp.pageurl, wp.lang, wp.fk_page, wp.tms as tms,";
$resql = $db->query($sql);
// Add the entry Sitemap: into the robot.txt file.
$robotcontent = @\file_get_contents($filerobot);
$result = \preg_replace('/<?php \\/\\/ BEGIN PHP[^?]END PHP ?>\\n/ims', '', $robotcontent);
$robotsitemap = "Sitemap: " . $domainname . "/" . $xmlname;
$result = \strpos($robotcontent, 'Sitemap: ');
$result = \dolSaveRobotFile($filerobot, $robotcontent);
$action = 'preview';
$sourcetype = "";
$sourcecsp = \explode("_", \GETPOST("sourcecsp"));
$directive = $sourcecsp[0];
$sourcekey = isset($sourcecsp[1]) ? $sourcecsp[1] : \null;
$sourcedata = isset($sourcecsp[2]) ? $sourcecsp[2] : \null;
$forceCSPArr = \websiteGetContentPolicyToArray($forceCSP);
$directivesarray = \websiteGetContentPolicyDirectives();
$sourcesarray = \websiteGetContentPolicySources();
$securityspstring = "";
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$formwebsite = new \FormWebsite($db);
$formother = new \FormOther($db);
$formconfirm = "";
$helpurl = 'EN:Module_Website|FR:Module_Website_FR|ES:M&oacute;dulo_Website';
$arrayofjs = array('/includes/ace/src/ace.js', '/includes/ace/src/ext-statusbar.js', '/includes/ace/src/ext-language_tools.js');
$arrayofcss = array();
// Add a margin under toolbar ?
$style = '';
$disabled = '';
$disabledexport = '';
$array = array();
$atleastonepage = \is_array($array) && \count($array) > 0;
$websitepage = new \WebsitePage($db);
$disabled = '';
$morecss = '';
$head = array();
//if (!trim($licensecontent)) {
//$readmecontent.="";
//}
$head = \websiteconfigPrepareHead($object);
$htmltext = '';
$htmltext = $langs->trans("Example") . ': fr,de,sv,it,pt';
$htmltext = $langs->trans("VirtualhostDesc");
$maxfilesizearray = \getMaxFileSizeArray();
$maxmin = $maxfilesizearray['maxmin'];
$uploadfolder = $conf->website->dir_output . '/' . $websitekey;
$htmlhelp = $langs->trans("CSSContentTooltipHelp");
$poscursor = array('x' => \GETPOST('WEBSITE_CSS_INLINE_x'), 'y' => \GETPOST('WEBSITE_CSS_INLINE_y'));
$doleditor = new \DolEditor('WEBSITE_CSS_INLINE', $csscontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$textwithhelp = $langs->trans('WEBSITE_JS_INLINE');
$htmlhelp2 = $langs->trans("LinkAndScriptsHereAreNotLoadedInEditor") . '<br>';
$poscursor = array('x' => \GETPOST('WEBSITE_JS_INLINE_x'), 'y' => \GETPOST('WEBSITE_JS_INLINE_y'));
$doleditor = new \DolEditor('WEBSITE_JS_INLINE', $jscontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$htmlhelp = $langs->trans("Example") . ' :<br>';
// do not use dol_htmlentitiesbr here, $htmlheadercontentdefault is HTML with content like <link> and <script> that we want to be html encode as they must be show as doc content not executable instruction.
$textwithhelp = $form->textwithpicto('', $htmlhelp, 1, 'help', '', 0, 2, 'htmlheadertooltip');
$htmlhelp2 = $langs->trans("LinkAndScriptsHereAreNotLoadedInEditor") . '<br>';
$poscursor = array('x' => \GETPOST('WEBSITE_HTML_HEADER_x'), 'y' => \GETPOST('WEBSITE_HTML_HEADER_y'));
$doleditor = new \DolEditor('WEBSITE_HTML_HEADER', $htmlheadercontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$poscursor = array('x' => \GETPOST('WEBSITE_ROBOT_x'), 'y' => \GETPOST('WEBSITE_ROBOT_y'));
$doleditor = new \DolEditor('WEBSITE_ROBOT', $robotcontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$textwithhelp3 = $langs->trans("Example") . ' :';
$poscursor = array('x' => \GETPOST('WEBSITE_HTACCESS_x'), 'y' => \GETPOST('WEBSITE_HTACCESS_y'));
$doleditor = new \DolEditor('WEBSITE_HTACCESS', $htaccesscontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$htmlhelp = $langs->trans("Example") . ' :<br>';
$poscursor = array('x' => \GETPOST('WEBSITE_MANIFEST_JSON_x'), 'y' => \GETPOST('WEBSITE_MANIFEST_JSON_y'));
$doleditor = new \DolEditor('WEBSITE_MANIFEST_JSON', $manifestjsoncontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$htmlhelp = $langs->trans("EnterHereReadmeInformation");
$poscursor = array('x' => \GETPOST('WEBSITE_README_x'), 'y' => \GETPOST('WEBSITE_README_y'));
$doleditor = new \DolEditor('WEBSITE_README', $readmecontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$htmlhelp = $langs->trans("EnterHereLicenseInformation");
$poscursor = array('x' => \GETPOST('WEBSITE_LICENSE_x'), 'y' => \GETPOST('WEBSITE_LICENSE_y'));
$doleditor = new \DolEditor('WEBSITE_LICENSE', $licensecontent, '', 220, 'ace', 'In', \true, \false, 'ace', 0, '100%', 0, $poscursor);
$htmlhelp = $langs->trans('RSSFeedDesc');
$selectarrayCSPDirectives = \websiteGetContentPolicyDirectives();
$selectarrayCSPSources = \websiteGetContentPolicySources();
$forceCSPArr = \websiteGetContentPolicyToArray($forceCSP);
$head = \websiteconfigPrepareHead($object);
$examplecsprule = "frame-ancestors 'self'; img-src * data:; font-src *; default-src 'self' 'unsafe-inline' 'unsafe-eval' *.paypal.com *.stripe.com *.google.com *.googleapis.com *.google-analytics.com *.googletagmanager.com;";
$siteref = $sitedesc = $sitelang = $siteotherlang = '';
$shortlangcode = \preg_replace('/[_-].*$/', '', \trim($langs->defaultlang));
$htmltext = $langs->trans("Example") . ': fr,de,sv,it,pt';
$htmltext = $langs->trans("VirtualhostDesc");
$dolibarrdataroot = \preg_replace('/([\\/]+)$/i', '', \DOL_DATA_ROOT);
$allowimportsite = \true;
//print '<div class="fichecenter">';
$hiddenfromfetchingafterload = ' hideobject';
$hiddenmanuallyafterload = ' hideobject';
$htmlhelp = $langs->trans("WEBSITE_ALIASALTDesc");
$htmlhelp = $langs->trans("WEBSITE_KEYWORDSDesc");
$onlykeys = array();
$htmltext = $langs->trans("AvailableLanguagesAreDefinedIntoWebsiteProperties");
// Translation of
$translationof = 0;
$translatedby = 0;
$fuser = new \User($db);
// Content - Example/templates of page
$url = 'https://wiki.dolibarr.org/index.php/Module_Website';
$htmltext = '<small>';
$formmail = new \FormMail($db);
$showlinktolayout = $formmail->withlayout;
$showlinktoai = $formmail->withaiprompt && \isModEnabled('ai') ? 'textgenerationwebpage' : '';
$htmlhelp = $langs->trans("EditTheWebSiteForACommonHeader") . '<br><br>';
$poscursor = array('x' => \GETPOST('htmlheader_x'), 'y' => \GETPOST('htmlheader_y'));
$doleditor = new \DolEditor('htmlheader', $pagehtmlheader, '', 120, 'ace', 'In', \true, \false, 'ace', \ROWS_3, '100%', 0, $poscursor);
$module = 'medias';
$formalreadyopen = 2;
// Editing with source editor
$contentforedit = '';
// We set maxheightwin in px. We take the height of screen in px and we remove a part for the top banner and more
$maxheightwin = 480;
$poscursor = array('x' => \GETPOST('PAGE_CONTENT_x'), 'y' => \GETPOST('PAGE_CONTENT_y'));
$doleditor = new \DolEditor('PAGE_CONTENT', $contentforedit, '', $maxheightwin, 'Full', '', \true, \true, 'ace', \ROWS_5, '40%', 0, $poscursor);