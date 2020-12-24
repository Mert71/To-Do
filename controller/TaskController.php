<?php

require(ROOT . "model/TaskModel.php");

function indexTasks($lists_id, $sort =0)
{
	$tasks = getAllTasks($lists_id, $sort);

	render("song/indexTask", array(
		'tasks' => $tasks,
		'lists_id' => $lists_id,
		'sort' => $sort
	));
}
