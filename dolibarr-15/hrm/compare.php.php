<?php

/**
 *
 * 	Return a html list element with diff  between required rank  and user rank
 *
 * 		@param array $TMergedSkills skill list with all rate to add good picto
 * 		@return string
 */
function diff(&$TMergedSkills)
{
}
/**
 * 	Return a html list with rank informations
 * 		@param array $TMergedSkills skill list for display
 * 		@param string $field which column of comparison we are working with
 * 		@return string
 */
function rate(&$TMergedSkills, $field)
{
}
/**
 * 	  	return a html ul list of skills
 *
 * 			@param array $TMergedSkills skill list for display
 * 			@return string (ul list in html )
 */
function skillList(&$TMergedSkills)
{
}
/**
 *  create an array of lines [ skillLabel,dscription, maxrank on group1 , minrank needed for this skill ]
 *
 * @param array $TSkill1 skill list of first column
 * @param array $TSkill2 skill list of second column
 * @return array
 */
function mergeSkills($TSkill1, $TSkill2)
{
}
/**
 * 	Display a list of User with picto
 * 		@param array $TUser list of users (employees) in selected usergroup of a column
 * 		@param int $fk_usergroup selected usergroup id
 * 		@param string $namelist html name
 * 		@return string
 */
function displayUsersListWithPicto(&$TUser, $fk_usergroup = 0, $namelist = 'list-user')
{
}
/**
 *
 * 		Allow to get skill(s) of a user
 *
 * 		@param array $TUser array of employees we need to get skills
 * 		@return array|int
 */
function getSkillForUsers($TUser)
{
}
/**
 * 		Allow to get skill(s) of a job
 *
 * 		@param int $fk_job job we need to get required skills
 * 		@return array|int
 */
function getSkillForJob($fk_job)
{
}