<?php

/*
 Option 3: If the printer is configured to print in a specific code
 page, you can set up a CapabilityProfile which either references its
 iconv encoding name, or includes all of the available characters.

 Here, we make use of CP858 for its inclusion of currency symbols which
 are not available in CP437. CP858 has good printer support, but is not
 included in all iconv builds.
*/
class CustomCapabilityProfile extends \SimpleCapabilityProfile
{
    function getCustomCodePages()
    {
    }
    function getSupportedCodePages()
    {
    }
}