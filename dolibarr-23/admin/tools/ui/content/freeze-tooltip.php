<?php

//
$documentation = new \Documentation($db);
$group = 'Content';
$js = [];
$css = [];
$tooltip = '<p>
    Welcome to <a href="https://dolibarr.org" title="Official Dolibarr Website">Dolibarr</a>,
    an open-source ERP & CRM solution. This platform helps businesses manage their
    <abbr title="Customer Relationship Management">CRM</abbr>
    and <abbr title="Enterprise Resource Planning">ERP</abbr> needs efficiently.
</p>

<p>
    For documentation, visit our
    <a href="https://wiki.dolibarr.org" title="Dolibarr Documentation">Wiki</a>.
    Developers can contribute on
    <a href="https://github.com/Dolibarr/dolibarr" title="Dolibarr GitHub Repository">GitHub</a>.
</p>
<p><strong class="classfortooltip" title="Tooltips in tooltips">try tooltip in a tooltip</strong></p>
<p>
    Need help? Check out the
    <a href="https://www.dolibarr.org/forum.php" title="Dolibarr Community Forum">Community Forum</a>.
</p>

<p>
    <strong>Try a link with attribute</strong> <code>target="_blank"</code> <br/>
    <a href="https://www.dolibarr.org/" target="_blank" >Open website in a new window</a>.
</p>

';