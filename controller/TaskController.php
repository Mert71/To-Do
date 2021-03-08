<?php

require(ROOT . "model/TaskModel.php");

function indexTasks($list_id, $sort =0)
{
	$tasks = getAllTasks($list_id, $sort);

	render("list/indexTask", array(
		'tasks' => $tasks,
		'list_id' => $list_id,
		'sort' => $sort
	));
}

//Tasks rendering createtask.php 
function createTasks($list_id)
{
	render("list/createTask", array(
		'list_id' =>  $list_id
	));
}

//Saving the inputs in createtask.php
function createSaveTask()
{
	if (createNewTask($task_name = $_POST["task_name"] , $description = $_POST["description"] , $list_id = $_POST["list_id"] , $status = $_POST["status"])) {
		header("location:" . URL . "list/index");
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

	render("list/read", array(
		"tasks" => $tasks
	));
}

//Deleting tasks
function deleteTasks($id)
{
	if (deleteTask($id)) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();
	}
}

//opens editTask.php
function editTasks($id)
{
	$tasks = getTask($id);
	render("list/editTask", array(
		"tasks" => $tasks
	));
}

//Saves the inputs into tasks
function editSaveTasks()
{
	editTask($task_name = $_POST["task_name"] , $description = $_POST["description"] , $task_id = $_POST["task_id"] , $status = $_POST["status"]);
	header("location:" . URL . "list/index");
}
