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
$fieldShowList = $formCard->fieldsmanager->getAllFieldsInfos($formCard->object, $formCard->extrafields, 'edit', 1, array(), array('nonewbutton' => 1));