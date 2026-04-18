<?php

$action = \GETPOST('action');
$job = new \Job($db);
// Permissions
$permissiontoread = $user->hasRight('hrm', 'evaluation', 'read') || $user->hasRight('hrm', 'compare_advance', 'read');
$permissiontoadd = 0;
/*
 * View
 */
$css = array('/hrm/css/style.css');
$head = array();
$h = 0;
$fk_usergroup2 = 0;
$fk_job = (int) \GETPOST('fk_job');
$fk_usergroup1 = \GETPOSTINT('fk_usergroup1');
$j = new \Job($db);
$jobs = $j->fetchAll();
$TJobs = array();
$TUser1 = $TUser2 = array();
$userlist1 = \displayUsersListWithPicto($TUser1, $fk_usergroup1, 'list1');
// This fill also the $TUser1
$TSkill1 = \getSkillForUsers($TUser1);
$TMergedSkills = \mergeSkills($TSkill1, $TSkill2);
/**
 * 	Return a html list element with diff  between required rank  and user rank
 *
 * 		@param array<int,stdClass> $TMergedSkills skill list with all rate to add good picto
 * 		@return string
 */
function diff(&$TMergedSkills)
{
}
/**
 * Return a html list with rank information
 *
 * @param 	array<int,stdClass> $TMergedSkills 	Skill list for display
 * @param 	string 				$field 			Which column of comparison we are working with ('rate1' or 'rate2')
 * @return 	string								String to show for level
 */
function rate(&$TMergedSkills, $field)
{
}
/**
 * return a html ul list of skills
 *
 * @param array<int,stdClass> $TMergedSkills skill list for display
 * @return string (ul list in html )
 */
function skillList(&$TMergedSkills)
{
}
/**
 * Create an array of lines [ skillLabel,description, maxrank on group1 , minrank needed for this skill ]
 *
 * @param array<int,stdClass> $TSkill1 		Skill list of first column
 * @param array<int,stdClass> $TSkill2 		Skill list of second column
 * @return array<int,stdClass>
 */
function mergeSkills($TSkill1, $TSkill2)
{
}
/**
 * 	Display a list of User with picto
 *
 * 	@param 	int[] 	$TUser 			list of users (employees) in selected usergroup of a column
 * 	@param 	int 	$fk_usergroup 	selected usergroup id
 * 	@param 	string 	$namelist 		html name
 * 	@return string
 */
function displayUsersListWithPicto(&$TUser, $fk_usergroup = 0, $namelist = 'list-user')
{
}
/**
 * 		Allow to get skill(s) of a user
 *
 * 		@param int[] 	$TUser 			array of employees we need to get skills
 * 		@return array<int,stdClass>
 */
function getSkillForUsers($TUser)
{
}
/**
 * 		Allow to get skill(s) of a job
 *
 * 		@param int $fk_job job we need to get required skills
 * 		@return stdClass[]
 */
function getSkillForJob($fk_job)
{
}