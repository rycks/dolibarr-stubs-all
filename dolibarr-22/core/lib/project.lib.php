<?php

/**
 * Prepare array with list of tabs
 *
 * @param	Project	$project	Object related to tabs
 * @param	string	$moreparam	More param on url
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function project_prepare_head(\Project $project, $moreparam = '')
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   CommonObject	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function task_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param	string	$mode		Mode
 * @param   User|string  $fuser      Filter on user
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function project_timesheet_prepare_head($mode, $fuser = \null)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function project_admin_prepare_head()
{
}
/**
 * Show task lines with a particular parent
 *
 * @param	int         $inc				    Line number (start to 0, then increased by recursive call)
 * @param   int 		$parent				    Id of parent task to show (0 to show all)
 * @param   Task[]		$lines				    Array of lines
 * @param   int			$level				    Level (start to 0, then increased/decrease by recursive call), or -1 to show all level in order of $lines without the recursive groupment feature.
 * @param 	string		$var				    Not used
 * @param 	int			$showproject		    Show project columns
 * @param	array<int,string>	$taskrole	    Array of roles of user for each tasks
 * @param	string		$projectsListId		    List of id of projects allowed to user (string separated with comma)
 * @param	int			$addordertick		    Add a tick to move task
 * @param   int         $projectidfortotallink  0 or Id of project to use on total line (link to see all time consumed for project)
 * @param   string      $dummy					Not used.
 * @param   int         $showbilltime           Add the column 'TimeToBill' and 'TimeBilled'
 * @param   array<string, array<string, int|string>>	$arrayfields	Array with displayed column information
 * @param   string[]    $arrayofselected        Array with selected fields
 * @return	int									Nb of tasks shown
 */
function projectLinesa(&$inc, $parent, &$lines, &$level, $var, $showproject, &$taskrole, $projectsListId = '', $addordertick = 0, $projectidfortotallink = 0, $dummy = '', $showbilltime = 0, $arrayfields = array(), $arrayofselected = array())
{
}
/**
 * Output a task line into a pertime input mode
 *
 * @param	int 	   	$inc					Line number (start to 0, then increased by recursive call)
 * @param   int 		$parent					Id of parent task to show (0 to show all)
 * @param	?User		$fuser					Restrict list to user if defined
 * @param   Task[]		$lines					Array of lines
 * @param   int			$level					Level (start to 0, then increased/decrease by recursive call)
 * @param   array<int,string>	$projectsrole	Array of roles user has on project
 * @param   array<int,string>	$tasksrole		Array of roles user has on task
 * @param	string		$mine					Show only task lines I am assigned to
 * @param   int<0,1>	$restricteditformytask	0=No restriction, 1=Enable add time only if task is a task i am affected to
 * @param	int			$preselectedday			Preselected day
 * @param   array<int,array{morning:int<0,1>,afternoon:int<0,1>}>	$isavailable	Array with data that say if user is available for several days for morning and afternoon
 * @param	int			$oldprojectforbreak		Old project id of last project break
 * @return  array<int,int>						Array with time spent for $fuser for each day of week on tasks in $lines and subtasks
 */
function projectLinesPerAction(&$inc, $parent, $fuser, $lines, &$level, &$projectsrole, &$tasksrole, $mine, $restricteditformytask, $preselectedday, &$isavailable, $oldprojectforbreak = 0)
{
}
/**
 * Output a task line into a pertime input mode
 *
 * @param	int         $inc					Line number (start to 0, then increased by recursive call)
 * @param   int 		$parent					Id of parent task to show (0 to show all)
 * @param	?User		$fuser					Restrict list to user if defined
 * @param   Task[]		$lines					Array of lines
 * @param   int			$level					Level (start to 0, then increased/decrease by recursive call)
 * @param   array<int,string>	$projectsrole	Array of roles user has on project
 * @param   array<int,string>	$tasksrole		Array of roles user has on task
 * @param	int<0,1>	$mine					Show only task lines I am assigned to
 * @param   int<0,2>	$restricteditformytask	0=No restriction, 1=Enable add time only if task is assigned to me, 2=Enable add time only if tasks is assigned to me and hide others
 * @param	int			$preselectedday			Preselected day
 * @param   array<int,array{morning:int<0,1>,afternoon:int<0,1>}>	$isavailable	Array with data that say if user is available for several days for morning and afternoon
 * @param	int			$oldprojectforbreak		Old project id of last project break
 * @param	array<string, array<string, int|string>> $arrayfields		    Array of additional column
 * @param	Extrafields	$extrafields		    Object extrafields
 * @return  array<int,int>						Array with time spent for $fuser for each day of week on tasks in $lines and subtasks
 */
function projectLinesPerDay(&$inc, $parent, $fuser, $lines, &$level, &$projectsrole, &$tasksrole, $mine, $restricteditformytask, $preselectedday, &$isavailable, $oldprojectforbreak = 0, $arrayfields = array(), $extrafields = \null)
{
}
/**
 * Output a task line into a perday input mode
 *
 * @param	int 	   	$inc					Line output identificator (start to 0, then increased by recursive call)
 * @param	int			$firstdaytoshow			First day to show
 * @param	?User		$fuser					Restrict list to user if defined
 * @param   int 		$parent					Id of parent task to show (0 to show all)
 * @param   Task[]		$lines					Array of lines (list of tasks but we will show only if we have a specific role on task)
 * @param   int			$level					Level (start to 0, then increased/decrease by recursive call)
 * @param   array<int,string>	$projectsrole	Array of roles user has on project
 * @param   array<int,string>	$tasksrole		Array of roles user has on task
 * @param	int<0,1>	$mine					Show only task lines I am assigned to
 * @param   int<0,2>	$restricteditformytask	0=No restriction, 1=Enable add time only if task is assigned to me, 2=Enable add time only if tasks is assigned to me and hide others
 * @param   array<int,array{morning:int<0,1>,afternoon:int<0,1>}>	$isavailable	Array with data that say if user is available for several days for morning and afternoon
 * @param	int			$oldprojectforbreak		Old project id of last project break
 * @param	array<string, array<string, int|string>> $arrayfields		    Array of additional column
 * @param	Extrafields	$extrafields		    Object extrafields
 * @return  array<int,int>						Array with time spent for $fuser for each day of week on tasks in $lines and subtasks
 */
function projectLinesPerWeek(&$inc, $firstdaytoshow, $fuser, $parent, $lines, &$level, &$projectsrole, &$tasksrole, $mine, $restricteditformytask, &$isavailable, $oldprojectforbreak = 0, $arrayfields = array(), $extrafields = \null)
{
}
/**
 * Output a task line into a perday input mode
 *
 * @param	int 	   	$inc					Line output identificator (start to 0, then increased by recursive call)
 * @param	int			$firstdaytoshow			First day to show
 * @param	User|null	$fuser					Restrict list to user if defined
 * @param   int 		$parent					Id of parent task to show (0 to show all)
 * @param   Task[]		$lines					Array of lines (list of tasks but we will show only if we have a specific role on task)
 * @param   int			$level					Level (start to 0, then increased/decrease by recursive call)
 * @param   array<int,string>	$projectsrole	Array of roles user has on project
 * @param   array<int,string>	$tasksrole		Array of roles user has on task
 * @param	int<0,1>	$mine					Show only task lines I am assigned to
 * @param   int<0,1>	$restricteditformytask	0=No restriction, 1=Enable add time only if task is a task i am affected to
 * @param   array<int,array{morning:int<0,1>,afternoon:int<0,1>}>	$isavailable	Array with data that say if user is available for several days for morning and afternoon
 * @param	int			$oldprojectforbreak		Old project id of last project break
 * @param	string[]	$TWeek					Array of week numbers ('02', ...
 * @param	array<string, array<string, int|string>> $arrayfields		    Array of additional column
 * @param	Extrafields	$extrafields		    Object extrafields
 * @return  array<string,int>					Array with time spent for $fuser for each day of week on tasks in $lines and subtasks (index is string, month is '01', ...)
 */
function projectLinesPerMonth(&$inc, $firstdaytoshow, $fuser, $parent, $lines, &$level, &$projectsrole, &$tasksrole, $mine, $restricteditformytask, &$isavailable, $oldprojectforbreak = 0, $TWeek = array(), $arrayfields = array(), $extrafields = \null)
{
}
/**
 * Search in task lines with a particular parent if there is a task for a particular user (in taskrole)
 *
 * @param 	int		$inc				Counter that count number of lines legitimate to show (for return)
 * @param 	int		$parent				Id of parent task to start
 * @param 	Task[]	$lines				Array of all tasks
 * @param	array<int,string>	$taskrole	Array of task filtered on a particular user
 * @return	int							1 if there is
 */
function searchTaskInChild(&$inc, $parent, &$lines, &$taskrole)
{
}
/**
 * Return HTML table with list of projects and number of opened tasks
 *
 * @param	DoliDB		$db					Database handler
 * @param	Form		$form				Object form
 * @param   int			$socid				Id thirdparty
 * @param   int|string	$projectsListId     Id or ids of project I have permission on (separated with comma)
 * @param   int<0,1>	$mytasks            Limited to task I am contact to
 * @param	int<-1,1>	$status				-1=No filter on statut, 0 or 1 = Filter on status
 * @param	array<int,string>	$listofoppstatus	List of opportunity status
 * @param   string[]	$hiddenfields       List of info to not show ('projectlabel', 'declaredprogress', '...', )
 * @param	int<0,max>	$max				Max nb of record to show in HTML list
 * @return	void
 */
function print_projecttasks_array($db, $form, $socid, $projectsListId, $mytasks = 0, $status = -1, $listofoppstatus = array(), $hiddenfields = array(), $max = 0)
{
}
/**
 * @param   Task        $task               the task object
 * @param   bool|string $label              true = auto, false = don't display, string = replace output
 * @param   bool|string $progressNumber     true = auto, false = don't display, string = replace output
 * @param   bool        $hideOnProgressNull hide if progress is null
 * @param   bool        $spaced             used to add space at bottom (made by css)
 * @return string
 * @see getTaskProgressBadge()
 */
function getTaskProgressView($task, $label = \true, $progressNumber = \true, $hideOnProgressNull = \false, $spaced = \false)
{
}
/**
 * @param   Task    $task       the task object
 * @param   string  $label      empty = auto (progress), string = replace output
 * @param   string  $tooltip    empty = auto , string = replace output
 * @return  string
 * @see getTaskProgressView()
 */
function getTaskProgressBadge($task, $label = '', $tooltip = '')
{
}