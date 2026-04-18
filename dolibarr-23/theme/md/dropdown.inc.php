<?php

// When no photo, we show the login name, so we need an offset to output picto at a fixed position.
$atoploginusername = empty($user->photo) ? 52 : 0;
$borderradius = \getDolGlobalString('THEME_ELDY_USEBORDERONTABLE') ? \getDolGlobalInt('THEME_ELDY_BORDER_RADIUS', 6) : 0;
$WIDTHMENUDROPDOWN = 370;