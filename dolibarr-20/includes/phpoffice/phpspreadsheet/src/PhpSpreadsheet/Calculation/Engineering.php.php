<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

class Engineering
{
    /**
     * EULER.
     */
    const EULER = 2.718281828459045;
    /**
     * Details of the Units of measure that can be used in CONVERTUOM().
     *
     * @var mixed[]
     */
    private static $conversionUnits = ['g' => ['Group' => 'Mass', 'Unit Name' => 'Gram', 'AllowPrefix' => true], 'sg' => ['Group' => 'Mass', 'Unit Name' => 'Slug', 'AllowPrefix' => false], 'lbm' => ['Group' => 'Mass', 'Unit Name' => 'Pound mass (avoirdupois)', 'AllowPrefix' => false], 'u' => ['Group' => 'Mass', 'Unit Name' => 'U (atomic mass unit)', 'AllowPrefix' => true], 'ozm' => ['Group' => 'Mass', 'Unit Name' => 'Ounce mass (avoirdupois)', 'AllowPrefix' => false], 'm' => ['Group' => 'Distance', 'Unit Name' => 'Meter', 'AllowPrefix' => true], 'mi' => ['Group' => 'Distance', 'Unit Name' => 'Statute mile', 'AllowPrefix' => false], 'Nmi' => ['Group' => 'Distance', 'Unit Name' => 'Nautical mile', 'AllowPrefix' => false], 'in' => ['Group' => 'Distance', 'Unit Name' => 'Inch', 'AllowPrefix' => false], 'ft' => ['Group' => 'Distance', 'Unit Name' => 'Foot', 'AllowPrefix' => false], 'yd' => ['Group' => 'Distance', 'Unit Name' => 'Yard', 'AllowPrefix' => false], 'ang' => ['Group' => 'Distance', 'Unit Name' => 'Angstrom', 'AllowPrefix' => true], 'Pica' => ['Group' => 'Distance', 'Unit Name' => 'Pica (1/72 in)', 'AllowPrefix' => false], 'yr' => ['Group' => 'Time', 'Unit Name' => 'Year', 'AllowPrefix' => false], 'day' => ['Group' => 'Time', 'Unit Name' => 'Day', 'AllowPrefix' => false], 'hr' => ['Group' => 'Time', 'Unit Name' => 'Hour', 'AllowPrefix' => false], 'mn' => ['Group' => 'Time', 'Unit Name' => 'Minute', 'AllowPrefix' => false], 'sec' => ['Group' => 'Time', 'Unit Name' => 'Second', 'AllowPrefix' => true], 'Pa' => ['Group' => 'Pressure', 'Unit Name' => 'Pascal', 'AllowPrefix' => true], 'p' => ['Group' => 'Pressure', 'Unit Name' => 'Pascal', 'AllowPrefix' => true], 'atm' => ['Group' => 'Pressure', 'Unit Name' => 'Atmosphere', 'AllowPrefix' => true], 'at' => ['Group' => 'Pressure', 'Unit Name' => 'Atmosphere', 'AllowPrefix' => true], 'mmHg' => ['Group' => 'Pressure', 'Unit Name' => 'mm of Mercury', 'AllowPrefix' => true], 'N' => ['Group' => 'Force', 'Unit Name' => 'Newton', 'AllowPrefix' => true], 'dyn' => ['Group' => 'Force', 'Unit Name' => 'Dyne', 'AllowPrefix' => true], 'dy' => ['Group' => 'Force', 'Unit Name' => 'Dyne', 'AllowPrefix' => true], 'lbf' => ['Group' => 'Force', 'Unit Name' => 'Pound force', 'AllowPrefix' => false], 'J' => ['Group' => 'Energy', 'Unit Name' => 'Joule', 'AllowPrefix' => true], 'e' => ['Group' => 'Energy', 'Unit Name' => 'Erg', 'AllowPrefix' => true], 'c' => ['Group' => 'Energy', 'Unit Name' => 'Thermodynamic calorie', 'AllowPrefix' => true], 'cal' => ['Group' => 'Energy', 'Unit Name' => 'IT calorie', 'AllowPrefix' => true], 'eV' => ['Group' => 'Energy', 'Unit Name' => 'Electron volt', 'AllowPrefix' => true], 'ev' => ['Group' => 'Energy', 'Unit Name' => 'Electron volt', 'AllowPrefix' => true], 'HPh' => ['Group' => 'Energy', 'Unit Name' => 'Horsepower-hour', 'AllowPrefix' => false], 'hh' => ['Group' => 'Energy', 'Unit Name' => 'Horsepower-hour', 'AllowPrefix' => false], 'Wh' => ['Group' => 'Energy', 'Unit Name' => 'Watt-hour', 'AllowPrefix' => true], 'wh' => ['Group' => 'Energy', 'Unit Name' => 'Watt-hour', 'AllowPrefix' => true], 'flb' => ['Group' => 'Energy', 'Unit Name' => 'Foot-pound', 'AllowPrefix' => false], 'BTU' => ['Group' => 'Energy', 'Unit Name' => 'BTU', 'AllowPrefix' => false], 'btu' => ['Group' => 'Energy', 'Unit Name' => 'BTU', 'AllowPrefix' => false], 'HP' => ['Group' => 'Power', 'Unit Name' => 'Horsepower', 'AllowPrefix' => false], 'h' => ['Group' => 'Power', 'Unit Name' => 'Horsepower', 'AllowPrefix' => false], 'W' => ['Group' => 'Power', 'Unit Name' => 'Watt', 'AllowPrefix' => true], 'w' => ['Group' => 'Power', 'Unit Name' => 'Watt', 'AllowPrefix' => true], 'T' => ['Group' => 'Magnetism', 'Unit Name' => 'Tesla', 'AllowPrefix' => true], 'ga' => ['Group' => 'Magnetism', 'Unit Name' => 'Gauss', 'AllowPrefix' => true], 'C' => ['Group' => 'Temperature', 'Unit Name' => 'Celsius', 'AllowPrefix' => false], 'cel' => ['Group' => 'Temperature', 'Unit Name' => 'Celsius', 'AllowPrefix' => false], 'F' => ['Group' => 'Temperature', 'Unit Name' => 'Fahrenheit', 'AllowPrefix' => false], 'fah' => ['Group' => 'Temperature', 'Unit Name' => 'Fahrenheit', 'AllowPrefix' => false], 'K' => ['Group' => 'Temperature', 'Unit Name' => 'Kelvin', 'AllowPrefix' => false], 'kel' => ['Group' => 'Temperature', 'Unit Name' => 'Kelvin', 'AllowPrefix' => false], 'tsp' => ['Group' => 'Liquid', 'Unit Name' => 'Teaspoon', 'AllowPrefix' => false], 'tbs' => ['Group' => 'Liquid', 'Unit Name' => 'Tablespoon', 'AllowPrefix' => false], 'oz' => ['Group' => 'Liquid', 'Unit Name' => 'Fluid Ounce', 'AllowPrefix' => false], 'cup' => ['Group' => 'Liquid', 'Unit Name' => 'Cup', 'AllowPrefix' => false], 'pt' => ['Group' => 'Liquid', 'Unit Name' => 'U.S. Pint', 'AllowPrefix' => false], 'us_pt' => ['Group' => 'Liquid', 'Unit Name' => 'U.S. Pint', 'AllowPrefix' => false], 'uk_pt' => ['Group' => 'Liquid', 'Unit Name' => 'U.K. Pint', 'AllowPrefix' => false], 'qt' => ['Group' => 'Liquid', 'Unit Name' => 'Quart', 'AllowPrefix' => false], 'gal' => ['Group' => 'Liquid', 'Unit Name' => 'Gallon', 'AllowPrefix' => false], 'l' => ['Group' => 'Liquid', 'Unit Name' => 'Litre', 'AllowPrefix' => true], 'lt' => ['Group' => 'Liquid', 'Unit Name' => 'Litre', 'AllowPrefix' => true]];
    /**
     * Details of the Multiplier prefixes that can be used with Units of Measure in CONVERTUOM().
     *
     * @var mixed[]
     */
    private static $conversionMultipliers = ['Y' => ['multiplier' => 1.0E+24, 'name' => 'yotta'], 'Z' => ['multiplier' => 1.0E+21, 'name' => 'zetta'], 'E' => ['multiplier' => 1.0E+18, 'name' => 'exa'], 'P' => ['multiplier' => 1000000000000000.0, 'name' => 'peta'], 'T' => ['multiplier' => 1000000000000.0, 'name' => 'tera'], 'G' => ['multiplier' => 1000000000.0, 'name' => 'giga'], 'M' => ['multiplier' => 1000000.0, 'name' => 'mega'], 'k' => ['multiplier' => 1000.0, 'name' => 'kilo'], 'h' => ['multiplier' => 100.0, 'name' => 'hecto'], 'e' => ['multiplier' => 10.0, 'name' => 'deka'], 'd' => ['multiplier' => 0.1, 'name' => 'deci'], 'c' => ['multiplier' => 0.01, 'name' => 'centi'], 'm' => ['multiplier' => 0.001, 'name' => 'milli'], 'u' => ['multiplier' => 1.0E-6, 'name' => 'micro'], 'n' => ['multiplier' => 1.0E-9, 'name' => 'nano'], 'p' => ['multiplier' => 1.0E-12, 'name' => 'pico'], 'f' => ['multiplier' => 1.0E-15, 'name' => 'femto'], 'a' => ['multiplier' => 1.0E-18, 'name' => 'atto'], 'z' => ['multiplier' => 9.999999999999999E-22, 'name' => 'zepto'], 'y' => ['multiplier' => 9.999999999999999E-25, 'name' => 'yocto']];
    /**
     * Details of the Units of measure conversion factors, organised by group.
     *
     * @var mixed[]
     */
    private static $unitConversions = ['Mass' => ['g' => ['g' => 1.0, 'sg' => 6.85220500053478E-5, 'lbm' => 0.00220462291469134, 'u' => 6.02217E+23, 'ozm' => 0.0352739718003627], 'sg' => ['g' => 14593.8424189287, 'sg' => 1.0, 'lbm' => 32.1739194101647, 'u' => 8.788659999999999E+27, 'ozm' => 514.782785944229], 'lbm' => ['g' => 453.5923097488115, 'sg' => 0.0310810749306493, 'lbm' => 1.0, 'u' => 2.73161E+26, 'ozm' => 16.000002342941], 'u' => ['g' => 1.66053100460465E-24, 'sg' => 1.1378298853295E-28, 'lbm' => 3.66084470330684E-27, 'u' => 1.0, 'ozm' => 5.85735238300524E-26], 'ozm' => ['g' => 28.3495152079732, 'sg' => 0.00194256689870811, 'lbm' => 0.0624999908478882, 'u' => 1.707256E+25, 'ozm' => 1.0]], 'Distance' => ['m' => ['m' => 1.0, 'mi' => 0.000621371192237334, 'Nmi' => 0.000539956803455724, 'in' => 39.3700787401575, 'ft' => 3.28083989501312, 'yd' => 1.09361329797891, 'ang' => 10000000000.0, 'Pica' => 2834.64566929116], 'mi' => ['m' => 1609.344, 'mi' => 1.0, 'Nmi' => 0.868976241900648, 'in' => 63360.0, 'ft' => 5280.0, 'yd' => 1760.0, 'ang' => 16093440000000.0, 'Pica' => 4561919.99999971], 'Nmi' => ['m' => 1852.0, 'mi' => 1.15077944802354, 'Nmi' => 1.0, 'in' => 72913.3858267717, 'ft' => 6076.1154855643, 'yd' => 2025.37182785694, 'ang' => 18520000000000.0, 'Pica' => 5249763.77952723], 'in' => ['m' => 0.0254, 'mi' => 1.57828282828283E-5, 'Nmi' => 1.37149028077754E-5, 'in' => 1.0, 'ft' => 0.0833333333333333, 'yd' => 0.0277777777686643, 'ang' => 254000000.0, 'Pica' => 71.9999999999955], 'ft' => ['m' => 0.3048, 'mi' => 0.000189393939393939, 'Nmi' => 0.000164578833693305, 'in' => 12.0, 'ft' => 1.0, 'yd' => 0.333333333223972, 'ang' => 3048000000.0, 'Pica' => 863.999999999946], 'yd' => ['m' => 0.9144000003, 'mi' => 0.00056818181836823, 'Nmi' => 0.000493736501241901, 'in' => 36.000000011811, 'ft' => 3.0, 'yd' => 1.0, 'ang' => 9144000003.0, 'Pica' => 2592.00000085023], 'ang' => ['m' => 1.0E-10, 'mi' => 6.213711922373341E-14, 'Nmi' => 5.39956803455724E-14, 'in' => 3.93700787401575E-9, 'ft' => 3.28083989501312E-10, 'yd' => 1.09361329797891E-10, 'ang' => 1.0, 'Pica' => 2.83464566929116E-7], 'Pica' => ['m' => 0.0003527777777778, 'mi' => 2.19205948372629E-7, 'Nmi' => 1.90484761219114E-7, 'in' => 0.0138888888888898, 'ft' => 0.00115740740740748, 'yd' => 0.000385802469009251, 'ang' => 3527777.777778, 'Pica' => 1.0]], 'Time' => ['yr' => ['yr' => 1.0, 'day' => 365.25, 'hr' => 8766.0, 'mn' => 525960.0, 'sec' => 31557600.0], 'day' => ['yr' => 0.0027378507871321, 'day' => 1.0, 'hr' => 24.0, 'mn' => 1440.0, 'sec' => 86400.0], 'hr' => ['yr' => 0.000114077116130504, 'day' => 0.0416666666666667, 'hr' => 1.0, 'mn' => 60.0, 'sec' => 3600.0], 'mn' => ['yr' => 1.90128526884174E-6, 'day' => 0.000694444444444444, 'hr' => 0.0166666666666667, 'mn' => 1.0, 'sec' => 60.0], 'sec' => ['yr' => 3.16880878140289E-8, 'day' => 1.15740740740741E-5, 'hr' => 0.000277777777777778, 'mn' => 0.0166666666666667, 'sec' => 1.0]], 'Pressure' => ['Pa' => ['Pa' => 1.0, 'p' => 1.0, 'atm' => 9.86923299998193E-6, 'at' => 9.86923299998193E-6, 'mmHg' => 0.00750061707998627], 'p' => ['Pa' => 1.0, 'p' => 1.0, 'atm' => 9.86923299998193E-6, 'at' => 9.86923299998193E-6, 'mmHg' => 0.00750061707998627], 'atm' => ['Pa' => 101324.996583, 'p' => 101324.996583, 'atm' => 1.0, 'at' => 1.0, 'mmHg' => 760.0], 'at' => ['Pa' => 101324.996583, 'p' => 101324.996583, 'atm' => 1.0, 'at' => 1.0, 'mmHg' => 760.0], 'mmHg' => ['Pa' => 133.322363925, 'p' => 133.322363925, 'atm' => 0.00131578947368421, 'at' => 0.00131578947368421, 'mmHg' => 1.0]], 'Force' => ['N' => ['N' => 1.0, 'dyn' => 100000.0, 'dy' => 100000.0, 'lbf' => 0.224808923655339], 'dyn' => ['N' => 1.0E-5, 'dyn' => 1.0, 'dy' => 1.0, 'lbf' => 2.24808923655339E-6], 'dy' => ['N' => 1.0E-5, 'dyn' => 1.0, 'dy' => 1.0, 'lbf' => 2.24808923655339E-6], 'lbf' => ['N' => 4.448222, 'dyn' => 444822.2, 'dy' => 444822.2, 'lbf' => 1.0]], 'Energy' => ['J' => ['J' => 1.0, 'e' => 9999995.193432311, 'c' => 0.239006249473467, 'cal' => 0.238846190642017, 'eV' => 6.241457E+18, 'ev' => 6.241457E+18, 'HPh' => 3.72506430801E-7, 'hh' => 3.72506430801E-7, 'Wh' => 0.000277777916238711, 'wh' => 0.000277777916238711, 'flb' => 23.7304222192651, 'BTU' => 0.000947815067349015, 'btu' => 0.000947815067349015], 'e' => ['J' => 1.000000480657E-7, 'e' => 1.0, 'c' => 2.39006364353494E-8, 'cal' => 2.38846305445111E-8, 'eV' => 624146000000.0, 'ev' => 624146000000.0, 'HPh' => 3.72506609848824E-14, 'hh' => 3.72506609848824E-14, 'Wh' => 2.77778049754611E-11, 'wh' => 2.77778049754611E-11, 'flb' => 2.37304336254586E-6, 'BTU' => 9.47815522922962E-11, 'btu' => 9.47815522922962E-11], 'c' => ['J' => 4.18399101363672, 'e' => 41839890.0257312, 'c' => 1.0, 'cal' => 0.999330315287563, 'eV' => 2.61142E+19, 'ev' => 2.61142E+19, 'HPh' => 1.55856355899327E-6, 'hh' => 1.55856355899327E-6, 'Wh' => 0.0011622203053295, 'wh' => 0.0011622203053295, 'flb' => 99.28787331521021, 'BTU' => 0.00396564972437776, 'btu' => 0.00396564972437776], 'cal' => ['J' => 4.18679484613929, 'e' => 41867928.3372801, 'c' => 1.00067013349059, 'cal' => 1.0, 'eV' => 2.61317E+19, 'ev' => 2.61317E+19, 'HPh' => 1.55960800463137E-6, 'hh' => 1.55960800463137E-6, 'Wh' => 0.00116299914807955, 'wh' => 0.00116299914807955, 'flb' => 99.3544094443283, 'BTU' => 0.00396830723907002, 'btu' => 0.00396830723907002], 'eV' => ['J' => 1.60219000146921E-19, 'e' => 1.60218923136574E-12, 'c' => 3.82933423195043E-20, 'cal' => 3.82676978535648E-20, 'eV' => 1.0, 'ev' => 1.0, 'HPh' => 5.968260789123441E-26, 'hh' => 5.968260789123441E-26, 'Wh' => 4.45053000026614E-23, 'wh' => 4.45053000026614E-23, 'flb' => 3.80206452103492E-18, 'BTU' => 1.51857982414846E-22, 'btu' => 1.51857982414846E-22], 'ev' => ['J' => 1.60219000146921E-19, 'e' => 1.60218923136574E-12, 'c' => 3.82933423195043E-20, 'cal' => 3.82676978535648E-20, 'eV' => 1.0, 'ev' => 1.0, 'HPh' => 5.968260789123441E-26, 'hh' => 5.968260789123441E-26, 'Wh' => 4.45053000026614E-23, 'wh' => 4.45053000026614E-23, 'flb' => 3.80206452103492E-18, 'BTU' => 1.51857982414846E-22, 'btu' => 1.51857982414846E-22], 'HPh' => ['J' => 2684517.4131617, 'e' => 26845161228302.4, 'c' => 641616.438565991, 'cal' => 641186.7578458349, 'eV' => 1.67553E+25, 'ev' => 1.67553E+25, 'HPh' => 1.0, 'hh' => 1.0, 'Wh' => 745.6996531345929, 'wh' => 745.6996531345929, 'flb' => 63704731.6692964, 'BTU' => 2544.42605275546, 'btu' => 2544.42605275546], 'hh' => ['J' => 2684517.4131617, 'e' => 26845161228302.4, 'c' => 641616.438565991, 'cal' => 641186.7578458349, 'eV' => 1.67553E+25, 'ev' => 1.67553E+25, 'HPh' => 1.0, 'hh' => 1.0, 'Wh' => 745.6996531345929, 'wh' => 745.6996531345929, 'flb' => 63704731.6692964, 'BTU' => 2544.42605275546, 'btu' => 2544.42605275546], 'Wh' => ['J' => 3599.9982055472, 'e' => 35999964751.8369, 'c' => 860.422069219046, 'cal' => 859.845857713046, 'eV' => 2.2469234E+22, 'ev' => 2.2469234E+22, 'HPh' => 0.00134102248243839, 'hh' => 0.00134102248243839, 'Wh' => 1.0, 'wh' => 1.0, 'flb' => 85429.4774062316, 'BTU' => 3.41213254164705, 'btu' => 3.41213254164705], 'wh' => ['J' => 3599.9982055472, 'e' => 35999964751.8369, 'c' => 860.422069219046, 'cal' => 859.845857713046, 'eV' => 2.2469234E+22, 'ev' => 2.2469234E+22, 'HPh' => 0.00134102248243839, 'hh' => 0.00134102248243839, 'Wh' => 1.0, 'wh' => 1.0, 'flb' => 85429.4774062316, 'BTU' => 3.41213254164705, 'btu' => 3.41213254164705], 'flb' => ['J' => 0.0421400003236424, 'e' => 421399.80068766, 'c' => 0.0100717234301644, 'cal' => 0.0100649785509554, 'eV' => 2.63015E+17, 'ev' => 2.63015E+17, 'HPh' => 1.5697421114513E-8, 'hh' => 1.5697421114513E-8, 'Wh' => 1.17055614802E-5, 'wh' => 1.17055614802E-5, 'flb' => 1.0, 'BTU' => 3.99409272448406E-5, 'btu' => 3.99409272448406E-5], 'BTU' => ['J' => 1055.05813786749, 'e' => 10550576307.4665, 'c' => 252.165488508168, 'cal' => 251.99661713551, 'eV' => 6.5851E+21, 'ev' => 6.5851E+21, 'HPh' => 0.000393015941224568, 'hh' => 0.000393015941224568, 'Wh' => 0.293071851047526, 'wh' => 0.293071851047526, 'flb' => 25036.9750774671, 'BTU' => 1.0, 'btu' => 1.0], 'btu' => ['J' => 1055.05813786749, 'e' => 10550576307.4665, 'c' => 252.165488508168, 'cal' => 251.99661713551, 'eV' => 6.5851E+21, 'ev' => 6.5851E+21, 'HPh' => 0.000393015941224568, 'hh' => 0.000393015941224568, 'Wh' => 0.293071851047526, 'wh' => 0.293071851047526, 'flb' => 25036.9750774671, 'BTU' => 1.0, 'btu' => 1.0]], 'Power' => ['HP' => ['HP' => 1.0, 'h' => 1.0, 'W' => 745.701, 'w' => 745.701], 'h' => ['HP' => 1.0, 'h' => 1.0, 'W' => 745.701, 'w' => 745.701], 'W' => ['HP' => 0.00134102006031908, 'h' => 0.00134102006031908, 'W' => 1.0, 'w' => 1.0], 'w' => ['HP' => 0.00134102006031908, 'h' => 0.00134102006031908, 'W' => 1.0, 'w' => 1.0]], 'Magnetism' => ['T' => ['T' => 1.0, 'ga' => 10000.0], 'ga' => ['T' => 0.0001, 'ga' => 1.0]], 'Liquid' => ['tsp' => ['tsp' => 1.0, 'tbs' => 0.333333333333333, 'oz' => 0.166666666666667, 'cup' => 0.0208333333333333, 'pt' => 0.0104166666666667, 'us_pt' => 0.0104166666666667, 'uk_pt' => 0.008675585168219599, 'qt' => 0.00520833333333333, 'gal' => 0.00130208333333333, 'l' => 0.0049299940840071, 'lt' => 0.0049299940840071], 'tbs' => ['tsp' => 3.0, 'tbs' => 1.0, 'oz' => 0.5, 'cup' => 0.0625, 'pt' => 0.03125, 'us_pt' => 0.03125, 'uk_pt' => 0.0260267555046588, 'qt' => 0.015625, 'gal' => 0.00390625, 'l' => 0.0147899822520213, 'lt' => 0.0147899822520213], 'oz' => ['tsp' => 6.0, 'tbs' => 2.0, 'oz' => 1.0, 'cup' => 0.125, 'pt' => 0.0625, 'us_pt' => 0.0625, 'uk_pt' => 0.0520535110093176, 'qt' => 0.03125, 'gal' => 0.0078125, 'l' => 0.0295799645040426, 'lt' => 0.0295799645040426], 'cup' => ['tsp' => 48.0, 'tbs' => 16.0, 'oz' => 8.0, 'cup' => 1.0, 'pt' => 0.5, 'us_pt' => 0.5, 'uk_pt' => 0.416428088074541, 'qt' => 0.25, 'gal' => 0.0625, 'l' => 0.236639716032341, 'lt' => 0.236639716032341], 'pt' => ['tsp' => 96.0, 'tbs' => 32.0, 'oz' => 16.0, 'cup' => 2.0, 'pt' => 1.0, 'us_pt' => 1.0, 'uk_pt' => 0.832856176149081, 'qt' => 0.5, 'gal' => 0.125, 'l' => 0.473279432064682, 'lt' => 0.473279432064682], 'us_pt' => ['tsp' => 96.0, 'tbs' => 32.0, 'oz' => 16.0, 'cup' => 2.0, 'pt' => 1.0, 'us_pt' => 1.0, 'uk_pt' => 0.832856176149081, 'qt' => 0.5, 'gal' => 0.125, 'l' => 0.473279432064682, 'lt' => 0.473279432064682], 'uk_pt' => ['tsp' => 115.266, 'tbs' => 38.422, 'oz' => 19.211, 'cup' => 2.401375, 'pt' => 1.2006875, 'us_pt' => 1.2006875, 'uk_pt' => 1.0, 'qt' => 0.60034375, 'gal' => 0.1500859375, 'l' => 0.568260698087162, 'lt' => 0.568260698087162], 'qt' => ['tsp' => 192.0, 'tbs' => 64.0, 'oz' => 32.0, 'cup' => 4.0, 'pt' => 2.0, 'us_pt' => 2.0, 'uk_pt' => 1.66571235229816, 'qt' => 1.0, 'gal' => 0.25, 'l' => 0.946558864129363, 'lt' => 0.946558864129363], 'gal' => ['tsp' => 768.0, 'tbs' => 256.0, 'oz' => 128.0, 'cup' => 16.0, 'pt' => 8.0, 'us_pt' => 8.0, 'uk_pt' => 6.66284940919265, 'qt' => 4.0, 'gal' => 1.0, 'l' => 3.78623545651745, 'lt' => 3.78623545651745], 'l' => ['tsp' => 202.84, 'tbs' => 67.6133333333333, 'oz' => 33.8066666666667, 'cup' => 4.22583333333333, 'pt' => 2.11291666666667, 'us_pt' => 2.11291666666667, 'uk_pt' => 1.75975569552166, 'qt' => 1.05645833333333, 'gal' => 0.264114583333333, 'l' => 1.0, 'lt' => 1.0], 'lt' => ['tsp' => 202.84, 'tbs' => 67.6133333333333, 'oz' => 33.8066666666667, 'cup' => 4.22583333333333, 'pt' => 2.11291666666667, 'us_pt' => 2.11291666666667, 'uk_pt' => 1.75975569552166, 'qt' => 1.05645833333333, 'gal' => 0.264114583333333, 'l' => 1.0, 'lt' => 1.0]]];
    /**
     * parseComplex.
     *
     * Parses a complex number into its real and imaginary parts, and an I or J suffix
     *
     * @deprecated 2.0.0 No longer used by internal code. Please use the Complex\Complex class instead
     *
     * @param string $complexNumber The complex number
     *
     * @return mixed[] Indexed on "real", "imaginary" and "suffix"
     */
    public static function parseComplex($complexNumber)
    {
    }
    /**
     * Formats a number base string value with leading zeroes.
     *
     * @param string $xVal The "number" to pad
     * @param int $places The length that we want to pad this value
     *
     * @return string The padded "number"
     */
    private static function nbrConversionFormat($xVal, $places)
    {
    }
    /**
     * BESSELI.
     *
     *    Returns the modified Bessel function In(x), which is equivalent to the Bessel function evaluated
     *        for purely imaginary arguments
     *
     *    Excel Function:
     *        BESSELI(x,ord)
     *
     * @category Engineering Functions
     *
     * @param float $x The value at which to evaluate the function.
     *                                If x is nonnumeric, BESSELI returns the #VALUE! error value.
     * @param int $ord The order of the Bessel function.
     *                                If ord is not an integer, it is truncated.
     *                                If $ord is nonnumeric, BESSELI returns the #VALUE! error value.
     *                                If $ord < 0, BESSELI returns the #NUM! error value.
     *
     * @return float|string Result, or a string containing an error
     */
    public static function BESSELI($x, $ord)
    {
    }
    /**
     * BESSELJ.
     *
     *    Returns the Bessel function
     *
     *    Excel Function:
     *        BESSELJ(x,ord)
     *
     * @category Engineering Functions
     *
     * @param float $x The value at which to evaluate the function.
     *                                If x is nonnumeric, BESSELJ returns the #VALUE! error value.
     * @param int $ord The order of the Bessel function. If n is not an integer, it is truncated.
     *                                If $ord is nonnumeric, BESSELJ returns the #VALUE! error value.
     *                                If $ord < 0, BESSELJ returns the #NUM! error value.
     *
     * @return float|string Result, or a string containing an error
     */
    public static function BESSELJ($x, $ord)
    {
    }
    private static function besselK0($fNum)
    {
    }
    private static function besselK1($fNum)
    {
    }
    /**
     * BESSELK.
     *
     *    Returns the modified Bessel function Kn(x), which is equivalent to the Bessel functions evaluated
     *        for purely imaginary arguments.
     *
     *    Excel Function:
     *        BESSELK(x,ord)
     *
     * @category Engineering Functions
     *
     * @param float $x The value at which to evaluate the function.
     *                                If x is nonnumeric, BESSELK returns the #VALUE! error value.
     * @param int $ord The order of the Bessel function. If n is not an integer, it is truncated.
     *                                If $ord is nonnumeric, BESSELK returns the #VALUE! error value.
     *                                If $ord < 0, BESSELK returns the #NUM! error value.
     *
     * @return float|string Result, or a string containing an error
     */
    public static function BESSELK($x, $ord)
    {
    }
    private static function besselY0($fNum)
    {
    }
    private static function besselY1($fNum)
    {
    }
    /**
     * BESSELY.
     *
     * Returns the Bessel function, which is also called the Weber function or the Neumann function.
     *
     *    Excel Function:
     *        BESSELY(x,ord)
     *
     * @category Engineering Functions
     *
     * @param float $x The value at which to evaluate the function.
     *                                If x is nonnumeric, BESSELK returns the #VALUE! error value.
     * @param int $ord The order of the Bessel function. If n is not an integer, it is truncated.
     *                                If $ord is nonnumeric, BESSELK returns the #VALUE! error value.
     *                                If $ord < 0, BESSELK returns the #NUM! error value.
     *
     * @return float|string Result, or a string containing an error
     */
    public static function BESSELY($x, $ord)
    {
    }
    /**
     * BINTODEC.
     *
     * Return a binary value as decimal.
     *
     * Excel Function:
     *        BIN2DEC(x)
     *
     * @category Engineering Functions
     *
     * @param string $x The binary number (as a string) that you want to convert. The number
     *                                cannot contain more than 10 characters (10 bits). The most significant
     *                                bit of number is the sign bit. The remaining 9 bits are magnitude bits.
     *                                Negative numbers are represented using two's-complement notation.
     *                                If number is not a valid binary number, or if number contains more than
     *                                10 characters (10 bits), BIN2DEC returns the #NUM! error value.
     *
     * @return string
     */
    public static function BINTODEC($x)
    {
    }
    /**
     * BINTOHEX.
     *
     * Return a binary value as hex.
     *
     * Excel Function:
     *        BIN2HEX(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The binary number (as a string) that you want to convert. The number
     *                                cannot contain more than 10 characters (10 bits). The most significant
     *                                bit of number is the sign bit. The remaining 9 bits are magnitude bits.
     *                                Negative numbers are represented using two's-complement notation.
     *                                If number is not a valid binary number, or if number contains more than
     *                                10 characters (10 bits), BIN2HEX returns the #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted, BIN2HEX uses the
     *                                minimum number of characters necessary. Places is useful for padding the
     *                                return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, BIN2HEX returns the #VALUE! error value.
     *                                If places is negative, BIN2HEX returns the #NUM! error value.
     *
     * @return string
     */
    public static function BINTOHEX($x, $places = null)
    {
    }
    /**
     * BINTOOCT.
     *
     * Return a binary value as octal.
     *
     * Excel Function:
     *        BIN2OCT(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The binary number (as a string) that you want to convert. The number
     *                                cannot contain more than 10 characters (10 bits). The most significant
     *                                bit of number is the sign bit. The remaining 9 bits are magnitude bits.
     *                                Negative numbers are represented using two's-complement notation.
     *                                If number is not a valid binary number, or if number contains more than
     *                                10 characters (10 bits), BIN2OCT returns the #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted, BIN2OCT uses the
     *                                minimum number of characters necessary. Places is useful for padding the
     *                                return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, BIN2OCT returns the #VALUE! error value.
     *                                If places is negative, BIN2OCT returns the #NUM! error value.
     *
     * @return string
     */
    public static function BINTOOCT($x, $places = null)
    {
    }
    /**
     * DECTOBIN.
     *
     * Return a decimal value as binary.
     *
     * Excel Function:
     *        DEC2BIN(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The decimal integer you want to convert. If number is negative,
     *                                valid place values are ignored and DEC2BIN returns a 10-character
     *                                (10-bit) binary number in which the most significant bit is the sign
     *                                bit. The remaining 9 bits are magnitude bits. Negative numbers are
     *                                represented using two's-complement notation.
     *                                If number < -512 or if number > 511, DEC2BIN returns the #NUM! error
     *                                value.
     *                                If number is nonnumeric, DEC2BIN returns the #VALUE! error value.
     *                                If DEC2BIN requires more than places characters, it returns the #NUM!
     *                                error value.
     * @param int $places The number of characters to use. If places is omitted, DEC2BIN uses
     *                                the minimum number of characters necessary. Places is useful for
     *                                padding the return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, DEC2BIN returns the #VALUE! error value.
     *                                If places is zero or negative, DEC2BIN returns the #NUM! error value.
     *
     * @return string
     */
    public static function DECTOBIN($x, $places = null)
    {
    }
    /**
     * DECTOHEX.
     *
     * Return a decimal value as hex.
     *
     * Excel Function:
     *        DEC2HEX(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The decimal integer you want to convert. If number is negative,
     *                                places is ignored and DEC2HEX returns a 10-character (40-bit)
     *                                hexadecimal number in which the most significant bit is the sign
     *                                bit. The remaining 39 bits are magnitude bits. Negative numbers
     *                                are represented using two's-complement notation.
     *                                If number < -549,755,813,888 or if number > 549,755,813,887,
     *                                DEC2HEX returns the #NUM! error value.
     *                                If number is nonnumeric, DEC2HEX returns the #VALUE! error value.
     *                                If DEC2HEX requires more than places characters, it returns the
     *                                #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted, DEC2HEX uses
     *                                the minimum number of characters necessary. Places is useful for
     *                                padding the return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, DEC2HEX returns the #VALUE! error value.
     *                                If places is zero or negative, DEC2HEX returns the #NUM! error value.
     *
     * @return string
     */
    public static function DECTOHEX($x, $places = null)
    {
    }
    /**
     * DECTOOCT.
     *
     * Return an decimal value as octal.
     *
     * Excel Function:
     *        DEC2OCT(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The decimal integer you want to convert. If number is negative,
     *                                places is ignored and DEC2OCT returns a 10-character (30-bit)
     *                                octal number in which the most significant bit is the sign bit.
     *                                The remaining 29 bits are magnitude bits. Negative numbers are
     *                                represented using two's-complement notation.
     *                                If number < -536,870,912 or if number > 536,870,911, DEC2OCT
     *                                returns the #NUM! error value.
     *                                If number is nonnumeric, DEC2OCT returns the #VALUE! error value.
     *                                If DEC2OCT requires more than places characters, it returns the
     *                                #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted, DEC2OCT uses
     *                                the minimum number of characters necessary. Places is useful for
     *                                padding the return value with leading 0s (zeros).
     *                                If places is not an integer, it is truncated.
     *                                If places is nonnumeric, DEC2OCT returns the #VALUE! error value.
     *                                If places is zero or negative, DEC2OCT returns the #NUM! error value.
     *
     * @return string
     */
    public static function DECTOOCT($x, $places = null)
    {
    }
    /**
     * HEXTOBIN.
     *
     * Return a hex value as binary.
     *
     * Excel Function:
     *        HEX2BIN(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x the hexadecimal number you want to convert.
     *                  Number cannot contain more than 10 characters.
     *                  The most significant bit of number is the sign bit (40th bit from the right).
     *                  The remaining 9 bits are magnitude bits.
     *                  Negative numbers are represented using two's-complement notation.
     *                  If number is negative, HEX2BIN ignores places and returns a 10-character binary number.
     *                  If number is negative, it cannot be less than FFFFFFFE00,
     *                      and if number is positive, it cannot be greater than 1FF.
     *                  If number is not a valid hexadecimal number, HEX2BIN returns the #NUM! error value.
     *                  If HEX2BIN requires more than places characters, it returns the #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted,
     *                                    HEX2BIN uses the minimum number of characters necessary. Places
     *                                    is useful for padding the return value with leading 0s (zeros).
     *                                    If places is not an integer, it is truncated.
     *                                    If places is nonnumeric, HEX2BIN returns the #VALUE! error value.
     *                                    If places is negative, HEX2BIN returns the #NUM! error value.
     *
     * @return string
     */
    public static function HEXTOBIN($x, $places = null)
    {
    }
    /**
     * HEXTODEC.
     *
     * Return a hex value as decimal.
     *
     * Excel Function:
     *        HEX2DEC(x)
     *
     * @category Engineering Functions
     *
     * @param string $x The hexadecimal number you want to convert. This number cannot
     *                                contain more than 10 characters (40 bits). The most significant
     *                                bit of number is the sign bit. The remaining 39 bits are magnitude
     *                                bits. Negative numbers are represented using two's-complement
     *                                notation.
     *                                If number is not a valid hexadecimal number, HEX2DEC returns the
     *                                #NUM! error value.
     *
     * @return string
     */
    public static function HEXTODEC($x)
    {
    }
    /**
     * HEXTOOCT.
     *
     * Return a hex value as octal.
     *
     * Excel Function:
     *        HEX2OCT(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The hexadecimal number you want to convert. Number cannot
     *                                    contain more than 10 characters. The most significant bit of
     *                                    number is the sign bit. The remaining 39 bits are magnitude
     *                                    bits. Negative numbers are represented using two's-complement
     *                                    notation.
     *                                    If number is negative, HEX2OCT ignores places and returns a
     *                                    10-character octal number.
     *                                    If number is negative, it cannot be less than FFE0000000, and
     *                                    if number is positive, it cannot be greater than 1FFFFFFF.
     *                                    If number is not a valid hexadecimal number, HEX2OCT returns
     *                                    the #NUM! error value.
     *                                    If HEX2OCT requires more than places characters, it returns
     *                                    the #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted, HEX2OCT
     *                                    uses the minimum number of characters necessary. Places is
     *                                    useful for padding the return value with leading 0s (zeros).
     *                                    If places is not an integer, it is truncated.
     *                                    If places is nonnumeric, HEX2OCT returns the #VALUE! error
     *                                    value.
     *                                    If places is negative, HEX2OCT returns the #NUM! error value.
     *
     * @return string
     */
    public static function HEXTOOCT($x, $places = null)
    {
    }
    /**
     * OCTTOBIN.
     *
     * Return an octal value as binary.
     *
     * Excel Function:
     *        OCT2BIN(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The octal number you want to convert. Number may not
     *                                    contain more than 10 characters. The most significant
     *                                    bit of number is the sign bit. The remaining 29 bits
     *                                    are magnitude bits. Negative numbers are represented
     *                                    using two's-complement notation.
     *                                    If number is negative, OCT2BIN ignores places and returns
     *                                    a 10-character binary number.
     *                                    If number is negative, it cannot be less than 7777777000,
     *                                    and if number is positive, it cannot be greater than 777.
     *                                    If number is not a valid octal number, OCT2BIN returns
     *                                    the #NUM! error value.
     *                                    If OCT2BIN requires more than places characters, it
     *                                    returns the #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted,
     *                                    OCT2BIN uses the minimum number of characters necessary.
     *                                    Places is useful for padding the return value with
     *                                    leading 0s (zeros).
     *                                    If places is not an integer, it is truncated.
     *                                    If places is nonnumeric, OCT2BIN returns the #VALUE!
     *                                    error value.
     *                                    If places is negative, OCT2BIN returns the #NUM! error
     *                                    value.
     *
     * @return string
     */
    public static function OCTTOBIN($x, $places = null)
    {
    }
    /**
     * OCTTODEC.
     *
     * Return an octal value as decimal.
     *
     * Excel Function:
     *        OCT2DEC(x)
     *
     * @category Engineering Functions
     *
     * @param string $x The octal number you want to convert. Number may not contain
     *                                more than 10 octal characters (30 bits). The most significant
     *                                bit of number is the sign bit. The remaining 29 bits are
     *                                magnitude bits. Negative numbers are represented using
     *                                two's-complement notation.
     *                                If number is not a valid octal number, OCT2DEC returns the
     *                                #NUM! error value.
     *
     * @return string
     */
    public static function OCTTODEC($x)
    {
    }
    /**
     * OCTTOHEX.
     *
     * Return an octal value as hex.
     *
     * Excel Function:
     *        OCT2HEX(x[,places])
     *
     * @category Engineering Functions
     *
     * @param string $x The octal number you want to convert. Number may not contain
     *                                    more than 10 octal characters (30 bits). The most significant
     *                                    bit of number is the sign bit. The remaining 29 bits are
     *                                    magnitude bits. Negative numbers are represented using
     *                                    two's-complement notation.
     *                                    If number is negative, OCT2HEX ignores places and returns a
     *                                    10-character hexadecimal number.
     *                                    If number is not a valid octal number, OCT2HEX returns the
     *                                    #NUM! error value.
     *                                    If OCT2HEX requires more than places characters, it returns
     *                                    the #NUM! error value.
     * @param int $places The number of characters to use. If places is omitted, OCT2HEX
     *                                    uses the minimum number of characters necessary. Places is useful
     *                                    for padding the return value with leading 0s (zeros).
     *                                    If places is not an integer, it is truncated.
     *                                    If places is nonnumeric, OCT2HEX returns the #VALUE! error value.
     *                                    If places is negative, OCT2HEX returns the #NUM! error value.
     *
     * @return string
     */
    public static function OCTTOHEX($x, $places = null)
    {
    }
    /**
     * COMPLEX.
     *
     * Converts real and imaginary coefficients into a complex number of the form x +/- yi or x +/- yj.
     *
     * Excel Function:
     *        COMPLEX(realNumber,imaginary[,suffix])
     *
     * @category Engineering Functions
     *
     * @param float $realNumber the real coefficient of the complex number
     * @param float $imaginary the imaginary coefficient of the complex number
     * @param string $suffix The suffix for the imaginary component of the complex number.
     *                                        If omitted, the suffix is assumed to be "i".
     *
     * @return string
     */
    public static function COMPLEX($realNumber = 0.0, $imaginary = 0.0, $suffix = 'i')
    {
    }
    /**
     * IMAGINARY.
     *
     * Returns the imaginary coefficient of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMAGINARY(complexNumber)
     *
     * @category Engineering Functions
     *
     * @param string $complexNumber the complex number for which you want the imaginary
     *                                         coefficient
     *
     * @return float
     */
    public static function IMAGINARY($complexNumber)
    {
    }
    /**
     * IMREAL.
     *
     * Returns the real coefficient of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMREAL(complexNumber)
     *
     * @category Engineering Functions
     *
     * @param string $complexNumber the complex number for which you want the real coefficient
     *
     * @return float
     */
    public static function IMREAL($complexNumber)
    {
    }
    /**
     * IMABS.
     *
     * Returns the absolute value (modulus) of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMABS(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the absolute value
     *
     * @return float
     */
    public static function IMABS($complexNumber)
    {
    }
    /**
     * IMARGUMENT.
     *
     * Returns the argument theta of a complex number, i.e. the angle in radians from the real
     * axis to the representation of the number in polar coordinates.
     *
     * Excel Function:
     *        IMARGUMENT(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the argument theta
     *
     * @return float|string
     */
    public static function IMARGUMENT($complexNumber)
    {
    }
    /**
     * IMCONJUGATE.
     *
     * Returns the complex conjugate of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCONJUGATE(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the conjugate
     *
     * @return string
     */
    public static function IMCONJUGATE($complexNumber)
    {
    }
    /**
     * IMCOS.
     *
     * Returns the cosine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCOS(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the cosine
     *
     * @return float|string
     */
    public static function IMCOS($complexNumber)
    {
    }
    /**
     * IMCOSH.
     *
     * Returns the hyperbolic cosine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCOSH(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the hyperbolic cosine
     *
     * @return float|string
     */
    public static function IMCOSH($complexNumber)
    {
    }
    /**
     * IMCOT.
     *
     * Returns the cotangent of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCOT(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the cotangent
     *
     * @return float|string
     */
    public static function IMCOT($complexNumber)
    {
    }
    /**
     * IMCSC.
     *
     * Returns the cosecant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCSC(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the cosecant
     *
     * @return float|string
     */
    public static function IMCSC($complexNumber)
    {
    }
    /**
     * IMCSCH.
     *
     * Returns the hyperbolic cosecant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCSCH(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the hyperbolic cosecant
     *
     * @return float|string
     */
    public static function IMCSCH($complexNumber)
    {
    }
    /**
     * IMSIN.
     *
     * Returns the sine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSIN(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the sine
     *
     * @return float|string
     */
    public static function IMSIN($complexNumber)
    {
    }
    /**
     * IMSINH.
     *
     * Returns the hyperbolic sine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSINH(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the hyperbolic sine
     *
     * @return float|string
     */
    public static function IMSINH($complexNumber)
    {
    }
    /**
     * IMSEC.
     *
     * Returns the secant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSEC(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the secant
     *
     * @return float|string
     */
    public static function IMSEC($complexNumber)
    {
    }
    /**
     * IMSECH.
     *
     * Returns the hyperbolic secant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSECH(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the hyperbolic secant
     *
     * @return float|string
     */
    public static function IMSECH($complexNumber)
    {
    }
    /**
     * IMTAN.
     *
     * Returns the tangent of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMTAN(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the tangent
     *
     * @return float|string
     */
    public static function IMTAN($complexNumber)
    {
    }
    /**
     * IMSQRT.
     *
     * Returns the square root of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSQRT(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the square root
     *
     * @return string
     */
    public static function IMSQRT($complexNumber)
    {
    }
    /**
     * IMLN.
     *
     * Returns the natural logarithm of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMLN(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the natural logarithm
     *
     * @return string
     */
    public static function IMLN($complexNumber)
    {
    }
    /**
     * IMLOG10.
     *
     * Returns the common logarithm (base 10) of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMLOG10(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the common logarithm
     *
     * @return string
     */
    public static function IMLOG10($complexNumber)
    {
    }
    /**
     * IMLOG2.
     *
     * Returns the base-2 logarithm of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMLOG2(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the base-2 logarithm
     *
     * @return string
     */
    public static function IMLOG2($complexNumber)
    {
    }
    /**
     * IMEXP.
     *
     * Returns the exponential of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMEXP(complexNumber)
     *
     * @param string $complexNumber the complex number for which you want the exponential
     *
     * @return string
     */
    public static function IMEXP($complexNumber)
    {
    }
    /**
     * IMPOWER.
     *
     * Returns a complex number in x + yi or x + yj text format raised to a power.
     *
     * Excel Function:
     *        IMPOWER(complexNumber,realNumber)
     *
     * @param string $complexNumber the complex number you want to raise to a power
     * @param float $realNumber the power to which you want to raise the complex number
     *
     * @return string
     */
    public static function IMPOWER($complexNumber, $realNumber)
    {
    }
    /**
     * IMDIV.
     *
     * Returns the quotient of two complex numbers in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMDIV(complexDividend,complexDivisor)
     *
     * @param string $complexDividend the complex numerator or dividend
     * @param string $complexDivisor the complex denominator or divisor
     *
     * @return string
     */
    public static function IMDIV($complexDividend, $complexDivisor)
    {
    }
    /**
     * IMSUB.
     *
     * Returns the difference of two complex numbers in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSUB(complexNumber1,complexNumber2)
     *
     * @param string $complexNumber1 the complex number from which to subtract complexNumber2
     * @param string $complexNumber2 the complex number to subtract from complexNumber1
     *
     * @return string
     */
    public static function IMSUB($complexNumber1, $complexNumber2)
    {
    }
    /**
     * IMSUM.
     *
     * Returns the sum of two or more complex numbers in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSUM(complexNumber[,complexNumber[,...]])
     *
     * @param string ...$complexNumbers Series of complex numbers to add
     *
     * @return string
     */
    public static function IMSUM(...$complexNumbers)
    {
    }
    /**
     * IMPRODUCT.
     *
     * Returns the product of two or more complex numbers in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMPRODUCT(complexNumber[,complexNumber[,...]])
     *
     * @param string ...$complexNumbers Series of complex numbers to multiply
     *
     * @return string
     */
    public static function IMPRODUCT(...$complexNumbers)
    {
    }
    /**
     * DELTA.
     *
     * Tests whether two values are equal. Returns 1 if number1 = number2; returns 0 otherwise.
     *    Use this function to filter a set of values. For example, by summing several DELTA
     *    functions you calculate the count of equal pairs. This function is also known as the
     * Kronecker Delta function.
     *
     *    Excel Function:
     *        DELTA(a[,b])
     *
     * @param float $a the first number
     * @param float $b The second number. If omitted, b is assumed to be zero.
     *
     * @return int
     */
    public static function DELTA($a, $b = 0)
    {
    }
    /**
     * GESTEP.
     *
     *    Excel Function:
     *        GESTEP(number[,step])
     *
     *    Returns 1 if number >= step; returns 0 (zero) otherwise
     *    Use this function to filter a set of values. For example, by summing several GESTEP
     * functions you calculate the count of values that exceed a threshold.
     *
     * @param float $number the value to test against step
     * @param float $step The threshold value.
     *                                    If you omit a value for step, GESTEP uses zero.
     *
     * @return int
     */
    public static function GESTEP($number, $step = 0)
    {
    }
    //
    //    Private method to calculate the erf value
    //
    private static $twoSqrtPi = 1.1283791670955126;
    public static function erfVal($x)
    {
    }
    /**
     * Validate arguments passed to the bitwise functions.
     *
     * @param mixed $value
     *
     * @throws Exception
     *
     * @return int
     */
    private static function validateBitwiseArgument($value)
    {
    }
    /**
     * BITAND.
     *
     * Returns the bitwise AND of two integer values.
     *
     * Excel Function:
     *        BITAND(number1, number2)
     *
     * @category Engineering Functions
     *
     * @param int $number1
     * @param int $number2
     *
     * @return int|string
     */
    public static function BITAND($number1, $number2)
    {
    }
    /**
     * BITOR.
     *
     * Returns the bitwise OR of two integer values.
     *
     * Excel Function:
     *        BITOR(number1, number2)
     *
     * @category Engineering Functions
     *
     * @param int $number1
     * @param int $number2
     *
     * @return int|string
     */
    public static function BITOR($number1, $number2)
    {
    }
    /**
     * BITXOR.
     *
     * Returns the bitwise XOR of two integer values.
     *
     * Excel Function:
     *        BITXOR(number1, number2)
     *
     * @category Engineering Functions
     *
     * @param int $number1
     * @param int $number2
     *
     * @return int|string
     */
    public static function BITXOR($number1, $number2)
    {
    }
    /**
     * BITLSHIFT.
     *
     * Returns the number value shifted left by shift_amount bits.
     *
     * Excel Function:
     *        BITLSHIFT(number, shift_amount)
     *
     * @category Engineering Functions
     *
     * @param int $number
     * @param int $shiftAmount
     *
     * @return int|string
     */
    public static function BITLSHIFT($number, $shiftAmount)
    {
    }
    /**
     * BITRSHIFT.
     *
     * Returns the number value shifted right by shift_amount bits.
     *
     * Excel Function:
     *        BITRSHIFT(number, shift_amount)
     *
     * @category Engineering Functions
     *
     * @param int $number
     * @param int $shiftAmount
     *
     * @return int|string
     */
    public static function BITRSHIFT($number, $shiftAmount)
    {
    }
    /**
     * ERF.
     *
     * Returns the error function integrated between the lower and upper bound arguments.
     *
     *    Note: In Excel 2007 or earlier, if you input a negative value for the upper or lower bound arguments,
     *            the function would return a #NUM! error. However, in Excel 2010, the function algorithm was
     *            improved, so that it can now calculate the function for both positive and negative ranges.
     *            PhpSpreadsheet follows Excel 2010 behaviour, and accepts negative arguments.
     *
     *    Excel Function:
     *        ERF(lower[,upper])
     *
     * @param float $lower lower bound for integrating ERF
     * @param float $upper upper bound for integrating ERF.
     *                                If omitted, ERF integrates between zero and lower_limit
     *
     * @return float|string
     */
    public static function ERF($lower, $upper = null)
    {
    }
    /**
     * ERFPRECISE.
     *
     * Returns the error function integrated between the lower and upper bound arguments.
     *
     *    Excel Function:
     *        ERF.PRECISE(limit)
     *
     * @param float $limit bound for integrating ERF
     *
     * @return float|string
     */
    public static function ERFPRECISE($limit)
    {
    }
    //
    //    Private method to calculate the erfc value
    //
    private static $oneSqrtPi = 0.5641895835477563;
    private static function erfcVal($x)
    {
    }
    /**
     * ERFC.
     *
     *    Returns the complementary ERF function integrated between x and infinity
     *
     *    Note: In Excel 2007 or earlier, if you input a negative value for the lower bound argument,
     *        the function would return a #NUM! error. However, in Excel 2010, the function algorithm was
     *        improved, so that it can now calculate the function for both positive and negative x values.
     *            PhpSpreadsheet follows Excel 2010 behaviour, and accepts nagative arguments.
     *
     *    Excel Function:
     *        ERFC(x)
     *
     * @param float $x The lower bound for integrating ERFC
     *
     * @return float|string
     */
    public static function ERFC($x)
    {
    }
    /**
     *    getConversionGroups
     * Returns a list of the different conversion groups for UOM conversions.
     *
     * @return array
     */
    public static function getConversionGroups()
    {
    }
    /**
     *    getConversionGroupUnits
     * Returns an array of units of measure, for a specified conversion group, or for all groups.
     *
     * @param string $group The group whose units of measure you want to retrieve
     *
     * @return array
     */
    public static function getConversionGroupUnits($group = null)
    {
    }
    /**
     * getConversionGroupUnitDetails.
     *
     * @param string $group The group whose units of measure you want to retrieve
     *
     * @return array
     */
    public static function getConversionGroupUnitDetails($group = null)
    {
    }
    /**
     *    getConversionMultipliers
     * Returns an array of the Multiplier prefixes that can be used with Units of Measure in CONVERTUOM().
     *
     * @return array of mixed
     */
    public static function getConversionMultipliers()
    {
    }
    /**
     * CONVERTUOM.
     *
     * Converts a number from one measurement system to another.
     *    For example, CONVERT can translate a table of distances in miles to a table of distances
     * in kilometers.
     *
     *    Excel Function:
     *        CONVERT(value,fromUOM,toUOM)
     *
     * @param float $value the value in fromUOM to convert
     * @param string $fromUOM the units for value
     * @param string $toUOM the units for the result
     *
     * @return float|string
     */
    public static function CONVERTUOM($value, $fromUOM, $toUOM)
    {
    }
}