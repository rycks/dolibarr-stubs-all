<?php

/**
 * @var DoliDB $db
 */
// Unit of metric are defined into field 'metric' in mm.
// To get into inch, just /25.4
// Size of pages available on: http://www.worldlabel.com/Pages/pageaverylabels.htm
// _PosX = marginLeft+(_COUNTX*(width+SpaceX));
$sql = "SELECT rowid, code, name, paper_size, orientation, metric, leftmargin, topmargin, nx, ny, spacex, spacey, width, height, font_size, custom_x, custom_y, active FROM " . \MAIN_DB_PREFIX . "c_format_cards WHERE active=1 ORDER BY code ASC";