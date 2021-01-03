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

function createTasks($lists_id)
{
	render("song/createTask", array(
		'lists_id' =>  $lists_id
	));
}

function createSaveTask()
{
	if (createNewTask()) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();
	}
}
function readTasks($id)
{
	$tasks = getTasks($id);

	render("song/read", array(
		"tasks" => $tasks
	));
}

function deleteTasks($id)
{
	if (deleteTask($id)) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();
	}
}

function editTasks($id)
{
	$tasks = getTask($id);
	render("song/editTask", array(
		"tasks" => $tasks
	));
}

function editSaveTasks()
{
	editTask();
	header("location:" . URL . "song/index");
}
