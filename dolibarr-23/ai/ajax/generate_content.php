<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
//get data from AJAX
$rawData = \file_get_contents('php://input');
$jsonData = \json_decode($rawData, \true);
$ai = new \Ai($db);
// Get parameters
$function = empty($jsonData['function']) ? 'textgeneration' : $jsonData['function'];
// Default value. Can also be 'textgeneration', 'textgenerationemail', 'textgenerationwebpage', 'imagegeneration', 'videogeneration', ...
$format = empty($jsonData['format']) ? '' : $jsonData['format'];
$generatedContent = $ai->generateContent($instructions, 'auto', $function, $format);