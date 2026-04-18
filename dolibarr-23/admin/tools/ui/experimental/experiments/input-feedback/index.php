<?php

//
$documentation = new \Documentation($db);
$group = 'ExperimentalUx';
$experimentName = 'ExperimentalUxInputAjaxFeedback';
$experimentAssetsPath = $documentation->baseUrl . '/experimental/experiments/input-feedback/assets/';
$js = ['/includes/ace/src/ace.js', '/includes/ace/src/ext-statusbar.js', '/includes/ace/src/ext-language_tools.js'];
$css = [$experimentAssetsPath . 'feddback-01.css'];
$lines = array('<script>', 'document.getElementById(\'btn-process-success\').addEventListener(\'click\', function () {
	let input = document.getElementById(\'test-input-01\');
	input.classList.add(\'processing-feedback\');

	setTimeout(() => {
		input.classList.remove(\'processing-feedback\');
		input.classList.add(\'success-feedback\');
		setTimeout(() => {
			input.classList.remove(\'success-feedback\');
		}, 1000);
	}, 1500);
});


document.getElementById(\'btn-process-fail\').addEventListener(\'click\', function () {
	let input = document.getElementById(\'test-input-01\');
	input.classList.add(\'processing-feedback\');

	setTimeout(() => {
		input.classList.remove(\'processing-feedback\');
		input.classList.add(\'fail-feedback\');
		setTimeout(() => {
			input.classList.remove(\'fail-feedback\');
		}, 1000);
	}, 1500);
});', '</script>');