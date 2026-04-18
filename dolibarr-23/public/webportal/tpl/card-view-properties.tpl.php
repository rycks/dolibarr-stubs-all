<?php

/**
 * @var Conf					$conf
 * @var HookManager				$hookmanager
 * @var Translate				$langs
 * @var Context					$context
 * @var AbstractCardController 	$this
 * @var FormCardWebPortal 		$formCard
 */
$formCard = $this->formCard;
$fieldShowList = $formCard->fieldsmanager->getAllFieldsInfos($formCard->object, $formCard->extrafields, 'view', 2, array(1 => $formCard->key_for_break));