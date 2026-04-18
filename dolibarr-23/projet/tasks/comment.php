<?php

$id = \GETPOSTINT('id');
$idcomment = \GETPOSTINT('idcomment');
$ref = \GETPOST("ref", 'alpha', 1);
// task ref
$objectref = \GETPOST("taskref", 'alpha');
// task ref
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
$planned_workload = \GETPOSTINT('planned_workloadhour') != '' || \GETPOSTINT('planned_workloadmin') != '' ? (\GETPOSTINT('planned_workloadhour') > 0 ? \GETPOSTINT('planned_workloadhour') * 3600 : 0) + (\GETPOSTINT('planned_workloadmin') > 0 ? \GETPOSTINT('planned_workloadmin') * 60 : 0) : '';
$mode = \GETPOST('mode', 'alpha');
$object = new \Task($db);
$extrafields = new \ExtraFields($db);
$projectstatic = new \Project($db);
// Security check
$socid = 0;
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);