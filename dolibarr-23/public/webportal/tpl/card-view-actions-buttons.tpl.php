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
$url = $context->getControllerUrl($context->controller) . '&id=' . $formCard->object->id;
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $context);