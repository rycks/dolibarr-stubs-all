<?php

$categ = new \Categorie($db);
$categ_types = array();
$categ_type_array = $categ->getMapList();
$formquestion = array();
$formquestion = array();
$valuefield = '<div style="display: flex; align-items: center; justify-content: flex-end; padding-right: 150px">';
$descConfirmPreUpdatePrice = $langs->trans("ConfirmUpdatePriceQuestion", \count($toselect));
$listofselectedid = array();
$listofselectedrecipientobjid = array();
$listofselectedref = array();
$formmail = new \FormMail($db);
$liste = $langs->trans("AllRecipientSelected", \count($arrayofselected));
// Make substitution in email content
$substitutionarray = \getCommonSubstitutionArray($langs, 0, \null, $object);
$parameters = array('mode' => 'formemail');
$elementtype = $objecttmp->element;
/** @var CommonObject $objecttmp */
$extrafields = new \ExtraFields($db);
$keysuffix = '';
$extrafields_list = $extrafields->attributes[$elementtype]['label'];
$formquestion = array();
$parameters = array('toselect' => &$toselect, 'uploaddir' => isset($uploaddir) ? $uploaddir : \null, 'massaction' => $massaction);
// @phan-suppress-next-line PhanTypeMismatchArgumentNullable
$reshook = $hookmanager->executeHooks('doPreMassActions', $parameters, $object, $action);