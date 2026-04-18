<?php

$allowedip = \explode(' ', \getDolGlobalString('API_RESTRICT_ON_IP'));
$ipremote = \getUserRemoteIP();