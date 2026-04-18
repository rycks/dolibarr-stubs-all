<?php

/**
 * @var Conf					$conf
 * @var HookManager				$hookmanager
 * @var Translate				$langs
 * @var Context					$context
 * @var AbstractCardController 	$this
 * @var FormCardWebPortal 		$formCard
 * @var mixed 					$vars  TPL vars
 */
$formCard = $this->formCard;
$object = $formCard->object;
/**
 * @var Adherent	$object
 */
$addgendertxt = '';
//if (property_exists($object, 'gender') && !empty($object->gender)) {
//    switch ($object->gender) {
//        case 'man':
//            $addgendertxt .= '<i class="fas fa-mars"></i>';
//            break;
//        case 'woman':
//            $addgendertxt .= '<i class="fas fa-venus"></i>';
//            break;
//        case 'other':
//            $addgendertxt .= '<i class="fas fa-transgender"></i>';
//            break;
//    }
//}
$fullname = '';
$moreaddress = $formCard->object->getBannerAddressForWebPortal('refaddress');
$htmlStatus = $formCard->object->getLibStatut(6);