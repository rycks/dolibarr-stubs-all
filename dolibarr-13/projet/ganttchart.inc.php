<?php

/**
 * Add a gant chart line
 *
 * @param 	array	$tarr					Array of all tasks
 * @param	array	$task					Array with properties of one task
 * @param 	array	$task_dependencies		Task dependencies (array(array(0=>idtask,1=>idtasktofinishfisrt))
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
 * @param 	array	$tarr					tarr
 * @param	int		$parent					Parent
 * @param 	array	$task_dependencies		Task dependencies
 * @param 	int		$level					Level
 * @return	void
 */
function findChildGanttLine($tarr, $parent, $task_dependencies, $level)
{
}