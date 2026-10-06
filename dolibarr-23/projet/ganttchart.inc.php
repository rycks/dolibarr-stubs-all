<?php

/**
 * Add a gantt chart line
 *
 * @param 	array<int,array{task_id:int,task_alternate_id:int,task_name:string,task_resources:string,task_start_date:int,task_end_date:int,task_is_group:int<0,1>,task_position:int,task_css:string,task_milestone:int,task_parent:int,task_parent_alternate_id:int}>	$tarr					Array of all tasks
 * @param	array{task_id:int,task_alternate_id:int,task_name:string,task_resources:string,task_start_date:int,task_end_date:int,task_is_group:int<0,1>,task_position:int,task_css:string,task_milestone:int,task_parent:int,task_parent_alternate_id:int}	$task					Array with properties of one task
 * @param 	array<int[]>	$task_dependencies		Task dependencies (array(array(0=>idtask,1=>idtasktofinishfisrt))
 * @param 	int		$level					Level
 * @param 	int		$project_id				Id of project
 * @return	void
 */
function constructGanttLine($tarr, $task, $task_dependencies, $level = 0, $project_id = \null)
{
}
/**
 * Find child Gantt line
 *
 * @param 	array<int,array{task_id:int,task_alternate_id:int,task_name:string,task_resources:string,task_start_date:int,task_end_date:int,task_is_group:int<0,1>,task_position:int,task_css:string,task_milestone:int,task_parent:int,task_parent_alternate_id:int}>	$tarr					tarr
 * @param	int		$parent					Parent
 * @param 	array<int[]>	$task_dependencies		Task dependencies
 * @param 	int		$level					Level
 * @return	void
 */
function findChildGanttLine($tarr, $parent, $task_dependencies, $level)
{
}