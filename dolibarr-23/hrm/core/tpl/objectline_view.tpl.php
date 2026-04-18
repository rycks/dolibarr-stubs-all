<?php

// add html5 elements
$domData = ' data-element="' . $line->element . '"';
$coldisplay = 0;
$skill = \null;
$resSkill = 0;
$skill = new \Skill($this->db);
$resSkill = $skill->fetch($line->fk_skill);