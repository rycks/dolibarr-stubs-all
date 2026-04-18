<?php

$navMenu = $navGroupMenu = $navUserMenu = array();
$maxTopMenu = 0;
// menu member
$cardAccess = \getDolGlobalString('WEBPORTAL_MEMBER_CARD_ACCESS');
// menu partnership
$cardAccess = \getDolGlobalString('WEBPORTAL_PARTNERSHIP_CARD_ACCESS');
// GROUP MENU
$navGroupMenu = array('administrative' => array(
    'id' => 'administrative',
    'rank' => -1,
    // negative value for undefined, it will be set by the min item rank for this group
    'url' => '',
    'name' => $langs->trans('WebPortalGroupMenuAdmin'),
    'children' => array(),
), 'technical' => array(
    'id' => 'technical',
    'rank' => -1,
    // negative value for undefined, it will be set by the min item rank for this group
    'url' => '',
    'name' => $langs->trans('WebPortalGroupMenuTechnical'),
    'children' => array(),
));
$parameters = array('controller' => $context->controller, 'Tmenu' => &$navMenu, 'TUserMenu' => &$navUserMenu, 'TGroupMenu' => &$navGroupMenu, 'maxTopMenu' => &$maxTopMenu);
$reshook = $hookmanager->executeHooks('PrintTopMenu', $parameters, $context, $context->action);
$brandTitle = \getDolGlobalString('WEBPORTAL_TITLE') ? \getDolGlobalString('WEBPORTAL_TITLE') : \getDolGlobalString('MAIN_INFO_SOCIETE_NOM');