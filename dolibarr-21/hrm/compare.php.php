<?php

/**
 *
 * 	Return a html list element with diff  between required rank  and user rank
 *
 * 		@param array<int,stdClass> $TMergedSkills skill list with all rate to add good picto
 * 		@return string
 */
function diff(&$TMergedSkills)
{
}
/**
 * 	Return a html list with rank information
 * 		@param array<int,stdClass> $TMergedSkills skill list for display
 * 		@param string $field which column of comparison we are working with
 * 		@return string
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
 *  create an array of lines [ skillLabel,description, maxrank on group1 , minrank needed for this skill ]
 *
 * @param array<int,stdClass> $TSkill1 skill list of first column
 * @param array<int,stdClass> $TSkill2 skill list of second column
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
 *
 * 		Allow to get skill(s) of a user
 *
 * 		@param int[] $TUser array of employees we need to get skills
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