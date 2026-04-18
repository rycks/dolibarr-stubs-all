<?php

$listofexamplesforlink = 'Societe:societe/class/societe.class.php<br>Contact:contact/class/contact.class.php<br>Product:product/class/product.class.php<br>Project:projet/class/project.class.php';
$elementprop = \getElementProperties($elementtype);
$object = \fetchObjectByElement(0, $elementtype);
$substitutionarray = \getCommonSubstitutionArray($langs, 1, \null, $object, array("object", $elementprop["module"]));
$texthelp = $langs->trans("FollowingConstantsWillBeSubstituted") . '<br>';