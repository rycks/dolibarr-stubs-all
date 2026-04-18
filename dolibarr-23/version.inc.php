<?php

\define('DOL_APPLICATION_TITLE', 'Dolibarr');
// The major version of Dolibarr
\define('DOL_MAJOR_VERSION', '23');
\define('DOL_MINOR_VERSION', '0.2');
\define('DOL_VERSION', \constant('DOL_MAJOR_VERSION') . '.' . \constant('DOL_MINOR_VERSION'));
// DOL_VERSION is now a.b.c-alpha, a.b.c-beta, a.b.c-rcX or a.b.c
// Set to 1 if the beta version is a just a candidate for certification or if the stable version has been certified.
// Use 2 to force LNE features for debug purposes
\define('CERTIF_LNE', '0');