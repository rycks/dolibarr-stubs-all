<?php

$listofexamplesforlink = 'Societe:societe/class/societe.class.php<br>Contact:contact/class/contact.class.php<br>Product:product/class/product.class.php<br>Project:projet/class/project.class.php<br>...';
$label = $extrafields->attributes[$elementtype]['label'][$attrname];
$type = $extrafields->attributes[$elementtype]['type'][$attrname];
$size = $extrafields->attributes[$elementtype]['size'][$attrname];
$computed = $extrafields->attributes[$elementtype]['computed'][$attrname];
$aiprompt = $extrafields->attributes[$elementtype]['aiprompt'][$attrname];
$default = $extrafields->attributes[$elementtype]['default'][$attrname];
$unique = $extrafields->attributes[$elementtype]['unique'][$attrname];
$required = $extrafields->attributes[$elementtype]['required'][$attrname];
$pos = $extrafields->attributes[$elementtype]['pos'][$attrname];
$alwayseditable = $extrafields->attributes[$elementtype]['alwayseditable'][$attrname];
$emptyonclone = $extrafields->attributes[$elementtype]['emptyonclone'][$attrname];
$param = $extrafields->attributes[$elementtype]['param'][$attrname];
$perms = $extrafields->attributes[$elementtype]['perms'][$attrname];
$langfile = $extrafields->attributes[$elementtype]['langfile'][$attrname];
$list = $extrafields->attributes[$elementtype]['list'][$attrname];
$totalizable = $extrafields->attributes[$elementtype]['totalizable'][$attrname];
$help = $extrafields->attributes[$elementtype]['help'][$attrname];
$entitycurrentorall = $extrafields->attributes[$elementtype]['entityid'][$attrname];
$printable = $extrafields->attributes[$elementtype]['printable'][$attrname];
$enabled = $extrafields->attributes[$elementtype]['enabled'][$attrname];
$css = $extrafields->attributes[$elementtype]['css'][$attrname];
$cssview = $extrafields->attributes[$elementtype]['cssview'][$attrname];
$csslist = $extrafields->attributes[$elementtype]['csslist'][$attrname];
$param_chain = '';
// Define list of possible type transition
$typewecanchangeinto = array('varchar' => array('varchar', 'phone', 'mail', 'url', 'ip', 'select', 'password', 'text', 'html'), 'double' => array('double', 'price'), 'price' => array('double', 'price'), 'text' => array('text', 'html'), 'html' => array('text', 'html'), 'password' => array('password', 'varchar'), 'mail' => array('varchar', 'phone', 'mail', 'url', 'ip', 'select'), 'url' => array('varchar', 'phone', 'mail', 'url', 'ip', 'select'), 'phone' => array('varchar', 'phone', 'mail', 'url', 'ip', 'select'), 'ip' => array('varchar', 'phone', 'mail', 'url', 'ip', 'select'), 'select' => array('varchar', 'phone', 'mail', 'url', 'ip', 'select'), 'date' => array('date', 'datetime'));
$elementprop = \getElementProperties($elementtype);
$object = \fetchObjectByElement(0, $elementtype);
$substitutionarray = \getCommonSubstitutionArray($langs, 1, \null, $object, array("object", $elementprop["module"]));
$texthelp = $langs->trans("FollowingConstantsWillBeSubstituted") . '<br>';